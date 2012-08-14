<?php
/**
 * Paragraph_Strategy_Underscore
 *
 * Converts underscore to camel case.
 *
 * User: Yraen Ironheart
 * Date: 1/11/11
 */
class Paragraph_Strategy_Underscore extends Paragraph_Strategy_Abstract implements Paragraph_Strategy_Interface {

	/**
	 * Execute strategy
	 *
	 * @return void
	 */
	public function execute() {
		$data = trim($this->getInput());

		$pattern = '/([^_]*)_([a-zA-Z])([^_]*)/m';

		preg_match_all($pattern, $data, $matches);

		if (isset($matches[3][0])) {
			$str = $matches[1][0];

			for ($i=0; $i<count($matches[3]); $i++) {
				$str .= strtoupper($matches[2][$i]) . $matches[3][$i];
			}
		}
		else {
			$str = $data;
		}

		$this->setOutput($str);

		return $this;
	}
}
