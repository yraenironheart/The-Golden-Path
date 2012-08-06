<?php
/**
 * Author: Yraen Ironheart
 * Date: 5/08/12
 * Time: 8:12 PM
 *
 *
 */
class Colonel_Strategy_Fifths extends Colonel_Strategy_Abstract {

	/**
	 * Constructor
	 *
	 * @param $width
	 * @param $margin
	 */
	public function __construct($width, $margin) {
		$fifth = ($width-6*$margin)/5;

		/* Accept only whole numbers
		 */
		if ($fifth == floor($fifth)) {
			$width = 5*$fifth + 6*$margin;

			$this->setMessage("Fifths: $width pixels for five columns: [$fifth, 6x$margin]");
			$this->setIsValid(true);
		}
	}
}
