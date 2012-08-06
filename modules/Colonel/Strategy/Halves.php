<?php
/**
 * Author: Yraen Ironheart
 * Date: 5/08/12
 * Time: 7:57 PM
 *
 *
 */
class Colonel_Strategy_Halves extends Colonel_Strategy_Abstract {

	/**
	 * Constructor
	 *
	 * @param $width
	 * @param $margin
	 */
	public function __construct($width, $margin) {
		$effectiveWidth = $width - 3*$margin;

		$col = $effectiveWidth/2;

		/* Accept only whole numbers
		 */
		if ($col == floor($col)) {
			$width = $margin + $col + $margin + $col + $margin;

			$this->setMessage("Halves: $width pixels for two columns [$col, $col, 3x$margin]");
			$this->setIsValid(true);
		}
	}
}
