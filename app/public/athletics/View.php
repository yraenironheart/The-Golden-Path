<?php
/**
 * Author: Yraen Ironheart
 * Date: 22/09/12
 * Time: 7:17 PM
 *
 *
 */
class Public_Athletics_View extends View {

	/**
	 * View default
	 */
	public function viewDefault() {
		$dataValues = $this->getControllerData();

		foreach($dataValues as $current) {
			$formattedDataSeries[] = '[' . implode(",", $current) . ']';
		}

		$allDataValues = implode(",\n", $formattedDataSeries);

		$this->getTemplate()->blockReplace(array(
			'SERIES_DATA' => $allDataValues,
		));
	}
}
