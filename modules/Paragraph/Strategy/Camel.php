<?php
/**
 * Paragraph_Strategy_Camel
 *
 * Converts camel case input to underscore-separated.
 *
 * User: Yraen Ironheart
 * Date: 1/11/11
 */
class Paragraph_Strategy_Camel extends Paragraph_Strategy_Abstract implements Paragraph_Strategy_Interface {

	/**
	 * Execute strategy
	 *
	 * @return void
	 */
	public function execute() {
		$data = trim($this->getInput());

		$pattern = '/([^A-Z]*)([A-Z])([^A-Z]*)/m';

		preg_match_all($pattern, $data, $matches);

		if (isset($matches[1][0])) {
			$str = $matches[1][0];

			for ($i=0; $i<count($matches[0]); $i++) {
				$str .= '_' . strtolower($matches[2][$i]);
				$str .= $matches[3][$i];
			}
		}
		else {
			$str = $data;
		}

		$this->setOutput($str);
	}
}
