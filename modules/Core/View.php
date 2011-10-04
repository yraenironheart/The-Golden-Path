<?php
class View {
	protected $template = null;
	protected $controllerData = null;

	/**
	 * Use this to get access to the controller's output.
	 * Controller output is stored in $this->controllerData
	 *
	 * @param $controller
	 */
	public function __construct($controllerData, Template $template) {
		$this->setControllerData($controllerData);
		$this->setTemplate($template);
	}

	public function setControllerData($controllerData) {
		$this->controllerData = $controllerData;
	}

	public function getControllerData() {
		return $this->controllerData;
	}

	public function setTemplate(Template $template) {
		$this->template = $template;
	}

	public function getTemplate() {
		return $this->template;
	}

	/**
	 * Prints the processed template
	 */
	public function stdout() {
		echo $this->getTemplate()->getContent();
	}
}