<nav class="primary-nav">
	<ul>
		<li <?php echo is_current_page('home', array('fat','2')); ?>><a href=>Home</a></li>
		<li <?php echo is_current_page('about'); ?>><a href='about/'>About</a></li>
		<li <?php echo is_current_page('work'); ?>><a href='work/'>Work</a></li>
		<!--<li <?php echo is_current_page('blog'); ?>><a href='blog/'>Blog</a></li>-->
		<li <?php echo is_current_page('resume'); ?>><a href='resume/'>Resume</a></li>
		<li <?php echo is_current_page('contact'); ?>><a href='contact/'>Contact</a></li>
	</ul>
</nav>