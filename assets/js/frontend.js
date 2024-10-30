( function( $ ) {
    "use strict";
    $(document).ready(function(){
        if(mstteam_data.username_placeholder != ''){
            $('#mstteam-login-form #user_login').attr('placeholder', mstteam_data.username_placeholder_text);
            $('#mstteam-login-form #user_email').attr('placeholder', mstteam_data.username_placeholder_text);
        }
        if(mstteam_data.password_placeholder != ''){
            $('#mstteam-login-form #user_pass').attr('placeholder', mstteam_data.password_placeholder_text);
        }
        
        if(mstteam_data.flag_login_error != ''){
            $('#mstteam-login-form').addClass('mstteam-shake');
            var html = '<div class="mstteam-login-error"><p class="mstteam-p-error">'+mstteam_data.login_error_text+'</p></div>';
            $('#mstteam-login-form').prepend(html);
        }
        
        
    });
  } )( jQuery );