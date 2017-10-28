<?php 
/**
 * @package  AlecadddPlugin
 */
namespace Inc\Api;

class SettingsApi
{
	public $admin_pages = array();

	public function register()
	{
		if ( ! empty($this->admin_pages) ) {
			add_action( 'admin_menu', array( $this, 'addAdminMenu' ) );
		}
	}

	public function addPages( array $pages )
	{
		$this->admin_pages = $pages;

		return $this;
	}

	public function addAdminMenu()
	{
		foreach ( $this->admin_pages as $page ) {
			add_menu_page( $page['page_title'], $page['menu_title'], $page['capability'], $page['menu_slug'], $page['callback'], $page['icon_url'], $page['position'] );
		}
	}
}