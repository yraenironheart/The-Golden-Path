<?php
/**
 * Image Strategy Component
 *
 * This knows how to load and stream JPEG images.
 */
class JpegImageStrategy implements ImageStrategyInterface {

	/**
	 * Read contents of the source file and return an image resource. This is
	 * used in other classes to perform transformations etc.
	 *
	 * @param  $sourceFile
	 * @return resource
	 */
	public function load($sourceFile) {
		return imagecreatefromjpeg($sourceFile);
	}

	/**
	 * Print contents of image resource to browser
	 *
	 * @param  $image
	 * @return void
	 */
	public function show($imageResource) {
		header('Content-type: image/jpeg');
		header('Content-disposition: inline');
		imagejpeg($imageResource, null, 88);
	}

	/**
	 * Saves an image to the filesystem, returns the filename that was used
	 *
	 * @param  $imageResource
	 * @param  $destination
	 * @return string
	 */
	public function save($imageResource, $destination) {
		imagejpeg($imageResource, $destination, 88);

		return $destination;
	}
}
