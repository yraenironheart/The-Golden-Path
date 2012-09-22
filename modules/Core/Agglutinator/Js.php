<?php
/**
 * Author: Yraen Ironheart
 * Date: 8/08/12
 * Time: 9:53 PM
 *
 *
 */
class Core_Agglutinator_Js extends Core_Agglutinator_Abstract {
	protected $filetype = 'js';

	/**
	 * Stream it
	 */
	public function stream() {
		header('Content-Type: application/javascript');
		echo $this->getData();
	}
}
