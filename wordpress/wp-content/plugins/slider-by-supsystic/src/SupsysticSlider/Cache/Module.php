<?php

class SupsysticSlider_Cache_Module extends SupsysticSlider_Core_BaseModule
{
	private $extension = '.html';
	private $cacheDirectory;

	public function onInit()
	{
		$this->cacheDirectory = $this->getConfig()->get('plugin_sliders_cache') . DIRECTORY_SEPARATOR;
	}

	public function get($filename) {
		$filePath = $this->getFullPath($filename);
		if ($this->cacheDirectory && file_exists($filePath) && $this->getEnvironment()->isProd()) {
			$cache = file_get_contents($filePath);
			$viewId = mt_rand(1, 99999);
			$cache = preg_replace('/(supsystic-[a-z]*-?slider-[a-z]*-?\d+_)(\d{0,5})/', '${1}' . $viewId, $cache);
			return $cache;
		}

		return false;
	}

	public function set($filename, $data) {
		return file_put_contents($this->getFullPath($filename), $data);
	}

	public function clean($filename, $cleanIntegrationCache = false) {

		$filePath = $this->getFullPath($filename);

		if (file_exists($filePath)) {
			unlink($filePath);
		}
		if($this->cacheDirectory && $cleanIntegrationCache) {
			// remove all membership-integration cache
			array_map('unlink', glob($this->cacheDirectory . '*' . $filename . '_*' . $this->extension));
		}
	}

	public function cleanAll() {
		$cacheDir = $this->cacheDirectory;
		if ($cacheDir) {
			array_map('unlink', glob("{$cacheDir}*"));
		}
	}

	private function getFullPath($filename) {
		return $this->cacheDirectory . $filename . $this->extension;
	}
}