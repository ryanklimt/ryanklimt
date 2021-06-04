<?php
	$Database['Host'] = 'localhost';
	$Database['Name'] = 'theklimts';
	$Database['User'] = '';
	$Database['Pass'] = '';
	
	if (!defined('DB_HOST')) {
		define('DB_HOST', $Database['Host']);
		define('DB_NAME', $Database['Name']);
		define('DB_USER', $Database['User']);
		define('DB_PASS', $Database['Pass']);
	}
	unset($Database);

	define('BASE_URL', $_SERVER['SERVER_NAME'] == 'localhost' ? 'http://localhost/ryanklimt/' : 'https://ryanklimt.com/');
	define('DEFAULT_HOME', 'home');
	define('VIEW_PATH', 'views/');
	define('LAYOUT_PATH', 'layouts/');

	date_default_timezone_set('America/Indianapolis');

	define('HEAD_KEYWORDS', 'Ryan Klimt, freelance, freelance programmer, programmer, web development, web developer, web designer, front end developer, back end developer, computer science, klimt, rklimt, ryan klimt web developer, klimt web, klimt developer, klimt programmer, web design portfolio, corporate website design, website design ideas, web agency, corporate web design, web design agency, freelance web developer, professional website, cool website designs, website layouts, cool web design, web design ideas, web page designers, website redesign, company website design, homepage design,  klimt web design');

	define('TWITTER_HANDLE', '@ryanklimt');
	define('GOOGLE_ANALYTICS', 'UA-42530522-1');
	
?>