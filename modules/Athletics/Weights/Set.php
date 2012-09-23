<?php
/**
 * Author: Yraen Ironheart
 * Date: 23/09/12
 * Time: 1:12 AM
 *
 *
 */
class Athletics_Weights_Set implements Iterator {
	private $setNumber = 1;
	private $allRepetitions = array();
	private $position = 0;

	/**
	 * Constructor
	 *
	 * @param $setNumber
	 */
	public function __construct($setNumber) {
		$this->setSetNumber($setNumber);
	}

	/**
	 * Accumulate a representation of this exercise instance
	 *
	 * @return string
	 */
	public function accumulateResults() {
		$cumulativeWeight = 0;

		for ($this->rewind(); $this->valid(); $this->next()) {
			$set = $this->current();

			$cumulativeWeight += $set->getWeight();
		}

		return $cumulativeWeight;
	}

	/**
	 * Add a rep to the set
	 *
	 * @param $repetition
	 */
	public function add($repetition) {
		array_push($this->allRepetitions, $repetition);
	}

	/* Iterator interface
	 */

	/**
	 * Get current item
	 *
	 * @return mixed
	 */
	public function current() {
		return $this->allRepetitions[$this->key()];
	}

	/**
	 * Get index
	 *
	 * @return int
	 */
	public function key() {
		return $this->position;
	}

	/**
	 * Increment index
	 */
	public function next() {
		$this->position++;
	}

	/**
	 * Rewind index
	 */
	public function rewind() {
		$this->position = 0;
	}

	/**
	 * Determine if the current element is valid
	 *
	 * @return bool
	 */
	public function valid() {
		if (isset($this->allRepetitions[$this->key()])) {
			return true;
		}

		return false;
	}

	/* Getters/Setters
	 */

	/**
	 * Set set number
	 *
	 * @param $setNumber
	 */
	private function setSetNumber($setNumber) {
		$this->setNumber = $setNumber;
	}

	/**
	 * Get set number
	 *
	 * @return int
	 */
	private function getSetNumber() {
		return $this->setNumber;
	}

	/**
	 * Set all repetitions
	 *
	 * @param $allRepetitions
	 */
	private function setAllRepetitions($allRepetitions) {
		$this->allRepetitions = $allRepetitions;
	}

	/**
	 * Get all repetitions
	 *
	 * @return array
	 */
	private function getAllRepetitions() {
		return $this->allRepetitions;
	}
}
