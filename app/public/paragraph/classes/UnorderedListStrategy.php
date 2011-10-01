<?php

class UnorderedListStrategy extends ListStrategy {

	public function execute() {
		parent::execute();

		$this->setOutput("<ul>\n" . $this->getOutput() . "\n</ul>");
	}
}
