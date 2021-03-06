<?php
/**
 * Paragraph_Minify
 *
 * Minifies HTML content.
 *
 * User: Yraen Ironheart
 * Date: 1/11/11
 */
class Paragraph_Minify extends Paragraph_Strategy_Abstract {

    /**
     * Remove HTML from text
     */
    public function execute() {
		$pattern = array();
		$replace = array();

		/* Remove single-line HTML comments in my personal
		 * style, preserving <!-- --> because it counters
		 * an internet explorer deficiency
		 */
		$pattern[] = '/<!-- (.*) -->/m';
		$replace[] = '';

		/* C-style commentary removal
		 */
		$pattern[] = '#/\*(?:[^*]*(?:\*(?!/))*)*\*/#';
		$replace[] = '';

		/* Remove whitespace characters that occur at the
		 * beginning of each line
		 */
		$pattern[] = '/^\s+/m';
		$replace[] = '';

		/* Remove whitespace characters that occur at the
		 * end of each line
		 */
		$pattern[] = '/\s+$/m';
		$replace[] = '';

		/* Remove tabs and newlines characters that
		 * occur elsewhere
		 */
		$pattern[] = '/[\r\n\t]*/';
		$replace[] = '';

		/* Push tags together
		 */
		$pattern[] = '/>\ +</';
		$replace[] = '><';

		$data = trim($this->getInput());
		$data = preg_replace($pattern, $replace, $data);
		$data = htmlentities($data);

		$this->setOutput($data);
    }
}
