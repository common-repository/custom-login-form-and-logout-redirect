<table class="form-table">
    <tbody class="">
        <tr class="">
            <th scope="row">
                <label><?php echo esc_html__('Logout redirect URL','mst-login-form-and-logout-redirect'); ?></label>
            </th>
            <td>
                <input class='regular-text' type='text' name='mstteam_login_logout_settings[logout_redirect]' value="<?php echo esc_attr($logout_redirect)?>">
                <p class="description">
                    <?php 
                        echo  sprintf('%1$s <strong>%2$s</strong>: %3$s',
                                esc_html__('Redirect Users After Logout.','mst-login-form-and-logout-redirect'),
                                esc_html__('Default','mst-login-form-and-logout-redirect'),
                                esc_html__('Redirects back to the URL where the form was created.','mst-login-form-and-logout-redirect'),
                            ); 
                    ?>   
                </p>          
            </td>
        </tr>
    </tbody>
</table>