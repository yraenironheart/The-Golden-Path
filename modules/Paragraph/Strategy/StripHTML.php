<?php
class Paragraph_Strategy_StripHTML extends Paragraph_Strategy_Abstract implements Paragraph_Strategy_Interface {

    /**
     * Remove HTML from text
     */
    public function execute() {
		$this->setOutput(strip_tags($this->getInput()));
    }
}

