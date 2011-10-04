<?php
require_once('../modules/Core/Bootstrap.php');

$frontController = new FrontController(new Request());

$view = $frontController->getView();
$view->stdout();


