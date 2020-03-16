$(document).ready(function(){
	var windowheight = $(window).height();
	var navbarheight = 75;
	var location = window.location;
	var about = new RegExp("about");
	var contact = new RegExp("contact");
	var gallery = new RegExp("gallery");
	var pagebanner = $('.page-banner.contact');
	$('.successmessage').click(function(){$(this).fadeOut()});
	$('.successmessage').bind('tap', function(){$(this).fadeOut()});
	$('.errormessage').click(function(){$(this).fadeOut()});
	$('.errormessage').bind('tap', function(){$(this).fadeOut()});
		$('#first-bar, #second-bar, #third-bar').addClass('white');
	if($(window).width() > 508){
		$('.page-banner.contact').hover(function(){
			$('.mcwinnernavigation, .mcwinnernavigation ul').slideUp(1000);
			setTimeout(function(){
				pagebanner.addClass('blank');
				$('.banneroverlay').hide();
			}, 1501)
		},function(){
			$('.mcwinnernavigation, .mcwinnernavigation ul').slideDown(1000);
			$('.page-banner').removeClass('blank');
			$('.banneroverlay').fadeIn(1500);
		});
		pagebanner.on('tap',function(){
			$('.emobile').hide();
		});
		pagebanner.on('taphold',function(){
			$('.emobile').hide();
		});
	}
	$(window).scroll(function(){
		$(".bottomslideup").each(function(){
			var pos = $(this).offset().top;

			var winTop = $(window).scrollTop();
			if (pos < winTop + 550) {
				$(this).addClass("slideup");
			}
		});
		$('.leftslidein').each(function(){
			var offset = $(this).offset().top;
			var windowscroll = $(window).scrollTop();
			if(offset < windowscroll + 600){
				$(this).addClass('slideright');
			}
		});
		$('.rightslidein').each(function(){
			var offet = $(this).offset().top;
			var windowsroll = $(window).scrollTop();
			if(offet < windowsroll + 600){
				$(this).addClass('slideleft');
			}
		});
		$('.topslidein').each(function(){
			var offsett = $(this).offset().top;
			var windowsrolll = $(window).scrollTop();
			if(offsett < windowsrolll + 600){
				$(this).addClass('slidedown');
			}
		});
		$('.rotatein').each(function(){
			var offsettt = $(this).offset().top;
			var windowsrollll = $(window).scrollTop();
			if(offsettt < windowsrollll + 600){
				$(this).addClass('rotate');
			}
		});
		if(about.test(location) || contact.test(location) || gallery.test(location)){
			/*$('.mcwinnernavigation').addClass('absolute');
			$('.mcwinnernavigation, .navbar').addClass('black');
			$('.navbarmargin').css('margin-top', $('.mcwinnernavigation').outerHeight());*/
			windowheight = $(window).height() / 2;
		}
			if($(window).scrollTop() > windowheight){
				$('.mcwinnernavigation, .navbar').addClass('black');
			}else{
				$('.mcwinnernavigation, .navbar').removeClass('black');
			}

	});
	$('.background').each(function(){
		var background = $(this).attr('eric-background');
		$(this).css({
			"background-image":"url(" + background + ")"
		});
	});
});
$(window).bind('load',function(){
	$('#mcwinnerloader').fadeOut();
	$('div.loading').removeClass('loading');
	$('#loadslideup').addClass('slidingup');
	parallax();

});

function parallax(){
	var originalposition = $('.page-banner').css('background-position-y');
	$(window).scroll(function(event){
    event.preventDefault();
    /*parallax effect script*/
    var height = $(window).height() / 2;
    if($(window).width() >= 760){
      if($(window).scrollTop() <= height){
        var adder = $(window).scrollTop();
        var actualadder = adder/1.5;
        $('.page-banner').css({'background-position-y':(originalposition-actualadder)});
      }
    }
    /*parallax effect script*/
  })
}
