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
    public $strategy;

    /**
     * Constructor
     */
    public function __construct($strategy) {
        $this->setStrategy($strategy);
    }

    /**
     * Loads and keeps reference to a strategy
     * component.
     */
    private function setStrategy($strategy) {
        $class = 'Paragraph_Strategy_' . $strategy;

        $this->strategy = new $class;
    }
}

