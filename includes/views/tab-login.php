<table class="form-table">
    <tr class="">
        <th scope="row">
            <label><?php echo esc_html__('User Name / Email Address Label Text','mst-login-form-and-logout-redirect'); ?></label>
        </th>
        <td>
            <div class="mstlilo-switch-control">
                <input data-type='username-label' id="mstlilo-switch" class="mstteam-custom-login-form-field" type='checkbox' name='mstteam_login_logout_settings[username_label]' <?php echo $username_label ? 'checked="checked"' : ''; ?>>
                <label for="mstlilo-switch" class="green"></label>
            </div>
            <p class="description"><?php echo esc_html__('Show / Hide “User Name / Email Address” Label in the form.','mst-login-form-and-logout-redirect'); ?></p>
        </td> 
    </tr>
    <tr class="mstteam-username-email-label-text">
        <th scope="row">
            <label></label>
        </th>
        <td>
            <input class='regular-text' type='text' name='mstteam_login_logout_settings[username_label_text]' value="<?php echo esc_attr($username_label_text) ?>">
            <p class="description">
                <?php 
                    echo  sprintf('%1$s <strong>%2$s</strong>: %3$s',
                        esc_html__('Custom label for the username/email address field.','mst-login-form-and-logout-redirect'),
                        esc_html__('Default','mst-login-form-and-logout-redirect'),
                        esc_html__('Username or Email Address','mst-login-form-and-logout-redirect'),
                    ); 
                ?>
            </p>
        </td>
    </tr>
    <tr class="">
        <th scope="row">
            <label><?php echo esc_html__('User Name / Email Placeholder','mst-login-form-and-logout-redirect'); ?></label>
        </th>
        <td>
            <div class="mstlilo-switch-control">
                <input data-type='username-placeholder' id="mstlilo-switch-1" class="mstteam-custom-login-form-field" type='checkbox' name='mstteam_login_logout_settings[username_placeholder]' <?php echo $username_placeholder ? 'checked="checked"' : ''; ?>>
                <label for="mstlilo-switch-1" class="green"></label>
            </div>
            <p class="description"><?php echo esc_html__('Show / Hide “User Name / Email Address” Placeholder in the form.','mst-login-form-and-logout-redirect'); ?></p>
        </td> 
    </tr>
    <tr class="mstteam-username-email-placeholder">
        <th scope="row">
            <label></label>
        </th>
        <td>
            <input class='regular-text' type='text' name='mstteam_login_logout_settings[username_placeholder_text]' value="<?php echo esc_attr($username_placeholder_text) ?>">
            <p class="description">
                <?php 
                    echo  sprintf('%1$s <strong>%2$s</strong>: %3$s',
                        esc_html__('Custom placeholder attribute for the username/email address input field.','mst-login-form-and-logout-redirect'),
                        esc_html__('Default','mst-login-form-and-logout-redirect'),
                        esc_html__('Username or Email Address','mst-login-form-and-logout-redirect'),
                    ); 
                ?>
            </p>
        </td>
    </tr>

    <tr class="">
        <th scope="row">
            <label><?php echo esc_html__('Password Label Text','mst-login-form-and-logout-redirect'); ?></label>
        </th>
        <td>
            <div class="mstlilo-switch-control">
                <input data-type='password-label' id="mstlilo-switch-2" class="mstteam-custom-login-form-field" type='checkbox' name='mstteam_login_logout_settings[password_label]' <?php echo $password_label ? 'checked="checked"' : ''; ?>>
                <label for="mstlilo-switch-2" class="green"></label>
            </div>
            <p class="description"><?php echo esc_html__('Show / Hide “Password” Label in the form.','mst-login-form-and-logout-redirect'); ?></p>
        </td> 
    </tr>
    <tr class="mstteam-password-label-text">
        <th scope="row">
            <label></label>
        </th>
        <td>
            <input class='regular-text' type='text' name='mstteam_login_logout_settings[password_label_text]' value="<?php echo esc_attr($password_label_text) ?>">
            <p class="description">
                <?php 
                    echo  sprintf('%1$s <strong>%2$s</strong>: %3$s',
                        esc_html__('Custom label for the password field.','mst-login-form-and-logout-redirect'),
                        esc_html__('Default','mst-login-form-and-logout-redirect'),
                        esc_html__('Password','mst-login-form-and-logout-redirect'),
                    ); 
                ?>
            </p>
        </td>
    </tr>
    <tr class="">
        <th scope="row">
            <label><?php echo esc_html__('Password Placeholder','mst-login-form-and-logout-redirect'); ?></label>
        </th>
        <td>
            <div class="mstlilo-switch-control">
                <input data-type='password-placeholder' id="mstlilo-switch-3" class='mstteam-custom-login-form-field' type='checkbox' name='mstteam_login_logout_settings[password_placeholder]' <?php echo $password_placeholder ? 'checked="checked"' : ''; ?>>
                <label for="mstlilo-switch-3" class="green"></label>
            </div>
            <p class="description"><?php echo esc_html__('Show / Hide “Password” Placeholder in the form.','mst-login-form-and-logout-redirect'); ?></p>
        </td> 
        
    </tr>
    <tr class="mstteam-password-placeholder">
        <th scope="row">
            <label></label>
        </th>
        <td>
            <input class='regular-text' type='text' name='mstteam_login_logout_settings[password_placeholder_text]' value="<?php echo esc_attr($password_placeholder_text) ?>">
            <p class="description">
                <?php 
                    echo  sprintf('%1$s <strong>%2$s</strong>: %3$s',
                        esc_html__('Custom placeholder attribute for the password field.','mst-login-form-and-logout-redirect'),
                        esc_html__('Default','mst-login-form-and-logout-redirect'),
                        esc_html__('Password','mst-login-form-and-logout-redirect'),
                    ); 
                ?>
            </p>
        </td>
    </tr>

    <tr class="">
        <th scope="row">
            <label><?php echo esc_html__('Remember Me','mst-login-form-and-logout-redirect'); ?></label>
        </th>
        <td>
            <div class="mstlilo-switch-control">
                <input data-type='rememberme' id="mstlilo-switch-4" class="mstteam-custom-login-form-field" type='checkbox' name='mstteam_login_logout_settings[remember_me]' <?php echo $remember_me ? 'checked="checked"' : ''; ?>>
                <label for="mstlilo-switch-4" class="green"></label>
            </div>
            <p class="description"><?php echo esc_html__('Show / Hide “Remember Me” checkbox in the form.','mst-login-form-and-logout-redirect'); ?></p>
        </td> 
    </tr>
    <tr class="mstteam-rememberme-label-text">
        <th scope="row">
            <label><?php echo esc_html__('Remember Me Label Text','mst-login-form-and-logout-redirect'); ?></label>
        </th>
        <td>
            <input class='regular-text' type='text' name='mstteam_login_logout_settings[remember_me_text]' value="<?php echo esc_attr($remember_me_text) ?>">
            <p class="description">
                <?php 
                    echo  sprintf('%1$s <strong>%2$s</strong>: %3$s',
                        esc_html__('Custom label for the remember me field.','mst-login-form-and-logout-redirect'),
                        esc_html__('Default','mst-login-form-and-logout-redirect'),
                        esc_html__('Remember Me','mst-login-form-and-logout-redirect'),
                    ); 
                ?>
            </p>
        </td>
    </tr>
    
    <tr class="">
        <th scope="row">
            <label><?php echo esc_html__('Login Button Label Text','mst-login-form-and-logout-redirect'); ?></label>
        </th>
        <td>
            <input class='regular-text' type='text' name='mstteam_login_logout_settings[login_label]' value="<?php echo esc_attr($login_label) ?>">
            <p class="description">
                <?php 
                    echo  sprintf('%1$s <strong>%2$s</strong>: %3$s',
                        esc_html__('Custom label for the login button field.','mst-login-form-and-logout-redirect'),
                        esc_html__('Default','mst-login-form-and-logout-redirect'),
                        esc_html__('Login','mst-login-form-and-logout-redirect'),
                    ); 
                ?>
            </p>
        </td>
    </tr>

    <tr class="">
        <th scope="row">
            <label><?php echo esc_html__('Lost your password?','mst-login-form-and-logout-redirect'); ?></label>
        </th>
        <td>
            <div class="mstlilo-switch-control">
                <input data-type='lostyourpassword' id="mstlilo-switch-5" class="mstteam-custom-login-form-field" type='checkbox' name='mstteam_login_logout_settings[lostyourpassword]' <?php echo $lostyourpassword ? 'checked="checked"' : ''; ?>>
                <label for="mstlilo-switch-5" class="green"></label>
            </div>
            <p class="description"><?php echo esc_html__('Show / Hide “Lost your password?” link in the form.','mst-login-form-and-logout-redirect'); ?></p>
        </td> 
    </tr>
    <tr class="mstteam-yourpassword-label-text">
        <th scope="row">
            <label><?php echo esc_html__('Lost your password? Label Text','mst-login-form-and-logout-redirect'); ?></label>
        </th>
        <td>
            <input class='regular-text' type='text' name='mstteam_login_logout_settings[lostyourpassword_text]' value="<?php echo esc_attr($lostyourpassword_text) ?>">
            <p class="description">
                <?php 
                    echo  sprintf('%1$s <strong>%2$s</strong>',
                        esc_html__('Custom label text for','mst-login-form-and-logout-redirect'),
                        esc_html__('Lost your password?','mst-login-form-and-logout-redirect')
                    ); 
                ?>
            </p>
        </td>
    </tr>

    <tr class="">
        <th scope="row">
            <label><?php echo esc_html__('Successfully Login Redirect','mst-login-form-and-logout-redirect'); ?></label>
        </th>
        <td>
            <input class='regular-text' type='text' name='mstteam_login_logout_settings[login_success_url]' value="<?php echo esc_attr($login_success_url); ?>">
            <p class="description">
            <?php 
                    echo  sprintf('%1$s <strong>%2$s</strong>: %3$s. <strong>%4$s</strong>: %5$s',
                        esc_html__('An absolute URL to which the user will be redirected after a successful login.','mst-login-form-and-logout-redirect'),
                        esc_html__('For example','mst-login-form-and-logout-redirect'),
                        esc_url( home_url().'/page-or-post-or-custom-post-type/' ),
                        esc_html__('Default','mst-login-form-and-logout-redirect'),
                        esc_html__('Redirect back to the URL where the form was submitted.','mst-login-form-and-logout-redirect'),
                    ); 
            ?>
            </p>
        </td>
    </tr>
</table>
