<?php

class Paragraph_Strategy_UnorderedList extends Paragraph_Strategy_List {

	public function execute() {
		parent::execute();

		$this->setOutput("<ul>\n" . $this->getOutput() . "\n</ul>");
	}
}
