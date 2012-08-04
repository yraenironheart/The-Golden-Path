<?php
/**
 * Author: Yraen Ironheart
 * Date: 15/07/12
 * Time: 12:19 AM
 *
 * A collection of Core_Component_Template_Instance objects. Uses Iterator
 * to traverse the objects.
 */
class Core_Content_Component_Template_Collection implements Iterator {

	/* An array of Core_Content_Component_Template_Instances
	 */
	private $stack = array();

	/* Iterator
	 */
	private $position = 0;

	/**
	 * Add a template instance to the stack
	 *
	 * @param Core_Content_Component_Template_Instance_Abstract $template
	 */
	public function add(Core_Content_Component_Template_Instance_Abstract $template) {
		$this->stack[] = $template;
	}

	/* Iterator Interface
	 */

	/**
	 * Current collection element position
	 *
	 * @return mixed
	 */
	public function current() {
		return $this->stack[$this->getPosition()];
	}

	/**
	 * Current index
	 *
	 * @return int
	 */
	public function key() {
		return $this->getPosition();
	}

	/**
	 * Next collection element position
	 */
	public function next() {
		++$this->position;
	}

	/**
	 * Go to start of collection
	 */
	public function rewind() {
		$this->position = 0;
	}

	/**
	 * Check validity
	 *
	 * @return bool
	 */
	public function valid() {
		return isset($this->stack[$this->getPosition()]);
	}

	/**
	 * Get position
	 *
	 * @return int
	 */
	private function getPosition() {
		return $this->position;
	}
}
