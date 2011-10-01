<?php

class ViewMediator {
	private $moduleName;
	private $methodName;

	private $appName;
	private $controllerName;
	private $controllerMethod;
	private $viewName;
	private $viewMethod;

	private $template = null;

	public function __construct() {
		$clean['app'] = preg_replace('/[^a-zA-Z0-9\-]*/', '', $_GET['app']);
		$clean['module'] = preg_replace('/[^a-zA-Z0-9\-]*/', '', $_GET['module']);
		$clean['method'] = preg_replace('/[^a-zA-Z0-9\-]*/', '', $_GET['method']);

		/* TODO: Set default app/controller parameters
		 */

		/* Set specified controller modules and methods
		 */
		$this->setModuleName($clean['module']);
		$this->setMethodName($clean['method']);

		/* Which app to use
		 */
		$this->setAppName($clean['app']);

		/* Set up controller and view methods
		 */
		$this->setControllerName();
		$this->setControllerMethod();
		$this->setViewName();
		$this->setViewMethod();

		/* Select template
		 */
		$this->setTemplate();
	}

	public function setAppName($appName) {
		$this->appName = $appName;
	}

	public function getAppName() {
		return $this->appName;
	}

	public function setModuleName($moduleName) {
		$this->moduleName = $moduleName;
	}

	public function getModuleName() {
		return $this->moduleName;
	}

	public function setMethodName($methodName) {
		$this->methodName = $methodName;
	}

	public function getMethodName() {
		return $this->methodName;
	}

	public function setControllerName() {
		$this->controllerName = ucwords($this->getAppName()) . ucwords($this->getModuleName()) . 'Controller';
	}

	public function getControllerName() {
		return $this->controllerName;
	}

	public function setControllerMethod() {
		$this->controllerMethod = 'execute' . ucwords($this->getMethodName());
	}

	public function getControllerMethod() {
		return $this->controllerMethod;
	}

	public function setViewName() {
		$this->viewName = ucwords($this->getAppName()) . ucwords($this->getModuleName()) . 'View';
	}

	public function getViewName() {
		return $this->viewName;
	}

	public function setViewMethod() {
		$this->viewMethod = 'view' . ucwords($this->getMethodName());
	}

	public function getViewMethod() {
		return $this->viewMethod;
	}

	public function setTemplate() {
		$this->template = new Template($this->getAppName(), $this->getModuleName(), $this->getMethodName());
	}

	public function getTemplate() {
		return $this->template;
	}
}