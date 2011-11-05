<?php
/**
 * Paragraph_Strategy_UnorderedList
 *
 * Creates an unordered list from newline-separated input.
 *
 * User: Yraen Ironheart
 * Date: 1/11/11
 */
class Paragraph_Strategy_UnorderedList extends Paragraph_Strategy_List {

	/**
	 * Execute strategy
	 *
	 * @return void
	 */
	public function execute() {
		parent::execute();

		$this->setOutput("<ul>\n" . $this->getOutput() . "\n</ul>");
	}
}
