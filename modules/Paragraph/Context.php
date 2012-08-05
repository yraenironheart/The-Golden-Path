<?php
/**
 * Paragraph_Context
 *
 * Stores a reference to a strategy object
 *
 * User: Yraen Ironheart
 * Date: 1/11/11
 */
class Paragraph_Context {
    public $strategy = null;

	/**
	 * Constructor
	 *
	 * @param $strategy
	 */
    public function __construct($strategy) {
        $this->setStrategy($strategy);
    }

	/* Getters/Setters
	 */

	/**
	 * Loads and keeps reference to a strategy
	 * component.
	 *
	 * @param $strategy
	 */
    private function setStrategy($strategy) {
        $class = 'Paragraph_Strategy_' . $strategy;

        $this->strategy = new $class();
    }

	/**
	 * Get strategy
	 *
	 * @return mixed
	 */
	public function getStrategy() {
		return $this->strategy;
	}
}

