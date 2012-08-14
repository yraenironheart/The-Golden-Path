<?php
/**
 * Public_Paragraph_Controller
 *
 * Controller methods for the Paragraph application.
 *
 * User: Yraen Ironheart
 * Date: 1/11/11
 */
class Public_Paragraph_Controller extends Controller {

	/**
	 * Test ajax responses
	 *
	 * @return void
	 */
	public function executeTestAjax() {
		$this->json(array(
			'moog' => 2,
			'test' => 4
		));
	}

	/**
	 * Process input
	 *
	 * @return void
	 */
	public function executeProcess() {
		if ($this->getRequest()->post('strategy')) {
			$strategy = $this->getRequest()->post('strategy');
		}

		if ($this->getRequest()->post('data')) {
			$data = $this->getRequest()->post('data');
		}

		if (isset($strategy)) {
			$processor = new Paragraph_Processor($strategy, $data);

			return $processor->execute();
		}
	}
}