<?php
/**
 * La vue principale de la page "wpeomtm-dashboard"
 *
 * @author Jimmy Latour <jimmy.eoxia@gmail.com>
 * @since 1.0.0.0
 * @version 1.3.6.0
 * @copyright 2015-2017 Eoxia
 * @package core
 * @subpackage view
 */

namespace task_manager_digirisk;

if ( ! defined( 'ABSPATH' ) ) { exit; } ?>

<li class="action-attribute" data-action="load_corrective_task" data-nonce="<?php echo esc_attr( wp_create_nonce( 'load_corrective_task' ) ); ?>">Tâches corrective</li>
