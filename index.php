<?php
	session_start();

	foreach(glob("includes/*.php") as $filepath) include($filepath);

	function isPage($filepath=null) {
		$filepath = VIEW_PATH . $filepath . '.php';
		return file_exists($filepath) && is_file($filepath);
	}

	function getValidRoute($_route=array()) {
		if(!$_route) {
			header('HTTP/1.1 404 Not Found');
			header('Status: 404 Not Found');
			return array('404');
		} else {
			$page = end($_route);
			if($page && in_array($page[0], array('@','_','.','-',))) {
				array_pop($_route);
				return getValidRoute($_route);
			}
		}
		if($_route && !isPage(implode('/', $_route))) {
			array_pop($_route);
			return getValidRoute($_route);
		}
		return $_route;
	}

	function is_current_page($page = null, $strict = true, $classes = array()) {
		global $_view_path;
		$inPathStart = !$strict && rtrim(substr($_view_path, 0, strlen($page) + 1), '/') == $page;
		if($inPathStart || $page == $_view_path) {
			return 'class="current '.implode(" ",$classes).'"';
		}
		return false;
	}

	$_route = array_values(array_diff(explode('/', urldecode(parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH))), explode('/', urldecode(parse_url($_SERVER['SCRIPT_NAME'], PHP_URL_PATH)))));
	$_route = filter_var_array(array_filter(array_map("strip_tags", $_route)), FILTER_SANITIZE_STRING);
	$_view = $_route ? getValidRoute($_route) : array(DEFAULT_HOME);
	$_view_path = $_view ? implode('/', $_view) : DEFAULT_HOME;
	$_params = array_slice($_route, count($_view));
	$_page = end($_view);
	$_page_class = str_replace("/", "-",$_view_path);
	$_title = $seo[$_view_path][0];
	$_description = $seo[$_view_path][1];

	// LOAD CONTROLLER //
	foreach(glob("controllers/*.php") as $filepath) if(preg_match('/'.$_view[0].'/',$filepath)) include($filepath);

	include(LAYOUT_PATH.'inside.php');
?>