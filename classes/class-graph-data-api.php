<?php
/**
 * A class that handles the Graph Data API.
 *
 * @author Krupal Panchal
 */

class Graph_Data_API {

	/**
	 * @var array Graph data that we need for widget.
	 */
	public const GRAPH_DATA = [
		'7d'  => [
			['Month' => 'Jan', 'Expense' => '1100'],
			['Month' => 'Feb', 'Expense' => '2500'],
			['Month' => 'Mar', 'Expense' => '2100'],
			['Month' => 'Apr', 'Expense' => '1200'],
			['Month' => 'May', 'Expense' => '3000'],
		],
		'15d' => [
			['Month' => 'Jan', 'Expense' => '2500'],
			['Month' => 'Feb', 'Expense' => '1900'],
			['Month' => 'Mar', 'Expense' => '2200'],
			['Month' => 'Apr', 'Expense' => '1500'],
			['Month' => 'May', 'Expense' => '3000'],
		],
		'1m'  => [
			['Month' => 'Jan', 'Expense' => '4500'],
			['Month' => 'Feb', 'Expense' => '2500'],
			['Month' => 'Mar', 'Expense' => '2000'],
			['Month' => 'Apr', 'Expense' => '1800'],
			['Month' => 'May', 'Expense' => '2500'],
		],
	];

	/**
	 * Class constructor.
	 */
	public function __construct() {

		/**
		 * Actions
		 */
		add_action( 'rest_api_init', [ $this, 'register_options_route' ] );

		/*
		 * If you want to update the GRAPH_DATA value. Just uncheck the below hook and refresh in admin.
		 * It will update the value in option.
		 *
		 * FOR NOW THIS KEPT AS COMMENTED, BECAUSE THE VALUE DOES NOT NEED TO UPDATE EVERYTIME ADMIN INITIALIZE.
		 */
		// add_action( 'admin_init', [ $this, 'add_graph_data_option_value' ] );
	}

	/**
	 * Method to register options route.
	 *
	 * @return void
	 */
	public function register_options_route() : void {

		register_rest_route(
			'/get',
			'options',
			[
				'methods'  => 'GET',
				'callback' => [ $this, 'get_options_value' ],
			]
		);
	}

	/**
	 * Method to get options value.
	 *
	 * @param WP_REST_Request $data
	 *
	 * @return mixed
	 */
	public function get_options_value( WP_REST_Request $data ) : mixed {

		$option_value = '';
		$params       = $data->get_params();

		if ( ! empty( $params['name'] ) ) {
			$option_value = get_option( $params['name'] );
		}

		if ( ! empty( $params['key'] ) ) {
			$option_value = $option_value[ $params['key'] ];
		}

		return rest_ensure_response( $option_value );
	}

	/**
	 * Method to add graph data in options.
	 *
	 * @return void
	 */
	public function add_graph_data_option_value() {

		// Add or update the value in option.
		update_option(
			'graph_data',
			static::GRAPH_DATA
		);
	}

}
