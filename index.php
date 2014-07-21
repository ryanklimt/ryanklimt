<?php

$pages = array(
	"home" => "Web Development",
	"about" => "Who I Am",
	"work" => "My Work",
	"resume" => "My Accomplishments",
	"contact" => "Contact",
);

$path = explode("/", $_SERVER["REQUEST_URI"]);
foreach($pages as $key => $value) {
	if(strtolower($path[1]) == $key) {
		$page = $key;
		$title = $value;
	}
}
if($path[1] == "") {
	$page = "home";
	$title = "Web Development";
}
if(!isset($page)) {
	$page = "404";
	$title = "404 Error";
}

?>

<!DOCTYPE html>
<!--[if lt IE 7 ]> <html class="no-js ie ie6" lang="en-US" prefix="og: http://ogp.me/ns# fb: http://ogp.me/ns/fb#"> <![endif]-->
<!--[if IE 7 ]>    <html class="no-js ie ie7" lang="en-US" prefix="og: http://ogp.me/ns# fb: http://ogp.me/ns/fb#"> <![endif]-->
<!--[if IE 8 ]>    <html class="no-js ie ie8" lang="en-US" prefix="og: http://ogp.me/ns# fb: http://ogp.me/ns/fb#"> <![endif]-->
<!--[if (gte IE 9)|!(IE)]><!-->
<html>
<!--<![endif]-->
	<head>
		<!-- META -->
		<meta charset="UTF-8">
		<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
		<meta name="robots" content="robots.txt">
		<meta name="author" content="humans.txt">
		
		<!-- TITLE -->
		<title>Ryan Klimt | <?php echo $title; ?></title>
		<base href="<?php echo $_SERVER['SERVER_NAME'] == 'localhost' ? 'http://localhost/rklimt/' : 'http://rklimt.com/'; ?>">
		
		<!-- CSS -->
		<link rel="stylesheet" href="css/screen.css" media="screen">
		<link rel="stylesheet" href="css/print.css" media="print">

		<!-- FAVICON -->
		<link rel="shortcut icon" type="image/x-icon" href="assets/images/site/favicon.ico" sizes="16x16 32x32">
		<link rel="icon" type="image/x-icon" href="assets/images/site/favicon.ico" sizes="16x16 32x32">
		<link rel="apple-touch-icon-precomposed" href="assets/images/site/apple-touch-icon-114x114-precomposed.png">
		
		<!-- SEO Ultimate (http://www.seodesignsolutions.com/wordpress-seo/) -->
		<meta name="description" content="An outstanding web developer specialising in beautiful website design and innovative development.">
		<meta name="keywords" content="ryan klimt, web development, web developer, web designer, front end developer, back end developer, computer science, resume, klimt, rklimt, ryan klimt web developer, klimt web, klimt developer">
		<meta property="og:type" content="blog">
		<meta property="og:title" content="Ryan Klimt">
		<meta property="og:url" content="">
		<meta property="og:site_name" content="Ryan Klimt">
		<meta name="twitter:card" content="summary">
		<meta name="twitter:site" content="@ryanklimt">
		
	</head>
		
	<body class=<?php echo $page ?>>
		
		<!--HEADER-->
		<header id="site-header">
			
			<h1><a href="">Ryan Klimt</a></h1>
			
			<!--PRIMARY NAVIGATION-->
			<nav class="primary-nav">
				<ul>
					<li class="home"><a href=>Home</a></li>
					<li class="about"><a href='about/'>About</a></li>
					<li class="work"><a href='work/'>Work</a></li>
					<!--<li class="blog"><a href='<?php /*echo $url; */?>blog/'>Blog</a></li>-->
					<li class="resume"><a href='resume/'>Resume</a></li>
					<li class="contact"><a href='contact/'>Contact</a></li>
				</ul>
			</nav>
		</header>

		<?php include('views/'.$page.'.php'); ?>

		<!--SITE FOOTER-->
		<footer id="site-footer">
			
			<!--COPYRIGHT INFO-->
			<p id="company-info">&copy; 2014 Ryan Klimt<br>
				Gurnee, Illinois, <span>United States</span><br>
				Phone: 847 912-2543 Email: <a href="mailto:ryanklimt@gmail.com.com">ryanklimt@gmail.com</a>
			</p>
			
			<!--PRIMARY NAVIGATION-->
			<nav class="primary-nav">
				<ul>
					<li class="home"><a href=''>Home</a></li>
					<li class="about"><a href='about/'>About</a></li>
					<li class="work"><a href='work/'>Work</a></li>
					<!--<li class="blog"><a href='blog/'>Blog</a></li>-->
					<li class="resume"><a href='resume/'>Resume</a></li>
					<li class="contact"><a href='contact/'>Contact</a></li>
				</ul>
			</nav>
		</footer>

		<!--JS BEHAVIOURS-->
		<script src="//code.jquery.com/jquery-1.11.0.min.js"></script>
		<script src="js/plugins.min.js,modernizr.min.js,retina.js,autosize.min.js,jquery.form.min.js,view.min.js,common.js"></script>
	</body>
</html>