<?php


class SupsysticSlider_Slider_Module extends SupsysticSlider_Core_BaseModule
{

    /** Config item with the available sliders. */
    const AVAILABLE_SLIDERS = 'plugin_sliders';

	public $slider = null;

	public $posts = array();

	public $extendedAttachmentOptions = array(
		'slideHtml' => 'html',
		'cropPosition' => 'cropPosition',
	);

	/*protected $videoMetaField = array(
		'label' => 'Video URL',
		'desc' => 'Paste video URL here',
		'id' => 'featured_video',
		'type' => 'textarea'
	);*/

    /**
     * Module initialization.
     */
    public function onInit()
    {
        /** @var SupsysticSlider_Slider_Controller $controller */
        $controller = $this->getController();
        $resources = $controller->getModel('resources');
        $dispatcher = $this->getEnvironment()->getDispatcher();

        $dispatcher->on('after_ui_loaded', array($this, 'loadAssets'));					// Loads module assets.
        $dispatcher->on('after_modules_loaded', array($this, 'findSliders'));			// Find all sliders after all modules has been loaded.
        $dispatcher->on('after_modules_loaded', array($this, 'loadExtensions'));		// Load twig extensions.
        $dispatcher->on('photos_delete_by_id', array($resources, 'deletePhotoById'));	// If some photos was removed from database we'll remove it from slider automatically.
		$dispatcher->on('ui_menu_items', array($this, 'addNewSliderMenuItem'), 1, 0);	// Register menu items.

		$this->addTwigFunctions();
        add_shortcode('supsystic-slider', array($this, 'render'));						// Add shortcode
        add_action('widgets_init', array($this, 'registerWidget'));
		add_action('sss_disable_social_sharing',array($this,'disableSocialSharing'),10,1);
		add_action('sss_clean_cache',array($this,'cleanSocialSharingCache'),10,1);

        if ($this->isPluginPage()) {
            $this->reviewNoticeCheck();
        }
        //$this->initVideoMetaBox();
    }

	public function render($attributes)
	{
		if (!isset($attributes['id'])) {
			// @TODO: Maybe we need to show error message here.
			return;
		}

		$slider = isset($attributes['slider']) && !empty($attributes['slider']) ? $attributes['slider'] : $this->getCurrentSlider($attributes['id']);

		if (!$slider) {
			// @TODO: Maybe we need to show error message here.
			return;
		}

		/** @var SupsysticSlider_Slider_Interface $module */
		$module = $this->getEnvironment()->getModule($slider->plugin);

		if (!$module) {
			return;
		}

		add_action('wp_footer', array($module, 'enqueueJavascript'));
		add_action('wp_footer', array($module, 'enqueueStylesheet'));

		add_action('wp_footer', array($this, 'enqueueFrontendJavascript'));
		add_action('wp_footer', array($this, 'enqueueFrontendStylesheet'));

		$slider->settings['socialSharing'] = $this->initSliderSocialShare($slider->settings);
		$slider->viewId = $slider->id. '_'. mt_rand(1, 99999);

		if(isset($attributes['image-list'])) {
			$cacheId = $attributes['id'] . '_' . md5(json_encode($attributes));
		} else {
			$cacheId = $attributes['id'];
		}
		$cacheModule = $this->getModule('cache');
		$cache = $cacheModule->get($cacheId);

		if ($cache !== false) {
			return do_shortcode($cache);
		}

		if (isset($attributes['width'])) {
			$slider->settings['properties']['width'] = $attributes['width'];
		}

		if (isset($attributes['height'])) {
			$slider->settings['properties']['height'] = $attributes['height'];
		}

		if (isset($attributes['position'])) {
			$slider->settings['properties']['position'] = $attributes['position'];
		}

		if (isset($attributes['start'])) {
			$slider->settings['properties']['start'] = $attributes['start'];
		}

		if(!isset($attributes['image-list'])) {
			if(!$this->posts) {
				$this->posts = $this->getController()->getModel('settings')->getPosts($slider->id, 'full');
			}
			$slider->posts = $this->posts;

			foreach($slider->images as $key => $value) {
				foreach ($this->extendedAttachmentOptions as $field => $attachmentKey) {
					$attachmentData = get_post_meta($value->attachment_id, $field);
					$attachmentData = reset($attachmentData);
					if ($attachmentKey == 'html') {
						$slider->images[$key]->attachment[$attachmentKey] = unserialize($attachmentData);
						continue;
					}
					$slider->images[$key]->attachment[$attachmentKey] = $attachmentData;
				}
				if(defined('$slider->entities[$key]->url')) {
					$slider->entities[$key]->attachment['service'] = $this->getService($slider, $key);
				}
			}
		} else {
			$slider->posts = array();
			$membershipModel = $this->getController()->getModel('membership', 'membership');
			$slider->images = $membershipModel->getSliderAttachmentEmule($attributes['image-list']);
			$slider->entities = $slider->images;
			$slider->settings['properties']['integrationId'] = $attributes['integration-id'];
		}

		$data = $module->render($slider);
		$data = preg_replace('/\s+/', ' ', $data);	//Remove multiple spaces for prevent applying of wpautop filter / function
		$cacheModule->set($cacheId, $data);
		return do_shortcode($data);
	}

	public function getCurrentSlider($id) {
		/** @var SupsysticSlider_Slider_Controller $controller */
		$controller = $this->getController();
		/** @var SupsysticSlider_Slider_Model_Sliders $sliders */
		$sliders = $controller->getModel('sliders');
		$slider  = $sliders->getById((int)$id);

		return $slider;
	}

	public function addTwigFunctions() {
		$twig = $this->getEnvironment()->getTwig();

		$twig->addFunction(
			new Twig_SimpleFunction(
				'translate',
				array($this->getController(), 'translate')
			)
		);
		$twig->addFunction(
			new Twig_SimpleFunction(
				'unserialize_twig',
				'unserialize'
			)
		);
		$twig->addFunction(
			new Twig_SimpleFunction(
				'all_posts',
				'get_posts'
			)
		);
		$twig->addFunction(
			new Twig_SimpleFunction(
				'all_pages',
				'get_pages'
			)
		);
		$twig->addFunction(
			new Twig_SimpleFunction(
				'all_categories',
				'get_categories'
			)
		);
		$twig->addFunction(
			new Twig_SimpleFunction(
				'get_image_src',
				'wp_get_attachment_image_src'
			)
		);
	}

	public function addPageVideoMetaBox() {
        add_meta_box('video_meta_box', 'Featured Video', array($this, 'showPageVideoMetaBox'), 'page', 'normal', 'high');
    }

	public function addPostVideoMetaBox() {
        add_meta_box('video_meta_box', 'Featured Video', array($this, 'showPostVideoMetaBox'), 'post', 'normal', 'high');
    }

    /**
     * Loads module assets.
     * @param SupsysticSlider_Ui_Module $ui UI Module.
     */
    public function loadAssets(SupsysticSlider_Ui_Module $ui)
    {
        $environment = $this->getEnvironment();
        $preventCaching = $environment->isDev();

        if($environment->getPluginName() != 'ssl'){
            return;
        }

        if (!$environment->isModule('slider')) {
            return;
        }

        $ui->add(
            new SupsysticSlider_Ui_BackendJavascript(
                'supsysticSlider-slider-noty',
                $this->getLocationUrl() . '/assets/js/noty/js/noty/packaged/jquery.noty.packaged.min.js',
                $preventCaching
            )
        );

        $ui->add(
            new SupsysticSlider_Ui_BackendStylesheet(
                'supsysticSlider-slider-styles',
                $this->getLocationUrl() . '/assets/css/slider.css',
                $preventCaching
            )
        );

        if ($environment->isAction('index') || $environment->isAction('showPresets')) {
            $ui->add(
                new SupsysticSlider_Ui_BackendJavascript(
                    'supsysticSlider-slider-index',
                    $this->getLocationUrl() . '/assets/js/index.js',
                    $preventCaching
                )
            );
        }

        if ($environment->isAction('add')) {
            $ui->add(
                new SupsysticSlider_Ui_BackendJavascript(
                    'supsysticSlider-slider-add',
                    $this->getLocationUrl() . '/assets/js/add.js',
                    $preventCaching
                )
            );
        }

        if ($environment->isAction('view')) {
            $ui->add(
                new SupsysticSlider_Ui_BackendStylesheet(
                    'supsystic-slider-chosen-css',
                    $this->getLocationUrl() . '/assets/css/chosen.css',
                    $preventCaching
                )
            );
            $ui->add(
                new SupsysticSlider_Ui_BackendJavascript(
                    'supsystic-slider-chosen-js',
					$this->getLocationUrl() . '/assets/js/chosen.jquery1-1-0.min.js',
                    $preventCaching
                )
            );
            $ui->add(
                new SupsysticSlider_Ui_BackendStylesheet(
                    'supsysticSlider-slider-stylesAnimate',
                    $this->getLocationUrl() . '/assets/css/animate.css',
                    $preventCaching
                )
            );
            $ui->add(
                new SupsysticSlider_Ui_BackendStylesheet(
                    'wp-color-picker'
                )
            );
            $ui->add(
                new SupsysticSlider_Ui_BackendJavascript(
                    'supsysticSlider-slider-frontend',
                    $this->getLocationUrl() . '/assets/js/frontend.js',
                    $preventCaching
                )
            );
            $ui->add(
                new SupsysticSlider_Ui_BackendJavascript(
                    'supsysticSlider-slider-settingsTabs',
                    $this->getLocationUrl() . '/assets/js/settings-tabs.js',
                    $preventCaching
                )
            );
            $ui->add(
                new SupsysticSlider_Ui_BackendJavascript(
                    'supsysticSlider-slider-settings',
                    $this->getLocationUrl() . '/assets/js/settings.js',
                    $preventCaching
                )
            );
            $ui->add(
                new SupsysticSlider_Ui_BackendJavascript(
                    'supsysticSlider-slider-view',
                    $this->getLocationUrl() . '/assets/js/view.js',
                    $preventCaching
                )
            );
            $ui->add(
                new SupsysticSlider_Ui_BackendJavascript(
                    'supsysticSlider-slider-viewToolbar',
                    $this->getLocationUrl() . '/assets/js/view-toolbar.js',
                    $preventCaching
                )
            );
            $ui->add(
                new SupsysticSlider_Ui_BackendJavascript(
                    'supsysticSlider-slider-sorting',
                    $this->getLocationUrl() . '/assets/js/sorting.js',
                    $preventCaching
                )
            );
            $ui->add(
                new SupsysticSlider_Ui_BackendJavascript(
                    'supsysticSlider-slider-preview',
                    $this->getLocationUrl() . '/assets/js/preview.js',
                    $preventCaching
                )
            );
            $ui->add(
                new SupsysticSlider_Ui_BackendJavascript(
                    'supsysticSlider-slider-lettering',
                    $this->getLocationUrl() . '/assets/js/jquery.lettering.js',
                    $preventCaching
                )
            );
            $ui->add(
                new SupsysticSlider_Ui_BackendJavascript(
                    'supsysticSlider-slider-texttillate',
                    $this->getLocationUrl() . '/assets/js/jquery.textillate.js',
                    $preventCaching
                )
            );
            $ui->add(
                new SupsysticSlider_Ui_BackendJavascript(
                    'supsysticSlider-slider-easing',
					$this->getLocationUrl() . '/assets/js/jquery.easing1-3.min.js',
                    $preventCaching
                )
            );

            // Visual Editor.
            $veditor = new SupsysticSlider_Ui_BackendJavascript(
                'supsysticSlider-slider-veditor',
                $this->getLocationUrl() . '/assets/js/visual-editor.js',
                $preventCaching
            );
            $veditor->setDeps(array('wp-color-picker'));
            $ui->add($veditor);

            $ui->add(
                new SupsysticSlider_Ui_BackendJavascript(
                    'supsysticSlider-google-fl-preview',
                    '//ajax.googleapis.com/ajax/libs/webfont/1/webfont.js',
                    $preventCaching
                )
            );
        }
    }

    /**
     * Loads Twig extensions.
     */
    public function loadExtensions()
    {
        $twig = $this->getEnvironment()->getTwig();
        $twig->addExtension(new SupsysticSlider_Slider_Twig_Attachment());
    }

    public function enqueueFrontendJavascript() {
        $dispatcher = $this->getEnvironment()->getDispatcher();
        $dispatcher->dispatch('bx_enqueue_javascript');

        wp_enqueue_script(
            'supsysticSlider-slider-frontend',
            $this->getLocationUrl() . '/assets/js/frontend.js',
            array(),
            '1.0.0',
            true
        );

        wp_enqueue_script(
            'supsysticSlider-slider-lettering',
            $this->getLocationUrl() . '/assets/js/jquery.lettering.js',
            array(),
            '1.0.0',
            true
        );

        wp_enqueue_script(
            'supsysticSlider-slider-texttillate',
            $this->getLocationUrl() . '/assets/js/jquery.textillate.js',
            array(),
            '1.0.0',
            true
        );

        wp_enqueue_script(
            'supsysticSlider-slider-easing',
			$this->getLocationUrl() . '/assets/js/jquery.easing1-3.min.js',
            array(),
            '1.0.0',
            true
        );

    }

    public function enqueueFrontendStylesheet() {
        wp_enqueue_style(
            'rs-shadows-css',
            $this->getConfig()->get('plugin_url') . '/app/assets/css/shadows.css',
            array(),
            '1.0.0'
        );
        wp_enqueue_style(
            'supsysticSlider-slider-stylesAnimateLetters',
            $this->getLocationUrl() . '/assets/css/animate.css',
            array(),
            '1.0.0'
        );
    }

    /**
     * Finds all modules that implement SupsysticSlider_Slider_Interface
     * and registers as sliders.
     */
    public function findSliders()
    {
        $environment = $this->getEnvironment();

        $config  = $environment->getConfig();
        $modules = $environment
            ->getResolver()
            ->getModulesList();

        if (!$config->has(self::AVAILABLE_SLIDERS)) {
            $config->add(self::AVAILABLE_SLIDERS, array());
        }

        $available = $config->get(self::AVAILABLE_SLIDERS);

        if ($modules->isEmpty()) {
            return;
        }

        foreach ($modules as $module) {
            if ($module instanceof SupsysticSlider_Slider_Interface) {
                $available[] = $module;
            }
        }

        $config->set(self::AVAILABLE_SLIDERS, $available);
    }

    /**
     * Returns array with the available sliders.
     *
     * @return SupsysticSlider_Slider_Info[]
     */
    public function getAvailableSliders()
    {
        return $this->getEnvironment()
            ->getConfig()
            ->get(
                self::AVAILABLE_SLIDERS,
                array()
            );
    }

    public function registerWidget() {
        register_widget( 'sslWidget' );
    }

    public function addNewSliderMenuItem()
    {
        $menu = $this->getEnvironment()->getMenu();

        $plugin_menu = $this->getConfig()->get('plugin_menu');
        $capability = $plugin_menu['capability'];

        $submenuNewSlider = $menu->createSubmenuItem();
        $submenuNewSlider->setCapability($capability)
            //->setMenuSlug('supsystic-slider&module=slider&action=index&add=true')
			->setMenuSlug('supsystic-slider&module=slider&action=showPresets')
            ->setMenuTitle($this->translate('New Slider'))
            ->setPageTitle($this->translate('New Slider'))
            ->setModuleName('slider');
		// Avoid conflicts with old vendor version
		if(method_exists($submenuNewSlider, 'setSortOrder')) {
			$submenuNewSlider->setSortOrder(20);
		}

        $menu->addSubmenuItem('newSlider', $submenuNewSlider);
//            ->register();

        $submenuSliders = $menu->createSubmenuItem();
        $submenuSliders->setCapability($capability)
            ->setMenuSlug('supsystic-slider&module=slider')
            ->setMenuTitle($this->translate('Sliders'))
            ->setPageTitle($this->translate('Sliders'))
            ->setModuleName('slider');
		// Avoid conflicts with old vendor version
		if(method_exists($submenuSliders, 'setSortOrder')) {
			$submenuSliders->setSortOrder(30);
		}

        $menu->addSubmenuItem('sliders', $submenuSliders);
    }

    protected function getService($slider, $index) {
        foreach (array('youtube', 'vimeo') as $service) {
            //$pattern = sprintf('/%s/i', $service);

            if (strpos($slider->entities[$index]->url, $service)) {
                return $service;
            }
        }
    }

    public function reviewNoticeCheck() {
        $option = $this->getConfig()->get('db_prefix') . 'reviewNotice';
        $notice = get_option($option);
        if (!$notice) {
            update_option($option, array(
                'time' => time() + (60 * 60 * 24 * 7),
                'is_shown' => false
            ));
        } elseif ($notice['is_shown'] === false && (isset($notice['time']) && time() > $notice['time'])) {
            add_action('admin_notices', array($this, 'showReviewNotice')); 
        }
    }

    public function showReviewNotice() {
    	$twig = $this->getTwig();
        print $twig->display('@slider/notice/review.twig');
    }

	public function initSliderSocialShare($settings) {
		$environment = $this->getEnvironment();
		$socialSharingModel = $environment->getModule('slider')->getController()->getModel('social_sharing');

		if(isset($settings['socialSharing'])){
			$socialSharing = $settings['socialSharing'];
		}else{
			$socialSharing = array();
		}

		$socialSharing['pluginInstalled'] = $socialSharingModel->isPluginInstalled();
		$socialSharing['projectsList'] = $socialSharingModel->getProjectsList();
		$socialSharing['html'] = '';

		if($socialSharing['pluginInstalled'] && isset($socialSharing['status']) && $socialSharing['status'] == 'enable'){
			$socialSharing['html'] = apply_filters('sss_slider_html',isset($socialSharing['projectId']) ? $socialSharing['projectId'] : null);
		}

		return $socialSharing;
	}

	/**
	 * clean slider cache to apply project changes
	 * @param int $projectId id of social sharing project
	 */
	public function cleanSocialSharingCache($projectId){
		$environment = $this->getEnvironment();
		$cacheModule = $environment->getModule('cache');
		$slidersModel = $this->getController()->getModel('sliders');
		$sliders = $slidersModel->getAll();

		foreach($sliders as $slider){
			if(!empty($slider->settings['socialSharing']) && !empty($slider->settings['socialSharing']['projectId']) && $slider->settings['socialSharing']['projectId'] == $projectId){
				$cacheModule->clean($slider->id);
			}
		}
	}

	/**
	 * disable social sharing in slider if project setting "where_to_show" where changed from
	 * "slider" to something else
	 * @param int $projectId id of social sharing project
	 */
	public function disableSocialSharing($projectId){
		$environment = $this->getEnvironment();
		$cacheModule = $environment->getModule('cache');
		$slidersModel = $this->getController()->getModel('sliders');
		$settingsModel = $this->getController()->getModel('settings');
		$sliders = $slidersModel->getAll();

		foreach($sliders as $slider){
			if(!empty($slider->settings['socialSharing']) && !empty($slider->settings['socialSharing']['projectId']) && $slider->settings['socialSharing']['projectId'] == $projectId){
				$slider->settings['socialSharing']['enabled'] = false;
				$settingsModel->update($slider->id, $slider->settings);
				$cacheModule->clean($slider->id);
			}
		}
	}

	/*public function initVideoMetaBox() {
        add_action('add_meta_boxes', array($this, 'addPageVideoMetaBox'));
        add_action('add_meta_boxes', array($this, 'addPostVideoMetaBox'));
        add_action('save_post', array($this, 'saveVideoMeta'));
    }

	public function showPageVideoMetaBox() {
        $this->showVideoMetaBox();
    }

	public function showPostVideoMetaBox() {
        $this->showVideoMetaBox();
    }

	public function showVideoMetaBox() {
        global $post;

        wp_nonce_field( basename( __FILE__ ), 'video_meta_box_nonce' );
        echo '<table class="form-table">';

        $field = $this->videoMetaField;
        $meta = get_post_meta($post->ID, $field['id'], true);
        echo '<tr>
				<th><label for="' . $field['id'] . '">' . $field['label'] . '</label></th>
				<td>';
        switch ($field['type']) {
            case 'textarea':
                echo '<textarea style="width:100%" id="' . $field['id'] . '" name="' . $field['id'] . '">' . $meta . '</textarea>
                                                    <br /><span class="description">' . $field['desc'] . '</span>';
                break;
        }
        echo '</td></tr>';

        echo '</table>';
    }

	public function saveVideoMeta($postID) {
        if (!isset($_POST['video_meta_box_nonce']) || !wp_verify_nonce($_POST['video_meta_box_nonce'], basename(__FILE__))) {
            return $postID;
        }

        if (defined('DOING_AUTOSAVE') && DOING_AUTOSAVE) {
            return $postID;
        }

        if ('page' == $_POST['post_type']) {
            if (!current_user_can('edit_page', $postID)) {
                return $postID;
            }
        } elseif (!current_user_can('edit_post', $postID)) {
            return $postID;
        }

        $field = $this->videoMetaField['id'];

        if (isset($_POST[$field]) && false !== filter_var($_POST[$field], FILTER_VALIDATE_URL)) {
            $value = get_post_meta($postID, $field, true);
            $newValue = $_POST[$field];

            if ($newValue && $newValue != $value) {
                update_post_meta($postID, $field, $newValue);
            } elseif ('' == $newValue && $value) {
                delete_post_meta($postID, $field, $value);
            }
        }
    }*/
}

require_once('Model/widget.php');
