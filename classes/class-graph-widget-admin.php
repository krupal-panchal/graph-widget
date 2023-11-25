<?php
/**
 * A class that handles the Admin UI of Graph Widget.
 *
 * @author Krupal Panchal
 */

class Graph_Widget_Admin {

	/**
	 * Class constructor.
	 */
	public function __construct() {

		/**
		 * Actions
		 */
		add_action( 'wp_dashboard_setup', [ $this, 'add_widget_in_dashboard' ] );
		add_action( 'admin_enqueue_scripts', [ $this, 'admin_enqueue_scripts' ] );
	}

	/**
	 * Method to add widget in dashboard.
	 *
	 * @return void
	 */
	public function add_widget_in_dashboard() : void {

		wp_add_dashboard_widget(
			'graph_widget',
			'Graph Widget',
			[ $this, 'widget_elements' ]
		);
	}

	/**
	 * Method to add element in widget
	 *
	 * @return void
	 */
	public function widget_elements() : void {
		echo '<div id="gw_root"></div>';
	}

	/**
	 * Method to enqueue admin scripts and styles.
	 *
	 * @return void
	 */
	public function admin_enqueue_scripts() : void {

		wp_enqueue_style(
			'gw-style',
			GRAPH_WIDGET_ROOT . 'build/index.css',
			[],
			GRAPH_WIDGET_VERSION,
			'all'
		);

		wp_enqueue_script(
			'gw-script',
			GRAPH_WIDGET_ROOT . 'build/index.js',
			array( 'wp-element' ),
			GRAPH_WIDGET_VERSION,
			true
		);
	}
}
