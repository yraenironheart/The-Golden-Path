<?php
/**
 * Author: Yraen Ironheart
 * Date: 5/08/12
 * Time: 7:20 PM
 *
 *
 */
class Colonel_Strategy_Thirds extends Colonel_Strategy_Abstract {

	/**
	 * Constructor
	 *
	 * @param $width
	 * @param $margin
	 */
	public function __construct($width, $margin) {
		$third = ($width-4*$margin)/3;

		/* Accept only whole numbers
		 */
		if ($third == floor($third)) {
			$width = 3*$third + 4*$margin;

			$this->setMessage("Thirds: $width pixels for three columns: [$third, 4x$margin]");
			$this->setIsValid(true);
		}
	}
}
