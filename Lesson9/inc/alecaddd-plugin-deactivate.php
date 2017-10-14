<?php
/**
 * @package  AlecadddPlugin
 */

class AlecadddPluginDeactivate
{
	public static function deactivate() {
		flush_rewrite_rules();
	}
}