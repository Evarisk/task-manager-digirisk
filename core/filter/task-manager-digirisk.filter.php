<?php
/**
 * Initialise les fichiers .config.json
 *
 * @package Evarisk\Plugin
 */

namespace task_manager_digirisk;

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}


class Task_Manager_Filter {

	public function __construct() {
		add_filter( 'task_manager_navigation_after', array( $this, 'callback_navigation_after' ) );
	}

	public function callback_navigation_after( $output ) {
		ob_start();
		require( PLUGIN_TASK_MANAGER_DIGIRISK_PATH . '/core/view/main.view.php' );
		$output = ob_get_clean();
		return $output;
	}
}

new Task_Manager_Filter();
