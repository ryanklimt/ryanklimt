<!DOCTYPE html>
<html>
	<head>
		<meta charset="UTF-8">
		<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
		<meta name="robots" content="robots.txt">
		<meta name="author" content="humans.txt">
		
		<title><?php echo $_title; ?></title>
		<base href="<?php echo BASE_URL; ?>">

		<link rel="stylesheet" href="css/screen.css" media="all" type="text/css">

		<link rel="shortcut icon" type="image/x-icon" href="images/favicon.ico" sizes="16x16 32x32">
		<link rel="icon" type="image/x-icon" href="images/favicon.ico" sizes="16x16 32x32">
		<link rel="apple-touch-icon-precomposed" href="images/apple-touch-icon-114x114-precomposed.png">

		<meta name="description" content="<?php echo $_description; ?>">
		<meta name="keywords" content="<?php echo HEAD_KEYWORDS; ?>">
		<meta name="twitter:card" content="summary">
		<meta name="twitter:site" content="<?php echo TWITTER_HANDLE; ?>">
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
		<script>(function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){(i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)})(window,document,'script','//www.google-analytics.com/analytics.js','ga');ga('create', '<?php echo GOOGLE_ANALYTICS; ?>', 'auto');ga('send', 'pageview');</script>
	</body>
</html>