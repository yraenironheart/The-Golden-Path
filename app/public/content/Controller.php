<?php
/**
 * Author: Yraen Ironheart
 * Date: 14/07/12
 * Time: 11:32 PM
 *
 *
 */
class Public_Content_Controller extends Controller {

	/**
	 * Test method for content
	 *
	 * @return Core_Content_Component_Template_Collection
	 */
	public function executeTest() {
		$layout = new Core_Content_Layout_Instance();

		return $layout;
	}

	public function executeGridmaker() {
		$facade = new Colonel_Facade(900, 1440, 32);
		$facade->process();
	}
}
