<?php

class SupsysticSlider_Photos_Model_Maps extends SupsysticSlider_Core_BaseModel implements Rsc_Environment_AwareInterface
{
	/**
	 * Constructor.
	 */
	public function __construct()
	{
		parent::__construct();

		$this->table = $this->db->prefix . 'rs_maps';
	}

	public function add($mapId)
	{
		$core = $this->environment->getModule('core');
		$isFrameGmp = $core->checkIsGlobalClassExists('frame', 'gmp');

		if(!$isFrameGmp) {
			throw new RuntimeException(sprintf('Please install or enable Google Maps Easy plugin'));
		}
		$map = frameGmp::_()->getModule('gmap')->getModel()->getMapById($mapId);

		if(!$map) {
			throw new RuntimeException(sprintf('Map not exists!'));
		}
		$uploads = wp_upload_dir();
		$urlPath = $uploads['url'] . '/' . $map['view_html_id'] . '.png';
		$filePath = $uploads['path'] . '/' . $map['view_html_id'] . '.png';

		$map['params']['img_width'] = 100;
		$map['params']['img_height'] = 100;
		$mapImgUrl = $this->getMapStaticImgSrc($map); // Fix if not exists!!
		$response = wp_remote_get($mapImgUrl);

		if (is_wp_error($response)) {
			throw new RuntimeException($response->get_error_message());
		}
		$thumbnail = wp_remote_retrieve_body($response);

		if (200 !== wp_remote_retrieve_response_code($response)) {
			$massage = is_string($thumbnail) ? $thumbnail : 'Failed to download thumbnail';
			throw new RuntimeException($massage);
		}
		if (false === @file_put_contents($filePath, $thumbnail)) {
			throw new RuntimeException(sprintf('Failed to upload thumbnail to the %s', $filePath));
		}
		$attachment = array(
			'guid'           => $urlPath,
			'post_mime_type' => 'image/png',
			'post_content'   => '',
			'post_status'    => 'inherit'
		);

		$attachmentId = wp_insert_attachment($attachment, $filePath, 0);

		if ($attachmentId === 0) {
			throw new RuntimeException('Failed to save WordPress attachment.');
		}

		require_once(ABSPATH . 'wp-admin/includes/image.php');

		$metadata = wp_generate_attachment_metadata($attachmentId, $filePath);
		wp_update_attachment_metadata($attachmentId, $metadata);

		$query = $this->getQueryBuilder()
			->insertInto($this->table)
			->fields('folder_id', 'attachment_id', 'map_id')
			->values(0, $attachmentId, $mapId);

		if (!$this->db->query($query->build())) {
			$this->setLastError($this->db->last_error);
			return false;
		}

		$this->setInsertId($this->db->insert_id);

		return $attachmentId;
	}

	public function getMapStaticImgSrc($map) {
		$core = $this->environment->getModule('core');
		$isUriGmp = $core->checkIsGlobalClassExists('uri', 'gmp');

		$params = array(
			'center' => $map['params']['map_center']['coord_x'] . ',' . $map['params']['map_center']['coord_y'],
			'zoom' => $map['params']['zoom'],
			'size' => $map['params']['img_width'] . 'x' . $map['params']['img_height'],	// in pixels
			'maptype' => $map['params']['type'],
			'sensor' => false,
			'language' => !empty($params['language']) ? $params['language'] : utilsGmp::getLangCode2Letter(),
			'key' => $core->checkIsGlobalClassExists('frame', 'gmp') ? frameGmp::_()->getModule('gmap')->getView()->getApiKey() : '',
		);
		$link = 'http://maps.google.com/maps/api/staticmap?' . http_build_query($params);

		if($isUriGmp) {
			if(uriGmp::isHttps()) {
				$link = uriGmp::makeHttps($link);
			}
		}
		return $link;
	}

	public function getSliderMaps($slider)
	{
		$maps = array();

		if (!is_object($slider)) {
			throw new InvalidArgumentException(sprintf(
				'Parameter 1 must be a object, %s given.',
				gettype($slider)
			));
		}

		if (!property_exists($slider, 'resources')) {
			// Nothing to process
			return $slider;
		}


		if (!is_array($slider->resources)) {
			throw new InvalidArgumentException(sprintf(
				'The "resources" property must be an array, %s given.',
				gettype($slider->resources)
			));
		}

		foreach ($slider->resources as $resource) {
			if ($resource->resource_type === 'map') {
				$map = $this->getById($resource->resource_id);
				if($map) {
					$map->rid = $resource->id;
					$maps[] = $map;
				}
			}
		}

		if (property_exists($slider, 'maps')) {
			$slider->maps = array_merge($slider->maps, $maps);
		} else {
			$slider->maps = $maps;
		}

		return $slider;
	}

	public function getById($id)
	{
		$query = $this->getQueryBuilder()
			->select('*')
			->from($this->getTable())
			->where('id', '=', (int)$id);
		$map = $this->db->get_row($query->build());

		if (!$map) {
			return null;
		}
		$map->attachment = wp_prepare_attachment_for_js($map->attachment_id);

		return $map;
	}

	public function getByAttachmentId($id)
	{
		$query = $this->getQueryBuilder()
			->select('*')
			->from($this->getTable())
			->where('attachment_id', '=', (int)$id);

		$map = $this->db->get_row($query->build());

		if (!$map) {
			return null;
		}

		$map->attachment = wp_prepare_attachment_for_js($map->attachment_id);

		return $map;
	}

	/**
	 * Sets the environment.
	 *
	 * @param Rsc_Environment $environment
	 */
	public function setEnvironment(Rsc_Environment $environment)
	{
		$this->environment = $environment;
	}
}