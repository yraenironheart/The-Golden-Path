<?php
/**
 * Author: Yraen Ironheart
 * Date: 5/08/12
 * Time: 7:13 PM
 *
 *
 */
class Colonel_Strategy_GoldenRatio extends Colonel_Strategy_Abstract {

	/**
	 * Constructor
	 *
	 * @param $width
	 * @param $margin
	 */
	public function __construct($width, $margin) {
		$effectiveWidth = $width - 3*$margin;

		$large = floor($width/1.6);
		$small = $effectiveWidth - $large;

		/* Accept only whole numbers
		 */
		if ($small == floor($small)) {
			$width = $large + $small + 3*$margin;

			$this->setMessage("Golden Ratio: $width pixels for two columns [$large, $small, 3x$margin]");
			$this->setIsValid(true);
		}
	}
}
