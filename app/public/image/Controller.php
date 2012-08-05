<?php
/**
 * Public_Image_Controller
 *
 * Some test methods for the image module.
 *
 * User: Yraen Ironheart
 * Date: 1/11/11
 */
class Public_Image_Controller extends Controller {

	public function executeNew() {
		$image = new Core_Image_Facade('IMG_0005.JPG', '9G');
		$image->stream();
	}

	/**
	 * Create a gallery of images.
	 * This is a test.
	 *
	 * @return void
	 */
	public function executeImageGallery() {
		$path = '../uploads';
		$dirhandle = opendir($path);

		readdir($dirhandle);
		readdir($dirhandle);

		$imageArray = array();

		/* Get a list of image filenames
		 */
		while ($thisFile = readdir($dirhandle)) {
			if ($thisFile != '.DS_Store') {
				$imageArray[] = $thisFile;
			}
		}

		$this->setData($imageArray);
	}
}
