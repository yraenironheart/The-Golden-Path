<?php
class FrontController {

	/**
	 * Determine how to construct a View, depending on the
	 * output of the prescribed Controller actions. Returns
	 * a preprocessed View.
	 *
	 * @param $viewMediator
	 */
	public static function build(ViewMediator $viewMediator, Request $request) {

		/* Names
		 */
		$controllerName = $viewMediator->getControllerName();
		$methodName = $viewMediator->getControllerMethod();

		$viewName = $viewMediator->getViewName();
		$viewMethod = $viewMediator->getViewMethod();

		/* Create and execute controller and view methods
		 */
		$controller = new $controllerName($request);

		if (method_exists($controller, $methodName)) {
			$controller->$methodName();
		}

		/* Set up template for view
		 */
		$template = $viewMediator->getTemplate();

		/* Set up view
		 */
		$view = new $viewName($controller->getData(), $template);

		if (method_exists($view, $viewMethod)) {
			$view->$viewMethod();
		}

		return $view;
	}
}
