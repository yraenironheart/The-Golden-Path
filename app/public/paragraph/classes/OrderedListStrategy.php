<?php

class OrderedListStrategy extends ListStrategy {

	public function execute() {
		parent::execute();

		$this->setOutput("<ol>\n" . $this->getOutput() . "\n</ol>");
	}
}
