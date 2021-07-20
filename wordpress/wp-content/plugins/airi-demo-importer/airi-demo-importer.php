<?php

/**
 *
 * @link              https://athemes.com
 * @since             1.0.0
 * @package           Airi_Demo_Importer
 *
 * @wordpress-plugin
 * Plugin Name:       Airi Demo Importer
 * Description:       Demo content setup for the Airi theme
 * Version:           1.0.2
 * Author:            aThemes
 * Author URI:        https://athemes.com
 * License:           GPL-2.0+
 * License URI:       http://www.gnu.org/licenses/gpl-2.0.txt
 * Text Domain:       airi-demo-importer
 * Domain Path:       /languages
 */

// If this file is called directly, abort.
if ( ! defined( 'WPINC' ) ) {
	die;
}

//This plugin is only useful for the Airi Theme
$theme  = wp_get_theme();
$parent = wp_get_theme()->parent();
if ( ( $theme != 'Airi' ) && ( $parent != 'Airi' ) )
    return;

//Dir
define( 'ADI_DIR', trailingslashit( plugin_dir_path( __FILE__ ) ) );    
define( 'ADI_URI', trailingslashit( plugin_dir_url( __FILE__ ) ) );

/**
 * Set import files
 */
function airi_demo_importer_set_import_files() {

    $demos = array( 'agency', 'startup', 'business2', 'health', 'lawyer' );

    foreach ( $demos as $demo ) {

        $demo_sites[] = array(
            'import_file_name'                  => ucfirst( preg_replace('/[0-9]+/', '', $demo ) ),
            'local_import_file'                 => ADI_DIR . 'demo-content/airi-dc-' . $demo . '.xml',   
            'local_import_widget_file'          => ADI_DIR . 'demo-content/airi-w-' . $demo . '.wie',
            'local_import_customizer_file'      => ADI_DIR . 'demo-content/airi-c-' . $demo . '.dat',
            'import_preview_image_url'          => ADI_URI . 'demo-content/previews/' . $demo . '-hero-thumb.png', 
            'preview_url'                       => 'https://demo.athemes.com/airi-' . $demo,
        );
    }

    return $demo_sites;

}
add_filter( 'pt-ocdi/import_files', 'airi_demo_importer_set_import_files' );

/**
 * Define actions that happen after import
 */
function airi_demo_importer_set_after_import_mods() {

	//Assign the menu
    $main_menu = get_term_by( 'name', 'Menu', 'nav_menu' );
    set_theme_mod( 'nav_menu_locations', array(
            'primary' => $main_menu->term_id,
        )
    );

    //Asign the static front page and the blog page
    $front_page = get_page_by_title( 'Home' );
    $blog_page  = get_page_by_title( 'Blog' );

    update_option( 'show_on_front', 'page' );
    update_option( 'page_on_front', $front_page -> ID );
    update_option( 'page_for_posts', $blog_page -> ID );

    //Assign the Front Page template
    update_post_meta( $front_page -> ID, '_wp_page_template', 'page-templates/template_page-builder.php' );

}
add_action( 'pt-ocdi/after_import', 'airi_demo_importer_set_after_import_mods' );

/**
* Remove branding
*/
add_filter( 'pt-ocdi/disable_pt_branding', '__return_true' );