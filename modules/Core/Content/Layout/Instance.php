<?php
/**
 * Author: Yraen Ironheart
 * Date: 5/08/12
 * Time: 5:21 AM
 *
 *
 */
class Core_Content_Layout_Instance {

	/* Compiled output containing all the data instances
	 * arranged in the format defined by $structure
	 */
	protected $compiledOutput = '';

	/* Iterator
	 */
	protected $stack = array();
	protected $position = 0;

	/* Template used by this Layout instance
	 */
	private $template = null;

	/**
	 * Constructor
	 */
	public function __construct() {
		$this->setTemplate(new Core_Content_Layout_Template());

		$region1 = new Core_Content_Region_Instance_Presentable(new Core_Content_Component_Template_TestPresentable());
		$region1->setKey('LEFTCOLUMN');

		$region2 = new Core_Content_Region_Instance_Presentable(new Core_Content_Component_Template_TestPresentable());
		$region2->setKey('RIGHTCOLUMN');

		$region3 = new Core_Content_Region_Instance_Presentable(new Core_Content_Component_Template_TestPresentable());
		$region3->setKey('BOTTOM');

		$this->addComponent($region1);
		$this->addComponent($region2);
		$this->addComponent($region3);
	}

	/**
	 * Add a region data instance to the stack
	 *
	 * @param Core_Content_Region_Instance_Abstract $region
	 */
	public function addComponent(Core_Content_Region_Instance_Abstract $region) {
		$this->stack[] = $region;
	}

	/**
	 * Compile all the contents of this template
	 *
	 * @return \Core_Content_Component_Template_Instance_Abstract
	 */
	public function compileOutput() {
		$processed = $this->getTemplate()->getStructure();

		for ($this->rewind(); $this->valid(); $this->next()) {
			$regionData = $this->current();

			$processed = str_replace('{' . $regionData->getKey() .'}', $regionData->compileOutput()->getCompiledOutput(), $processed);
		}

		$this->setCompiledOutput($processed);

		return $this;
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
	 * Set compiled output
	 *
	 * @param $compiledOutput
	 */
	public function setCompiledOutput($compiledOutput) {
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

	/**
	 * Set template
	 *
	 * @param $template
	 */
	private function setTemplate($template) {
		$this->template = $template;
	}

	/**
	 * Get template
	 *
	 * @return null
	 */
	private function getTemplate() {
		return $this->template;
	}


}
