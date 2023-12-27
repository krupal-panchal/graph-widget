<?php
/**
 * A class that handles the Graph Data API.
 *
 * @author Krupal Panchal
 */
class Graph_Data_API {

	/**
	 * Class constructor.
	 */
	public function __construct() {

		/**
		 * Actions
		 */
		add_action( 'rest_api_init', [ $this, 'register_options_route' ] );
	}

	/**
	 * Method to register options route.
	 *
	 * @return void
	 */
	public function register_options_route() : void {

		register_rest_route(
			'get',
			'options',
			[
				'methods'             => 'GET',
				'callback'            => [ $this, 'get_options_value' ],
				'permission_callback' => [ $this, 'get_permission_callback' ],
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
	 * Method to get permission for REST Route.
	 *
	 * @return bool
	 */
	public function get_permission_callback() : bool {

		// Returns true if the Admin user.
		return current_user_can( Graph_Widget_Admin::PERMISSION );
	}
}
