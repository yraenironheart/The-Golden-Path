<?php
/**
 * Author: Yraen Ironheart
 * Date: 22/09/12
 * Time: 7:17 PM
 *
 *
 */
class Public_Athletics_Controller extends Controller {

	public function executeDefault() {

		/* First session
		 */
		$exercise1 = new Athletics_Weights_Exercise('2012-08-14 19:00:00', 'Tricep Pulldowns');

		$set1 = new Athletics_Weights_Set(1);
		$set1->add(new Athletics_Weights_Repetition(45));
		$set1->add(new Athletics_Weights_Repetition(45));
		$set1->add(new Athletics_Weights_Repetition(45));
		$set1->add(new Athletics_Weights_Repetition(45));
		$set1->add(new Athletics_Weights_Repetition(45));
		$set1->add(new Athletics_Weights_Repetition(45));
		$set1->add(new Athletics_Weights_Repetition(45));
		$set1->add(new Athletics_Weights_Repetition(45));

		$set2 = new Athletics_Weights_Set(2);
		$set2->add(new Athletics_Weights_Repetition(45));
		$set2->add(new Athletics_Weights_Repetition(45));
		$set2->add(new Athletics_Weights_Repetition(45));
		$set2->add(new Athletics_Weights_Repetition(45));
		$set2->add(new Athletics_Weights_Repetition(45));
		$set2->add(new Athletics_Weights_Repetition(45));
		$set2->add(new Athletics_Weights_Repetition(45));
		$set2->add(new Athletics_Weights_Repetition(45));

		$set3 = new Athletics_Weights_Set(3);
		$set3->add(new Athletics_Weights_Repetition(45));
		$set3->add(new Athletics_Weights_Repetition(45));
		$set3->add(new Athletics_Weights_Repetition(45));
		$set3->add(new Athletics_Weights_Repetition(45));
		$set3->add(new Athletics_Weights_Repetition(45));
		$set3->add(new Athletics_Weights_Repetition(45));
		$set3->add(new Athletics_Weights_Repetition(45));
		$set3->add(new Athletics_Weights_Repetition(45));

		$exercise1->add($set1);
		$exercise1->add($set2);
		$exercise1->add($set3);

		/* Second session
		 */
		$exercise2 = new Athletics_Weights_Exercise('2012-09-16 02:52:00', 'Curls');

		$set1 = new Athletics_Weights_Set(1);
		$set1->add(new Athletics_Weights_Repetition(9));
		$set1->add(new Athletics_Weights_Repetition(9));
		$set1->add(new Athletics_Weights_Repetition(9));

		$set2 = new Athletics_Weights_Set(2);
		$set2->add(new Athletics_Weights_Repetition(12));
		$set2->add(new Athletics_Weights_Repetition(12));
		$set2->add(new Athletics_Weights_Repetition(12));

		$set3 = new Athletics_Weights_Set(3);
		$set3->add(new Athletics_Weights_Repetition(17));
		$set3->add(new Athletics_Weights_Repetition(17));
		$set3->add(new Athletics_Weights_Repetition(17));

		$exercise2->add($set1);
		$exercise2->add($set2);
		$exercise2->add($set3);

		/* Third session
		 */
		$exercise3 = new Athletics_Weights_Exercise('2012-09-09 02:52:00', 'Curls');

		$set1 = new Athletics_Weights_Set(1);
		$set1->add(new Athletics_Weights_Repetition(10));
		$set1->add(new Athletics_Weights_Repetition(10));
		$set1->add(new Athletics_Weights_Repetition(10));

		$set2 = new Athletics_Weights_Set(2);
		$set2->add(new Athletics_Weights_Repetition(8));
		$set2->add(new Athletics_Weights_Repetition(8));
		$set2->add(new Athletics_Weights_Repetition(8));

		$set3 = new Athletics_Weights_Set(3);
		$set3->add(new Athletics_Weights_Repetition(8));
		$set3->add(new Athletics_Weights_Repetition(8));
		$set3->add(new Athletics_Weights_Repetition(8));

		$exercise3->add($set1);
		$exercise3->add($set2);
		$exercise3->add($set3);

		/* All exercises ever
		 */
		$allExercises = array();
		$allExercises[] = $exercise1;
		$allExercises[] = $exercise2;
		$allExercises[] = $exercise3;

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
}
