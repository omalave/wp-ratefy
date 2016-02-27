<?php

/**
 * Provide a admin area view for the plugin
 *
 * This file is used to markup the admin-facing aspects of the plugin.
 *
 * @link       https://github.com/omalave
 * @since      1.0.0
 *
 * @package    Wp_Ratefy
 * @subpackage Wp_Ratefy/admin/partials
 */
?>
    <div class="wrap">
        <h2>WP Ratefy Custom Options</h2>
        <form method="post" action="options.php">
            <?php wp_nonce_field('update-options') ?>

            <h3 class="title">Plugin </h3>
            <hr size="1">

            <table class="form-table">
                <tbody>
                <tr valign="top">
                    <th scope="row"><label>Version</label></th>
                    <td>1.0.0</td>
                </tr>   

                <tr valign="top">
                    <th scope="row"><label>Shortcode</label></th>
                    <td><code>['show_wp_ratefy']</code></td>
                </tr>  

                <tr valign="top">
                    <th scope="row"><label>Uninstall</label></th>
                    <td>
                        <input type="checkbox" name="uninstall_settings" id="uninstall_settings" checked="checked"> 
                        <label for="uninstall_settings">Delete Plugin Settings </label><br>
                    </td>
                </tr> 
                </tbody>
            </table>

            <h3 class="title">Text Options </h3>
            <hr size="1">

            <table class="form-table">
                <tbody>
                <tr valign="top">
                    <th scope="row"><label>Add Review Text:</label></th>
                    <td><input type="text" name="add_review_text" size="45" value="<?php echo get_option('add_review_text'); ?>" /></td>
                </tr>   

                <tr valign="top">
                    <th scope="row"><label>Rate Service Text:</label></th>
                    <td><input type="text" name="rate_service_text" size="45" value="<?php echo get_option('rate_service_text'); ?>" /></td>
                </tr> 

                <tr valign="top">
                    <th scope="row"><label>Comment Box Placeholder:</label></th>
                    <td><input type="text" name="comment_box_placeholder" size="45" value="<?php echo get_option('comment_box_placeholder'); ?>" /></td>
                </tr> 

                <tr valign="top">
                    <th scope="row"><label>Save Button Text:</label></th>
                    <td><input type="text"name="save_button_text" size="45" value="<?php echo get_option('save_button_text'); ?>" /></td>
                </tr> 

                </tbody>
            </table>



            <p><input type="submit" name="Submit" value="Save Options" /></p>
            <input type="hidden" name="action" value="update" />
            <input type="hidden" name="page_options" value="add_review_text,rate_service_text,comment_box_placeholder,save_button_text" />
        </form>
    </div>
