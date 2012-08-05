<?php
/**
 * Author: Yraen Ironheart
 * User: Sarif
 * Date: 13/06/12
 * Time: 12:59 AM
 *
 *
 */
class Core_Image_Transformation_Strategy_Watermark extends Core_Image_Transformation_Strategy_Abstract {
	private $text = '';

	/**
	 * Constructor
	 *
	 * @param $args
	 */
	public function __construct($args) {
		$this->setText($args['text']);
	}

	/**
	 * Manipulate image
	 *
	 * @param $image
	 * @return mixed
	 */
	public function manipulate($image) {
		list($width, $height) = $this->getImageAttributes($image);

		$grey = imagecolorallocate($image, 128, 128, 128);
		$white = imagecolorallocate($image, 255, 255, 255);

		imagefilledrectangle($image, 0, $height, $width, $height-10, $grey);
		imagestring($image, 1, $width/2-30, $height-9, $this->getText(), $white);

		return $image;
	}

	/* Getters/Setters
	 */

	/**
	 * Set watermark text
	 *
	 * @param $text
	 */
	private function setText($text) {
		$this->text = $text;
	}

	/**
	 * Get watermark text
	 *
	 * @return string
	 */
	private function getText() {
		return $this->text;
	}
}
