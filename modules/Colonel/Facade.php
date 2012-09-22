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

	/* Result set
	 */
	private $allWidths = array();

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
	 * Process all strategies and support chainable methods
	 *
	 * @return \Colonel_Facade
	 */
	public function process() {
		$allWidths = new Colonel_Result_Collection();

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
				$widths = array();
				$widths['key'] = $i;

				foreach($flyweight as $current) {
					$widths['values'][] = $current->getMessage();
				}

				$allWidths->add($widths);
			}
		}

		$this->setAllWidths($allWidths);

		return $this;
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

	/**
	 * Set all widths
	 *
	 * @param $allWidths
	 */
	private function setAllWidths($allWidths) {
		$this->allWidths = $allWidths;
	}

	/**
	 * Get all widths
	 *
	 * @return array
	 */
	public function getAllWidths() {
		return $this->allWidths;
	}

	/**
	 * Aliased method
	 *
	 * @return array
	 */
	public function getResultSet() {
		return $this->getAllWidths();
	}
}
