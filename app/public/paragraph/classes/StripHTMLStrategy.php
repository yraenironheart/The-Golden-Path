<?php
class StripHTMLStrategy extends Strategy implements StrategyInterface {

    /**
     * Remove HTML from text
     */
    public function execute() {
		$this->setOutput(strip_tags($this->getInput()));
    }
}

