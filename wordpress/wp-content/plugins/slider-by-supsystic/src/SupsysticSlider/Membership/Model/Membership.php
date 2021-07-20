<?php
class SupsysticSlider_Membership_Model_Membership extends Rsc_Mvc_Model {

	protected $table;
	protected $memberShipClassName;

	public function __construct() {
		parent::__construct();
		$this->table = $this->db->prefix . 'rs_membership_presets';
		$this->memberShipClassName = 'SupsysticMembership';
	}

	public function isPluginActive() {
		$tableExistsQuery =  "SHOW TABLES LIKE '" . $this->table . "'";
		$results = $this->db->get_results($tableExistsQuery);

		if(count($results) && class_exists($this->memberShipClassName)) {
			return true;
		}
		return false;
	}

	public function getPluginInstallUrl() {
		return add_query_arg(
			array(
				's' => 'Membership by Supsystic',
				'tab' => 'search',
				'type' => 'term',
			),
			admin_url( 'plugin-install.php' )
		);
	}

	public function getPluginInstallWpUrl() {
		return 'https://wordpress.org/plugins/membership-by-supsystic/';
	}

	public function updateRow($params) {

		if(isset($params['slider_id']) && isset($params['allow_use'])) {
			$allowUse = (int)$params['allow_use'];
			$sliderId = (int)$params['slider_id'];
			
			$query = "INSERT INTO `" . $this->table . "`(`slider_id`, `allow_use`)"
				. " VALUES (" . $sliderId . ", " . $allowUse . ") "
				. "ON DUPLICATE KEY UPDATE `allow_use`=" . $allowUse;
			$res = $this->db->query($query);
			return $res;
		}
		return false;
	}

	public function removeRowBySliderId($sliderId) {
		$query = 'DELETE FROM ' . $this->table
			. ' WHERE `slider_id`=' . (int) $sliderId;

		$res = $this->db->query($query);
		return $res;
	}

	public function getSliderAttachmentEmule(array $imagesList) {
		$arrayEmule = array();
		if(count($imagesList)) {
			foreach($imagesList as $oneImage) {
				$arrayEmule[] = $this->getSliderAttachmenEmuledImage($oneImage);
			}
		}
		return $arrayEmule;
	}

	/**
	 * prepare photo images from simple image file to slider attachment (not all slider functions supporting)
	 * @param array $simpleImage
	 */
	public function getSliderAttachmenEmuledImage(array $simpleImage) {

		$orientation = ($simpleImage['width'] >= $simpleImage['height']) ? 'landscape' : 'portrait';

		$imageAlt = '';
		$dotPos = strrpos($simpleImage['url'], '.');
		if($dotPos) {
			$imageAlt = basename(substr($simpleImage['url'], 0, $dotPos));
		}

		$attachment = array(
			'id' => null,
			'title' => '',
			'filename' => '',
			'url' => $simpleImage['url'],
			'link' => '',
			'alt' => $imageAlt,
			'author' => 0,
			'description' => '',
			'caption' => '',
			'name' => '',
			'status' => 'inherit',
			'uploadedTo' => 0,
			'date' => 0,
			'modified' => 0,
			'menuOrder' => 0,
			'mime' => 'image/jpeg',
			'type' => 'image',
			'subtype' => 'jpeg',
			'icon' => '',
			'dateFormatted' => '',
			'nonces' => array (),
			'editLink' => '',
			'meta' => null,
			'authorName' => '',
			'filesizeInBytes' => 0,
			'filesizeHumanReadable' => '0 KB',
			'height' => $simpleImage['height'],
			'width' => $simpleImage['width'],
			'orientation' => $orientation,
			'sizes' => array(
				'thumbnail' => array(
					'height' => $simpleImage['height'],
					'width' => $simpleImage['width'],
					'url' => $simpleImage['url'],	//http://sst-w1.loc/wp-content/uploads/2016/11/roses7-1024x640.jpg
					'orientation' => $orientation,
				),
				'medium' => array(
					'url' => $simpleImage['url'],
					'height' => $simpleImage['height'],
					'width' => $simpleImage['width'],
					'orientation' => $orientation,
				),
				'large' => array(
					'url' => $simpleImage['url'],
					'height' => $simpleImage['height'],
					'width' => $simpleImage['width'],
					'orientation' => $orientation,
				),
				'full' => array(
					'url' => $simpleImage['url'],
					'height' => $simpleImage['height'],
					'width' => $simpleImage['width'],
					'orientation' => $orientation,
				),
			),
			'target' => '_self',
			'cropPosition' => 'center-center',
		);
		$attachmentImageEmulator = new stdClass();
		$attachmentImageEmulator->id = null;
		$attachmentImageEmulator->folder_id = 0;
		$attachmentImageEmulator->album_id = 0;
		$attachmentImageEmulator->attachment_id = null;
		$attachmentImageEmulator->position = 9000;
		$attachmentImageEmulator->timestamp = null;
		$attachmentImageEmulator->attachment = $attachment;
		$attachmentImageEmulator->is_used = 1;
		$attachmentImageEmulator->used_times = 1;
		$attachmentImageEmulator->tags = array();
		$attachmentImageEmulator->type = 'image';
		$attachmentImageEmulator->index = 0;
		$attachmentImageEmulator->isNotRealAttachment = 1;
		//$attachmentImageEmulator->rid = 9

		return $attachmentImageEmulator;
	}
}