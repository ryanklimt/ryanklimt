<?php

	if(stripos($_SERVER['SERVER_NAME'], 'rklimt.com') !== FALSE) {
		$Database['Host'] = 'mysql13.000webhost.com';
		$Database['Name'] = 'a3544935_rklimt';
		$Database['User'] = 'a3544935_rklimt';
		$Database['Pass'] = 'Ryanjohn64';
	} else {
		$Database['Host'] = 'localhost';
		$Database['Name'] = 'test';
		$Database['User'] = 'root';
		$Database['Pass'] = 'mysql';
	}

	if (!defined('DB_HOST')) {
		define('DB_HOST', $Database['Host']);
		define('DB_NAME', $Database['Name']);
		define('DB_USER', $Database['User']);
		define('DB_PASS', $Database['Pass']);
	}

	unset($Database);
?>