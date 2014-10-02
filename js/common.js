var slideshow = $('#slideshow');
$(document).ready(function () {
	fitText();
	labelPlaceholders();
	contactForm();
	var homeLoopTimeout;
	homeSlider(5000, 200);
	var workLoopTimeout;
	workSliders(2000, 1000);
	$('img').removeAttr('width height');
	$(window).keydown(function(event){if(event.keyCode==84){$('.email-button').hide();$('.twitter-button').css('display','block');$('.team h2').html('Tweet me');}});
	$(window).keyup(function(event){if(event.keyCode==84){$('.email-button').show();$('.twitter-button').hide();$('.team h2').html('Meet me');}});
	$('textarea').autosize();
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
	$('.label-placeholders input[type=text], .label-placeholders input[type=password], .label-placeholders input[type=email], .label-placeholders textarea').each(function () {
		if ($(this).val()) {
			$(this).parent('li').find('label').hide();
		}
	});
	$('.label-placeholders input[type=text], .label-placeholders input[type=password], .label-placeholders input[type=email], .label-placeholders textarea').focusin(function () {
		$(this).parent('li').find('label').addClass('dim');
		$(this).keypress(function () {
			$(this).parent('li').find('label').hide();
		})
	});
	$('.label-placeholders input[type=text], .label-placeholders input[type=password], .label-placeholders input[type=email], .label-placeholders textarea').focusout(function () {
		if (!$(this).val()) {
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
		invalidHandler: function () {
			$(contactForm).addClass('error');
			$(contactForm).find('label:not(.error, [for=contact_url])').hide();
		},
		submitHandler: function (form) {
			$(contactForm).append('<input type="hidden" name="ajax_submit" value="true" />');
			$(contactForm).removeClass('error');
			$(form).fadeOut(300, function () {
				$("#contact-form").append('<div id="processing"><img src="images/loader.gif" alt="Processing..." width="32" height="32" /></div>');
				$(form).ajaxSubmit({
					target: "#contact-form",
					url: 'process/email.php',
					type: 'POST',
					data: contactForm.serialize(),
					success: function () {
						$('#contact_form').remove();
						$("#processing").remove();
					}
				})
			})
		}
	})
}

function homeSlider(interval, speed) {
	$(window).load(function () {
		slideshow.css({
			minHeight: 0
		});
		slideshow.removeClass('loading');
		if ($('html').hasClass('cssanimations')) {
			$('.slide:first', slideshow).addClass('animate')
		}
		$('.slide:first', slideshow).animate({
			opacity: 1
		}, speed, function () {
			$(this).addClass('current')
		});
		var length = $('.slide', slideshow).length;
		if (length > 1) {
			setTimeout(function () {
				homeSliderLoop(interval, speed)
			}, interval)
		}
	})
}

function homeSliderLoop(interval, speed) {
	var current = $('.slide.current', slideshow);
	current.animate({
		opacity: 0
	}, speed, function () {
		var next = current.next('.slide');
		if (next.length == 0) {
			next = $(':first(.slide)', slideshow)
		}
		current.removeClass('current animate');
		if ($('html').hasClass('cssanimations')) {
			next.addClass('animate')
		}
		next.animate({
			opacity: 1
		}, speed, function () {
			$(this).addClass('current');
			homeLoopTimeout = setTimeout(function () {
				homeSliderLoop(interval, speed)
			}, interval)
		})
	})
}

function workSliders(interval, speed) {
	$('.laptop').each(function () {
		var length = $('.mask img', $(this)).length;
		if (length > 1) {
			var firstImg = $('.mask img:first', $(this)).clone().addClass('last');
			$('.mask', $(this)).append(firstImg);
			length++;
			$('.mask img', $(this)).css({
				width: (100 / length) + '%'
			}).wrapAll('<div class="slide-container" style="width: ' + (length * 100) + '%; left: 0%"></div>');
			var slideContainer = $('.slide-container', $(this)).data('viewing', 0);
			setTimeout(function () {
				workSlidersLoop(slideContainer, interval, speed)
			}, interval + (Math.floor(Math.random() * 6) * 1000))
		}
	});
}

function workSlidersLoop(e, interval, speed) {
	var length = $('img', e).length - 1;
	if (length == e.data('viewing')) {
		e.css({
			left: '0%'
		});
		e.data('viewing', 0);
		workSlidersLoop(e, interval, speed)
	} else {
		e.data('viewing', e.data('viewing') + 1);
		e.animate({
			left: '-' + e.data('viewing') + '00%'
		}, speed, function () {
			workLoopTimeout = setTimeout(function () {
				workSlidersLoop(e, interval, speed)
			}, interval)
		})
	}
}