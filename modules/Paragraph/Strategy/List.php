<?php
/**
 * Paragraph_Strategy_List
 *
 * Creates list structure from newline-separated content.
 *
 * User: Yraen Ironheart
 * Date: 1/11/11
 */
class Paragraph_Strategy_List extends Paragraph_Strategy_Abstract implements Paragraph_Strategy_Interface {

    /**
	 * Execute strategy
	 *
	 * @return void
	 */
    public function execute() {

		$data = $this->getInput() . "\n";

		/* Condense double newlines into single newline
		 */
		$pattern[] = '/\n\n/im';
		$replace[] = "\n";

		/* Replace newlines with list tags
		 */
		$pattern[] = '/([^\n]+)\n/im';
		$replace[] = "\t<li>\n\t\t$1\n\t</li>\n";

		/* Remove list tags which may be empty or contain
		 * a newline
		 */
		$pattern[] = '/<li>[\n\s]*<\/li>/im';
		$replace[] = '';

		/* Remove empty newlines
		 */
		$pattern[] = '/^\n/m';
		$replace[] = '';

		$this->setOutput(preg_replace($pattern, $replace, $data));
    }
}
