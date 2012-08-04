<?php
/**
 * Author: Yraen Ironheart
 * Date: 22/07/12
 * Time: 8:30 PM
 *
 *
 */
class Core_Content_Region_Instance_Presentable extends Core_Content_Region_Instance_Abstract {

	/**
	 * Compile all the template instances for this region
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
				$output[] = $templateCollection->current()->compileOutput()->getCompiledOutput();
			}
		}

		$this->setCompiledOutput(implode('', $output));

		return $this;
	}
}
