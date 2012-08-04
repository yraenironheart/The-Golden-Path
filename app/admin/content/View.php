<?php
/**
 * Author: Yraen Ironheart
 * Date: 14/07/12
 * Time: 11:32 PM
 *
 *
 */
class Admin_Content_View extends View {

	/**
	 * View test
	 */
	public function viewTest() {
		$region = $this->getControllerData();

		$output = $region->compileOutput()->getCompiledOutput();

		$this->getTemplate()->blockReplace(array(
			'CONTENT' => $output,
		));
	}
}
