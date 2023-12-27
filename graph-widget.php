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

/**
 * Store the data in options when plugin activated.
 */
register_activation_hook(
	__FILE__,
	function() {
		update_option(
			'graph_data',
			[
				[
					'Date'    => '2023-12-27',
					'Expense' => '1100',
				],
				[
					'Date'    => '2023-12-26',
					'Expense' => '1200',
				],
				[
					'Date'    => '2023-12-25',
					'Expense' => '1800',
				],
				[
					'Date'    => '2023-12-24',
					'Expense' => '1400',
				],
				[
					'Date'    => '2023-12-23',
					'Expense' => '1200',
				],
				[
					'Date'    => '2023-12-22',
					'Expense' => '2300',
				],
				[
					'Date'    => '2023-12-21',
					'Expense' => '1500',
				],
				[
					'Date'    => '2023-12-20',
					'Expense' => '2000',
				],
				[
					'Date'    => '2023-12-19',
					'Expense' => '1800',
				],
				[
					'Date'    => '2023-12-18',
					'Expense' => '2100',
				],
				[
					'Date'    => '2023-12-17',
					'Expense' => '2500',
				],
				[
					'Date'    => '2023-12-16',
					'Expense' => '1900',
				],
				[
					'Date'    => '2023-12-15',
					'Expense' => '1000',
				],
				[
					'Date'    => '2023-12-14',
					'Expense' => '1200',
				],
				[
					'Date'    => '2023-12-13',
					'Expense' => '1400',
				],
				[
					'Date'    => '2023-12-12',
					'Expense' => '1600',
				],
				[
					'Date'    => '2023-12-11',
					'Expense' => '1100',
				],
				[
					'Date'    => '2023-12-10',
					'Expense' => '1900',
				],
				[
					'Date'    => '2023-12-09',
					'Expense' => '1400',
				],
				[
					'Date'    => '2023-12-08',
					'Expense' => '2300',
				],
				[
					'Date'    => '2023-12-07',
					'Expense' => '1300',
				],
				[
					'Date'    => '2023-12-06',
					'Expense' => '1900',
				],
				[
					'Date'    => '2023-12-05',
					'Expense' => '2000',
				],
				[
					'Date'    => '2023-12-04',
					'Expense' => '2100',
				],
				[
					'Date'    => '2023-12-03',
					'Expense' => '2800',
				],
				[
					'Date'    => '2023-12-02',
					'Expense' => '2600',
				],
				[
					'Date'    => '2023-12-01',
					'Expense' => '3000',
				],
			]
		);

	}
);

require_once 'classes/class-graph-widget-admin.php';
require_once 'classes/class-graph-data-api.php';

// Create an instances.
new Graph_Widget_Admin();
new Graph_Data_API();
