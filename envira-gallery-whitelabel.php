<?php
/**
 * Envira Gallery Whitelabel
 *
 * Based on code from the Envira Gallery Docs section
 *
 * @package           Envira_Gallery_Whitelabel
 * @author            Jared Williams
 * @license           GPL-2.0+
 * @link              http://www.mediacrazed.com
 * @copyright         2016 MediaCrazed
 *
 * Plugin Name:       Envira Gallery Whitelabel
 * Plugin URI:        https://github.com/Jared-Williams/envira-gallery-whitelabel
 * Description:       Basically just white labels the plugin to a general Gallery.
 * Version:           0.1.2
 * Author:            Jared Williams
 * Author URI:        http://www.mediacrazed.com
 * Text Domain:       envira-gallery-whitelabel
 * License:           GPL-2.0+
 * License URI:       http://www.gnu.org/licenses/gpl-2.0.txt
 * Domain Path:       /languages
 * GitHub Plugin URI: https://github.com/Jared-Williams/envira-gallery-whitelabel
 * GitHub Branch:     master
 */

// If this file is called directly, abort.
if ( ! defined( 'ABSPATH' ) ) {
    die;
}

add_filter( 'gettext', 'tgm_envira_whitelabel', 10, 3 );
function tgm_envira_whitelabel( $translated_text, $source_text, $domain ) {
    
    // If not in the admin, return the default string.
    if ( ! is_admin() ) {
        return $translated_text;
    }

    if ( strpos( $source_text, 'an Envira' ) !== false ) {
        return str_replace( 'an Envira', '', $translated_text );
    }
    
    if ( strpos( $source_text, 'Envira' ) !== false ) {
        return str_replace( 'Envira', '', $translated_text );
    }
    
    return $translated_text;
    
}

/**
 * Adds the necessary CSS to the admin head to replace the Envira Gallery menu icon with a dashicon.
 */
function envira_gallery_whitelabel_css() {
  ?>

  <style>
    .menu-top.menu-icon-envira img { display: none; }
    .menu-top.menu-icon-envira > .dashicons-before:before { content: "\f161"; }
  </style>

  <?php
}
add_action( 'admin_head', 'envira_gallery_whitelabel_css' );

// Enable menu ordering
add_filter( 'custom_menu_order', '__return_true' );
/**
 * Change the menu order, the JetPack way.
 *
 * @since 1.0.0
 * @param array $menu_order
 * @return array
 */
function ja_menu_order( $menu_order ) {
	$new_menu_order = array();
	foreach ( $menu_order as $index => $item ) {
		if ( $item != 'edit.php?post_type=envira' )
			$new_menu_order[] = $item;
		if ( $index == 21 )
			$new_menu_order[] = 'edit.php?post_type=envira';
	}
	return $new_menu_order;
}
add_filter( 'menu_order', 'ja_menu_order' );
