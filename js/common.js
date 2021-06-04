var slideshow = $('#slideshow');
$(document).ready(function() {
	fitText();
	labelPlaceholders();
	contactForm();
	createBlogForm();
	deleteBlogForm();
	loginForm();
	logoutForm();
	var homeLoopTimeout;
	homeSlider(5000, 200);
	var workLoopTimeout;
	workSliders(2000, 1000);
	$('img').removeAttr('width height');
	$(window).keydown(function(event){if(event.keyCode==84){$('.email-button').hide();$('.twitter-button').css('display','block');$('.team h2').html('Tweet me');}});
	$(window).keyup(function(event){if(event.keyCode==84){$('.email-button').show();$('.twitter-button').hide();$('.team h2').html('Meet me');}});
	$('textarea').autosize();
	$('form').attr('autocomplete','off').attr('novalidate','novalidate');
});

function fitText() {
	$('#headline h2').fitText(1.48, {
		minFontSize: 32
	});
	$('#headline p').fitText(5.57);
	$('.values h2').fitText(1, {
		minFontSize: 18,
		maxFontSize: 33
	})
}

function labelPlaceholders() {
	$('.label-placeholders input[type=text], .label-placeholders input[type=password], .label-placeholders input[type=email], .label-placeholders textarea').each(function() {
		if($(this).val()) {
			$(this).parent('li').find('label').hide();
		}
	});
	$('.label-placeholders input[type=text], .label-placeholders input[type=password], .label-placeholders input[type=email], .label-placeholders textarea').focusin(function() {
		$(this).parent('li').find('label').addClass('dim');
		$(this).keypress(function() {
			$(this).parent('li').find('label').hide();
		})
	});
	$('.label-placeholders input[type=text], .label-placeholders input[type=password], .label-placeholders input[type=email], .label-placeholders textarea').focusout(function() {
		if(!$(this).val()) {
			$(this).parent('li').find('label').last().removeClass('dim').show();
		}
	})
}

function contactForm() {
	var contactForm = $('#contact-form form');
	$(contactForm).validate({
		messages: {
			contact_name: "Your name is required",
			contact_email: {
				required: "Your email address is required",
				email: ""
			},
			contact_message: "Your message is required"
		},
		invalidHandler: function() {
			$(contactForm).addClass('error');
		},
		submitHandler: function(form) {
			$(contactForm).append('<input type="hidden" name="ajax_submit" value="true" />');
			$(contactForm).removeClass('error');
			$(form).fadeOut(300, function() {
				$('#contact-form').append('<div id="processing"><img src="images/loader.gif" alt="Processing..." width="32" height="32" /></div>');
				$(form).ajaxSubmit({
					url: 'process/contact.php',
					type: 'POST',
					data: contactForm.serialize(),
					success: function(data) {
						$('#processing').remove();
						if(data) {
							$('#contact-form').html(data).fadeIn(300);	
						} else {
							$(form).fadeIn(300);
						}
					}
				})
			})
		}
	})
}

function createBlogForm() {
	var blogForm = $('#blog-form form');
	$(blogForm).validate({
		messages: {
			blog_title: "A title is required",
			blog_content: "Some content is required"
		},
		invalidHandler: function() {
			$(blogForm).addClass('error');
		},
		submitHandler: function(form) {
			$(blogForm).append('<input type="hidden" name="ajax_submit" value="true" />');
			$(blogForm).removeClass('error');
			$(form).fadeOut(300, function() {
				$('#blog-form').append('<div id="processing"><img src="images/loader.gif" alt="Processing..." width="32" height="32" /></div>');
				$(form).ajaxSubmit({
					url: 'process/blog.php',
					type: 'POST',
					data: blogForm.serialize(),
					success: function(data) {
						$('#processing').remove();
						if(data) {
							$('#blog-form').html(data).fadeIn(300);	
						} else {
							$(form).fadeIn(300);
						}
					}
				})
			})
		}
	})
}

function deleteBlogForm() {
	$('.deleteBlog').click(function() {
		var thisObj = $(this);
		$(thisObj).parent().siblings().fadeOut(300);
		$(thisObj).parent().fadeOut(300, function() {
			$(thisObj).parent().append('<div id="processing"><img src="images/loader.gif" alt="Processing..." width="32" height="32" /></div>');
			$.ajax({
				url: 'process/deleteblog.php',
				type: 'POST',
				data: {
					'id': $(thisObj)[0].id
				},
				success: function(data) {
					$('#processing').remove();
					if(data) {
						$(thisObj).parent().html(data).fadeIn(300);
					} else {
						$(thisObj).parent().fadeIn(300);
						$(thisObj).parent().siblings().fadeIn(300);
					}
				}
			})
		})
	});
}

function loginForm() {
	var loginForm = $('#login-form form');
	$(loginForm).validate({
		messages: {
			login_email: {
				required: "Your email address is required",
				email: ""
			},
			login_password: "Your password is required"
		},
		invalidHandler: function() {
			$(loginForm).addClass('error');
		},
		submitHandler: function(form) {
			$(loginForm).append('<input type="hidden" name="ajax_submit" value="true" />');
			$(loginForm).removeClass('error');
			$(form).fadeOut(300, function() {
				$('#login-form').append('<div id="processing"><img src="images/loader.gif" alt="Processing..." width="32" height="32" /></div>');
				$(form).ajaxSubmit({
					url: 'process/login.php',
					type: 'POST',
					data: loginForm.serialize(),
					success: function(data) {
						$('#processing').remove();
						if(data) {
							$('#login-form').html(data).fadeIn(300);
							$('.primary-nav ul').append('<li><a class="logout" style="display:none;">Logout</a></li>');
							$('.logout').fadeIn(300);
							logoutForm();
						    window.setTimeout(function(){
						        window.location.href = "/blog";
						    }, 3000);
						} else {
							$('#login-form form').fadeIn(300);
						}
					}
				})
			})
		}
	})
}

function logoutForm() {
	$('.logout').click(function() {
		$('#content').children().fadeOut(300, function() {
			$('#content').append('<div id="processing"><img src="images/loader.gif" alt="Processing..." width="32" height="32" /></div>');
			$.ajax({
				url: 'process/logout.php',
				type: 'POST',
				success: function(data) {
					$('#processing').remove();
					if(data) {
						$('#content').html(data).fadeIn(300);
						$('.logout').fadeOut(300);
					    window.setTimeout(function(){
						    window.location.href = "/blog";
						}, 3000);
					} else {
						$('#content').children().fadeIn(300);
					}
				}
			})
		})
	});
}

function homeSlider(interval, speed) {
	$(window).load(function() {
		slideshow.css({
			minHeight: 0
		});
		slideshow.removeClass('loading');
		if($('html').hasClass('cssanimations')) {
			$('.slide:first', slideshow).addClass('animate')
		}
		$('.slide:first', slideshow).animate({
			opacity: 1
		}, speed, function() {
			$(this).addClass('current')
		});
		var length = $('.slide', slideshow).length;
		if(length > 1) {
			setTimeout(function() {
				homeSliderLoop(interval, speed)
			}, interval)
		}
	})
}

function homeSliderLoop(interval, speed) {
	var current = $('.slide.current', slideshow);
	current.animate({
		opacity: 0
	}, speed, function() {
		var next = current.next('.slide');
		if(next.length == 0) {
			next = $(':first(.slide)', slideshow)
		}
		current.removeClass('current animate');
		if($('html').hasClass('cssanimations')) {
			next.addClass('animate')
		}
		next.animate({
			opacity: 1
		}, speed, function() {
			$(this).addClass('current');
			homeLoopTimeout = setTimeout(function() {
				homeSliderLoop(interval, speed)
			}, interval)
		})
	})
}

function workSliders(interval, speed) {
	$('.laptop').each(function() {
		var length = $('.mask img', $(this)).length;
		if(length > 1) {
			var firstImg = $('.mask img:first', $(this)).clone().addClass('last');
			$('.mask', $(this)).append(firstImg);
			length++;
			$('.mask img', $(this)).css({
				width: (100 / length) + '%'
			}).wrapAll('<div class="slide-container" style="width: ' + (length * 100) + '%; left: 0%"></div>');
			var slideContainer = $('.slide-container', $(this)).data('viewing', 0);
			setTimeout(function() {
				workSlidersLoop(slideContainer, interval, speed)
			}, interval + (Math.floor(Math.random() * 6) * 1000))
		}
	});
}

function workSlidersLoop(e, interval, speed) {
	var length = $('img', e).length - 1;
	if(length == e.data('viewing')) {
		e.css({
			left: '0%'
		});
		e.data('viewing', 0);
		workSlidersLoop(e, interval, speed)
	} else {
		e.data('viewing', e.data('viewing') + 1);
		e.animate({
			left: '-' + e.data('viewing') + '00%'
		}, speed, function() {
			workLoopTimeout = setTimeout(function() {
				workSlidersLoop(e, interval, speed)
			}, interval)
		})
	}
}