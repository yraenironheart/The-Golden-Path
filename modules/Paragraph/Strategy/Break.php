<?php
/**
 * Paragraph_Strategy_Break
 *
 * Creates break elements <br /> for newline-separated input.
 *
 * User: Yraen Ironheart
 * Date: 1/11/11
 */
class Paragraph_Strategy_Break extends Paragraph_Strategy_Abstract implements Paragraph_Strategy_Interface {

    /**
	 * Execute strategy
	 *
	 * @return void
	 */
    public function execute() {
		$this->setOutput(str_replace("\n", "<br />\n", $this->getInput()));
    }
}

