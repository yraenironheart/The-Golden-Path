<?php
$allFiles = explode(',', $_GET['files']);

$data = '';

foreach ($allFiles as $currentFile) {
	if (preg_match('#^([a-zA-Z0-9\.\-]+)/(css|js)/([a-zA-Z0-9\.\-]+)\.(css|js)$#', $currentFile, $matches)) {
		if (strtolower($matches[1]) == 'core') {
			$data .= file_get_contents('../theme/' . $currentFile);
		}
		else {
			$data .= file_get_contents('../app/public/' . $matches[0]);
		}
	}
}

echo $data;