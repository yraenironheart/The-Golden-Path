<?php
/**
 * Controller
 *
 * Controller method for modules to extend. Contains references to a Request
 * object and the output data from the Controller method.
 *
 * User: Yraen Ironheart
 * Date: 1/11/11
 */
abstract class Controller {
	protected $data = '';
	protected $request = null;

	/**
	 * Constructor
	 *
	 * @param Request $request
	 */
	public function __construct(Request $request) {
		$this->setRequest($request);
	}

	/**
	 * Set Request instance
	 *
	 * @param  $request
	 * @return void
	 */
	public function setRequest($request) {
		$this->request = $request;
	}

	/**
	 * Get Request instance
	 *
	 * @return null
	 */
	public function getRequest() {
		return $this->request;
	}

	/**
	 * Gets data
	 *
	 * @return string
	 */
	public function getData() {
		return $this->data;
	}

	/**
	 * Sets data
	 *
	 * @param $data
	 */
	public function setData($data) {
		$this->data = $data;
	}

	/**
	 * Print json_encoded data for ajax
	 *
	 * @param  $data
	 * @return void
	 */
	protected function json($data) {
		echo json_encode($data);
	}
}