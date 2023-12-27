<?php
/**
 * A class that handles the Admin UI of Graph Widget.
 *
 * @author Krupal Panchal
 */
class Graph_Widget_Admin {

	/**
	 * @var string Permission option.
	 */
	public const PERMISSION = 'manage_options';

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

		// Only show widget to Admins.
		if ( current_user_can( static::PERMISSION ) ) {

			wp_add_dashboard_widget(
				'graph_widget',
				__( 'Graph Widget', 'graph-widget' ),
				[ $this, 'widget_elements' ]
			);

		}
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
	 * @param string $hook_suffix The current admin page.
	 *
	 * @return void
	 */
	public function admin_enqueue_scripts( string $hook_suffix ) : void {

		// Enqueue style and script only on dashboard.
		if ( 'index.php' === $hook_suffix ) {
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
				[ 'wp-api-fetch', 'wp-element', 'wp-components', 'wp-i18n' ],
				GRAPH_WIDGET_VERSION,
				true
			);
		}
	}
}
