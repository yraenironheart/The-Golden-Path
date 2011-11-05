<?php
/**
 * index
 *
 * User: Yraen Ironheart
 * Date: 5/10/11
 */
require_once('../modules/Core/Bootstrap.php');

$frontController = new FrontController();
$frontController->build();

$view = $frontController->getView();
$view->stdout();
