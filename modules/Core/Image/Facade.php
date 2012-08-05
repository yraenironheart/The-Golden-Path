<?php
/**
 * Author: Yraen Ironheart
 * User: Sarif
 * Date: 12/06/12
 * Time: 3:50 PM
 *
 *
 */
class Core_Image_Facade {
	private $cache = null;

	/**
	 * Constructor
	 *
	 * @param $sourceFile
	 * @param $transformationType
	 */
	public function __construct($sourceFile, $transformationType) {
		$this->setCache(new Core_Image_Cache_Filesystem($sourceFile, $transformationType));

		if ($this->getCache()->isInCache()) {
			$this->getCache()->loadFromCache();
		}
		else {
			$this->getCache()->loadFromSource();

			$list = new Core_Image_Transformation_List_Default();

			foreach($list->getTransformations($transformationType) as $currentTransformation) {
				$className = 'Core_Image_Transformation_Strategy_' . $currentTransformation['method'];

				$transformation = new $className($currentTransformation['args']);
				$this->getCache()->setImage($transformation->manipulate($this->getCache()->getImage()));
			}

			$this->getCache()->save();
		}
	}

	/**
	 * Stream image data
	 *
	 * Delegation method
	 */
	public function stream() {
		$this->getCache()->show();
	}

	/* Getters/Setters
	 */

	/**
	 * Set cache
	 *
	 * @param $cache
	 */
	private function setCache($cache) {
		$this->cache = $cache;
	}

	/**
	 * Get cache
	 *
	 * @return null
	 */
	private function getCache() {
		return $this->cache;
	}
}
