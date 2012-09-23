<?php
/**
 * Author: Yraen Ironheart
 * Date: 22/09/12
 * Time: 7:17 PM
 *
 *
 */
class Public_Athletics_Controller extends Controller {
	private $allFixtures = array(
		'triceppulldown',
		'cablerow',
		'barbellcurl',
		'lateralraise',
		'barbellpullup',
		'verticalpush',
		'abcrunches',
	);

	/**
	 * Load some test data
	 *
	 * @param $type
	 * @return array
	 */
	private function loadFixtures($type) {
		$exercise = null;

		/* All exercises ever
		 */
		$allExercises = array();

		$dirhandle = opendir("../app/public/athletics/fixtures/{$type}");
		readdir($dirhandle);
		readdir($dirhandle);

		while ($thisFile = readdir($dirhandle)) {
			include("../app/public/athletics/fixtures/{$type}/{$thisFile}");

			$allExercises[] = $exercise;
		}

		return $this->collateResults($allExercises);
	}

	/**
	 * @param $allExercises
	 * @return array
	 */
	private function collateResults($allExercises) {

		/* Process
		 */
		$allDataValues = array();

		for ($i=0; $i < 3; $i++) {
			$dataValues = array();

			foreach($allExercises as $currentExercise) {
				$set = $currentExercise->getSet($i);

				/* If this set didn't exist for a particular day, ignore it
				 * by assuming 0 for cumulative weight
				 */
				if ($set) {
					$dataValues[] = "{x: {$currentExercise->getDate()}, y: {$set->accumulateResults()}}";
				}
				else {
					$dataValues[] = "{x: {$currentExercise->getDate()}, y: 0}";
				}
			}

			$allDataValues[] = $dataValues;
		}

		return $allDataValues;
	}

	/**
	 * Test data
	 *
	 * @return array
	 */
	public function executeDefault() {
		$results = array();

		foreach($this->getAllFixtures() as $currentFixture) {
			$results[$currentFixture] = $this->loadFixtures($currentFixture);
		}

		return array(
			'allFixtures' => $this->getAllFixtures(),
			'results' => $results
		);
	}

	/* Getters/Setters
	 */

	/**
	 * Get all fixtures
	 *
	 * @return array
	 */
	private function getAllFixtures() {
		return $this->allFixtures;
	}
}
