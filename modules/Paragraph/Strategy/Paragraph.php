<?php
/**
 * Paragraph_Strategy_Paragraph
 *
 * Creates paragraph tags around newline-separated input.
 *
 * User: Yraen Ironheart
 * Date: 1/11/11
 */
class Paragraph_Strategy_Paragraph extends Paragraph_Strategy_Abstract implements Paragraph_Strategy_Interface {

    /**
	 * Execute strategy
	 *
	 * @return void
	 */
    public function execute() {

		/* Condense double newlines into single newline
		 */
		$pattern[] = "/\n\n/im";
		$replace[] = "\n";

		/* Replace newlines with paragraph tags
		 */
		$pattern[] = "/([^\n]+)/im";
		$replace[] = "<p>\n\t$1\n</p>";

		/* Replace empty P tags
		 */
		$pattern[] = "/<p>\s*<\/p>/im";
		$replace[] = '';

		$this->setOutput(preg_replace($pattern, $replace, $this->getInput()));

		return $this;
    }
}

