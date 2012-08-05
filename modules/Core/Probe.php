<?php
/**
 * Author: Yraen Ironheart
 * User: Sarif
 * Date: 24/06/12
 * Time: 2:46 PM
 *
 * Variable dumper
 */
class Core_Probe {

	/**
	 * Output using print_r
	 *
	 * @param $data
	 */
	static public function dump($data) {
		echo "<PRE>";
		print_r($data);
		echo "</PRE>";
	}
}
