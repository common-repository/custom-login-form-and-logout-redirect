<?php
namespace mysterious\loginform_logout\classes;
class init
{
    private static $_instance = null;
    private $settings           = array();
    private $general_settings   = array();
    public function __construct()
    {
        if( is_admin() ){
            add_action('admin_menu', array($this, 'admin_menu_settings'));
            add_action('admin_enqueue_scripts', array($this, 'admin_enqueue_scripts'));
            add_action('wp_ajax_mstlilo_save_settings', array( $this, 'ajaxSaveSettings' ) );
        }
        add_action('init', array($this, 'init'));
        add_action('wp_enqueue_scripts', array($this, 'wp_enqueue_scripts'));
        add_shortcode('mstteam_login_form', array($this,'loginFormCodeGenerateShortcode'));
        add_action('wp_login_failed', array($this,'wp_login_failed'),10, 2 );
        add_action('authenticate', array($this,'check_username_password'), 1, 3);
    }
    public static function instance()
    {
        if (is_null(self::$_instance)) {
            self::$_instance = new self();
        }
        return self::$_instance;
    }
    
    public function admin_menu_settings()
    {
        add_options_page(
            esc_html__('Login Form & Logout Redirect', 'mst-login-form-and-logout-redirect'), 
            esc_html__('Login Form - Logout', 'mst-login-form-and-logout-redirect'), 
            'manage_options', 
            'login-form-logout-redirect-settings', 
            array($this, 'display_options_page')
        );
    }

    public function display_options_page()
    {
        $tab_active         = isset($_GET["tab"]) ? sanitize_text_field($_GET["tab"]) : 'login-form';
        foreach($this->settings as $value){
            $$value = isset($this->general_settings[$value]) ? $this->general_settings[$value] : false;
        }
        require_once MST_LOGIN_LOGOUT_DIR.'/includes/views/settings.php';
    }
  
    public function admin_enqueue_scripts($page)
    {
        if($page === 'settings_page_login-form-logout-redirect-settings')
        {
            wp_enqueue_style('mstteam-login-form', MST_LOGIN_LOGOUT_URL.'/assets/css/settings.css', array(), MST_LOGIN_LOGOUT_VERSION );
            wp_enqueue_script('mstteam-login-form', MST_LOGIN_LOGOUT_URL.'/assets/js/settings.js', array('jquery'), MST_LOGIN_LOGOUT_VERSION );
        }
    }

    protected function _shortcode_atts($defaults = array(), $atts)
    {
        if (isset($atts['class'])) {
            $atts['classname'] = $atts['class'];
        }
        return shortcode_atts($defaults, $atts);
    }

    public function loginFormCodeGenerateShortcode( $atts,$content=null )
    {
        extract ( $this->_shortcode_atts ( array (
            'id' => ''
        ), $atts ) );
        ob_start ();
        $html = '';
        if(is_user_logged_in()){
            $current_user = wp_get_current_user();
            $html .= sprintf('<p>%1$s %2$s (%3$s %2$s? %4$s)</p>',
                esc_html__('Hello','mst-login-form-and-logout-redirect'),
                '<strong>' . esc_html( $current_user->display_name ) . '</strong>',
                esc_html__('not','mst-login-form-and-logout-redirect'),
                wp_loginout(esc_url($_SERVER['REQUEST_URI']), false)
            );
        }else{
            
            if( isset($_SESSION['flag_login_error']) ){
                unset($_SESSION['flag_login_error']);
            }
            $current_link = wp_get_referer();
            foreach($this->settings as $value){
                $$value = isset($this->general_settings[$value]) ? $this->general_settings[$value] : false;
            }
            $args = array(
                'redirect'          => !empty($login_success_url) ? esc_url($login_success_url) : esc_url($current_link),
                'form_id'           => 'mstteam-login-form',
                'form_class'        => 'mstteam-test',
                'label_username'    => $username_label ? $username_label_text : '',
                'label_password'    => $password_label ? $password_label_text : '',
                'label_log_in'      => !empty($login_label) ? $login_label : esc_html__('Login','mst-login-form-and-logout-redirect'),
                'remember'          => $remember_me ? true : false,
                'label_remember'    => $remember_me ? $remember_me_text : '',
            );
            if($lostyourpassword){
                $lost_password_label = !empty($lostyourpassword_text) ? $lostyourpassword_text : esc_html__('Lost your password?','mst-login-form-and-logout-redirect');
                $lost_password_link = '<a class="mstteam-lost-password-link" href="'.esc_url(wp_lostpassword_url()).'">'.$lost_password_label.'</a>';
                $html .= $lost_password_link;
            }
            $html .= wp_login_form( $args );
        }
        echo $html;
        return ob_get_clean ();
    }
    public function wp_enqueue_scripts()
    {
        $string_error = '';
        if( isset($_SESSION['flag_login_error']) ){
            $string_error.= isset($_SESSION['flag_login_error']->errors['error_username'][0]) ? sanitize_text_field( $_SESSION['flag_login_error']->errors['error_username'][0] ).'<br/>' : '';
            $string_error.= isset($_SESSION['flag_login_error']->errors['error_password'][0]) ? sanitize_text_field( $_SESSION['flag_login_error']->errors['error_password'][0] ).'<br/>' : '';
            $string_error.= isset($_SESSION['flag_login_error']->errors['incorrect_password'][0]) ? sanitize_text_field ($_SESSION['flag_login_error']->errors['incorrect_password'][0] ).'<br/>' : '';
            $string_error.= isset($_SESSION['flag_login_error']->errors['invalid_username'][0]) ? sanitize_text_field ($_SESSION['flag_login_error']->errors['invalid_username'][0] ).'<br/>' : '';
        }
        wp_enqueue_style('mstteam-login-form', MST_LOGIN_LOGOUT_URL.'/assets/css/frontend.css', array(), MST_LOGIN_LOGOUT_VERSION );
        wp_enqueue_script('mstteam-login-form', MST_LOGIN_LOGOUT_URL.'/assets/js/frontend.js', array('jquery'), MST_LOGIN_LOGOUT_VERSION );
        wp_localize_script(
            'mstteam-login-form',
            'mstteam_data',
            array(
                'ajax_url'                  => admin_url('admin-ajax.php'),
                'home_url'                  => home_url(),
                'username_placeholder'      => isset($this->general_settings['username_placeholder']) && !empty($this->general_settings['username_placeholder']) ? true : false,
                'username_placeholder_text' => isset($this->general_settings['username_placeholder_text']) ? $this->general_settings['username_placeholder_text'] : '',
                'password_placeholder'      => isset($this->general_settings['password_placeholder']) && !empty($this->general_settings['password_placeholder']) ? true : false,
                'password_placeholder_text' => isset($this->general_settings['password_placeholder_text']) ? $this->general_settings['password_placeholder_text'] : '',
                'flag_login_error'          => !empty($string_error) ? true : false,
                'login_error_text'          => !empty($string_error) ? $string_error : esc_html__('Login failed: You have entered an incorrect Username or Password, please try again.','mst-login-form-and-logout-redirect')
            )
        );
    }

    public function check_nonce()
    {
        $nonce = sanitize_text_field($_POST['nonce']);
        if (!wp_verify_nonce($nonce, 'mstlilo-nonce')) {
            wp_die( esc_html__( 'Nonce is invalid.', 'mst-login-form-and-logout-redirect') );
        }
    }

    public function ajaxSaveSettings(){
        $this->check_nonce();
        if(isset($_POST['mstteam_login_logout_settings']))
        {
            $generals = array_map( 'sanitize_text_field', wp_unslash( $_POST['mstteam_login_logout_settings']));
            $tab_active = sanitize_text_field($_POST['tab_current']);
            update_option('mstteam_login_logout_settings',$generals);
            wp_safe_redirect(add_query_arg(array('page' => 'login-form-logout-redirect-settings', 'tab' => esc_attr($tab_active),'settings-updated'=>true), esc_url(admin_url('options-general.php')) ));
            die;
        }
    }
    public function init(){
        if(session_id() == '' || !isset($_SESSION)) {
            session_start();
        }
        $this->settings             = array('username_label','username_label_text','username_placeholder','username_placeholder_text','password_label','password_label_text','password_placeholder','password_placeholder_text','remember_me','remember_me_text','login_label','lostyourpassword','lostyourpassword_text','login_success_url','logout_redirect');
        $this->general_settings     = get_option('mstteam_login_logout_settings');
        if( !empty($this->general_settings['logout_redirect'])){
            add_filter( 'wp_logout', array($this, 'custom_logout_redirect') );
        }
        
    }
    public function custom_logout_redirect()
    {
	    $logout_url		= $this->general_settings['logout_redirect'];
	    wp_safe_redirect( esc_url($logout_url) );
	    exit();
    }
    
    public function wp_login_failed( $username, $error ) {
        $referrer = wp_get_referer();
        if ( $referrer && ! strstr($referrer, 'wp-login') && ! strstr($referrer,'wp-admin') )
        {
            $_SESSION['flag_login_error'] = $error;
            wp_redirect( add_query_arg('', '', $referrer) );
            exit;
        }
     }

     public function check_username_password($user, $username, $password){
        $referrer = wp_get_referer();
        if( !empty( $referrer ) && !strstr( $referrer,'wp-login' ) && !strstr( $referrer,'wp-admin' ) ) { 
            if ( empty( $username ) || empty( $password ) ) {
                $user = new \WP_Error();
                if ( empty( $username ) ) {
                    $user->add( 'error_username', esc_html__( 'Error: The username field is empty.' ) );
                }
                if ( empty( $password ) ) {
                    $user->add( 'error_password', esc_html__( 'Error: The password field is empty.' ) );
                }
                return $user;
            }
           
        }

     }
}