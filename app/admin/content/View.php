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
	public function viewTestRegion() {
		$editable = $this->getControllerData();

		$this->getTemplate()->blockReplace(array(
			'CONTENT_LEFT' => $editable->compileOutput()->getCompiledOutput(),
			'CONTENT_RIGHT' => '',
		));
	}

	/**
	 * Preview output. This should be an html fragment as it's ajaxed
	 * into the preview panel
	 */
	public function viewPreview() {
		$preview = $this->getControllerData();

		echo $preview->compileOutput()->getCompiledOutput();
	}
}
