<?php
require_once('../core/classes/definitions.php');

$view = FrontController::build(new ViewMediator(), new Request());
$view->stdout();

