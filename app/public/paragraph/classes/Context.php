<?php
class Context {
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
        $class = $strategy . 'Strategy';

        $this->strategy = new $class;
    }
}

