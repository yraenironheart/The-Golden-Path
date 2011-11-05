<?php
/**
 * Public_Paragraph_View
 *
 * A list of View actions, each of which would correspond to a similarly-named
 * Controller method, as directed by the FrontController.
 *
 * User: Yraen Ironheart
 * Date: 1/11/11
 */
class Public_Paragraph_View extends View {
	private $title = 'None';

	/**
	 * View for the Process controller method.
	 *
	 * @return void
	 */
	public function viewProcess() {

		/* If something was posted, process it
		 * otherwise show default emptiness
		 */
		if (isset($_POST['strategy'])) {
			$this->title = $_POST['strategy'];
		}

		$this->getTemplate()->blockReplace(array(
			'CONTENT' => $this->getControllerData(),
			'STRATEGY' => $this->title,
		));
	}
}
