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
	public function viewTest() {
		$layout = $this->getControllerData();

		$output = $layout->compileOutput()->getCompiledOutput();

		$this->getTemplate()->blockReplace(array(
			'CONTENT' => $output,
		));
	}
}
