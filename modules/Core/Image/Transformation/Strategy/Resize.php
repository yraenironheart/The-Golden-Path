<?php
/**
 * Author: Yraen Ironheart
 * User: Sarif
 * Date: 19/02/12
 * Time: 12:05 AM
 *
 * Resize to explicit dimensions
 */
class Core_Image_Transformation_Strategy_Resize extends Core_Image_Transformation_Strategy_Abstract {

	/**
	 * Constructor
	 *
	 * @param $args
	 */
	public function __construct($args) {
		$this->setCanvasWidth($args['width']);
		$this->setCanvasHeight($args['height']);
	}

	/**
	 * Manipulate image
	 *
	 * @param $image
	 * @return Image_Resize
	 */
	public function manipulate($image) {
		list($oldWidth, $oldHeight) = $this->getImageAttributes($image);

		$desiredWidth = $this->getCanvasWidth();
		$desiredHeight = $this->getCanvasHeight();

		/* Perform transformation
		 */
		$newImage = imagecreatetruecolor($desiredWidth, $desiredHeight);

		imagecopyresampled($newImage, $image, 0, 0, 0, 0, $desiredWidth, $desiredHeight, $oldWidth, $oldHeight);

		/* Remember results
		 */
		return $newImage;
	}
}
