<?php
/**
 * Author: Yraen Ironheart
 * Date: 22/09/12
 * Time: 12:43 PM
 *
 * json_decodes a string
 */
class Paragraph_Strategy_JsonDecode extends Paragraph_Strategy_Abstract implements Paragraph_Strategy_Interface {

    /**
	 * Execute strategy
	 *
	 * @return void
	 */
    public function execute() {
		ob_start();
		echo json_decode($this->getInput());
		$this->setOutput(ob_get_contents());
		ob_end_clean();

		return $this;
    }
}

