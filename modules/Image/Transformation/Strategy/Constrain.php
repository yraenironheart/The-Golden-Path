<?php
/**
 * Author: Yraen Ironheart
 * User: Sarif
 * Date: 3/06/12
 * Time: 3:11 PM
 *
 * Resize to specified dimensions while maintaining aspect ratio. The
 * specified dimensions are the maximums for each axis and the algorithm
 * will try to make the new image fit within these dimensions.
 */
class Image_Transformation_Strategy_Constrain extends Image_Transformation_Strategy_Abstract {

	/**
	 * Constructor
	 *
	 * @param $args
	 */
	public function __construct($args) {
		$this->setCanvasWidth($args['width']);
		$this->setCanvasHeight($args['height']);
	}

	/**
	 * Manipulate image
	 *
	 * @param $image
	 * @return Image_Resize
	 */
	public function manipulate($image) {
		list($oldWidth, $oldHeight) = $this->getImageAttributes($image);

		$newHeight = $oldHeight;
		$newWidth = $oldWidth;

		$desiredWidth = $this->getCanvasWidth();
		$desiredHeight = $this->getCanvasHeight();

		/* First constrain by width
		 */
		if ($desiredWidth < $oldWidth) {
			$percentage = $desiredWidth/$oldWidth;
			$newWidth = $desiredWidth;
			$newHeight = floor($oldHeight * $percentage);
		}

		/* Then constrain by height
		 */
		if ($desiredHeight < $newHeight) {
			$percentage = $desiredHeight/$newHeight;
			$newWidth *= $percentage;
			$newHeight = $desiredHeight;
		}

		/* Perform transformation
		 */
		$newImage = imagecreatetruecolor($newWidth, $newHeight);

		imagecopyresampled($newImage, $image, 0, 0, 0, 0, $newWidth, $newHeight, $oldWidth, $oldHeight);

		/* Remember results
		 */
		return $newImage;
	}
}
