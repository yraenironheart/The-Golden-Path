<?php
/**
 * Author: Yraen Ironheart
 * Date: 23/09/12
 * Time: 1:16 AM
 *
 *
 */
class Athletics_Weights_Exercise {
	private $name = '';
	private $date = '';
	private $allSets = array();
	private $position = 0;

	/**
	 * Constructor
	 *
	 * @param $date
	 * @param $name
	 */
	public function __construct($date, $name) {
		$this->setDate(date('U', strtotime($date)));
		$this->setName($name);
	}


	/**
	 * Add an item to the stack
	 *
	 * @param $set
	 */
	public function add($set) {
		array_push($this->allSets, $set);
	}

	/* Iterator interface
	 */

	/**
	 * Get current item
	 *
	 * @return mixed
	 */
	public function current() {
		return $this->allSets[$this->key()];
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
		if (isset($this->allSets[$this->key()])) {
			return true;
		}

		return false;
	}

	/**
	 * Get a particular set
	 *
	 * @param $index
	 * @return mixed
	 */
	public function getSet($index) {
		return $this->allSets[$index];
	}

	/**
	 * Set all sets
	 *
	 * @param $allSets
	 */
	private function setAllSets($allSets) {
		$this->allSets = $allSets;
	}

	/**
	 * Get all sets
	 *
	 * @return array
	 */
	private function getAllSets() {
		return $this->allSets;
	}

	/**
	 * Set name
	 *
	 * @param $name
	 */
	private function setName($name) {
		$this->name = $name;
	}

	/**
	 * Get name
	 *
	 * @return string
	 */
	private function getName() {
		return $this->name;
	}

	/**
	 * Set date
	 *
	 * @param $date
	 */
	private function setDate($date) {
		$this->date = $date;
	}

	/**
	 * Get date
	 *
	 * @return string
	 */
	public function getDate() {
		return $this->date;
	}
}
