<?php
/**
 * Paragraph_Strategy_StripHTML
 *
 * Removes HTML from input.
 *
 * User: Yraen Ironheart
 * Date: 1/11/11
 */
class Paragraph_Strategy_StripHTML extends Paragraph_Strategy_Abstract implements Paragraph_Strategy_Interface {

	/**
	 * Execute strategy
	 *
	 * @return void
	 */
    public function execute() {
		$this->setOutput(strip_tags($this->getInput()));
    }
}

