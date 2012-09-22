<?php
/**
 * Author: Yraen Ironheart
 * Date: 22/09/12
 * Time: 1:13 PM
 *
 *
 */
class Public_Colonel_Controller extends Controller {

	/**
	 * Generate a list of grid dimensions that are valid
	 * for the strategies chosen.
	 *
	 * @return array
	 */
	public function executeDefault() {

		/* The minimum width to start discovering at
		 */
		$minWidth = 900;

		/* The maximum width to discover until
		 */
		$maxWidth = 1440;

		/* The standard width of margins
		 */
		$marginWidth = 32;

		$facade = new Colonel_Facade($minWidth, $maxWidth, $marginWidth);

		return $facade->process()->getResultSet();
	}
}
