<?php
/**
 * Author: Yraen Ironheart
 * Date: 4/08/12
 * Time: 8:50 PM
 *
 * Agglutinates the contents of a series of files specified by the constructor
 * parameter. Used primarily in css.php and js.php for css and js files.
 *
 * Also allows access to css/js files contained in app-specific folders
 */
abstract class Core_Agglutinator_Abstract {

	/* css or js
	 */
	protected $filetype = '';

	/* All files to be dealt with
	 */
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
					'pattern' => "#^theme/([a-zA-Z0-9\.\-]+)/{$this->getFiletype()}/([a-zA-Z0-9\.\-]+)\.{$this->getFiletype()}$#",
					'path' => '.'
				),

				/* Agglutinate contents found in apps
				 */
				array(
					'pattern' => "#^([a-zA-Z0-9\.\-]+)/([a-zA-Z0-9\.\-]+)/{$this->getFiletype()}/([a-zA-Z0-9\.\-\/]+)\.{$this->getFiletype()}$#",
					'path' => '../app'
				),

				/* Agglutinate contents found in vendor
				 */
				array(
					'pattern' => "#^vendor/([a-zA-Z0-9\.\-]+)/{$this->getFiletype()}/([a-zA-Z0-9\.\-\/]+)\.{$this->getFiletype()}$#",
					'path' => '..'
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
	abstract public function stream();

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
	protected function getData() {
		return $this->data;
	}

	/**
	 * Find out if this is css/js
	 *
	 * @return string
	 */
	private function getFiletype() {
		return $this->filetype;
	}
}
