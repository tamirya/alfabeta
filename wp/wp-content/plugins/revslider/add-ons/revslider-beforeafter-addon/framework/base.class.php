<?php
/* 
 * @author    ThemePunch <info@themepunch.com>
 * @link      https://www.themepunch.com/
 * @copyright 2017 ThemePunch
*/

if(!defined('ABSPATH')) exit();

class RsAddOnBeforeAfterBase {
	
	const MINIMUM_VERSION = '5.4.3.2';
	
	protected function systemsCheck() {
		
		if(!class_exists('RevSliderFront')) {
		
			return 'add_notice_plugin';
		
		}
		else if(!version_compare(RevSliderGlobals::SLIDER_REVISION, RsAddOnBeforeAfterBase::MINIMUM_VERSION, '>=')) {
		
			return 'add_notice_version';
		
		}
		else if(get_option('revslider-valid', 'false') == 'false') {
		
			 return 'add_notice_activation';
		
		}
		
		return false;
		
	}
	
	protected function loadClasses() {
		
		$isAdmin = is_admin();
		
		if($isAdmin) {
			
			//handle update process, this uses the typical ThemePunch server process
			require_once(static::$_PluginPath . 'admin/includes/update.class.php');
			$update_admin = new RevAddOnBeforeAfterUpdate(static::$_Version);

			add_filter('pre_set_site_transient_update_plugins', array($update_admin, 'set_update_transient'));
			add_filter('plugins_api', array($update_admin, 'set_updates_api_results'), 10, 3);
			
			// Add-Ons page
			add_filter('rev_addon_dash_slideouts', array($this, 'addons_page_content'));
			
			// admin CSS/JS
			add_action('admin_enqueue_scripts', array($this, 'enqueue_admin_scripts'));
			
			require_once(static::$_PluginPath . 'admin/includes/slider.class.php');
			require_once(static::$_PluginPath . 'admin/includes/slide.settings.class.php');
			require_once(static::$_PluginPath . 'admin/includes/slide.layers.class.php');
			
			// admin init
			new RsBeforeAfterSliderAdmin(static::$_PluginTitle, static::$_Version);
			new RsBeforeAfterSlideSettingsAdmin(static::$_PluginTitle, static::$_PluginPath);
			new RsBeforeAfterSlideLayersAdmin(static::$_PluginTitle, static::$_PluginPath);
			
		}
		
		/* 
		frontend scripts always enqueued for admin previews
		*/
		require_once(static::$_PluginPath . 'public/includes/slider.class.php');
		require_once(static::$_PluginPath . 'public/includes/slide.class.php');
		
		new RsBeforeAfterSliderFront(static::$_Version, static::$_PluginUrl, static::$_PluginTitle, $isAdmin);
		new RsBeforeAfterSlideFront(static::$_PluginTitle);
		
	}
	
	/**
	 * Load the textdomain
	 **/
	protected function _loadPluginTextDomain(){
		
		load_plugin_textdomain('rs_' . static::$_PluginTitle, false, static::$_PluginPath . 'languages/');
		
	}
	
	// AddOn's page slideout panel
	public function addons_page_content() {
		
		include_once(static::$_PluginPath . 'admin/views/admin-display.php');
		
	}
	
	// load admin scripts
	public function enqueue_admin_scripts($hook) {
		
		if($hook === 'toplevel_page_revslider' || $hook === 'slider-revolution_page_rev_addon') {
			
			if(!isset($_GET['page'])) return;
			
			$page = $_GET['page'];
			if($page !== 'revslider' && $page !== 'rev_addon') return;
			
			$_handle = 'rs-' . static::$_PluginTitle . '-admin';
			$_base   = static::$_PluginUrl . 'admin/assets/';
			
			switch($page) {
				
				case 'revslider':
				
					if(isset($_GET['view']) && $_GET['view'] === 'slide' && isset($_GET['id']) && strpos($_GET['id'], 'static') === false) {
						
						wp_enqueue_style($_handle, $_base . 'css/' . static::$_PluginTitle . '-slide-admin.css', array(), static::$_Version);
						wp_enqueue_script($_handle, $_base . 'js/' . static::$_PluginTitle . '-slide-admin.min.js', array('jquery'), static::$_Version, true);
						
					}
				
				break;
				
				case 'rev_addon':
					
					wp_enqueue_style($_handle, $_base . 'css/' . static::$_PluginTitle . '-dash-admin.css', array(), static::$_Version);
					wp_enqueue_script($_handle, $_base . 'js/' . static::$_PluginTitle . '-dash-admin.js', array('jquery'), static::$_Version, true);

				break;
				
			}
			
		}
		
	}

}
	
?>