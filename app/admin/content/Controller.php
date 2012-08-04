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
	 * Test method for content
	 *
	 * @return Core_Content_Region
	 */
	public function executeTest() {
		$region = new Core_Content_Region_Instance_Editable(new Core_Content_Component_Template_TestEditable());

		return $region;
	}
}
