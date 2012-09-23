<?php
/**
 * Author: Yraen Ironheart
 * Date: 23/09/12
 * Time: 4:09 AM
 *
 */
$exercise = new Athletics_Weights_Exercise('2012-05-28 19:00:00', 'Vertical Push');

$set1 = new Athletics_Weights_Set(1);
$set1->add(new Athletics_Weights_Repetition(50));
$set1->add(new Athletics_Weights_Repetition(50));
$set1->add(new Athletics_Weights_Repetition(50));
$set1->add(new Athletics_Weights_Repetition(50));
$set1->add(new Athletics_Weights_Repetition(50));
$set1->add(new Athletics_Weights_Repetition(50));
$set1->add(new Athletics_Weights_Repetition(50));
$set1->add(new Athletics_Weights_Repetition(50));

$set2 = new Athletics_Weights_Set(2);
$set2->add(new Athletics_Weights_Repetition(50));
$set2->add(new Athletics_Weights_Repetition(50));
$set2->add(new Athletics_Weights_Repetition(50));
$set2->add(new Athletics_Weights_Repetition(50));
$set2->add(new Athletics_Weights_Repetition(50));
$set2->add(new Athletics_Weights_Repetition(50));
$set2->add(new Athletics_Weights_Repetition(50));
$set2->add(new Athletics_Weights_Repetition(50));

$set3 = new Athletics_Weights_Set(3);
$set3->add(new Athletics_Weights_Repetition(50));
$set3->add(new Athletics_Weights_Repetition(50));
$set3->add(new Athletics_Weights_Repetition(50));
$set3->add(new Athletics_Weights_Repetition(50));
$set3->add(new Athletics_Weights_Repetition(50));
$set3->add(new Athletics_Weights_Repetition(50));
$set3->add(new Athletics_Weights_Repetition(50));
$set3->add(new Athletics_Weights_Repetition(50));

$exercise->add($set1);
$exercise->add($set2);
$exercise->add($set3);
