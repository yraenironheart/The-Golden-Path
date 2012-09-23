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
		$structure = $this->getControllerData();

		foreach($structure['allFixtures'] as $currentFixture) {
			$key = 'SERIES_DATA_' . strtoupper($currentFixture);

			$formattedDataSeries = array();

			foreach($structure['results'][$currentFixture] as $current) {
				$formattedDataSeries[] = '[' . implode(",", $current) . ']';
			}

			$allDataValues[$currentFixture] = implode(",\n", $formattedDataSeries);

			/* Replace vars
			 */
			$this->getTemplate()->blockReplace(array(
				$key => $allDataValues[$currentFixture],
			));
		}
	}
}
