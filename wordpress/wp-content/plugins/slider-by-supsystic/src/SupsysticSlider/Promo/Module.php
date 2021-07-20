<?php

/**
 * Class SupsysticSlider_Promo_Module
 *
 * Promo module.
 */
class SupsysticSlider_Promo_Module extends SupsysticSlider_Core_BaseModule
{
	/**
	 * Module initialization.
	 */
	public function onInit()
	{
		parent::onInit();

		if(is_admin()) {
			$dispatcher = $this->getEnvironment()->getDispatcher();
			$dispatcher->on('messages', array($this, 'renderDiscountMsg'));
		}
	}

	public function renderDiscountMsg()
	{
		$environment = $this->getEnvironment();
		if($environment->isPro() && $environment->isModule('license') && $environment->getModule('license')->isActive()) {
			$proPluginsList = array(
				'ultimate-maps-by-supsystic-pro', 'newsletters-by-supsystic-pro', 'contact-form-by-supsystic-pro', 'live-chat-pro',
				'digital-publications-supsystic-pro', 'coming-soon-supsystic-pro', 'price-table-supsystic-pro', 'tables-generator-pro',
				'social-share-pro', 'popup-by-supsystic-pro', 'supsystic_slider_pro', 'supsystic-gallery-pro', 'google-maps-easy-pro',
				'backup-supsystic-pro',
			);
			$activePluginsList = get_option('active_plugins', array());
			$activeProPluginsCount = 0;
			foreach($activePluginsList as $actPl) {
				foreach($proPluginsList as $proPl) {
					if(strpos($actPl, $proPl) !== false) {
						$activeProPluginsCount++;
					}
				}
			}
			if($activeProPluginsCount === 1) {
				$twig = $this->getEnvironment()->getTwig();
				$twig->display('@promo/discountMessage.twig', array(
					'bundlePageLink' => '//supsystic.com/all-plugins/',
					'buyLink' => $this->getDiscountBuyUrl(),
				));
			}
		}
	}

	public function getDiscountBuyUrl() {
		$environment = $this->getEnvironment();
		$pluginCode = $environment->getConfig()->get('plugin_product_code');
		$license = $environment->getModule('license')->getHelper()->getCredentials();
		$license['key'] = md5($license['key']);
		$license = urlencode(base64_encode(implode('|', $license)));
		return 'http://supsystic.com/?mod=manager&pl=lms&action=extend&plugin_code='. $pluginCode. '&lic='. $license;
	}
}