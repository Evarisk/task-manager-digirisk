<?php
/**
 * Le singleton
 *
 * @package Evarisk\Plugin
 */

namespace task_manager_digirisk;

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

/**
 * Le singleton
 *
 * @author Jimmy Latour <jimmy.eoxia@gmail.com>
 * @version 1.1.0.0
 */
abstract class Singleton_util {
	/**
	 * L'instance courant du singleton
	 *
	 * @var Singleton_util
	 */
	protected static $instance;

	/**
	 * Appelle le constructeur parent
	 */
	protected final function __construct() {
		$this->construct();
	}

	/**
	 * Le constructeur pour les enfants
	 *
	 * @return void nothing
	 */
	abstract protected function construct();

	/**
	 * Récupères l'instance courante
	 *
	 * @return Singleton_util L'instance courante
	 */
	final public static function g() {
		if ( ! isset( self::$instance ) || get_called_class() !== get_class( self::$instance ) ) {
			$class_name = get_called_class();
			$new_instance = new $class_name();
			// extending classes can set $instance to any value, so check to make sure it's still unset before giving it the default value.
			if ( ! isset( self::$instance ) || get_called_class() !== get_class( self::$instance ) ) {
				self::$instance = $new_instance;
			}
		}
		return self::$instance;
	}
}
