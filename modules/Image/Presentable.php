<?php
/**
 * Image_Presentable
 *
 * Displays an image from a resource. Optionally apply a watermark.
 *
 * User: Yraen Ironheart
 * Date: 1/11/11
 */
class Image_Presentable extends Image_Abstract {

	/**
	 * Load an image for viewing. It will check the cache folder to see if it
	 * can find one that has already been created with the same parameters.
	 *
	 * If it can find one, it will just stream that image.
	 *
	 * Otherwise, it'll create one with the specified dimensions, save it, then
	 * stream this newly-saved cached file.
	 *
	 * @param  $sourceFile
	 * @param  $width
	 * @param  $height
	 * @param bool $watermark
	 */
	public function __construct($sourceFile, $width, $height, $watermark = false) {

		/* This is the filename that would have been used to store this file in
		 * the cache. See if it exists.
		 */
		$cacheFilename = $this->createCacheFilename($sourceFile, $width, $height);

		/* If it's not already in the cache, create one in the cache.
		 * Otherwise load it directly from the cache.
		 */
		if (!$this->isInCache($cacheFilename)) {
			$image = new EditableImage($sourceFile);

			$savedFile = $image->setLoadFromCache(false)
				->load()
				->constrainTo($width, $height)
				->sharpen()
				->save($sourceFile, $width, $height);

			$watermark = 'CREATED IN CACHE';
			$filename = $savedFile;
		}
		else {
			$filename = $cacheFilename;
		}

		/* Now we know what file to load, load it
		 */
		$this->setSourceFile($filename);
		$this->load();

		/* If watermark was set, add it to the image
		 */
		if ($watermark !== false) {
			$this->addWatermark($watermark);
		}
	}
}