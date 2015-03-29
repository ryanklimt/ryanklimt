<?php
	$Database['Host'] = 'ryanklimt.me.mysql';
	$Database['Name'] = 'ryanklimt_me';
	$Database['User'] = 'ryanklimt_me';
	$Database['Pass'] = 'BEH5hmbK';

	if($_SERVER['SERVER_NAME'] == 'localhost') {
		$Database['Host'] = 'localhost';
		$Database['Name'] = 'ryanklimt_me';
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

	define('BASE_URL', $_SERVER['SERVER_NAME'] == 'localhost' ? 'http://localhost/ryanklimt/' : 'https://ryanklimt.me/');
	define('DEFAULT_HOME', 'home');
	define('VIEW_PATH', 'views/');
	define('LAYOUT_PATH', 'layouts/');

	date_default_timezone_set('America/Indianapolis');
?>