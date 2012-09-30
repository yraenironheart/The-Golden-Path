<?php
/**
 * Author: Yraen Ironheart
 * Date: 5/08/12
 * Time: 12:40 AM
 *
 * Streams images directly from the filesystem without caching.
 *
 * Bypasses the transformations altogether without breaking the
 * Image module's patterns; compare with usage defined in the
 * Facade constructor.
 */
require_once('../modules/Core/Bootstrap.php');

$cache = new Core_Image_Cache_Filesystem($_GET['file'], null);
$cache->loadDirectly()->show();
