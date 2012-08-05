<?php
/**
 * Author: Yraen Ironheart
 * Date: 14/07/12
 * Time: 11:32 PM
 *
 *
 */
class Admin_Content_Controller extends Controller {

	/**
	 * Test method for Content Editable
	 *
	 * @return Core_Content_Region
	 */
	public function executeTestRegion() {
		$editable = new Core_Content_Region_Instance_Editable(new Core_Content_Component_Template_TestEditable());

		return $editable;
	}

	/**
	 * Test method for Content Preview
	 *
	 * @return Core_Content_Region_Instance_Editable
	 */
	public function executePreview() {
		$layout = new Core_Content_Layout_Instance();

		return $layout;
	}
}
