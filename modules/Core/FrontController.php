<?php
/**
 * FrontController
 *
 * This class encompasses the interaction between Controller's output and View
 * methods. This is an implementation of the Mediator design pattern.
 *
 * User: Yraen Ironheart
 * Date: 1/11/11
 */
class FrontController {
	private $controllerName;
	private $controllerMethod;
	private $viewName;
	private $viewMethod;
	private $template = null;
	private $view = null;
	private $router = null;

	/**
	 * Constructor
	 */
	public function __construct() {
		$this->setRouter(new Router());
		$this->setControllerName();
		$this->setControllerMethod();
		$this->setViewName();
		$this->setViewMethod();
		$this->setTemplate();
	}

	/**
	 * Determine how to construct a View, depending on the
	 * output of the prescribed Controller actions. Returns
	 * a preprocessed View.
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
		$controller = new $controllerName($this->getRouter()->getRequest());

		if (method_exists($controller, $methodName)) {
			$controller->setData($controller->$methodName());
		}

		/* Set up view
		 */
		$view = new $viewName($controller->getData(), $this->getTemplate());

		if (method_exists($view, $viewMethod)) {
			$view->$viewMethod();
		}

		$this->setView($view);
	}

	/**
	 * Set controller name
	 *
	 * @return void
	 */
	public function setControllerName() {
		$controllerName = array(
			ucwords($this->getRouter()->getAppName()),
			ucwords($this->getRouter()->getModuleName()),
			'Controller'
		);

		$this->controllerName = implode('_', $controllerName);
	}

	/**
	 * Get controller name
	 *
	 * @return
	 */
	public function getControllerName() {
		return $this->controllerName;
	}

	/**
	 * Set controller method
	 *
	 * @return void
	 */
	public function setControllerMethod() {
		$this->controllerMethod = 'execute' . ucwords($this->getRouter()->getMethodName());
	}

	/**
	 * Get controller method
	 *
	 * @return
	 */
	public function getControllerMethod() {
		return $this->controllerMethod;
	}

	/**
	 * Set view name
	 *
	 * @return void
	 */
	public function setViewName() {
		$viewName = array(
			ucwords($this->getRouter()->getAppName()),
			ucwords($this->getRouter()->getModuleName()),
			'View'
		);

		$this->viewName = implode('_', $viewName);
	}

	/**
	 * Get view name
	 *
	 * @return
	 */
	public function getViewName() {
		return $this->viewName;
	}

	/**
	 * Set view method
	 *
	 * @return void
	 */
	public function setViewMethod() {
		$this->viewMethod = 'view' . ucwords($this->getRouter()->getMethodName());
	}

	/**
	 * Get view method
	 *
	 * @return
	 */
	public function getViewMethod() {
		return $this->viewMethod;
	}

	/**
	 * Set template
	 *
	 * @return void
	 */
	public function setTemplate() {
		$this->template = new Template($this->getRouter());
	}

	/**
	 * Get template
	 *
	 * @return null
	 */
	public function getTemplate() {
		return $this->template;
	}

	/**
	 * Get view
	 *
	 * @return null
	 */
	public function getView() {
		return $this->view;
	}

	/**
	 * Set view
	 *
	 * @param View $view
	 * @return void
	 */
	private function setView(View $view) {
		$this->view = $view;
	}

	/**
	 * Set router
	 *
	 * @param Router $router
	 * @return void
	 */
	private function setRouter(Router $router) {
		$this->router = $router;
	}

	/**
	 * Get router
	 *
	 * @return null
	 */
	public function getRouter() {
		return $this->router;
	}
}
