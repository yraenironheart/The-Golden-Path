<?php
/**
 * Image_Filetype_Png
 *
 * Image Filetype Strategy component. This knows how to load and stream PNG images.
 *
 * User: Yraen Ironheart
 * Date: 1/11/11
 */
class Image_Filetype_Png implements Image_Filetype_Interface {

	/**
	 * Read contents of the source file and return an image resource. This is
	 * used in other classes to perform transformations etc.
	 *
	 * @param  $sourceFile
	 * @return resource
	 */
	public function load($sourceFile) {
		return imagecreatefrompng($sourceFile);
	}

	/**
	 * Print contents of image resource to browser
	 *
	 * @param $imageResource
	 * @internal param $image
	 * @return void
	 */
	public function show($imageResource) {
		header('Content-type: image/png');
		header('Content-disposition: inline');
		imagepng($imageResource, null, 0);
	}

	/**
	 * Saves an image to the filesystem, returns the filename that was used
	 *
	 * @param  $imageResource
	 * @param  $destination
	 * @return string
	 */
	public function save($imageResource, $destination) {
		imagepng($imageResource, $destination, 0);

		return $destination;
	}
}
