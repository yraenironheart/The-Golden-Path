<?php
/**
 * Author: Yraen Ironheart
 * Date: 22/07/12
 * Time: 8:29 PM
 *
 *
 */
class Core_Content_Region_Instance_Editable extends Core_Content_Region_Instance_Abstract {

	/**
	 * Compile all the template instances for this region
	 * Editable templates exist in an unordered list for
	 * use with jQuery Sortable, for sequencing.
	 *
	 * @return string
	 */
	public function compileOutput() {
		$output = array();

		for ($this->rewind(); $this->valid(); $this->next()) {
			$templateCollection = $this->current();

			/* For every template instance, get its constituent data objects
			 * and format output content accordingly
			 */
			for ($templateCollection->rewind(); $templateCollection->valid(); $templateCollection->next()) {
				$output[] = '<li style="outline:1px solid #f00;margin-bottom:16px">' . $templateCollection->current()->compileOutput()->getCompiledOutput() . '</li>';
			}
		}

		$compiled = '<ul>' . implode('', $output) . '</ul>';

		$this->setCompiledOutput($compiled);

		return $this;
	}
}
