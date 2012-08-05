<?php
/**
 * Router
 *
 * Controls which app, module and method are utilised based on url structure.
 *
 * User: Yraen Ironheart
 * Date: 5/10/11
 */
class Router {
	private $request = null;

	/**
	 * Constructor
	 */
	public function __construct() {
		$this->setRequest(new Request());

		$components = explode('/', $this->getRequest()->get('route'));

		/* Load from the Public app by default
		 */
		if (count($components) < 3) {

			/* If nothing specified, load a default Content page
			 */
			if (!count(array_filter($components))) {
				$this->setAppName('public');
				$this->setModuleName('content');
				$this->setMethodName('test');
			}
			else {
				$this->setAppName('public');
				$this->setModuleName($this->filter($components[0]));
				$this->setMethodName($this->filter($components[1]));
			}
		}
		else {
			$this->setAppName($this->filter($components[0]));
			$this->setModuleName($this->filter($components[1]));
			$this->setMethodName($this->filter($components[2]));
		}
	}

	/**
	 * Filters data to ensure only valid characters are used
	 *
	 * @param  $data
	 * @return mixed
	 */
	private function filter($data) {
		return preg_replace('/[^a-zA-Z0-9\-]*/', '', $data);
	}

	/**
	 * Set app name
	 *
	 * @param  $appName
	 * @return void
	 */
	private function setAppName($appName) {
		$this->appName = $appName;
	}

	/**
	 * Get app name
	 *
	 * @return mixed
	 */
	public function getAppName() {
		return $this->appName;
	}

	/**
	 * Set module name
	 *
	 * @param  $moduleName
	 * @return void
	 */
	private function setModuleName($moduleName) {
		$this->moduleName = $moduleName;
	}

	/**
	 * Get module name
	 *
	 * @return mixed
	 */
	public function getModuleName() {
		return $this->moduleName;
	}

	/**
	 * Set method name
	 *
	 * @param  $methodName
	 * @return void
	 */
	private function setMethodName($methodName) {
		$this->methodName = $methodName;
	}

	/**
	 * Get method name
	 *
	 * @return mixed
	 */
	public function getMethodName() {
		return $this->methodName;
	}

	/**
	 * Set request
	 *
	 * @param Request $request
	 * @return void
	 */
	private function setRequest(Request $request) {
		$this->request = $request;
	}

	/**
	 * Get request
	 *
	 * @return null
	 */
	public function getRequest() {
		return $this->request;
	}

	/**
	 * Figure out the subdomain name.
	 * The theme is tied to this name.
	 *
	 * TODO: Implement properly
	 *
	 * @return string
	 */
	public function getSubdomainName() {
		return 'core';
	}
}
