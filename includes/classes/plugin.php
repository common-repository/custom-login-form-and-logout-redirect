<?php
namespace mysterious\loginform_logout\classes;
class plugin
{
    public static function defaultSettings(){
        if( !get_option('mstteam_login_logout_settings') ){
            $generals = array(
                'username_label'            => true,
                'username_label_text'       => esc_html__('Username or Email Address','mst-login-form-and-logout-redirect'),
                'username_placeholder'      => false,
                'username_placeholder_text' => esc_html__('Username or Email Address','mst-login-form-and-logout-redirect'),
                'password_label'            => true,
                'password_label_text'       => esc_html__('Password','mst-login-form-and-logout-redirect'),
                'password_placeholder'      => false,
                'password_placeholder_text' => esc_html__('Password','mst-login-form-and-logout-redirect'),
                'remember_me'               => true,
                'remember_me_text'          => esc_html__('Remember Me','mst-login-form-and-logout-redirect'),
                'login_label'               => esc_html__('Login','mst-login-form-and-logout-redirect'),
                'lostyourpassword'          => true,
                'lostyourpassword_text'     => esc_html__('Lost your password?','mst-login-form-and-logout-redirect'),
                'login_success_url'         => '',
                'logout_redirect'           => ''
            );
            update_option('mstteam_login_logout_settings',$generals);
        }
      
    }
    public static function activate()
    {
        self::defaultSettings();
    }

}
