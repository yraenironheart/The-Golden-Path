<?php
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
	 * Process the entered text
	 */
	public function executeProcess() {
		if ($this->getRequest()->post('strategy')) {
			$strategy = $this->getRequest()->post('strategy');
		}

		if ($this->getRequest()->post('data')) {
			$data = $this->getRequest()->post('data');
		}

		if (isset($strategy)) {
			$context = new Paragraph_Context($strategy);
			$context->strategy->setInput($data);
			$context->strategy->execute();

			$this->setData($context->strategy->getOutput());
		}
	}
}