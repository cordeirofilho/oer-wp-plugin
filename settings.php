<?php
function oer_page_admin() {
    $config = get_option('oer_config');

?>
    <div class="wrap">
            <div id="icon-options-general" class="icon32"></div>
            <h2><?php _e('Open Educational Resources Settings', 'oer'); ?></h2>

            <form method="post" action="options.php">

                <?php settings_fields('oer-settings-group'); ?>

                <table class="form-table">
                    <tbody>
                        <tr valign="top">
                            <th scope="row"><?php _e('Plugin page', 'oer'); ?>:</th>
                            <td><input type="text" name="oer_config[plugin_slug]" value="<?php echo ($config['plugin_slug'] != '' ? $config['plugin_slug'] : 'oer'); ?>" class="regular-text code"></td>
                        </tr>
                        <tr valign="top">
                            <th scope="row"><?php _e('Filter query', 'oer'); ?>:</th>
                            <td><input type="text" name="oer_config[initial_filter]" value='<?php echo $config['initial_filter'] ?>' class="regular-text code"></td>
                        </tr>
                        <tr valign="top">
                            <th scope="row"><?php _e('AddThis profile ID', 'oer'); ?>:</th>
                            <td><input type="text" name="oer_config[addthis_profile_id]" value="<?php echo $config['addthis_profile_id'] ?>" class="regular-text code"></td>
                        </tr>
                        <tr valign="top">
                            <th scope="row"><?php _e('Google Analytics code', 'oer'); ?>:</th>
                            <td><input type="text" name="oer_config[google_analytics_code]" value="<?php echo $config['google_analytics_code'] ?>" class="regular-text code"></td>
                        </tr>

                        <?php
                        if ( function_exists( 'pll_the_languages' ) ) {
                            $available_languages = pll_languages_list();
                            $available_languages_name = pll_languages_list(array('fields' => 'name'));
                            $count = 0;
                            foreach ($available_languages as $lang) {
                                $key_name = 'plugin_title_' . $lang;
                                $home_url = 'home_url_' . $lang;

                                echo '<tr valign="top">';
                                echo '    <th scope="row"> ' . __("Home URL", "oer") . ' (' . $available_languages_name[$count] . '):</th>';
                                echo '    <td><input type="text" name="oer_config[' . $home_url . ']" value="' . $config[$home_url] . '" class="regular-text code"></td>';
                                echo '</tr>';

                                echo '<tr valign="top">';
                                echo '    <th scope="row"> ' . __("Page title", "oer") . ' (' . $available_languages_name[$count] . '):</th>';
                                echo '    <td><input type="text" name="oer_config[' . $key_name . ']" value="' . $config[$key_name] . '" class="regular-text code"></td>';
                                echo '</tr>';
                                $count++;
                            }
                        }else{
                            echo '<tr valign="top">';
                            echo '   <th scope="row">' . __("Page title", "oer") . ':</th>';
                            echo '   <td><input type="text" name="oer_config[plugin_title]" value="' . $config["plugin_title"] . '" class="regular-text code"></td>';
                            echo '</tr>';
                        }

                        ?>

                        <tr valign="top">
                            <th scope="row">
                                <?php _e('Display filters', 'oer'); ?>:
                            </th>
                            <td>
                                <fieldset>
                                    <label for="available_filter_descriptor">
                                        <input type="checkbox" name="oer_config[available_filter][]" value="descriptor" id="available_filter_descriptor" <?php echo (!isset($config['available_filter']) || in_array('descriptor', $config['available_filter']) ?  " checked='true'" : '') ;?> ></input>
                                        <?php _e('Subject', 'oer'); ?>
                                    </label>
                                    <br/>
                                    <label for="available_filter_type">
                                        <input type="checkbox" name="oer_config[available_filter][]" value="type" id="available_filter_type" <?php echo (!isset($config['available_filter']) ||  in_array('type', $config['available_filter']) ?  " checked='true'" : '') ;?> ></input>
                                        <?php _e('Type', 'oer'); ?>
                                    </label>
                                    <br/>
                                    <label for="available_filter_language">
                                        <input type="checkbox" name="oer_config[available_filter][]" value="language" id="available_filter_language" <?php echo (!isset($config['available_filter']) ||  in_array('language', $config['available_filter']) ?  " checked='true'" : '') ;?> ></input>
                                        <?php _e('Language', 'oer'); ?>
                                    </label>
                                </fieldset>
                            </td>
                        </tr>

                    </tbody>
                </table>
                <p class="submit">
                    <input type="submit" class="button-primary" value="<?php _e('Save changes') ?>" />
                </p>
            </form>
        </div>
<?php
}
?>
