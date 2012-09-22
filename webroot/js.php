<?php
/**
 * Author: Yraen Ironheart
 * Date: 8/08/12
 * Time: 9:56 PM
 *
 * Agglutinate css/js file contents into one big chunk to reduce the number
 * of requests per page
 */
require_once('../modules/Core/Bootstrap.php');

$agglutinator = new Core_Agglutinator_Js($_GET['files']);
$agglutinator->stream();