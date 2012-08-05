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
class Core_Image_Transformation_Strategy_Sharpen extends Core_Image_Transformation_Strategy_Abstract {

	/**
	 * Constructor
	 */
	public function __construct() {
	}

	/**
	 * Manipulate image
	 *
	 * @param $image
	 * @return mixed
	 */
	public function manipulate($image) {
		$amount = 90;
		$radius = 0.7;
		$threshold = 5;

		$sharpener = new Core_Image_UnsharpMask($image, $amount, $radius, $threshold);

		return $sharpener->getImage();
	}
}
