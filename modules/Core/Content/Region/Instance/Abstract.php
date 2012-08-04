<?php
/**
 * Author: Yraen Ironheart
 * Date: 22/07/12
 * Time: 6:17 PM
 *
 * A Core_Content_Region contains a collection of Core_Content_Component_Template
 * instances. Multiple Core_Content_Regions exist in a Core_Content_Layout instance.
 */
abstract class Core_Content_Region_Instance_Abstract implements Iterator, Core_Content_Interface {
	protected $regionId = -1;
	protected $layoutTemplateId = -1;
	protected $key = '';

	/* Compiled output containing all the template instances
	 */
	protected $compiledOutput = '';

	/* An array of Core_Content_Component_Template_Collection instances
	 */
	protected $stack = array();

	/* Iterator
	 */
	protected $position = 0;

	/**
	 * Constructor
	 *
	 * Takes a Core_Content_Component_Template_Test* to generate some
	 * test data
	 *
	 * @param $testStructure
	 */
	public function __construct($testStructure) {
		$templateCollection = new Core_Content_Component_Template_Collection();
		$templateCollection->add($testStructure->generateHeading());
		$templateCollection->add($testStructure->generateBody());
		$templateCollection->add($testStructure->generateImage());

		$this->add($templateCollection);
		$this->add($templateCollection);
		$this->add($templateCollection);
	}

	/**
	 * Add a template instance to the stack
	 *
	 * @param Core_Content_Component_Template_Collection $collection
	 */
	public function add(Core_Content_Component_Template_Collection $collection) {
		$this->stack[] = $collection;
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
	protected function getPosition() {
		return $this->position;
	}

	/* Getters/Setters
	 */

	/**
	 * Set compiled output
	 *
	 * @param $compiledOutput
	 */
	protected function setCompiledOutput($compiledOutput) {
		$this->compiledOutput = $compiledOutput;
	}

	/**
	 * Get compiled output
	 *
	 * @return string
	 */
	public function getCompiledOutput() {
		return $this->compiledOutput;
	}
}
