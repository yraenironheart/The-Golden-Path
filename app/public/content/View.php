<?php
/**
 * Author: Yraen Ironheart
 * Date: 14/07/12
 * Time: 11:32 PM
 *
 *
 */
class Public_Content_View extends View {

	/**
	 * View test
	 */
	public function viewTestPresentable() {
		$region = $this->getControllerData();

		$output = $region->compileOutput()->getCompiledOutput();

		$this->getTemplate()->blockReplace(array(
			'CONTENT' => $output,
		));
	}

	/**
	 * View test
	 */
	public function viewTestEditable() {
		$this->viewTestPresentable();
	}
}
