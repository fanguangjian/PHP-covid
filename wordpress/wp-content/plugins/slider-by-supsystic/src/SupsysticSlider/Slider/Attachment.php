<?php

/**
 * Attachments handler.
 */
class SupsysticSlider_Slider_Attachment
{

    /**
     * Returns attachment image with requested sizes.
     * If it is not possible to get requested size method returns placeholder.
     *
     * @param int $attachmentId Attachment Id.
     * @param int $width Requested image width.
     * @param int $height Requested image height.
     * @return string
     */
    public function getSize($attachmentId, $width, $height = null, $cropPosition = null)
    {
        $attachment = $this->getMetadata($attachmentId);

        if (!$attachment) {
            if (!$height) {
                $height = $width;
            }
            if(!$width) {
                $width = $height;
            }

            return $this->getPlaceholderUrl($width, $height);
        }

        if ($cropPosition && $width && $height) {
            
            $cropPositionUpdate = get_post_meta($attachmentId, 'cropPositionNeedUpdate');
            $cropPositionUpdate = reset($cropPositionUpdate);
            // Check if crop size or position changed since last crop
            if (!empty($cropPositionUpdate) && 
                ($cropPositionUpdate[0] == true ||
                $cropPositionUpdate[1] !== $width ||
                $cropPositionUpdate[2] !== $height)) {
                if ($url = $this->crop($attachment, $width, $height, $cropPosition)) {
                    update_post_meta($attachmentId, 'cropPositionNeedUpdate', array(false, $width, $height), $cropPositionUpdate);
                    return $url;
                }
            }
        }

        if ($url = $this->getDefaultSizeUrl($attachment, $width, $height)) {
            return $url;
        }

        if ($url = $this->getCroppedSizeUrl($attachment, $width, $height)) {
            return $url;
        }

        if ($url = $this->crop($attachment, $width, $height)) {
            return $url;
        }

        if (!isset($attachment['sizes']) || !isset($attachment['sizes']['full'])) {
            return $this->getPlaceholderUrl($width, $height);
        }
        
        return $attachment['sizes']['full']['url'];
    }

    /**
     * Returns attachment metadata by attachment id.
     *
     * @param int $attachmentId Attachment Id.
     * @return array
     */
    public function getMetadata($attachmentId)
    {
        return wp_prepare_attachment_for_js($attachmentId);
    }

    /**
     * Returns full path to the attachment or NULL on failure.
     *
     * @param array $attachment Attachment metadata.
     * @return null|string
     */
    public function getFilePath($attachment)
    {
        if (!is_array($attachment) || !isset($attachment['url'])) {
            return null;
        }

        $url = $attachment['url'];
        $basepath = untrailingslashit(ABSPATH);

        return  $basepath . str_replace(get_bloginfo('wpurl'), '', $url);
    }

    /**
     * Returns url to the requested size or NULL if this size does not exists.
     *
     * @param array $attachment Attachment metadata.
     * @param int $width Requested width.
     * @param int $height Requested height.
     * @return null|string
     */
    protected function getDefaultSizeUrl($attachment, $width, $height)
    {
        if (!$height) {
            return null;
        }

        if(isset($attachment['sizes'])) {
            foreach ($attachment['sizes'] as $size) {
                if ($size['width'] === $width && $size['height'] === $height) {
                    return $size['url'];
                }
            }
        }
        
        return null;
    }

	function imageCropForLesserDimensions($default, $orig_w, $orig_h, $new_w, $new_h, $crop) {
    	if (!$crop || !$new_w || !$new_h) return null;
		$size_ratio = max($new_w / $orig_w, $new_h / $orig_h);
		$crop_w = round($new_w / $size_ratio);
		$crop_h = round($new_h / $size_ratio);


		if(is_array($crop) || is_object($crop) && count($crop) > 1) {
			list($x, $y) = $crop;
		} else {
			$x = null;
			$y = null;
		}
		if('left' === $x) {
			$s_x = 0;
		} elseif('right' === $x) {
			$s_x = $orig_w - $crop_w;
		} else {
			$s_x = floor(($orig_w - $crop_w)/2);
		}

		if ('top' === $y) {
			$s_y = 0;
		} elseif('bottom' === $y) {
			$s_y = $orig_h - $crop_h;
		} else {
			$s_y = floor(($orig_h - $crop_h)/2);
		}
		return array( 0, 0, (int) $s_x, (int) $s_y, (int) $new_w, (int) $new_h, (int) $crop_w, (int) $crop_h);
	}

	public function getCropedFileUrl($attachment, $width, $height = null, $cropPosition = null) {

		$filePath = $this->getFilePath($attachment);

		// add width and height to filename
		$croppedFileName = $this->getFileNameWithHeightAndWidth($filePath, $width, $height);

		// check if file exists
		if(!file_exists($croppedFileName)) {
			return $this->crop($attachment, $width, $height, $cropPosition);
		}
		return str_replace(ABSPATH, get_bloginfo('wpurl') . '/', $croppedFileName);
	}

	public function getFileNameWithHeightAndWidth($oldFileName, $width, $height) {
		$dotPos = strrpos($oldFileName, '.');
		if($dotPos) {
			return substr($oldFileName, 0, $dotPos) . '-' . $width . 'x' . $height . '.' . substr($oldFileName, $dotPos + 1);
		}
		return null;
	}

    /**
     * Crops the attachment image and return path to the cropped image.
     * If crop fails returns NULL.
     *
     * @param array $attachment Attachment metadata.
     * @param int $width Image width.
     * @param int $height Image height.
     * @return string|null
     */
    protected function crop($attachment, $width, $height = null, $cropPosition = null)
    {
        $filepath = $this->getFilePath($attachment);
        $editor   = $this->getEditor($filepath);
        $crop = true;

        if (!$editor) {
            return null;
        }

		//Crop filter for small images
		if(isset($attachment['width']) && isset($attachment['height'])) {
			if ($attachment['width'] < $width || $attachment['height'] < $height) {
				if (!has_filter('image_resize_dimensions', array($this, 'imageCropForLesserDimensions'))) {
					add_filter('image_resize_dimensions', array($this, 'imageCropForLesserDimensions'), 10, 6);
				}
			}
		}

        if ($cropPosition) {
            $crop = explode('-', $cropPosition);
        }

        if (is_wp_error($editor->resize($width, $height, $crop))) {
            return null;
        }

        if (is_wp_error($data = $editor->save())) {
            return null;
        }

        unset($editor);

        return str_replace(ABSPATH, get_bloginfo('wpurl') . '/', $data['path']);
    }


    /**
     * Returns WP_Image_Editor or NULL on failure.
     *
     * @param string $filepath Path to file.
     * @return WP_Image_Editor
     */
    protected function getEditor($filepath)
    {
        $editor = wp_get_image_editor($filepath);

        if (is_wp_error($editor)) {
            return null;
        }

        return $editor;
    }

    /**
     * Returns URL to the images if WordPress has already cropped
     * and resized image.
     * If uploads directory doesn't contain requested file - returns NULL.
     *
     * @param array $attachment Attachment metadata.
     * @param int $width Image width.
     * @param int $height Image height.
     * @return string|null
     */
    protected function getCroppedSizeUrl($attachment, $width, $height)
    {

        if (!is_array($attachment) || (!$width || !$height)) {
            return null;
        }

        $filepath  = $this->getFilePath($attachment);
        $filename  = pathinfo($filepath, PATHINFO_FILENAME);
        $extension = pathinfo($filepath, PATHINFO_EXTENSION);

        // Will be something file: filename-300x300.jpg
        $filename = $filename . '-' . $width . 'x' . $height . '.' . $extension;

        if (is_file($file = dirname($filepath) . '/' . $filename)) {
            //update_option('crop_debug', str_replace(ABSPATH, get_bloginfo('wpurl') . '/', $file));
            return str_replace(ABSPATH, get_bloginfo('wpurl') . '/', $file);
        }

        return null;
    }

    /**
     * Returns URL to the placeholder with specified width, height and text.
     *
     * @param int    $width  Image width.
     * @param int    $height Image height.
     * @param string $text   Image text.
     * @return string
     */
    protected function getPlaceholderUrl($width, $height, $text = null)
    {
        $text = $text ? $text : 'Failed+to+load+image.';

        return sprintf(
            'http://placehold.it/%sx%s&text=%s',
            $width,
            $height,
            $text
        );
    }
} 