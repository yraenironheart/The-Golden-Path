<?php
/**
 * Image_Abstract
 *
 * Sets up an image resource with caching. It uses the Strategy design pattern
 * to output the appropriate image format (primarily one of JPG, GIF, PNG) after
 * transformations have been applied, such as resizing and sharpening.
 *
 * User: Yraen Ironheart
 * Date: 1/11/11
 */
abstract class Image_Abstract {
	private $sourceFile;
	private $image;
	private $imageStrategy = null;
	private $loadFromCache = true;
	private $uploadFolder = '../uploads';
	private $cacheFolder = '../cache';

	/**
	 * Loads the contents of sourceFile into an image resource. Also, determine
	 * what kind of strategy to use on this image resource contents.
	 *
	 * @param  $sourceFile
	 */
	public function __construct($sourceFile) {
		$this->setSourceFile($sourceFile);
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
	 * Determine what image strategy to use.
	 *
	 * @return void
	 */
	public function setImageStrategy() {
		if (@imagecreatefromgif($this->getSourceFile())) {
			$this->imageStrategy = new GifImageStrategy();
		}
		else if (@imagecreatefromjpeg($this->getSourceFile())) {
			$this->imageStrategy = new JpegImageStrategy();
		}
		else if (@imagecreatefrompng($this->getSourceFile())) {
			$this->imageStrategy = new PngImageStrategy();
		}
	}

	/**
	 * Get the current image strategy.
	 *
	 * @return
	 */
	public function getImageStrategy() {
		return $this->imageStrategy;
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
	public function load() {

		/* Determine whether to read from the cache folder or the upload folder
		 */
		if ($this->getLoadFromCache() === true) {
			$path = $this->getCacheFolder();
		}
		else {
			$path = $this->getUploadFolder();
		}

		/* Add filename to path and set it
		 */
		$this->setSourceFile($path . '/' . $this->getSourceFile());

		/* Determine what kind of file it is
		 */
		$this->setImageStrategy();

		if ($this->getImageStrategy() != null) {
			$image = $this->getImageStrategy()->load($this->getSourceFile());

			$this->setImage($image);
		}

		return $this;
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
	 * Get dimensions of the image resource so we can chain transformations.
	 *
	 * Also figures out what the aspect ratio is, to make future resizes easier.
	 *
	 * @return array
	 */
	public function getImageAttributes() {
		return array(imagesx($this->getImage()), imagesy($this->getImage()));
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
	 * Adds a watermark to the image.
	 *
	 * @return Image
	 */
	public function addWatermark($text) {
		list($width, $height) = $this->getImageAttributes();

		$grey = imagecolorallocate($this->getImage(), 128, 128, 128);
		$white = imagecolorallocate($this->getImage(), 255, 255, 255);

		imagefilledrectangle($this->getImage(), 0, $height, $width, $height-10, $grey);
		imagestring($this->getImage(), 1, $width/2-30, $height-9, $text, $white);

		return $this;
	}

	/**
	 * Create a sensible filename for storage in the cache. Removes file
	 * extension, then translates non-web-friendly characters into underscores.
	 *
	 * @param  $filename
	 * @return string
	 */
	public function createCacheFilename($filename, $width, $height) {
		$newFilename = substr($filename, 0, strlen($filename) - strpos(strrev($filename), '.') - 1);
		$suffix = $width . 'x' . $height;

		return preg_replace('#[^a-zA-Z0-9_\-]#', '_', $newFilename) . '_' . $suffix;
	}

	/**
	 * Determine if a filename already exists in the cache
	 *
	 * @param  $sourceFile
	 * @return bool
	 */
	public function isInCache($sourceFile) {
		$path = $this->getCacheFolder() . '/' . $sourceFile;

		if (file_exists($path)) {
			return true;
		}

		return false;
	}
}