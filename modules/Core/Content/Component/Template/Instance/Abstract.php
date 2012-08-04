<?php
/**
 * Author: Yraen Ironheart
 * Date: 14/07/12
 * Time: 11:39 PM
 *
 * A Core_Content_Component_Template_Instance contains a collection of
 * Core_Content_Component_Data_Instance instances. Each editable/presentable
 * part of a component template is associated with the data that goes in it
 * and the abstraction allows different "views" of the same data.
 */
abstract class Core_Content_Component_Template_Instance_Abstract implements Iterator, Core_Content_Interface {
	protected $componentTemplateInstanceId = -1;

	/* Content structure
	 */
	protected $structure = '';

	/* Compiled output containing all the data instances
	 * arranged in the format defined by $structure
	 */
	protected $compiledOutput = '';

	/* Iterator
	 */
	protected $stack = array();
	protected $position = 0;

	/**
	 * Constructor
	 */
	public function __construct() {
	}

	/**
	 * Compile all the contents of this template
	 *
	 * @return \Core_Content_Component_Template_Instance_Abstract
	 */
	public function compileOutput() {
		$processed = $this->getStructure();

		for ($this->rewind(); $this->valid(); $this->next()) {
			$componentData = $this->current();

			$processed = str_replace('{' . $componentData->getKey() .'}', $componentData->getData(), $processed);
		}

		$this->setCompiledOutput($processed);

		return $this;
	}

	/**
	 * Add a component data instance to the stack
	 *
	 * @param Core_Content_Component_Data_Instance $component
	 */
	public function addComponent(Core_Content_Component_Data_Instance $component) {
		$this->stack[] = $component;
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

	/* Getters/Setters
	 */

	/**
	 * Set component template instance id
	 *
	 * @param $componentTemplateInstanceId
	 */
	public function setComponentTemplateInstanceId($componentTemplateInstanceId) {
		$this->componentTemplateInstanceId = $componentTemplateInstanceId;
	}

	/**
	 * Get component template instance id
	 *
	 * @return int
	 */
	public function getComponentTemplateInstanceId() {
		return $this->componentTemplateInstanceId;
	}

	/**
	 * Set stack
	 *
	 * @param $stack
	 */
	public function setStack($stack) {
		$this->stack = $stack;
	}

	/**
	 * Get stack
	 *
	 * @return array
	 */
	public function getStack() {
		return $this->stack;
	}

	/**
	 * Set structure
	 *
	 * @param $structure
	 */
	public function setStructure($structure) {
		$this->structure = $structure;
	}

	/**
	 * Get structure
	 *
	 * @return string
	 */
	public function getStructure() {
		return $this->structure;
	}

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
