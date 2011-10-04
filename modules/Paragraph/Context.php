<?php
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

