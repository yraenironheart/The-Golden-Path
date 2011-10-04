<?php
class FrontController {
	private $moduleName;
	private $methodName;
	private $appName;
	private $controllerName;
	private $controllerMethod;
	private $viewName;
	private $viewMethod;
	private $template = null;
	private $request = null;
	private $view = null;

	/**
	 * @param Request $request
	 */
	public function __construct(Request $request) {
		$this->setRequest($request);

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

		/* Build resultant view
		 */
		$this->build();
	}

	/**
	 * Determine how to construct a View, depending on the
	 * output of the prescribed Controller actions. Returns
	 * a preprocessed View.
	 *
	 * @param $viewMediator
	 */
	public function build() {

		/* Names
		 */
		$controllerName = $this->getControllerName();
		$methodName = $this->getControllerMethod();

		$viewName = $this->getViewName();
		$viewMethod = $this->getViewMethod();

		/* Create and execute controller and view methods
		 */
		$controller = new $controllerName($this->getRequest());

		if (method_exists($controller, $methodName)) {
			$controller->$methodName();
		}

		/* Set up view
		 */
		$view = new $viewName($controller->getData(), $this->getTemplate());

		if (method_exists($view, $viewMethod)) {
			$view->$viewMethod();
		}

		$this->setView($view);
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
		$controllerName = array(
			ucwords($this->getAppName()),
			ucwords($this->getModuleName()),
			'Controller'
		);

		$this->controllerName = implode('_', $controllerName);
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
		$viewName = array(
			ucwords($this->getAppName()),
			ucwords($this->getModuleName()),
			'View'
		);

		$this->viewName = implode('_', $viewName);
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

	private function setRequest(Request $request) {
		$this->request = $request;
	}

	private function getRequest() {
		return $this->request;
	}

	public function getView() {
		return $this->view;
	}

	private function setView(View $view) {
		$this->view = $view;
	}
}
