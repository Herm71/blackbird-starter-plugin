<?php
/*
 * Blackbird Starter Plugin Settings Admin Area
 * 
 * Adds custom theme setting admin area
 * These Theme Settings were created with the help
 * of Otto's tutorial and many references to the WordPress Codex
 * http://ottopress.com/2009/wordpress-settings-api-tutorial/
 * 
 * Author: Blackbird Consulting
 * Author URI: http://www.blackbirdconsult.com
 * 
 */

/*
 * Add Settings Area
 * 
 * // add_options_page adds a sub-menu under the Settings Menu
 * 
 * add_options_page( $page_title, $menu_title, $capability, $menu_slug, $function);
 * 
 *  
 * $capability = 'manage_options'; allows admins only
 * $menu_slug = needs to be something only you will use
 * link to page will be /wp-admin/options-general.php?page=$menu_slug
 * $function = callback function name
 * 
 * 
 * // add_menu_page is similar to add_options page except
 * 
 * it adds a new top-level menu
 * add_menu_page( $page_title, $menu_title, $capability, $menu_slug, $function, $icon_url, $position );
 * 
 */

add_action('admin_menu', 'plugin_admin_add_page');

function plugin_admin_add_page() {
    add_options_page('Blackbird Custom Plugin Page', 'Blackbird Custom Plugin Menu', 'manage_options', 'bb-starter-plugin', 'bb_starter_plugin_options_page');
}

/*
 * 
 * Display Blackbird Plugin Settings Page
 * 
 * settings_fields($options_group);
 * 
 * do_settings_sections ($page);
 * 
 */

function bb_starter_plugin_options_page() {
    ?>
    <div>
        <h2>Blackbird Starter Plugin Options Page</h2>
        Options relating to the Custom Plugin.
        <form action="options.php" method="post">
    <?php settings_fields('bb_starter_plugin_options_group'); ?>
    <?php do_settings_sections('bb_starter_plugin_options_page'); ?>

            <input name="Submit" class="button-primary" type="submit" value="<?php esc_attr_e('Save Changes'); ?>" />
        </form></div>

    <?php
}

/*
 * Register and add the admin settings
 * 
 * register_setting( $option_group, $option_name, $sanitize_callback
 * 
 * add_settings_section( $id, $title, $callback, $page );
 * 
 * add_settings_field( $id, $title, $callback, $page, $section, $args );
 * 
 * Note the value for add_settings_section ($id) is 
 * what you put in add_settings_field($section);
 * you will enter $option_name below like this:
 * $options = get_option($option_name)
 * 
 */
add_action('admin_init', 'plugin_admin_init');

function plugin_admin_init() {
    register_setting('bb_starter_plugin_options_group', 'bb_starter_plugin_options', 'bb_starter_plugin_options_validate');
    add_settings_section('bb_starter_plugin_main', 'Main Settings', 'bb_starter_plugin_section_text', 'bb_starter_plugin_options_page');
    add_settings_field('bb_starter_plugin_text_string', 'Blackbird Plugin Text Input', 'bb_starter_plugin_setting_string', 'bb_starter_plugin_options_page', 'bb_starter_plugin_main', '');
}

/*
 * 
 * Settings Sections
 * 
 * Note: Call back function should be the value you added 
 * for add_settings_section($callback)
 * 
 */

function bb_starter_plugin_section_text() {
    echo '<p>Main description of this section here.</p>';
}

/*
 * Input Fields
 * 
 * Note: Call back function should be the value you added 
 * for add_settings_field($callback);
 * 
 * $options = get_option($option_name);
 * 
 * $option_name is the second argument in register_settings($option_name);
 * 
 * 
 */

function bb_starter_plugin_setting_string() {
    $options = get_option('bb_starter_plugin_options');
    print_r($options);
    //print_r($options['text_string']);
    echo "<input id='plugin_text_string' name='bb_starter_plugin_options[text_string]' size='40' type='text' value='{$options['text_string']}' />";
}

/*
 * Validate our Options
 * 
 * $options = get_option($option_name);
 * 
 * $option_name is the second argument in register_settings($option_name);
 */

function bb_starter_plugin_options_validate($input) {
    $options = get_option('bb_starter_plugin_options');
    $options['text_string'] = trim($input['text_string']);
    if (!preg_match('/^[a-z0-9]{32}$/i', $options['text_string'])) {
        $options['text_string'] = '';
    }
    return $options;
}
