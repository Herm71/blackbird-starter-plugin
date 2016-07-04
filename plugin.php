<?php
/**
 * Plugin Name: Blackbird Starter Plugin
 * Plugin URI: https://github.com/Herm71/blackbird-starter-plugin
 * Description: Starter Plugin for development purposes. Theme independent.
 * Version: 0.0.1
 * Author: Blackbird Consulting
 * Author URI: http://www.blackbirdconsult.com/
 * License: GPL2
 * Text Domain: blackbird-starter
 * GitHub Plugin URI: https://github.com/Herm71/blackbird-starter-plugin
 * GitHub Branch: master
 * 
 * 
 * 
 * This program is free software; you can redistribute it and/or modify it under the terms of the GNU 
 * General Public License version 2, as published by the Free Software Foundation.  You may NOT assume 
 * that you can use any other version of the GPL.
 *
 * This program is distributed in the hope that it will be useful, but WITHOUT ANY WARRANTY; without 
 * even the implied warranty of MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.
 *
 */

// Plugin Directory 
define( 'BB_STARTER_DIR', dirname( __FILE__ ) );

// Plugin Settings
include_once( BB_STARTER_DIR . '/lib/functions/bb_admin.php' );



//Add link to Plugin Settings Page
function bbstarter_plugin_add_settings_link( $links ) {
    $settings_link = '<a href="options-general.php?page=bb-starter-plugin">' . __( 'Settings' ) . '</a>';
    array_push( $links, $settings_link );
  	return $links;
}
$plugin = plugin_basename( __FILE__ );
add_filter( "plugin_action_links_$plugin", 'bbstarter_plugin_add_settings_link' );
