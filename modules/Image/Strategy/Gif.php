<?php
/**
 * Image_Strategy_Gif
 *
 * Image Strategy component. This knows how to load and stream GIF images.
 *
 * User: Yraen Ironheart
 * Date: 1/11/11
 */
class Image_Strategy_Gif implements Image_Strategy_Interface {

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
	 * @param  $image
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
