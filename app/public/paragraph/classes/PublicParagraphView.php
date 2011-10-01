<?php
/**
 * A list of View actions, each of which would correspond to
 * a similarly-named Controller method.
 */
class PublicParagraphView extends View {
	private $title = 'None';

	/**
	 * View for the Process method
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
