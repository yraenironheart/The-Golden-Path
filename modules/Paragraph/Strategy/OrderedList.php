<?php

class Paragraph_Strategy_OrderedList extends Paragraph_Strategy_List {

	public function execute() {
		parent::execute();

		$this->setOutput("<ol>\n" . $this->getOutput() . "\n</ol>");
	}
}
