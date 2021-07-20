<?php

/**
 * Class GirdGallery_Installer_Module
 */
class SupsysticSlider_Installer_Module extends SupsysticSlider_Core_Module
{
    const LAST_REVISION = 'supsystic_slider_last_revision';
    const UPDATE_REVISION = 0;

    /**
     * @var GirdGallery_Installer_Model
     */
    protected $model;

    /**
     * {@inheritdoc}
     */
    public function onInit()
    {
        $config = $this->getEnvironment()->getConfig();
		$currentVersion = $config->get('revision');
		$lastVersion = get_option(self::LAST_REVISION);

		if ($lastVersion === false) {
			update_option(self::LAST_REVISION, $currentVersion);
		}

        if (version_compare($currentVersion, $lastVersion, '>')) {
			if (false === $config->get('plugin_db_update')) {
				return;
			}
            self::executeUpdate($lastVersion, $currentVersion);
            update_option(self::LAST_REVISION, $currentVersion);
        }
		//add_action('admin_footer', array($this, 'checkPluginUninstall'));
    }

    /**
     * {@inhertidoc}
     */
    public function onInstall()
    {
        parent::onInstall();

        $model   = self::getModel();
        $queries = self::getSchema();
		
		$config = $this->getEnvironment()->getConfig();
		$currentVersion = $config->get('revision');

		if (function_exists('is_multisite') && is_multisite()) {
			global $wpdb;
			$blog_id = $wpdb->get_col("SELECT blog_id FROM $wpdb->blogs");
            foreach ($blog_id as $id) {
                if (switch_to_blog($id)) {
                    $model->install($queries);
					update_option(self::LAST_REVISION, $currentVersion);
					restore_current_blog();
                }
            }
		} else {
			if (!$model->install($queries)) {
				wp_die ('Failed to update database.');
			}
			update_option(self::LAST_REVISION, $currentVersion);
		}
    }

    public static function onUninstall()
    {
		$model   = self::getModel();
		$queries = self::getSchema();

		if (function_exists('is_multisite') && is_multisite()) {
			global $wpdb;
			$blog_id = $wpdb->get_col("SELECT blog_id FROM $wpdb->blogs");
			foreach ($blog_id as $id) {
				if (switch_to_blog($id)) {
					$model->drop($queries);
					delete_option(self::LAST_REVISION);
					restore_current_blog();
				}
			}
		} else {
			$model->drop($queries);
			delete_option(self::LAST_REVISION);
		}
    }

    protected static function executeUpdate($start, $end)
    {
		if (function_exists('is_multisite') && is_multisite()) {
			global $wpdb;
			$blog_id = $wpdb->get_col("SELECT blog_id FROM $wpdb->blogs");
			foreach ($blog_id as $id) {
				if (switch_to_blog($id)) {
					for($i = $start; $i <= $end; $i++) {
						self::getModel()->update(self::getUpdates($i));
					}
					restore_current_blog();
				}
			}
		} else {
			for($i = $start; $i <= $end; $i++) {
				self::getModel()->update(self::getUpdates($i));
			}
		}
    }

    /**
     * Returns the database schema queries.
     * @return array|null
     */
    protected static function getSchema()
    {
        if (!is_file($file = dirname(__FILE__) . '/Schema.php')) {
            return null;
        }

        return include $file;
    }

    protected static function getUpdates($revision)
    {
        $filename = sprintf('/Updates/rev_%d.php', (int)$revision);

        if (!is_file($file = dirname(__FILE__) . $filename)) {
            return null;
        }

        return include $file;
    }

    protected static function getModel()
    {
        return new SupsysticSlider_Installer_Model();
    }

	// for future uninstall functionality popup in manage plugins page
	public function checkPluginUninstall() {
		if(function_exists('get_current_screen')) {
			$screen = get_current_screen();
			if($screen && isset($screen->base) && $screen->base == 'plugins') {
				wp_enqueue_script('jquery-ui-dialog');

				wp_enqueue_script('sbs.admin.plugins', $this->getLocationUrl() . '/assets/js/admin.plugins.js');


				wp_localize_script('mbs.admin.plugins', 'sbsPluginsData', array(
					'plugSlug' => $this->getEnvironment()->getConfig()->get('plugin_folder_name')
				));
				/*
				//$assetsPath = $this->getModule('base')->getAssetsPath();
				$backendCss = array(
					'//ajax.googleapis.com/ajax/libs/jqueryui/1.10.4/themes/smoothness/jquery-ui.css',
					$this->getAssetsPath(). '/css/supsystic-ui.css',
				);
				foreach($backendCss as $s) {
					$src = is_string($s) ? $s : $s['source'];
					wp_enqueue_style(basename($src), $src);
				}
				*/
				echo $this->render('@installer/uninstall.twig');
			}
		}
	}
}
