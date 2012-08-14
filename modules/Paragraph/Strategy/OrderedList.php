<?php
/**
 * Paragraph_Strategy_OrderedList
 *
 * Creates an ordered list from newline-separated input.
 *
 * User: Yraen Ironheart
 * Date: 1/11/11
 */
class Paragraph_Strategy_OrderedList extends Paragraph_Strategy_List {

	/**
	 * Execute strategy
	 *
	 * @return void
	 */
	public function execute() {
		parent::execute();

		$this->setOutput("<ol>\n" . $this->getOutput() . "\n</ol>");

		return $this;
	}
}
