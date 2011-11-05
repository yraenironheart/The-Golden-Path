<?php
/**
 * Paragraph_Strategy_Abstract
 *
 * All paragraph processing strategies extend this.
 *
 * User: Yraen Ironheart
 * Date: 1/11/11
 */
abstract class Paragraph_Strategy_Abstract {
	private $input;
	private $output;

	/**
	 * Sets the input from the strategy
	 *
	 * @param $data
	 */
	public function setInput($data) {
		$this->input = $data;
	}

	/**
	 * Gets the input of the strategy
	 */
	public function getInput() {
		return $this->input;
	}

	/**
	 * Sets the output from the strategy
	 *
	 * @param $data
	 */
	protected function setOutput($data) {
		$this->output = $data;
	}

	/**
	 * Gets the output of the strategy
	 */
	public function getOutput() {
		return $this->output;
	}

	/**
	 * Default action to execute if no strategy components
	 * were chosen
	 */
	public function execute() {
	}
}
