<?php
/**
 * Image_Filesystem
 *
 * Sets up an image resource with caching. It uses the Strategy design pattern
 * to output the appropriate image format (primarily one of JPG, GIF, PNG) after
 * transformations have been applied, such as resizing and sharpening.
 *
 * User: Yraen Ironheart
 * Date: 1/11/11
 */
class Image_Cache_Filesystem {
	private $sourceFile;
	private $image;
	private $imageStrategy = null;
	private $loadFromCache = true;
	private $uploadFolder = '../uploads';
	private $cacheFolder = '../cache';
	private $transformationType = '';
	private $cacheFilename = '';

	/**
	 * Loads the contents of sourceFile into an image resource. Also, determine
	 * what kind of strategy to use on this image resource contents.
	 *
	 * @param  $sourceFile
	 * @param $transformationType
	 */
	public function __construct($sourceFile, $transformationType) {
		$this->setSourceFile($sourceFile);
		$this->setTransformationType($transformationType);

		/* The filename that would be used in the cache
		 */
		$this->setCacheFilename($this->createCacheFilename());
	}

	/**
	 * Loads a file's contents as an image resource. We keep a reference to the
	 * image resource for transformations etc. that might be performed in Image
	 * subclasses.
	 *
	 * Uses Strategy Design Pattern so that the overall image loading/showing
	 * methodology is the same for all images. Only the imageStrategy needs to
	 * know how to load and show particular image types (jpg, gif, etc)
	 *
	 * @return Image
	 */
	public function loadFromCache() {
		$sourceFilePath = $this->createCachePath();

		$this->load($sourceFilePath);

		return $this;
	}

	/**
	 * Load from original upload location
	 *
	 * @return Image_Cache_Filesystem
	 */
	public function loadFromSource() {
		$sourceFilePath = $this->getUploadFolder() . '/' . $this->getSourceFile();

		$this->load($sourceFilePath);

		return $this;
	}

	/**
	 * Load directly from the path specified. Used when streaming local files.
	 * This requires a special usage of this cache class, spawning an instance
	 * of it directly
	 *
	 * @return Image_Cache_Filesystem
	 */
	public function loadDirectly() {
		$sourceFilePath = '../app/' . $this->getSourceFile();

		$this->load($sourceFilePath);

		return $this;
	}

	/**
	 * Prepares image file for streaming
	 *
	 * @param $sourceFilePath
	 * @return Image_Cache_Filesystem
	 * @throws Exception
	 */
	private function load($sourceFilePath) {

		/* Determine what kind of file it is
		 */
		$this->setImageStrategy($sourceFilePath);

		if ($this->getImageStrategy() != null) {
			$image = $this->getImageStrategy()->load($sourceFilePath);

			$this->setImage($image);

			return $this;
		}

		throw new Exception("couldn't determine imagetype");
	}

	/**
	 * Determine what image strategy to use.
	 *
	 * @param $sourceFilePath
	 * @return void
	 */
	public function setImageStrategy($sourceFilePath) {
		if (@imagecreatefromjpeg($sourceFilePath)) {
			$this->imageStrategy = new Image_Filetype_Jpeg();
		}
		else if (@imagecreatefromgif($sourceFilePath)) {
			$this->imageStrategy = new Image_Filetype_Gif();
		}
		else if (@imagecreatefrompng($sourceFilePath)) {
			$this->imageStrategy = new Image_Filetype_Png();
		}
		else {
			throw new Exception("Could not determine filetype (check permissions)");
		}
	}

	/**
	 * Push image to browser.
	 *
	 * @return void
	 */
	public function show() {
		$this->getImageStrategy()->show($this->getImage());
	}
	/**
	 * Create a sensible filename for storage in the cache. Removes file
	 * extension, then translates non-web-friendly characters into underscores.
	 *
	 * @return string
	 */
	public function createCacheFilename() {
		$newFilename = substr($this->getSourceFile(), 0, strlen($this->getSourceFile()) - strpos(strrev($this->getSourceFile()), '.') - 1);
		$suffix = $this->getTransformationType();

		return preg_replace('#[^a-zA-Z0-9_\-]#', '_', $newFilename) . '_' . $suffix;
	}

	/**
	 * Create the path used for this image
	 *
	 * @return string
	 */
	private function createCachePath() {
		return $this->getCacheFolder() . '/' . $this->createCacheFilename();
	}

	/**
	 * Determine if a filename already exists in the cache
	 *
	 * @return bool
	 */
	public function isInCache() {
		$path = $this->getCacheFolder() . '/' . $this->createCacheFilename();

		if (file_exists($path)) {
			return true;
		}

		return false;
	}

	/**
	 * Save transformed image
	 *
	 * @return Image_Cache_Filesystem
	 */
	public function save() {
		$newFilename = $this->getCacheFolder() . '/' . $this->createCacheFilename();

		/* The image strategy will append the appropriate file extension as a
		 * suffix. This agglutinated filename is returned from save()
		 */
		$savedFile = $this->getImageStrategy()->save($this->getImage(), $newFilename);

		return $this;
	}

	/* Getters/Setters
	 */

	/**
	 * Get the current image strategy.
	 *
	 * @return
	 */
	public function getImageStrategy() {
		return $this->imageStrategy;
	}

	/**
	 * Sets the source file.
	 *
	 * @param  $sourceFile
	 * @return void
	 */
	public function setSourceFile($sourceFile) {
		$this->sourceFile = $sourceFile;
	}

	/**
	 * Gets the source file.
	 *
	 * @return
	 */
	public function getSourceFile() {
		return $this->sourceFile;
	}

	/**
	 * Sets an image resource.
	 *
	 * @param  $image
	 * @return void
	 */
	public function setImage($image) {
		$this->image = $image;
	}

	/**
	 * Gets an image resource.
	 *
	 * @return
	 */
	public function getImage() {
		return $this->image;
	}

	/**
	 * Determine whether not to use the cache folder or the uploads folder.
	 *
	 * @param  $setting
	 * @return Image
	 */
	public function setLoadFromCache($setting) {
		$this->loadFromCache = $setting;

		return $this;
	}

	/**
	 * Get the current setting for whether to load file data from cache folder.
	 * @return bool
	 */
	public function getLoadFromCache() {
		return $this->loadFromCache;
	}

	/**
	 * Gets the folder currently used as the image cache.
	 *
	 * @return string
	 */
	public function getCacheFolder() {
		return $this->cacheFolder;
	}

	/**
	 * Gets the folder where uploaded files are stored.
	 *
	 * @return string
	 */
	public function getUploadFolder() {
		return $this->uploadFolder;
	}

	/**
	 * Set transformation type
	 *
	 * @param $transformationType
	 */
	private function setTransformationType($transformationType) {
		$this->transformationType = $transformationType;
	}

	/**
	 * Get transformation type
	 *
	 * @return string
	 */
	private function getTransformationType() {
		return $this->transformationType;
	}

	/**
	 * Set cache filename
	 *
	 * @param $cacheFilename
	 */
	private function setCacheFilename($cacheFilename) {
		$this->cacheFilename = $cacheFilename;
	}

	/**
	 * Get cache filename
	 *
	 * @return string
	 */
	private function getCacheFilename() {
		return $this->cacheFilename;
	}
}