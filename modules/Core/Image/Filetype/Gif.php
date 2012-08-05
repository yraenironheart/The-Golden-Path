<?php
/**
 * Core_Image_Filetype_Gif
 *
 * Image Filetype Strategy component. This knows how to load and stream GIF images.
 *
 * User: Yraen Ironheart
 * Date: 1/11/11
 */
class Core_Image_Filetype_Gif implements Core_Image_Filetype_Interface {

	/**
	 * Read contents of the source file and return an image resource. This is
	 * used in other classes to perform transformations etc.
	 *
	 * @param  $sourceFile
	 * @return resource
	 */
	public function load($sourceFile) {
		return imagecreatefromgif($sourceFile);
	}

	/**
	 * Print contents of image resource to browser
	 *
	 * @param $imageResource
	 * @internal param $image
	 * @return void
	 */
	public function show($imageResource) {
		header('Content-type: image/gif');
		header('Content-disposition: inline');
		imagegif($imageResource, null);
	}

	/**
	 * Saves an image to the filesystem, returns the filename that was used
	 *
	 * @param  $imageResource
	 * @param  $destination
	 * @return string
	 */
	public function save($imageResource, $destination) {
		imagegif($imageResource, $destination);

		return $destination;
	}
}
