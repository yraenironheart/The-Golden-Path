<?php
/**
 * Author: Yraen Ironheart
 * Date: 5/08/12
 * Time: 5:37 AM
 *
 *
 */
class Core_Content_Layout_Template {
	private $structure = "
		<div style='width:67%;float:left;'>
			{LEFTCOLUMN}
		</div>
		<div style='width:33%;float:right;'>
			{RIGHTCOLUMN}
		</div>
		<div style='width:100%;float:none;'>
			{BOTTOM}
		</div>
	";

	/* Getters/Setters
	 */

	/**
	 * Set structure
	 *
	 * @param $structure
	 */
	public function setStructure($structure) {
		$this->structure = $structure;
	}

	/**
	 * Get structure
	 *
	 * @return string
	 */
	public function getStructure() {
		return $this->structure;
	}
}
