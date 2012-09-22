<?php
/**
 * Author: Yraen Ironheart
 * Date: 23/09/12
 * Time: 12:34 AM
 *
 *
 */
class Athletics_Weights_Repetition {
	private $weight = 0;

	/**
	 * Constructor
	 *
	 * @param $weight
	 */
	public function __construct($weight) {
		$this->setWeight($weight);
	}

	/**
	 * Set weight
	 *
	 * @param $weight
	 */
	private function setWeight($weight) {
		$this->weight = $weight;
	}

	/**
	 * Get weight
	 *
	 * @return int
	 */
	public function getWeight() {
		return $this->weight;
	}
}
