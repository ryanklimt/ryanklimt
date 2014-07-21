<?php 
	$head = "_head.php";
	$foot = "_foot.php";
	$page = "404";
	$title = "Ryan Klimt | 404 Not Found";
	include($head);
?>

<section id="content">
	<div id="page-not-found">
		<img src="assets/images/site/404.png" alt="404" />
		<div class="intro">
			<h2>Sorry, we can&rsquo;t seem to find the page you&rsquo;re looking for.</h2>
			<p>Please use the main navigation above to find what you’re looking for or we can just take you back to the homepage.</p>
		</div>
	</div>
</section>

<?php include($foot); ?>