<?php
/**
 * Author: Yraen Ironheart
 * Date: 5/08/12
 * Time: 7:19 PM
 *
 *
 */
class Colonel_Strategy_Quarters extends Colonel_Strategy_Abstract {

	/**
	 * Constructor
	 *
	 * @param $width
	 * @param $margin
	 */
	public function __construct($width, $margin) {
		$quarter = ($width-5*$margin)/4;

		/* Accept only whole numbers
		 */
		if ($quarter == floor($quarter)) {
			$width = 4*$quarter + 5*$margin;

			$this->setMessage("Quarters: $width pixels for four columns: [$quarter, 5x$margin]");
			$this->setIsValid(true);
		}
	}
}