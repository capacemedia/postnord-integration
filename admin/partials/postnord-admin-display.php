<h1>PostNord Integration Settings</h1>
<form method="post" action="options.php">
    <?php
    settings_fields('woocommerce_postnord_settings');
    do_settings_sections('woocommerce_postnord_settings');
    ?>
    <table class="form-table">
        <tr valign="top">
            <th scope="row">PostNord API Key</th>
            <td>
                <input type="text" name="postnord_api_key" value="<?php echo esc_attr(get_option('postnord_api_key')); ?>" />
            </td>
        </tr>
    </table>
    <?php submit_button(); ?>
</form>
