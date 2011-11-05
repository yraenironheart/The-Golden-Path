<?php
/**
 * Paragraph_Strategy_MinifyCSS
 *
 * Minifies CSS input.
 *
 * User: Yraen Ironheart
 * Date: 1/11/11
 */
class Paragraph_Strategy_MinifyCSS extends Paragraph_Minify implements Paragraph_Strategy_Interface {

    /**
	 * Execute strategy
	 *
	 * @return void
	 */
    public function execute() {
		parent::execute();

		/* CSS Code Syntax Specific.
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
