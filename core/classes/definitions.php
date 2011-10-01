<?php
ini_set('display_errors', 'On');

/**
 * Load php files automatically
 */
function essentialLoader($file) {
	$path[] = dirname(__FILE__);
	$path[] = dirname(__FILE__) . '/../../app/public';
	$path[] = dirname(__FILE__) . '/../../app/private';
	$path[] = dirname(__FILE__) . '/../../app/admin';

	foreach ($path as $currentPath) {
		$classFile = $currentPath . '/' . $file . '.php';

		if (file_exists($classFile)) {
			require_once($classFile);
			break;
		}
		else {
			$dirhandle = opendir($currentPath);

			readdir($dirhandle);
			readdir($dirhandle);

			while ($thisFile = readdir($dirhandle)) {
				$classFile = $currentPath . '/' . $thisFile . '/classes/' . $file . '.php';

				if (file_exists($classFile)) {
					require_once($classFile);
					break;
				}
			}
		}
	}

	return;
}

spl_autoload_register(null, false);
spl_autoload_extensions('.php');
spl_autoload_register('essentialLoader');
