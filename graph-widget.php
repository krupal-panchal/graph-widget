<?php
/**
 * Plugin Name:       Graph Widget
 * Description:       A Plugin that add graph widget in admin dashboard.
 * Requires at least: 6.0
 * Requires PHP:      8.0
 * Version:           1.0.0
 * Author:            Krupal Panchal
 * License:           GPL-2.0-or-later
 * License URI:       https://www.gnu.org/licenses/gpl-2.0.html
 * Text Domain:       graph-widget
 */

define( 'GRAPH_WIDGET_ROOT', plugin_dir_url( __FILE__ ) );
define( 'GRAPH_WIDGET_VERSION', '1.0.0' );

require_once 'classes/class-graph-widget-admin.php';
require_once 'classes/class-graph-data-api.php';

// Create an instances.
new Graph_Widget_Admin();
new Graph_Data_API();
