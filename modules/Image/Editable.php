<?php
/**
 * EditableImage
 *
 * This contains methods which perform chained operations on image resources.
 */
class Image_Editable extends Image_Abstract {

	/**
	 * Resize to explicit dimensions
	 *
	 * @param  $desiredWidth
	 * @param  $desiredHeight
	 * @return EditableImage
	 */
	public function resizeTo($desiredWidth, $desiredHeight) {
		list($oldWidth, $oldHeight) = $this->getImageAttributes();

		/* Perform transformation
		 */
		$newImage = imagecreatetruecolor($desiredWidth, $desiredHeight);

		imagecopyresampled($newImage, $this->getImage(), 0, 0, 0, 0, $desiredWidth, $desiredHeight, $oldWidth, $oldHeight);

		/* Remember results
		 */
		$this->setImage($newImage);

		return $this;
	}

	/**
	 * Resize to specified dimensions while maintaining aspect ratio. The
	 * specified dimensions are the maximums for each axis and the algorithm
	 * will try to make the new image fit within these dimensions.
	 *
	 * @param  $desiredWidth
	 * @param  $desiredHeight
	 * @return EditableImage
	 */
	public function constrainTo($desiredWidth, $desiredHeight) {
		list($oldWidth, $oldHeight) = $this->getImageAttributes();

		$newHeight = $oldHeight;
		$newWidth = $oldWidth;

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

		return $this->resizeTo($newWidth, $newHeight);
	}

	/**
	 * Sharpens the image resource using convolution matrix.
	 *
	 * See UnsharpMask class for original author's documentation.
	 *
	 * @param int $amount
	 * @param int $radius
	 * @param int $threshold
	 * @return void
	 */
	public function sharpen($amount = 90, $radius = 0.7, $threshold = 5) {
		$sharpener = new Image_UnsharpMask($this->getImage(), $amount, $radius, $threshold);

		$this->setImage($sharpener->getImage());

		return $this;
	}

	/**
	 * Saves an image to the cache folder, for speedier access.
	 *
	 * @return string
	 */
	public function save($filename, $width, $height) {
		$newFilename = $this->getCacheFolder() . '/' . $this->createCacheFilename($filename, $width, $height);

		/* The image strategy will append the appropriate file extension as a
		 * suffix. This agglutinated filename is returned from save()
		 */
		$savedFile = $this->getImageStrategy()->save($this->getImage(), $newFilename);

		return $savedFile;
	}
}