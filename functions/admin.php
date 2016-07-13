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
 * add_submenu_page( string $parent_slug, string $page_title, string $menu_title, string $capability, string $menu_slug, callable $function = '' )
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
    //add_menu_page('Blackbird Custom Plugin Page', 'Blackbird Custom Plugin Settings', 'administrator', 'bb-essayhell-plugin', 'bb_essayhell_plugin_settings_page','dash-icons-generic');
    add_submenu_page('options-general.php','Blackbird Custom Plugin Page', 'Blackbird Custom Plugin Settings', 'administrator', 'bb-essayhell-plugin', 'bb_essayhell_plugin_settings_page','dash-icons-generic');
}

/*
 * Register settings
 * 
 * register_setting( $option_group, $option_name, $sanitize_callback
 * 
 */
add_action( 'admin_init', 'bb_essayhell_plugin_settings' );

function bb_essayhell_plugin_settings() {
	register_setting( 'bb-essayhell-plugin-settings-group', 'item_one' );
	register_setting( 'bb-essayhell-plugin-settings-group', 'item_two' );
	register_setting( 'bb-essayhell-plugin-settings-group', 'item_three' );register_setting( 'bb-essayhell-plugin-settings-group', 'item_four' );register_setting( 'bb-essayhell-plugin-settings-group', 'item_five' );register_setting( 'bb-essayhell-plugin-settings-group', 'item_six' );register_setting( 'bb-essayhell-plugin-settings-group', 'item_seven' );register_setting( 'bb-essayhell-plugin-settings-group', 'item_eight' );register_setting( 'bb-essayhell-plugin-settings-group', 'item_nine' );register_setting( 'bb-essayhell-plugin-settings-group', 'item_ten' );
        setting( 'bb-essayhell-plugin-settings-group', 'item_eleven' );
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
 * This Starter Page settings funciton
 * has the "good" form.
 */

function bb_essayhell_plugin_settings_page() {
    ?>
<div class="pagespeed-wrap">
     <a href="http://www.blackbirdconsult.com" target="blank"><img src="<?php echo plugins_url('blackbird-pagespeed-plugin/lib/images/blackbird-logo.png')?>"></a>
<h2>Starter Plugin Options</h2>
<p>These are "dummy" options that can be customized for your own purposes. See /functions/admin.php</p>
<form method="post" action="options.php">
    <?php settings_fields( 'bb-essayhell-plugin-settings-group' ); ?>
    <?php do_settings_sections( 'bb-essayhell-plugin-settings-group' ); ?>
    <table class="form-table">
        <tr valign="top">
        <th scope="row">Replace WordPress jQuery</th>
        <td><?php 
        // Get an array of options from the database.
$bb1_options = get_option( 'item_one' );
if (! isset($bb1_options))
    $bb1_options = 0;
        ?><input type="checkbox" name="item_one" value="1" <?php checked( $bb1_options, 1 ); ?>/></td>
        </tr>
         
         <tr valign="top">
        <th scope="row">Remove version query strings</th>
        <td><?php 
        // Get an array of options from the database.
$bb2_options = get_option( 'item_two' );
 
if (! isset($bb2_options))
    $bb2_options = 0;
        ?><input type="checkbox" name="item_two" value="1" <?php checked( $bb2_options, 1 ); ?>/></td>
        </tr>
         
        <tr valign="top">
        <th scope="row">Add 90x90 Image Size</th>
        <td><?php 
        // Get an array of options from the database.
$bb3_options = get_option( 'item_three' );

if (! isset($bb3_options))
    $bb3_options = 0;
        ?><input type="checkbox" name="item_three" value="1" <?php checked( $bb3_options, 1 ); ?>/></td>
        </tr>
        
        <tr valign="top">
        <th scope="row">Add 144 width Image Size</th>
        <td><?php 
        // Get an array of options from the database.
$bb4_options = get_option( 'item_four' );

if (! isset($bb4_options))
    $bb4_options = 0;
        ?><input type="checkbox" name="item_four" value="1" <?php checked( $bb4_options, 1 ); ?>/></td>
        </tr>
        
        <tr valign="top">
        <th scope="row">Add 150 width Image Size</th>
        <td><?php 
        // Get an array of options from the database.
$bb5_options = get_option( 'item_five' );

if (! isset($bb5_options))
    $bb5_options = 0;
        ?><input type="checkbox" name="item_five" value="1" <?php checked( $bb5_options, 1 ); ?>/></td>
        </tr>
              
        <tr valign="top">
        <th scope="row">Add 173 width Image Size</th>
        <td><?php 
        // Get an array of options from the database.
$bb6_options = get_option( 'item_six' );

if (! isset($bb6_options))
    $bb6_options = 0;
        ?><input type="checkbox" name="item_six" value="1" <?php checked( $bb6_options, 1 ); ?>/></td>
        </tr>
        
        <tr valign="top">
        <th scope="row">Add 180 width Image Size</th>
        <td><?php 
        // Get an array of options from the database.
$bb7_options = get_option( 'item_seven' );

if (! isset($bb7_options))
    $bb7_options = 0;
        ?><input type="checkbox" name="item_seven" value="1" <?php checked( $bb7_options, 1 ); ?>/></td>
        </tr>
        <tr valign="top">
        <th scope="row">Add 200 width Image Size</th>
        <td><?php 
        // Get an array of options from the database.
$bb8_options = get_option( 'item_eight' );

if (! isset($bb8_options))
    $bb8_options = 0;
        ?><input type="checkbox" name="item_eight" value="1" <?php checked( $bb8_options, 1 ); ?>/></td>
        </tr>
        
        <tr valign="top">
        <th scope="row">Add 538 width Image Size</th>
        <td><?php 
        // Get an array of options from the database.
$bb9_options = get_option( 'item_nine' );

if (! isset($bb9_options))
    $bb9_options = 0;
        ?><input type="checkbox" name="item_nine" value="1" <?php checked( $bb9_options, 1 ); ?>/></td>
        </tr>
        
        <tr valign="top">
        <th scope="row">Item Ten</th>
        <td><?php 
        // Get an array of options from the database.
$bb10_options = get_option( 'item_ten' );

if (! isset($bb10_options))
    $bb10_options = 0;
        ?><input type="checkbox" name="item_ten" value="1" <?php checked( $bb10_options, 1 ); ?>/></td>
        </tr>
        <tr valign="top">
        <th scope="row">Item Eleven</th>
        <td><?php 
        // Get an array of options from the database.
$bb11_options = get_option( 'item_eleven' );

if (! isset($bb11_options))
    $bb11_options = 0;
        ?><input type="checkbox" name="item_eleven" value="1" <?php checked( $bb11_options, 1 ); ?>/></td>
        </tr>
    </table>
    
    <?php submit_button(); ?>

</form>
</div><?php
    
}



