<?php
class ParagraphStrategy extends Strategy implements StrategyInterface {

    /**
     * Apply paragraph tags 
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
    }
}

