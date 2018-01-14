<?php
/**
 * @package  AlecadddPlugin
 */
namespace Inc\Base;

class Activate
{
	public static function activate() {
		flush_rewrite_rules();

		if ( get_option( 'alecaddd_plugin' ) ) {
			return;
		}

		$default = array();

		update_option( 'alecaddd_plugin', $default );
	}
}