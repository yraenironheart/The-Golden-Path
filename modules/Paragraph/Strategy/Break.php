<?php
class Paragraph_Strategy_Break extends Paragraph_Strategy_Abstract implements Paragraph_Strategy_Interface {

    /**
     * Remove HTML from text
     */
    public function execute() {
		$this->setOutput(str_replace("\n", "<br />\n", $this->getInput()));
    }
}

