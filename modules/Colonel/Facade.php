<?php
/**
 * Author: Yraen Ironheart
 * Date: 5/08/12
 * Time: 8:02 PM
 *
 *
 */
class Colonel_Facade {
	private $startWidth = 0;
	private $endWidth = 0;
	private $margin = 0;

	private $allStrategies = array(
		'Colonel_Strategy_GoldenRatio',
		'Colonel_Strategy_Halves',
		'Colonel_Strategy_Thirds',
		'Colonel_Strategy_Quarters',
		'Colonel_Strategy_Fifths',
	);

	/**
	 * Constructor
	 *
	 * @param $startWidth
	 * @param $endWidth
	 * @param $margin
	 */
	public function __construct($startWidth, $endWidth, $margin) {
		$this->setStartWidth($startWidth);
		$this->setEndWidth($endWidth);
		$this->setMargin($margin);
	}

	/**
	 * Process all strategies
	 */
	public function process() {
		for ($i = $this->getStartWidth(); $i < $this->getEndWidth(); $i++) {
			$validCount = 0;
			$flyweight = array();

			foreach ($this->getAllStrategies() as $currentStrategy) {
				$strategy = new $currentStrategy($i, $this->getMargin());

				if ($strategy->isValid()) {
					$flyweight[] = $strategy;
					$validCount++;
				}
			}

			if ($validCount == count($this->getAllStrategies())) {
				echo "<HR>$i<HR>";

				foreach($flyweight as $current) {
					echo $current->getMessage() . "<BR>";
				}

				echo "<BR>";
			}
		}
	}

	/* Getters/Setters
	 */

	/**
	 * Set end width
	 *
	 * @param $endWidth
	 */
	private function setEndWidth($endWidth) {
		$this->endWidth = $endWidth;
	}

	/**
	 * Get end width
	 *
	 * @return int
	 */
	private function getEndWidth() {
		return $this->endWidth;
	}

	/**
	 * Set margin
	 *
	 * @param $margin
	 */
	private function setMargin($margin) {
		$this->margin = $margin;
	}

	/**
	 * Get margin
	 *
	 * @return int
	 */
	private function getMargin() {
		return $this->margin;
	}

	/**
	 * Set start width
	 *
	 * @param $startWidth
	 */
	private function setStartWidth($startWidth) {
		$this->startWidth = $startWidth;
	}

	/**
	 * Get start width
	 *
	 * @return int
	 */
	private function getStartWidth() {
		return $this->startWidth;
	}

	/**
	 * Get all strategies
	 *
	 * @return array
	 */
	private function getAllStrategies() {
		return $this->allStrategies;
	}
}
