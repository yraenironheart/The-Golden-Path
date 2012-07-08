<?php
/**
 * Author: Yraen Ironheart
 * User: Sarif
 * Date: 12/06/12
 * Time: 3:41 PM
 *
 * Sharpens the image resource using convolution matrix.
 *
 * See UnsharpMask class for original author's documentation.
 */
class Image_Transformation_Strategy_Sharpen extends Image_Transformation_Strategy_Abstract {

	public function __construct() {
	}

	public function manipulate($image) {
		$amount = 90;
		$radius = 0.7;
		$threshold = 5;

		$sharpener = new Image_UnsharpMask($image, $amount, $radius, $threshold);

		return $sharpener->getImage();
	}

	/* Getters/Setters
	 */
}
