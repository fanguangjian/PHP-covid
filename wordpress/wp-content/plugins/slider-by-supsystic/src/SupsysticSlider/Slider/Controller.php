<?php

/**
 * Sliders Controller.
 * Handles requests to the "Slider" module.
 */
class SupsysticSlider_Slider_Controller extends SupsysticSlider_Core_BaseController
{

    /**
     * Constructor.
     *
     * @param Rsc_Environment  $environment
     * @param Rsc_Http_Request $request
     */
    public function __construct(
        Rsc_Environment $environment,
        Rsc_Http_Request $request
    ) {
               
        parent::__construct(
            $environment,
            $request
        );

        $dispatcher = $this->getEnvironment()->getDispatcher();

        if (class_exists('SupsysticSlider_Slider_Model_Sliders')) {
            // Extend the base slider object with it's resources.
            $dispatcher->on(
                SupsysticSlider_Slider_Model_Sliders::EVENT_COMPILE,
                array($this->getModel('resources'), 'getBySlider')
            );

            // Move photos from resource prop to the global photos property.
            $dispatcher->on(
                SupsysticSlider_Slider_Model_Sliders::EVENT_COMPILE,
                array($this->getModel('photos'), 'getSliderImages')
            );

            // Gets all photos from folders and move it to the global property.
            $dispatcher->on(
                SupsysticSlider_Slider_Model_Sliders::EVENT_COMPILE,
                array($this->getModel('folders'), 'getSliderImages')
            );

			// Gets all maps from folders and move it to the global property.
			$dispatcher->on(
				SupsysticSlider_Slider_Model_Sliders::EVENT_COMPILE,
				array($this->getModel('maps'), 'getSliderMaps')
			);

            // Add slider's settings to the object.
            $dispatcher->on(
                SupsysticSlider_Slider_Model_Sliders::EVENT_COMPILE,
                array($this->getModel('settings'), 'getSliderSettings')
            );

            // In the end we create "entities" property that contains sorted
            // images and videos.
            $dispatcher->on(
                SupsysticSlider_Slider_Model_Sliders::EVENT_COMPILE,
                array($this, 'createEntities'),
                99
            );

            $dispatcher->on(
                SupsysticSlider_Slider_Model_Sliders::EVENT_COMPILE,
                array($this->getModel('sorting'), 'sortBySlider'),
                100
            );

            $dispatcher->on(
                SupsysticSlider_Slider_Model_Sliders::EVENT_COMPILE,
                array($this->getModel('exclude'), 'removeExcluded'),
                101
            );
        }
    }

    /**
     * Creates "entities" property in slider object.
     * Entities contains slider images and videos sorted by identifiers.
     *
     * Also every entity has property "type" that contains one of the entity
     * type: image or video.
     *
     * @param object $slider Slider object.
     *
     * @return object
     */
    public function createEntities($slider)
    {
        if (!is_object($slider)) {
            return $slider;
        }

        // An array of the entities.
        $entities = array();

        // An array of the entities identifiers.
        // They are will be used to sort entities.
        $identifiers = array();

        if (property_exists($slider, 'images')) {
            $entities = array_merge($entities, $slider->images);
        }

		if (property_exists($slider, 'maps')) {
			$entities = array_merge($entities, $slider->maps);
		}

        if (property_exists($slider, 'videos')) {
            $entities = array_merge($entities, $slider->videos);
        }

        if (count($entities) < 1) {
            $slider->entities = $entities;

            return $slider;
        }

        foreach ($entities as $index => $entity) {
            $entity->index = $index;

			if(property_exists($entity, 'video_id')) {
				$entity->type = 'video';
			} else if(property_exists($entity, 'map_id')) {
				$entity->type = 'map';
			} else {
				$entity->type  = 'image';
			}

			$identifiers[$index] = $entity->rid;
        }

        array_multisort($identifiers, SORT_DESC, $entities);

        $slider->entities = $entities;

        return $slider;
    }

    /**
     * Return aliases for models.
     *
     * @see SupsysticSlider_Core_BaseController::getModel()
     * @return array
     */
    protected function getModelAliases()
    {
        return array_merge(
            parent::getModelAliases(),
            array(
                'sliders'  			=> 'SupsysticSlider_Slider_Model_Sliders',
                'photos'   			=> 'SupsysticSlider_Photos_Model_Photos',
                'maps'    			=> 'SupsysticSlider_Photos_Model_Maps',
                'folders'   		=> 'SupsysticSlider_Photos_Model_Folders',
                'resources' 		=> 'SupsysticSlider_Slider_Model_Resources',
                'settings'  		=> 'SupsysticSlider_Slider_Model_Settings',
                'sorting'   		=> 'SupsysticSlider_Slider_Model_Sorting',
                'exclude'   		=> 'SupsysticSlider_Slider_Model_Exclude',
                'social_sharing'	=> 'SupsysticSlider_Slider_Model_SocialSharing',
                'membership'        => 'SupsysticSlider_Membership_Model_Membership',
            )
        );
    }

	public function showPresetsAction(Rsc_Http_Request $request) {
		return $this->response(
			'@slider/slider_preset.twig',
			array('available' => $this->getModule('slider')->getAvailableSliders())
		);
	}

    /**
     * Shows full list of the sliders.
     *
     * @param Rsc_Http_Request $request
     *
     * @return Rsc_Http_Response
     */
    public function indexAction(Rsc_Http_Request $request)
    {
        /** @var SupsysticSlider_Slider_Model_Sliders $sliders */
        $sliders = $this->getModel('sliders');

        // Little hack to show pop-up window.
        $currentPage = $request->query->get('page');
        $addAction = $request->query->get('add');
        $menu        = $this->getEnvironment()->getMenu();
        $submenu     = $menu->getSubmenuItem('newSlider');

        if ($addAction) {
            return $this->redirect(
                $this->generateUrl('slider', 'index') . '#addSliderWindow'
            );
        }

        return $this->response('@slider/index.twig', array(
				'sliders'   => $sliders->getAll(),
                'available' => $this->getModule('slider')->getAvailableSliders(),)
		);
    }

    /**
     * Creates new slider.
     *
     * @param Rsc_Http_Request $request
     *
     * @return Rsc_Http_Response
     */
    public function createAction(Rsc_Http_Request $request)
    {
        try {
            /** @var SupsysticSlider_Slider_Model_Sliders $sliders */
            $sliders = $this->getSliders();

            /** @var string $title */
            $title = $this->escape($request->post->get('title', 'Untitled'));

            /** @var string $plugin */
            $plugin = $this->escape($request->post->get('plugin'));

            /** @var string $preset */
            $preset = $this->escape($request->post->get('preset'));

            $sliders->create($title, $plugin);
        } catch (Exception $e) {
            return $this->response(
                Rsc_Http_Response::AJAX,
                $this->getErrorResponseData($e->getMessage())
            );
        }

        $sliderId = $sliders->getInsertId();
        $slider = $sliders->getById($sliderId);
        $module = $this->getModule($slider->plugin);
        $settings = $this->getModel('settings');

        $presetSettings = $module->getPresetSettings($preset);

        $settings->insert($presetSettings);
        $settingsId = $settings->getInsertId();

        $sliders->updateSettingsId($sliderId, $settingsId);

        return $this->response(
            Rsc_Http_Response::AJAX,
            $this->getSuccessResponseData(
                sprintf(
                    $this->translate('Slider "%s" successfully created.'),
                    $title
                ),
                array(
                    'title' => $title,
                    'id'    => $sliderId,
                    'url'   => $this->generateUrl('slider', 'view', array('id' => $sliderId)),
                )));
    }

    /**
     * View the slider.
     *
     * @param Rsc_Http_Request $request HTTP Request.
     *
     * @return Rsc_Http_Response
     */
    public function viewAction(Rsc_Http_Request $request)
    {
        /** @var SupsysticSlider_Slider_Model_Sliders $sliders */
        $sliders = $this->getSliders();
        $previewAction = $request->query->get('preview');

        if ($previewAction) {
            $id = $request->query->get('id');
            return $this->redirect($this->generateUrl('slider', 'view', array('id' => $id . '#previewAction')));
        }

        $id = $request->query->get('id');
        $current = $sliders->getById($id);

		if (null === $this->getEnvironment()->getModule($current->plugin)) {
			return $this->response('error.twig', array(
				'message' => $this->getEnvironment()->translate('Plugin for this type of slider is missing, or is available in the PRO version')));
		}
		$current->settings['socialSharing'] = $this->addSocialShareData($current->settings);
		$similar = $sliders->getSimilarSettingsByPluginName($id, $current->plugin);
        $module = $this->getModule($current->plugin);

        $this->getEnvironment()->getConfig()->load('@slider/tooltips.php');
        $tooltips = $this->getEnvironment()->getConfig()->get('tooltips');
        $icon = $this->getEnvironment()->getConfig()->get('tooltips_icon');
        $tooltips = array_map(array($this, 'rewrite'), $tooltips);

        $this->getEnvironment()->getTwig()->addGlobal('tooltips', $tooltips);
        $this->getEnvironment()->getTwig()->addGlobal('tooltips_icon', $icon);

        $extendedAttachmentOptions = array(
            '_slider_link' => 'external_link',
            'target' => 'target',
            '_wp_attachment_image_alt' => 'seo',
            'slideHtml' => 'html',
            'cropPosition' => 'cropPosition',
        );

        foreach($current->images as $key => $value) {
            foreach ($extendedAttachmentOptions as $field => $attachmentKey) {
                $attachmentData = get_post_meta($value->attachment_id, $field);
                $current->images[$key]->attachment[$attachmentKey] = reset($attachmentData);
            }
        }

		$resources = $this->getResources();
		$fonts = $resources->getFontsList();

        $membershipModel = $this->getModel('membership');
        $pageOptions = array(
            'isMembershipPluginActive' => $membershipModel->isPluginActive(),
            'membershipInstallWpUrl' => $membershipModel->getPluginInstallWpUrl(),
            'membershipInstallUrl' => $membershipModel->getPluginInstallUrl(),
        );

		return $this->response($module->getSettingsTemplate(), array(
			'slider' => $current,
			'fontList' => $fonts,
			'similar' => $similar,
            'pageOptions' => $pageOptions,
			'maps' => $this->addMapsData()
		));
    }

	public function addMapsData() {
		$core = $this->getEnvironment()->getModule('core');
		$isFrameGmp = $core->checkIsGlobalClassExists('frame', 'gmp');
		$mapsData = array();

		if($isFrameGmp) {
			$mapsData = array(0 => 'None');
			$maps = frameGmp::_()->getModule('gmap')->getModel()->getAllMaps();

			if($maps) {
				for($i = 0; $i < count($maps); $i++) {
					$mapsData[$maps[$i]['id']] = $maps[$i]['title'];
				}
			}
		}
		return $mapsData;
	}

	public function addSocialShareData($settings) {
		$socialSharingModel = $this->getModel('social_sharing');
		$settings['socialSharing'] = isset($settings['socialSharing']) ? $settings['socialSharing'] : array();

		$settings['socialSharing']['pluginInstalled'] = $socialSharingModel->isPluginInstalled();
		$settings['socialSharing']['projectsList'] = $socialSharingModel->getProjectsList();

		if(isset($settings['socialSharing']['projectId'])){
			apply_filters('sss_slider_html', $settings['socialSharing']['projectId']);
		}
		return $settings['socialSharing'];
	}

    /**
     * Rewrites @url annotation to the full url.
     *
     * @param string $element
     * @return string
     */
    public function rewrite($element)
    {
        $url = $this->getEnvironment()->getConfig()->get('plugin_url');

        return str_replace('@url', $url . '/app/assets/img', $element);
    }

    /**
     * Returns slider markup for requested slider.
     *
     * @param Rsc_Http_Request $request
     *
     * @return Rsc_Http_Response
     */
    public function getPreviewAction(Rsc_Http_Request $request)
    {
        $sliderId = $request->post->get('id');
        $width    = $request->post->get('width');
        $isEmpty  = false;

        /** @var SupsysticSlider_Slider_Module $self */
        $self = $this->getModule('slider');

        if ($slider = $this->getSliders()->getById($sliderId)) {
            if (!property_exists($slider, 'entities') || !$slider->entities) {
                $isEmpty = true;
            }
        }

        return $this->response(
            Rsc_Http_Response::AJAX,
            array(
                'slider'   => $self->render(
                    array(
                        'id'    => $sliderId,
                        'width' => $width
                    )
                ),
                'is_empty' => $isEmpty,
                'preview' => true
            )
        );
    }

    public function getRenderAction(Rsc_Http_Request $request) {
        $sliderId = $request->post->get('id');
        $isEmpty  = false;

        /** @var SupsysticSlider_Slider_Module $self */
        $self = $this->getModule('slider');

        if ($slider = $this->getSliders()->getById($sliderId)) {
            if (!property_exists($slider, 'entities') || !$slider->entities) {
                $isEmpty = true;
            }
        }

        return $this->response(
            Rsc_Http_Response::AJAX,
            array(
                'slider'   => $self->render(array('id' => $sliderId)),
                'is_empty' => $isEmpty
            )
        );
    }

    public function updatePositionAction(Rsc_Http_Request $request)
    {
        $sliderId  = $request->post->get('slider_id');
        $positions = $request->post->get('positions');

        $sorting = $this->getModel('sorting');
        $this->getModule('cache')->clean($sliderId);

        if (!$sorting->saveBySliderId($sliderId, $positions)) {
            return $this->response(
                Rsc_Http_Response::AJAX,
                $this->getErrorResponseData(
                    $this->translate('Failed to update positions.')
                )
            );
        }
       
        return $this->response(
            Rsc_Http_Response::AJAX,
            $this->getSuccessResponseData(
                $this->translate('Positions are successfully updated!')
            )
        );
    }

    /**
     * Deletes selected slider.
     *
     * @param Rsc_Http_Request $request HTTP Request.
     *
     * @return Rsc_Http_Response
     */
    public function deleteAction(Rsc_Http_Request $request)
    {
        /** @var SupsysticSlider_Slider_Model_Sliders $sliders */
        $sliders  = $this->getModel('sliders');
        $sliderId = $request->post->get('id');

        $this->getModule('cache')->clean($sliderId, true);

        if (!$sliders->deleteById($sliderId)) {
            return $this->response(
                Rsc_Http_Response::AJAX,
                $this->getErrorResponseData(
                    $this->translate('Unable to delete selected slider')
                )
            );
        }

		$membershipModel = $this->getModel('membership');
		$membershipModel->removeRowBySliderId($sliderId);
        return $this->response(
            Rsc_Http_Response::AJAX,
            $this->getSuccessResponseData()
        );
    }

    public function addPostAction(Rsc_Http_Request $request) {
        $postId = $request->post->get('id');
        $sliderId = $request->post->get('slider');
        $settings = $this->getModel('settings');
        $type = $request->post->get('type');

        $settings->savePost($postId, $sliderId, $type);
        $this->getModule('cache')->clean($sliderId);
        return $this->response(
            Rsc_Http_Response::AJAX,
            array('message' => 'Successfully added')
        );
    }

    public function getPostsAction(Rsc_Http_Request $request) {
        $sliderId = $request->post->get('slider');
        $settings = $this->getModel('settings');
        $size = $request->post->get('size');

        $elements = $settings->getPosts($sliderId, $size);

        return $this->response(
            Rsc_Http_Response::AJAX,
            array('message' => 'Successfully added', 'elements' => $elements)
        );
    }

    public function deletePostsAction(Rsc_Http_Request $request) {
        $sliderId = $request->post->get('slider');
        $settings = $this->getModel('settings');
        $posts = $request->post->get('posts');

        $settings->deletePost($sliderId, $posts);

        return $this->response(
            Rsc_Http_Response::AJAX,
            array('message' => 'Successfully added')
        );
    }

    /**
     * Shows the list of the folders and photos.
     * Allows to import them to the slider.
     *
     * @param Rsc_Http_Request $request HTTP Request.
     *
     * @return Rsc_Http_Response
     */
    public function addAction(Rsc_Http_Request $request)
    {
        $id = $request->query->get('id');

        if (!$id || !is_numeric($id)) {
            $message = $this->translate('Invalid request identifier.');

            return $this->response('error.twig', array('message' => $message,));
        }

        /** @var SupsysticSlider_Slider_Model_Sliders $sliders */
        $sliders = $this->getSliders();
        $current = $sliders->getById($id);

        if (null === $current) {
            $message = $this->translate(
                'Slider with the requested identifier does not exists.'
            );

            return $this->response('error.twig', array('message' => $message));
        }

        /** @var SupsysticSlider_Photos_Model_Photos $photos */
        $photos = $this->getModel('photos');
        /** @var SupsysticSlider_Photos_Model_Folders $folders */
        $folders = $this->getModel('folders');

        $videos = array();


        if ($this->getEnvironment()->isPro()) {
            $videos = $this->getModel('videos')
                ->getFromMainScope();
        }


        return $this->response('@slider/add.twig', array(
                'entities' => array(
                    'images'  => $photos->getAllWithoutFolders(),
                    'videos'  => $videos,
                    'folders' => $folders->getAll(),
                ),
                'slider'   => $current,
            )
        );
    }

    /**
     * Imports selected photos and folders to the specified slider.
     * Request sends from the "Add" action.
     *
     * @see SupsysticSlider_Slider_Controller::addAction()
     *
     * @param Rsc_Http_Request $request HTTP Request.
     *
     * @return Rsc_Http_Response
     */
    public function importAction(Rsc_Http_Request $request)
    {
        $items    = $request->post->get('items');
        $sliderId = $request->post->get('id');

        if (!is_array($items) || count($items) < 1) {
            return $this->response(
                Rsc_Http_Response::AJAX,
                $this->getErrorResponseData(
                    $this->translate('Failed to import selected items.')
                )
            );
        }

        if (!$sliderId || !is_numeric($sliderId)) {
            return $this->response(
                Rsc_Http_Response::AJAX,
                $this->getErrorResponseData(
                    $this->translate('Invalid slider identifier.')
                )
            );
        }

        $resources = $this->getResources();
        $resources->addArray($sliderId, $items);

        $redirectUri = $this->generateUrl('slider', 'view', array('id' => $sliderId));

        return $this->response(
            Rsc_Http_Response::AJAX,
            $this->getSuccessResponseData(
                '',
                array(
                    'redirect_uri' => $redirectUri,
                )
            )
        );
    }

    /**
     * Shows the settings page for the selected slider.
     *
     * @param Rsc_Http_Request $request HTTP Request
     *
     * @return Rsc_Http_Response
     */
    public function settingsAction(Rsc_Http_Request $request)
    {
        // This action now deprecated.

        return $this->redirect($this->generateUrl('slider', 'view', array('id' => $request->query->get('id'))));
    }

    /**
     * Saves the settings.
     *
     * @param Rsc_Http_Request $request HTTP Request.
     *
     * @return Rsc_Http_Response
     */
    public function saveSettingsAction(Rsc_Http_Request $request)
    {
        $data = $request->post->all();
        $id   = $data['id'];

        // Remove identifier from the other data.
        unset ($data['id']);

        $sliders  = $this->getSliders();
        $settings = $this->getSettings();
        $current  = $sliders->getById($id);

        if (!$current) {
            $message = $this->translate('Unable to find requested slider.');

            return $this->response('error.twig', array('message' => $message));
        }

        if ($current->settings_id == 0) {
            $result = $settings->insert($data);

            if (!$result) {
                $message = sprintf(
                    $this->translate('Failed to save settings. %s'),
                    $settings->getLastError()
                );

                return $this->response(
                    'error.twig',
                    array(
                        'message' => $message
                    )
                );
            }

            $settingsId = $settings->getInsertId();

            if (!$sliders->updateSettingsId($id, $settingsId)) {
                $message = sprintf(
                    $this->translate(
                        'Failed to update settings id. %s'
                    ),
                    $sliders->getLastError()
                );

                return $this->response(
                    'error.twig',
                    array('message' => $message)
                );
            }

            // Settings id != 0;
        } else {
            // Set caption settings from view page
            $caption = $request->post->get('caption');
            if($current->plugin == 'bx') {
                $data['__veditor__'] = isset($settings->getById($current->settings_id)->data['__veditor__']) ? $settings->getById($current->settings_id)->data['__veditor__'] : '';
                if (is_array($caption) && isset($data['__veditor__']['.bx-caption'])) {
                    $data['__veditor__']['.bx-caption']['color'] = $caption['color'];
                    $data['__veditor__']['.bx-caption']['font-size'] = $caption['font-size'].'px';
                    $data['__veditor__']['.bx-caption']['text-align'] = $caption['text-align'];
                    $data['__veditor__']['.bx-caption']['font-family'] = $caption['font-family'];
                    $data['__veditor__']['.bx-caption']['font-type'] = $caption['font-type'];
                    $data['__veditor__']['.bx-caption']['background-color'] = $caption['background-color'];
                }
            }
            if (!$settings->update($current->settings_id, $data)) {
                $message = sprintf(
                    $this->translate(
                        'Failed to update settings. %s'
                    ),
                    $settings->getLastError()
                );

                return $this->response(
                    'error.twig',
                    array('message' => $message)
                );
            }
        }

        // update membership parameter
        $membershipModel = $this->getModel('membership');
        if($membershipModel->isPluginActive()) {
             $membershipModel->updateRow(array( 'slider_id' => $id, 'allow_use' => isset($data['membership']['enable']) ? $data['membership']['enable'] : 0));
        }

        /*return $this->redirect(
            $this->generateUrl('slider', 'settings', array('id' => $id))
        );*/
        $this->getModule('cache')->clean($id, true);

        return $this->redirect($this->generateUrl('slider', 'view', array('id' => $id)));
    }

    /**
     * Changes slider plugin and drops old slider settings.
     *
     * @param Rsc_Http_Request $request HTTP Request.
     *
     * @return Rsc_Http_Response
     */
    public function changePluginAction(Rsc_Http_Request $request)
    {
        $sliders = $this->getSliders();

        $id     = $request->post->get('id');
        $plugin = $request->post->get('plugin');

        $sliderState = $sliders->getById($id);

        if (!$sliders->updatePlugin($id, $plugin)) {
            return $this->response(
                Rsc_Http_Response::AJAX,
                $this->getErrorResponseData(
                    sprintf(
                        $this->translate('Failed to change plugin: %s'),
                        $sliders->getLastError()
                    )
                )
            );
        }

        // If plugin field successfully updated then reset slider settings.
        if($sliderState->plugin !== $plugin) {
            $sliders->updateSettingsId($id, 0);
        }

        $this->getModule('cache')->clean($id, true);

        return $this->response(
            Rsc_Http_Response::AJAX,
            $this->getSuccessResponseData()
        );
    }

    public function changePluginNameAction(Rsc_Http_Request $request)
    {
        $sliders = $this->getSliders();

        $id     = $request->post->get('id');
        $title = $request->post->get('title');

        $sliderState = $sliders->getById($id);

        if (!$sliders->updatePluginName($id, $title)) {
            return $this->response(
                Rsc_Http_Response::AJAX,
                $this->getErrorResponseData(
                    sprintf(
                        $this->translate('Failed to change plugin: %s'),
                        $sliders->getLastError()
                    )
                )
            );
        }

        // If plugin field successfully updated then reset slider settings.
        if($sliderState->plugin !== $plugin) {
            $sliders->updateSettingsId($id, 0);
        }

        $this->getModule('cache')->clean($id);

        return $this->response(
            Rsc_Http_Response::AJAX,
            $this->getSuccessResponseData()
        );
    }

    public function importSettingsAction(Rsc_Http_Request $request)
    {
        $sliders = $this->getSliders();
        $settings = $this->getSettings();

        $fromId     = $request->post->get('from');
        $toId     = $request->post->get('to');

        $fromSlider = $sliders->getById($fromId);
        $toSlider = $sliders->getById($toId);
        $settingsData = $fromSlider->settings;
        
        if((int)$toSlider->settings_id !== 0) {
            $result = $settings->update($toSlider->settings_id, $settingsData);
        } else {
            $result = $settings->insert($settingsData);
            $settingsId = $settings->getInsertId();

            $this->getSliders()
                ->updateSettingsId($toId, $settingsId);
        }
        

        if (!$result) {
            return $this->response(
                Rsc_Http_Response::AJAX,
                $this->getErrorResponseData(
                    sprintf(
                        $this->translate('Failed to change plugin: %s'),
                        $sliders->getLastError()
                    )
                )
            );
        }

        $this->getModule('cache')->clean($toId, true);

        return $this->response(
            Rsc_Http_Response::AJAX,
            $this->getSuccessResponseData()
        );
    }

    /**
     * Returns full list of the sliders.
     * Uses on Images page.
     *
     * @return Rsc_Http_Response
     */
    public function listAction()
    {
        $sliders = $this->getSliders();

        return $this->response(
            Rsc_Http_Response::AJAX,
            array('galleries' => $sliders->getAll())
        );
    }

    /**
     * Attachs selected resources to the slider.
     *
     * @param Rsc_Http_Request $request [description]
     */
    public function attachAction(Rsc_Http_Request $request)
    {
        $sliderId = $request->post->get('slider_id');
        $entities = $request->post->get('resources');

        if (!is_array($entities) || empty($entities)) {
            return $this->response(
                Rsc_Http_Response::AJAX,
                $this->getErrorResponseData(
                    $this->translate('Failed to attach resources.')
                )
            );
        }

        $sliders = $this->getSliders();
        $folders = $this->getFolders();
        $exclude = $this->getExclude();

        $slider  = $sliders->getById($sliderId);

        if (!$slider) {
            return $this->response(
                Rsc_Http_Response::AJAX,
                $this->getErrorResponseData(
                    $this->translate('Invalid slider identifier.')
                )
            );
        }

        $resources = $this->getResources();

        foreach ($entities as $entity) {
            $id   = $entity['id'];
            $type = $entity['type'];

            /*if ($type == 'folder') {
                $folder = $folders->getById($id);

                if (count($folder->photos) > 0) {
                    foreach ($photos as $photo) {

                    }
                }
            }*/

            $resources->add($sliderId, $type, $id);
        }

        /*return $this->response(
            Rsc_Http_Response::AJAX,
            $this->getSuccessResponseData(
                sprintf(
                    $this->translate('%s resources successfully attached to <a href="%s">%s</a>'),
                    count($entities),
                    $this->generateUrl(
                        'slider',
                        'view',
                        array('id' => $slider->id)
                    ),
                    $slider->title
                )
            )
        );*/
		return $this->response(
			Rsc_Http_Response::AJAX,
			array(
				'message' => $this->translate(count($entities).' resources successfully attached to '.$slider->title),
				'sliderId' => (int)$slider->id,
				'redirectUrl' => $this->getEnvironment()->generateUrl('slider', 'view', array('id' => $slider->id)
				)
			)
		);
    }

    public function checkSettingsAction(Rsc_Http_Request $request) {
        $sliderId  = $request->post->get('id');
        $settings  = $request->post->get('settings');

        return $this->response(
            Rsc_Http_Response::AJAX,
            $this->getSuccessResponseData(
                $this->translate('Successfully removed!')
            )
        );
    }

    public function getFontsAction(Rsc_Http_Request $request) {
        $resources = $this->getResources();
        $fonts = $resources->getFontsList();

        return $this->response(
            Rsc_Http_Response::AJAX,
            array('fonts' => $fonts)
        );
    }

	public function reviewNoticeResponseAction(Rsc_Http_Request $request) {
		$responseCode = $request->post->get('responseCode');
		$option = $this->getConfig()->get('db_prefix') . 'reviewNotice';

		if ($responseCode === 'later') {
			update_option($option, array(
				 'time' => (60 * 60 * 24 * 2),
				 'is_shown' => false
			));
		} else {
			update_option($option, array(
				 'is_shown' => true
			));
		}

		return $this->response(Rsc_Http_Response::AJAX);
	}

    public function sendUsageStat($state) {
        $apiUrl = 'http://updates.supsystic.com';

        $reqUrl = $apiUrl . '?mod=options&action=saveUsageStat&pl=rcs';
        $res = wp_remote_post($reqUrl, array(
            'body' => array(
                'site_url' => get_bloginfo('wpurl'),
                'site_name' => get_bloginfo('name'),
                'plugin_code' => 'ssl',
                'all_stat' => array('views' => 'review', 'code' => $state),
            )
        ));

        return true;
    }

    public function deleteResourceAction(Rsc_Http_Request $request)
    {
        $sliderId  = $request->post->get('id');
        $entities  = $request->post->get('resources');
        $sliders   = $this->getSliders();
        $resources = $this->getResources();
        $exclude   = $this->getExclude();

        if (!$slider = $sliders->getById($sliderId)) {
            return $this->response(
                Rsc_Http_Response::AJAX,
                $this->getErrorResponseData(
                    $this->translate('Invalid slider identifier.')
                )
            );
        }

        foreach ($entities as $entity) {
            if (!empty($entity['folder_id']) && $entity['folder_id'] > 0) {
                $exclude->add($sliderId, $entity['id'], $entity['type']);
            } else {
                $result = $resources->delete($sliderId, $entity['id'], $entity['type']);
            }
        }

        $this->getModule('cache')->clean($sliderId);

        return $this->response(
            Rsc_Http_Response::AJAX,
            $this->getSuccessResponseData(
                $this->translate('Successfully removed!')
            )
        );
    }

    public function getSidebarAction(Rsc_Http_Request $request)
    {
        $sliderId = $request->post->get('slider_id');
        $selector = $request->post->get('selector');

        $sliders = $this->getSliders();
        $settings = $this->getSettings()->getById($sliderId);
        $slider  = $sliders->getById($sliderId);

        // Hardcoded Bx slider.
        $twig     = $this->getEnvironment()->getTwig();
        $template = null;

        try {
            switch ($selector) {
                case 'bx-viewport':
                    $template = $twig->render('@bx/designer/viewport.twig', array(
                        'slider' => $slider,
                    ));
                    break;
                case 'bx-viewport-button button':
                    $template = $twig->render('@bx/designer/viewport.twig', array(
                        'slider' => $slider,
                    ));
                    break;
                case 'bx-caption':
                    $template = $twig->render('@bx/designer/caption.twig', array(
                        'slider' => $slider,
                    ));
                    break;
                case 'bx-caption-button button':
                    $template = $twig->render('@bx/designer/caption.twig', array(
                        'slider' => $slider,
                    ));
                    break;
                case 'bx-prev':
                    $template = $twig->render('@bx/designer/controls.twig', array(
                        'slider' => $slider,
                    ));
                    break;
                case 'bx-prev-button button':
                    $template = $twig->render('@bx/designer/controls.twig', array(
                        'slider' => $slider,
                    ));
                    break;
                case 'bx-next':
                    $template = $twig->render('@bx/designer/controls.twig', array(
                        'slider' => $slider,
                    ));
                    break;
                case 'bx-controls bx-has-pager thumbnails bx-has-controls-direction':
                    $template = $twig->render('@bx/designer/thumbnails.twig', array(
                        'slider' => $slider,
                    ));
                    break;
                case 'thumbnails-button button':
                    $template = $twig->render('@bx/designer/thumbnails.twig', array(
                        'slider' => $slider,
                    ));
                    break;
                // case 'bx-pager bx-default-pager':
                //     $template = $twig->render('@bx/designer/pager.twig');
                //     break;
            }
        } catch (Twig_Error $error) {
            $template = sprintf(
                '<div class="error"><p>%s</p></div>',
                $this->translate('Failed to load settings')
            );
        }



        return $this->response(Rsc_Http_Response::AJAX, array(
            'template' => $template,
        ));
    }

    public function updateVisualAction(Rsc_Http_Request $request)
    {
        $sliderId = $request->post->get('slider_id');
        $data     = $request->post->get('data');

        $slider = $this->getSliders()->getById($sliderId);

        if (!isset($slider->settings['__veditor__'])) {
            $slider->settings['__veditor__'] = array();
        }

        $slider->settings['__veditor__'] = array_merge(
            $slider->settings['__veditor__'],
            $data
        );

        if (isset($data['.bx-caption'])) {
            $slider->settings['caption']['color'] = $data['.bx-caption']['color'];
            $slider->settings['caption']['font-size'] = str_replace('px', '', $data['.bx-caption']['font-size']);
            $slider->settings['caption']['text-align'] = $data['.bx-caption']['text-align'];
            $slider->settings['caption']['font-family'] = $data['.bx-caption']['font-family'];
            $slider->settings['caption']['font-type'] = $data['.bx-caption']['font-type'];
            $slider->settings['caption']['background-color'] = $data['.bx-caption']['background-color'];
        }

        if ($slider->settings_id < 1) {
            $settings = $this->getSettings();
            $settings->insert($slider->settings);

            $settingsId = $settings->getInsertId();
            $slider->settings_id = $settingsId;

            $this->getSliders()
                ->updateSettingsId($slider->id, $settingsId);
        } else {
            $settings = $this->getSettings();
            $settings->update($slider->settings_id, $slider->settings);
        }

        return $this->response(Rsc_Http_Response::AJAX, array(
            'settings' => $slider->settings,
        ));
    }

    public function hex2rgb($hex, $opacity)
    {
        $hex = str_replace("#", "", $hex);

        if(strlen($hex) == 3) {
            $r = hexdec(substr($hex,0,1).substr($hex,0,1));
            $g = hexdec(substr($hex,1,1).substr($hex,1,1));
            $b = hexdec(substr($hex,2,1).substr($hex,2,1));
        } else {
            $r = hexdec(substr($hex,0,2));
            $g = hexdec(substr($hex,2,2));
            $b = hexdec(substr($hex,4,2));
        }
        $rgb = array($r, $g, $b);
        $rgb = 'rgba(' .implode(",", $rgb). ',' .$opacity.')';
        return $rgb;
    }

    /**
     * Returns sliders model.
     *
     * @return SupsysticSlider_Slider_Model_Sliders
     */
    protected function getSliders()
    {
        return $this->getModel('sliders');
    }

    /**
     * Returns resources model.
     *
     * @return SupsysticSlider_Slider_Model_Resources|SupsysticSliderPro_Slider_Model_Resources
     */
    protected function getResources()
    {
        return $this->getModel('resources');
    }

    /**
     * Returns settings model.
     *
     * @return SupsysticSlider_Slider_Model_Settings
     */
    protected function getSettings()
    {
        return $this->getModel('settings');
    }

    /**
     * @return SupsysticSlider_Slider_Model_Exclude
     */
    protected function getExclude()
    {
        return $this->getModel('exclude');
    }

    /**
     * @return SupsysticSlider_Photos_Model_Folders
     */
    protected function getFolders()
    {
        return $this->getModel('folders');
    }
}
