<?php 
/**
 * @package  AlecadddPlugin
 */
namespace Inc\Pages;

use \Inc\Base\BaseController;
use \Inc\Api\SettingsApi;

/**
* 
*/
class Admin extends BaseController
{
	public $settings;

	public $pages = array();

	public function __construct()
	{
		$this->settings = new SettingsApi();

		$this->pages = array(
			array(
				'page_title' => 'Alecaddd Plugin', 
				'menu_title' => 'Alecaddd', 
				'capability' => 'manage_options', 
				'menu_slug' => 'alecaddd_plugin', 
				'callback' => function() { echo '<h1>Alecaddd Plugin</h1>'; }, 
				'icon_url' => 'dashicons-store', 
				'position' => 110
			)
		);
	}

	public function register() 
	{
		$this->settings->addPages( $this->pages )->register();
	}
}