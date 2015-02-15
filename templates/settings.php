<div class="wrap">
    <h2>Volunteer Settings 22</h2>
    <form method="post" action="options.php">
        <?php @settings_fields('vf_options'); ?>
        <?php $options = get_option('vf_settings'); ?>

        <table class="form-table">
            <tr valign="top">
                <th scope="row"><label for="setting_a">Debug</label></th>
                <td><input type="checkbox" name="vf_settings[debug]" value="1" <?php echo checked('1', $options['debug']); ?> /></td>
            </tr>
            <tr valign="top">
                <th scope="row"><label for="setting_a">Host CSS from CDN</label></th>
                <td><input type="checkbox" name="vf_settings[cdn]" value="1" <?php echo checked('1', $options['cdn']); ?> /></td>
            </tr>
            <tr valign="top">
                <th scope="row"><label for="setting_a">CSS Minified</label></th>
                <td><input type="checkbox" name="vf_settings[cssmin]" value="1" <?php echo checked('1', $options['cssmin']); ?> /></td>
            </tr>
        </table>

        <?php @submit_button(); ?>
    </form>
</div>