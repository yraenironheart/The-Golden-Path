<?php
class ListStrategy extends Strategy implements StrategyInterface {

    /**
     * Remove HTML from text
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
