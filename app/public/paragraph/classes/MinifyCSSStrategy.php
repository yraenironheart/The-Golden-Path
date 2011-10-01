<?php
class MinifyCSSStrategy extends Minify implements StrategyInterface {

    /**
     * Remove HTML from text
     */
    public function execute() {
		parent::execute();

		/* Code Syntax Specific.
		 * Remove spaces around colons.
		 * Remove spaces after semicolons.
		 * Remove spaces around curly braces.
		 * Remove spaces around commas.
		 */
		$pattern[] = '/\s*(:|;|{|}|,)\s*/';
		$replace[] = "$1";

		$data = trim($this->getOutput());
		$data = preg_replace($pattern, $replace, $data);

		$this->setOutput($data);
    }
}
