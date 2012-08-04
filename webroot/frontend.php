<?php
require_once('../modules/Core/Bootstrap.php');

$agglutinator = new Agglutinator($_GET['files']);
$agglutinator->stream();
