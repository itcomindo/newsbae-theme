<?php
/**
 * Plugin Name:   	  Yano Customizer Framework
 * Description:   	  Yano is a tool for WordPress Theme Developer to develop theme using WordPress Customizer API while writing clean and minimal code.
 * Author:        	  Mafel John Cahucom
 * Author URI:    	  https://www.facebook.com/mafeljohn.cahucom
 * Version:       	  1.0.0
 * Text Domain:   	  yano-customizer-framework
 * Requires WP:   	  4.9
 * GitHub Plugin URI: https://mafelcahucom.github.io/yano-customizer-framework/
 * License: GPLv2 or later
 */

// Exist direct access.
defined( 'ABSPATH' ) || exit;


// Check if autload exists.
if ( file_exists( dirname( __FILE__ ) . '/vendor/autoload.php' ) ) {
	require_once dirname( __FILE__ ) . '/vendor/autoload.php';
}


// Get The Current Location In URL.
if ( ! function_exists( 'yano_resource_url' ) ) {
    function yano_resource_url() {
        // get the theme_folder
        $theme_dir = explode( "/", get_template_directory_uri() );
        $theme_folder = $theme_dir[ count( $theme_dir ) - 1 ];

        // get the current file location folder starting from theme_folder
        $current_location_dir = explode( "\\", __DIR__ );
        $theme_folder_index = array_search( $theme_folder, $current_location_dir );
        $current_location_path = implode( "/", array_slice( $current_location_dir, $theme_folder_index + 1 ) );
        $yano_location_url = get_template_directory_uri() . "/" . $current_location_path . "/"; 
        return $yano_location_url;
    }   
}

// Autoload Dependencies.
use Core\Yano_Config;

// Instantiating Yano_Config Class.
$CONFIG = new Yano_Config;

// Adding all third party libraries.
$CONFIG->register_enqueue();

// Requiring Global Helper.
require dirname( __FILE__ ) . '/lib/Yano_Helper.php';

// Requiring Global Utilities.
require dirname( __FILE__ ) . '/lib/Yano_Util.php';

// Requiring main core Yano class.
require dirname( __FILE__ ) . '/core/Yano.php';