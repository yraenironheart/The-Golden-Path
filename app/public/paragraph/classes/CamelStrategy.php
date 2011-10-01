<?php
class CamelStrategy extends Strategy implements StrategyInterface {

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
