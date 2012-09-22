<?php
/**
 * Author: Yraen Ironheart
 * Date: 8/08/12
 * Time: 9:53 PM
 *
 *
 */
class Core_Agglutinator_Css extends Core_Agglutinator_Abstract {
	protected $filetype = 'css';

	/**
	 * Stream it
	 */
	public function stream() {
		header('Content-Type: text/css');
		echo $this->getData();
	}
}
