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
 * Version:           0.1.0
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