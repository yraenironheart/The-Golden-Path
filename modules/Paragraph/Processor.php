<?php
/**
 * Paragraph_Processor
 *
 * Stores a reference to a strategy object
 *
 * User: Yraen Ironheart
 * Date: 1/11/11
 */
class Paragraph_Processor {
    private $strategy = null;
	private $data = '';

	/**
	 * Constructor
	 *
	 * @param $strategyName
	 * @param $data
	 */
    public function __construct($strategyName, $data) {
        $this->produceStrategy($strategyName);

		$this->setData($data);
    }

	/**
	 * Loads and keeps reference to a strategy
	 * component.
	 *
	 * @param $strategy
	 */
    private function produceStrategy($strategy) {
        $class = 'Paragraph_Strategy_' . $strategy;

		try {
			$this->setStrategy(new $class());
		}
		catch (Exception $e) {
		}
    }

	/**
	 * Delegation method
	 *
	 * @return mixed
	 */
	public function execute() {
		$this->getStrategy()->setInput($this->getData());

		return $this->getStrategy()->execute()->getOutput();
	}

	/* Getters/Setters
	 */

	/**
	 * Set strategy
	 *
	 * @param $strategy
	 */
	private function setStrategy($strategy) {
		$this->strategy = $strategy;
	}

	/**
	 * Get strategy
	 *
	 * @return mixed
	 */
	private function getStrategy() {
		return $this->strategy;
	}

	/**
	 * Set data
	 *
	 * @param $data
	 */
	private function setData($data) {
		$this->data = $data;
	}

	/**
	 * Get data
	 *
	 * @return string
	 */
	private function getData() {
		return $this->data;
	}
}

