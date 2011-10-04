<?php
/**
 *
 */
class Public_Image_Controller extends Controller {

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

	/**
	 * Shows an image.
	 * This is a test.
	 *
	 * @return void
	 */
	public function executeViewImage() {
		$image = new Image_Presentable($_GET['image'], $_GET['width'], $_GET['height'], 'Taylor Swift Is Hot');
		$image->show();
	}

	public function executeSaveImage() {
		$image = new Image_Editable($_GET['image']);

		$image->setLoadFromCache(false)
			->load()
			->constrainTo(300, 300)
			->sharpen()
			->addWatermark('CACHED IMAGE')
			->save($_GET['image'], 300, 300);

		/* Redirect to previous screen
		 */
		header('Location: /image/imageGallery');
	}
}
