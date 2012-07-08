<?php
/**
 * Author: Yraen Ironheart
 * User: Sarif
 * Date: 19/02/12
 * Time: 12:13 AM
 *
 *
 */
abstract class Image_Transformation_Strategy_Abstract {
	protected $canvasWidth = 0;
	protected $canvasHeight = 0;

	/**
	 * Abstract method for manipulation
	 *
	 * @abstract
	 * @param $image
	 */
	abstract public function manipulate($image);

	/**
	 * Get dimensions of the image resource so we can chain transformations.
	 *
	 * Also figures out what the aspect ratio is, to make future resizes easier.
	 *
	 * @param $image
	 *
	 * @return array
	 */
	public function getImageAttributes($image) {
		return array(imagesx($image), imagesy($image));
	}

	/* Getters/Setters
	 */

	/**
	 * Set canvas height
	 *
	 * @param $canvasHeight
	 */
	protected function setCanvasHeight($canvasHeight) {
		$this->canvasHeight = $canvasHeight;
	}

	/**
	 * Get canvas height
	 *
	 * @return int
	 */
	protected function getCanvasHeight() {
		return $this->canvasHeight;
	}

	/**
	 * Set canvas width
	 *
	 * @param $canvasWidth
	 */
	protected function setCanvasWidth($canvasWidth) {
		$this->canvasWidth = $canvasWidth;
	}

	/**
	 * Get canvas width
	 *
	 * @return int
	 */
	protected function getCanvasWidth() {
		return $this->canvasWidth;
	}
}
