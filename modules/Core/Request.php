<?php
/**
 * Request
 *
 * Encapsulates the $_GET and $_POST superglobals and can pass them around in
 * one nice object.
 *
 * User: Yraen Ironheart
 * Date: 1/11/11
 */
class Request {
	private $getArray = array();
	private $postArray = array();

	/**
	 * Remove all the variables used in the htaccess for routing
	 * Acquire all the GET and POST parameters and store them
	 */
	public function __construct() {
		unset($_REQUEST['app'], $_REQUEST['module'], $_REQUEST['method']);

		$this->setGetParameters();
		$this->setPostParameters();
	}

	/**
	 * Acquire all the GET parameters and filter them if needed
	 *
	 * @return void
	 */
	private function setGetParameters() {
		foreach(array_keys($_GET) as $currentKey) {
			$this->getArray[$currentKey] = $_GET[$currentKey];
		}
	}

	/**
	 * Acquire all the POST parameters and filter them if needed
	 *
	 * @return void
	 */
	private function setPostParameters() {
		foreach (array_keys($_POST) as $currentKey) {
			$this->postArray[$currentKey] = $_POST[$currentKey];
		}
	}

	/**
	 * Get a GET parameter
	 *
	 * @param  $key
	 * @return bool
	 */
	public function get($key) {
		if (isset($this->getArray[$key])) {
			return $this->getArray[$key];
		}

		return false;
	}

	/**
	 * Get a POST parameter
	 *
	 * @param  $key
	 * @return bool
	 */
	public function post($key) {
		if (isset($this->postArray[$key])) {
			return $this->postArray[$key];
		}

		return false;
	}
}