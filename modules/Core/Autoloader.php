<?php
/**
 * Autoloader
 *
 * Automatically load class files in the app
 *
 * User: Yraen Ironheart
 * Date: 3/10/11
 */
class Autoloader {

	/**
	 * Define autoloader method in class format
	 *
	 * @param  $file
	 */
	public function __construct() {
		spl_autoload_register(null, false);
		spl_autoload_extensions('.php');
		spl_autoload_register(array($this, 'essentialLoader'));
	}

	/**
	 * Load a class
	 *
	 * @param  $file
	 * @return
	 */
	public function essentialLoader($file) {
		$path = implode('/', explode('_', $file)) . '.php';

		$allPaths = array(
			dirname(__FILE__) . '/' . $path,
			dirname(__FILE__) . '/../../modules/' . $path,
			dirname(__FILE__) . '/../../app/' . $path,
		);

		foreach($allPaths as $currentPath) {
			if (file_exists($currentPath)) {
				require_once($currentPath);
				break;
			}
		}

		return;
	}
}
