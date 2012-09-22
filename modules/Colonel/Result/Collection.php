<?php
/**
 * Author: Yraen Ironheart
 * Date: 22/09/12
 * Time: 5:39 PM
 *
 *
 */
class Colonel_Result_Collection implements Iterator {
	private $allWidths = array();
	private $position = 0;

	/**
	 * Constructor
	 */
	public function __construct() {
	}

	/**
	 * Add an item to the stack
	 *
	 * @param $item
	 */
	public function add($item) {
		$this->allWidths[] = $item;
	}

	/* Iterator interface
	 */

	/**
	 * Get current item
	 *
	 * @return mixed
	 */
	public function current() {
		return $this->allWidths[$this->key()];
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
		if (isset($this->allWidths[$this->key()]) && is_array($this->allWidths[$this->key()])) {
			return true;
		}

		return false;
	}
}
