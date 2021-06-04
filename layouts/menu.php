<nav class="primary-nav">
	<ul>
		<li <?php echo is_current_page('home', false); ?>><a href=''>Home</a></li>
		<li <?php echo is_current_page('about', false); ?>><a href='about'>About</a></li>
		<li <?php echo is_current_page('work', false); ?>><a href='work'>Work</a></li>
		<?php /*<li <?php echo is_current_page('blog', false); ?>><a href='blog'>Blog</a></li>*/ ?>
		<li <?php echo is_current_page('resume', false); ?>><a href='resume'>Resume</a></li>
		<li <?php echo is_current_page('contact', false); ?>><a href='contact'>Contact</a></li>
		<?php if(IsLoggedIn()) echo '<li><a class="logout">Logout</a></li>'; ?>
	</ul>
</nav>