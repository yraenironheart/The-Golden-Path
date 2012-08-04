<?php
/**
 * Author: Yraen Ironheart
 * Date: 4/08/12
 * Time: 8:50 PM
 *
 * Agglutinates the contents of a series of files specified by the constructor
 * parameter. Used primarily in frontend.php for css and js files.
 *
 * Also allows access to css/js files contained in app-specific folders
 */
class Agglutinator {
	private $allFiles = array();

	/* Agglutinated output
	 */
	private $data = '';

	/**
	 * Constructor
	 *
	 * Takes a set of comma-separated files and agglutinates their contents
	 *
	 * @param $csvFiles
	 */
	public function __construct($csvFiles) {
		$this->setAllFiles(explode(',', $csvFiles));

		$this->agglutinate();
	}

	/**
	 * Agglutinate contents
	 */
	private function agglutinate() {
		$data = '';

		foreach ($this->getAllFiles() as $currentFile) {

			/* All paths
				 */
			$allPatterns = array(

				/* Agglutinate contents found in Theme
						 */
				array(
					'pattern' => '#^([a-zA-Z0-9\.\-]+)/(css|js)/([a-zA-Z0-9\.\-]+)\.(css|js)$#',
					'path' => '../theme'
				),

				/* Agglutinate contents found in apps
						 */
				array(
					'pattern' => '#^([a-zA-Z0-9\.\-]+)/([a-zA-Z0-9\.\-]+)/(css|js)/([a-zA-Z0-9\.\-\/]+)\.(css|js)$#',
					'path' => '../app'
				),
			);

			foreach($allPatterns as $currentPattern) {
				if (preg_match($currentPattern['pattern'], $currentFile, $matches)) {
					$path = $currentPattern['path'] . '/' . $currentFile;

					if (file_exists($path)) {
						$data .= file_get_contents($path);
					}
				}
			}
		}

		$this->setData($data);
	}

	/**
	 * Stream to stdout
	 */
	public function stream() {
		echo $this->getData();
	}

	/* Getters/Setters
	 */

	/**
	 * Set all files
	 *
	 * @param $allFiles
	 */
	private function setAllFiles($allFiles) {
		$this->allFiles = $allFiles;
	}

	/**
	 * Get all files
	 *
	 * @return array
	 */
	private function getAllFiles() {
		return $this->allFiles;
	}

	/**
	 * Set data
	 *
	 * @param $data
	 */
	private function setData($data) {
		$this->data = $data;
	}

	/**
	 * Get data
	 *
	 * @return string
	 */
	private function getData() {
		return $this->data;
	}
}
