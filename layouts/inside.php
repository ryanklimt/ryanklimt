<!DOCTYPE html>
<!--[if lt IE 7 ]> <html class="no-js ie ie6" lang="en-US" prefix="og: http://ogp.me/ns# fb: http://ogp.me/ns/fb#"> <![endif]-->
<!--[if IE 7 ]>    <html class="no-js ie ie7" lang="en-US" prefix="og: http://ogp.me/ns# fb: http://ogp.me/ns/fb#"> <![endif]-->
<!--[if IE 8 ]>    <html class="no-js ie ie8" lang="en-US" prefix="og: http://ogp.me/ns# fb: http://ogp.me/ns/fb#"> <![endif]-->
<!--[if (gte IE 9)|!(IE)]><!-->
<html>
<!--<![endif]-->
	<head>
		<meta charset="UTF-8">
		<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
		<meta name="robots" content="robots.txt">
		<meta name="author" content="humans.txt">
		
		<title>Ryan Klimt | <?php echo $_title; ?></title>
		<base href="<?php echo BASE_URL; ?>">
		
		<link rel="stylesheet" href="css/screen.css" media="screen" type="text/css">
		<link rel="stylesheet" href="css/print.css" media="print" type="text/css">

		<link rel="shortcut icon" type="image/x-icon" href="images/favicon.ico" sizes="16x16 32x32">
		<link rel="icon" type="image/x-icon" href="images/favicon.ico" sizes="16x16 32x32">
		<link rel="apple-touch-icon-precomposed" href="images/apple-touch-icon-114x114-precomposed.png">

		<meta name="description" content="An outstanding web developer specialising in beautiful website design and innovative development.">
		<meta name="keywords" content="ryan klimt, web development, web developer, web designer, front end developer, back end developer, computer science, resume, klimt, rklimt, ryan klimt web developer, klimt web, klimt developer">
		<meta property="og:type" content="blog">
		<meta property="og:title" content="Ryan Klimt">
		<meta property="og:url" content="">
		<meta property="og:site_name" content="Ryan Klimt">
		<meta name="twitter:card" content="summary">
		<meta name="twitter:site" content="@ryanklimt">
	</head>
		
	<body class="<?php echo $_page_class; ?>">

		<?php include('header.php'); ?>

		<section id="content">
			<?php include(VIEW_PATH.$_view_path.'.php'); ?>
		</section>

		<?php is_current_page('home') ? include('social.footer.php') : null; ?>

		<?php include('footer.php'); ?>

		<script src="//code.jquery.com/jquery-1.11.0.min.js"></script>
		<script src="js/ajax.form.min.js,modernizr.min.js,autosize.min.js,jquery.form.min.js,common.js"></script>
	</body>
</html>