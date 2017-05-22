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

/**
 * Initialise les scripts JS et CSS du Plugin
 * Ainsi que le fichier MO
 */
class Task_Manager_Digirisk_Action {

	/**
	 * Le constructeur ajoutes les actions WordPress suivantes:
	 * admin_enqueue_scripts (Pour appeller les scripts JS et CSS dans l'admin)
	 * admin_print_scripts (Pour appeler les scripts JS en bas du footer)
	 * plugins_loaded (Pour appeler le domaine de traduction)
	 */
	public function __construct() {
		add_action( 'wp_ajax_load_corrective_task', array( $this, 'callback_load_corrective_task' ) );
	}

	public function callback_load_corrective_task() {
		check_ajax_referer( 'load_corrective_task' );

		$risks_id = get_posts( array(
			'fields' => 'ids',
			'post_type' => 'digi-risk',
			'posts_per_page' => -1,
		) );

		$query = '';

		ob_start();
		echo do_shortcode( '[task post_parent="' . implode( $risks_id, ',' ) . '" with_wrapper="0"]' );
		wp_send_json_success( array(
			'namespace' => 'taskManager',
			'module' => 'task',
			'callback_success' => 'loadedCorretiveTaskSuccess',
			'view' => ob_get_clean(),
		) );
	}
}

new Task_Manager_Digirisk_Action();
