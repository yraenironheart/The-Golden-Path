<?php
class GriddleStrategy extends Strategy implements StrategyInterface {

    /**
     * Neatly align assignments
     */
    public function execute() {
		$data = $this->getInput();

		/* Translate tabs to spaces
		 */
		$data = str_replace("\t", ' ', $data);

		$pattern = '/^([^=]+)\ \=(\ |>\ )\s*([^\n]+)/m';

		preg_match_all($pattern, $data, $matches);

		/* Find out how many spaces to pad with
		 */
		$max = $this->maxStringLength($matches[1]);

		$n = count($matches[1]);

		/* Add spaces
		 */
		for ($i=0, $output = ''; $i < $n; $i++) {
			$numSpaces = $max - strlen($matches[1][$i]);

			$row = "{$matches[1][$i]}{$this->createSpaces($numSpaces)} ={$matches[2][$i]}{$matches[3][$i]}\n";

			$output .= $row;
		}

		$this->setOutput(stripslashes($output));
    }

	/**
	 * Find out how long the longest assignment is
	 *
	 * @param $elements
	 */
	private function maxStringLength($elements) {
		$max = 0;

		foreach($elements as $currentElement) {
			$currentLength = strlen($currentElement);

			if ($currentLength > $max) {
				$max = $currentLength;
			}
		}

		return $max;
	}

	/**
	 * Create spaces to pad out assignment
	 *
	 * @param $numSpaces
	 */
	private function createSpaces($numSpaces) {
		$str = '';

		for ($i=0; $i < $numSpaces; $i++) {
			$str .= ' ';
		}

		return $str;
	}
}

