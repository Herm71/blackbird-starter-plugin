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
    // Change the names of these options to reflect the actual name
    // see:
    add_menu_page('Blackbird Custom Plugin Page', 'Blackbird Custom Plugin Settings', 'administrator', 'bb-starter-plugin', 'bb_starter_plugin_settings_page','dash-icons-generic');
}

/*
 * Register settings
 * 
 * register_setting( $option_group, $option_name, $sanitize_callback
 * 
 */
add_action( 'admin_init', 'bb_starter_plugin_settings' );

function bb_starter_plugin_settings() {
	register_setting( 'bb-starter-plugin-settings-group', 'item_one' );
	register_setting( 'bb-starter-plugin-settings-group', 'item_two' );
	register_setting( 'bb-starter-plugin-settings-group', 'item_three' );
}

/*
 * 
 * Settings Sections
 * 
 * Note: Call back function should be the value you added 
 * for add_settings_section($callback)
 * 
 */

/*
 * This function is a sample of a "Bad" form. 
 * It is included for educational purposes only
 */

function bb_starter_plugin_settings_page1() {
    ?>
<div class="starter-wrap">
     <a href="http://www.blackbirdconsult.com" target="blank"><img src="<?php echo plugins_url('blackbird-pagespeed-plugin/lib/images/blackbird-logo.png')?>"></a>
<h2>Starter Plugin Options</h2>


<form method="post" action="options.php">
    <?php settings_fields( 'bb-starter-plugin-settings-group' ); ?>
    <?php do_settings_sections( 'bb-starter-plugin-settings-group' ); ?>
    <table class="form-table">
        <tr valign="top">
        <th scope="row">Item One</th>
        <td><input type="checkbox" name="item_one" value="" /></td>
        </tr>
         
        <tr valign="top">
        <th scope="row">Item Two</th>
        <td><input type="checkbox" name="item_two" value="" /></td>
        </tr>
        
        <tr valign="top">
        <th scope="row">Item Three</th>
        <td><input type="checkbox" name="item_three" value="" /></td>
        </tr>
    </table>
    
    <?php submit_button(); ?>

</form>
</div><?php
    
}
/*
 * This Starter Page settings funciton
 * has the "good" form.
 */

function bb_starter_plugin_settings_page() {
    ?>
<div class="pagespeed-wrap">
     <a href="http://www.blackbirdconsult.com" target="blank"><img src="<?php echo plugins_url('blackbird-pagespeed-plugin/lib/images/blackbird-logo.png')?>"></a>
<h2>Starter Plugin Options</h2>
<p>These are "dummy" options that can be customized for your own purposes. See /functions/admin.php</p>
<form method="post" action="options.php">
    <?php settings_fields( 'bb-starter-plugin-settings-group' ); ?>
    <?php do_settings_sections( 'bb-starter-plugin-settings-group' ); ?>
    <table class="form-table">
        <tr valign="top">
        <th scope="row">Item One</th>
        <td><?php 
        // Get an array of options from the database.
$bb1_options = get_option( 'item_one' );
 
// Get the value of this option.
$bb1_checked = $bb1_options;
 
// The value to compare with (the value of the checkbox below).
$bb1_current = 1; 
 
// True by default, just here to make things clear.
$bb1_echo = true;
        ?><input type="checkbox" name="item_one" value="1" <?php checked( $bb1_checked, $bb1_current, $bb1_echo ); ?>/></td>
        </tr>
         
         <tr valign="top">
        <th scope="row">Item Two</th>
        <td><?php 
        // Get an array of options from the database.
$bb2_options = get_option( 'item_two' );
 
// Get the value of this option.
$bb2_checked = $bb2_options;
 
// The value to compare with (the value of the checkbox below).
$bb2_current = 1; 
 
// True by default, just here to make things clear.
$bb2_echo = true;
        ?><input type="checkbox" name="item_two" value="1" <?php checked( $bb2_checked, $bb2_current, $bb2_echo ); ?>/></td>
        </tr>
         
        <tr valign="top">
        <th scope="row">Item Three</th>
        <td><?php 
        // Get an array of options from the database.
$bb3_options = get_option( 'item_three' );
 
// Get the value of this option.
$bb3_checked = $bb3_options;
 
// The value to compare with (the value of the checkbox below).
$bb3_current = 1; 
 
// True by default, just here to make things clear.
$bb3_echo = true;
        ?><input type="checkbox" name="item_three" value="1" <?php checked( $bb3_checked, $bb3_current, $bb3_echo ); ?>/></td>
        </tr>
    </table>
    
    <?php submit_button(); ?>

</form>
</div><?php
    
}



