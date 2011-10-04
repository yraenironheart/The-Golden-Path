<?php
/**
 * A list of View actions, each of which would correspond to
 * a similarly-named Controller method.
 */
class Public_Image_View extends View {

	public function viewImageGallery() {
		$content = '';

		$allImages = $this->getControllerData();

		foreach($allImages as $currentImage) {
			$content .= "<img src=\"/image/view/$currentImage/100/100\" style='margin-bottom:10px'/>";
			$content .= "<a href=\"/image/save/$currentImage\">Save to cache</a><br />";
		}

		$this->getTemplate()->blockReplace(array(
			'CONTENT' => $content
		));
	}
}
