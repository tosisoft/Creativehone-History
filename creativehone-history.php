<?php
/**
 * Plugin Name: Creativehone History
 * Description: Creativehone History Widget for Elementor.
 * Plugin URI:  https://tosisoft.com/creativehone-history/
 * Version:     1.0.1
 * Requires at least: 5.2
 * Requires PHP:      7.2
 * Author:      Engr. Toseef
 * Author URI:  https://tosisoft.com/
 * Text Domain: creativehone-history
 *
 * License: GPLv2 or later
 * License URI: https://www.gnu.org/licenses/gpl-2.0.html
 * Requires Plugins: elementor
 * Elementor tested up to: 3.25.0
 * Elementor Pro tested up to: 3.25.0
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly.
}

/**
 * Register List Widget.
 *
 * Include widget file and register widget class.
 *
 * @since 1.0.0
 * @param \Elementor\Widgets_Manager $widgets_manager Elementor widgets manager.
 * @return void
 */
function creativehone_history_register_list_widget( $widgets_manager ) {

    require_once( __DIR__ . '/widgets/history-widget.php' ); // Add another widget file

    $widgets_manager->register( new \Creative_History_Widget() ); // Register second widget

}
add_action( 'elementor/widgets/register', 'creativehone_history_register_list_widget' );


function creative_history_enqueue_assets() {
    // Enqueue CSS
    wp_enqueue_style(
        'creative-history-style',
        plugins_url('css/style.css', __FILE__)
    );

    // Enqueue JavaScript
    wp_enqueue_script(
        'creative-history-script',
        plugins_url('js/script.js', __FILE__),
        array(),  // No dependencies (since it's vanilla JS)
        false,
        true  // Load in footer for better performance
    );
}
add_action('wp_enqueue_scripts', 'creative_history_enqueue_assets');


