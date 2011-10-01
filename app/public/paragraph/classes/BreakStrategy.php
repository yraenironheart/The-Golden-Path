<?php
class BreakStrategy extends Strategy implements StrategyInterface {

    /**
     * Remove HTML from text
     */
    public function execute() {
		$this->setOutput(str_replace("\n", "<br />\n", $this->getInput()));
    }
}

