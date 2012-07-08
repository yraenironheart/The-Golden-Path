<?php
/**
 * Author: Yraen Ironheart
 * User: Sarif
 * Date: 13/06/12
 * Time: 1:32 AM
 *
 *
 */
class Image_Transformation_List_Default {

	private $transformations = array(
		'Tiny' => array(
			array(
				'method' => 'Constrain',
				'args' => array(
					'width' => 333,
					'height' => 300,
				)
			),
			array(
				'method' => 'Sharpen',
				'args' => array(),
			),
			array(
				'method' => 'Watermark',
				'args' => array(
					'text' => "Such nice A-cups...",
				)
			)
		),
	);

	/* Getters/Setters
	 */

	/**
	 * Get a transformation sequence
	 *
	 * @param $key
	 * @return mixed
	 */
	public function getTransformations($key) {
		return $this->transformations[$key];
	}
}
