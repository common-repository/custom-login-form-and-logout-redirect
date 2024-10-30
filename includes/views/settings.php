<div class="wrap">
   <h1><?php echo esc_html__( 'General Settings','mst-login-form-and-logout-redirect');?></h1>
   <?php if (isset($_GET['settings-updated'])): ?>
   <div class="notice notice-success is-dismissible">
      <p><?php echo esc_html__('Changes saved','mst-login-form-and-logout-redirect');?></p>
   </div>
   <?php endif;?>
   <hr>
   <div class="mstteam-alert-dislay-login-form">
      <p class='mstteam-text-content-alert'>
      <?php 
         echo  sprintf('<strong>%1$s</strong> %2$s <input class="mstteam-input" type="text" value="%3$s"> %4$s',
               esc_html__('NOTE:','mst-login-form-and-logout-redirect'),
               esc_html__('Use the shortcode','mst-login-form-and-logout-redirect'),
               '[mstteam_login_form]',
               esc_html__('to display WordPress login form','mst-login-form-and-logout-redirect'),
         ); 
      ?>
      </p>
   </div>
   <div class="mstlilo-tab-controls">
      <div data-tab-current='login-form' class="mstlilo-tab-control <?php echo $tab_active==="login-form" ? 'mstlilo-tab-active' : ''; ?>" data-target="#mstlilo-tab-1"><?php echo esc_html__('Login Form','mst-login-form-and-logout-redirect') ?></div>
      <div data-tab-current='logout-redirect' class="mstlilo-tab-control <?php echo $tab_active==="logout-redirect" ? 'mstlilo-tab-active' : ''; ?>" data-target="#mstlilo-tab-2"><?php echo esc_html__('Logout Redirect', 'mst-login-form-and-logout-redirect') ?></div>
  
   </div>
   <form action="<?php echo esc_url(admin_url( 'admin-ajax.php')); ?>" method="post">
        <div class="mstlilo-tab-contents">
            <input type="hidden" name="action" value="mstlilo_save_settings" >
            <input type="hidden" name="nonce" value="<?php echo esc_attr(wp_create_nonce("mstlilo-nonce")); ?>" >
            <input type="hidden" id="mstlilo-tab-current" name="tab_current" value="<?php echo esc_attr($tab_active);?>" >
            <div id="mstlilo-tab-1" class="mstlilo-tab-content <?php echo $tab_active==='login-form' ? 'mstlilo-tab-active' : ''; ?>">
               <?php require_once MST_LOGIN_LOGOUT_DIR.'/includes/views/tab-login.php'; ?>
            </div>
            <div id="mstlilo-tab-2" class="mstlilo-tab-content <?php echo $tab_active==='logout-redirect' ? 'mstlilo-tab-active' : ''; ?>">
               <?php require_once MST_LOGIN_LOGOUT_DIR.'/includes/views/tab-logout.php'; ?>
            </div>
            <p class="submit"><input type="submit" name="submit" id="submit" class="button button-primary" value="<?php echo esc_attr__('Save Changes','mst-login-form-and-logout-redirect'); ?>"></p>
        </div>
   </form>
</div>