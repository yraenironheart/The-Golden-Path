<?php
/**
 * Author: Yraen Ironheart
 * Date: 22/09/12
 * Time: 1:15 PM
 *
 *
 */
class Public_Colonel_View extends View {

	/**
	 * View default output
	 */
	public function viewDefault() {
		$data = $this->getControllerData();

		for ($data->rewind(); $data->valid(); $data->next()) {
			$current = $data->current();

			echo "<h1>{$current['key']}</h1>";
			echo "<ul>";

			foreach($current['values'] as $currentValue) {
				echo "<li>$currentValue</li>";
			}

			echo "</ul>";
		}
	}
}
