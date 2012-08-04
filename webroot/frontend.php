<?php
/**
 * Author: Yraen Ironheart
 * Date: 5/08/12
 * Time: 12:40 AM
 *
 * Agglutinate css/js file contents into one big chunk to reduce the number
 * of requests per page
 */
require_once('../modules/Core/Bootstrap.php');

$agglutinator = new Agglutinator($_GET['files']);
$agglutinator->stream();
