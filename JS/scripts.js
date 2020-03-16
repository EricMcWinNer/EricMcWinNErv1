function EricTypeWriter() {
	var text = [
		"Just let my work speak for itself...",
		"Well whatever you want to call it really, point is I build stuff for the web",
		"...</>",
	];
	var i = 0;
	var j = 0;
	//var currenttext = text[j];
	var output = text[j].charAt(i);
	var type = setInterval(function() {
		if (i === text[j].length) {
			clearInterval(type);
		}
		output += text[j].charAt(i);
		i++;
		$(".dynamic-text").html(output.replace("JJ", "J"));
	}, 100);
}

window.onload = function() {
	EricTypeWriter();
	$(".eric-loader").fadeOut("slow");
	var delay = $("ul.animated").attr("data-em-delay");
	var transitionduration = $("ul.animated").attr("data-transitionduration");
	EricSlideshow(delay, transitionduration);
	$("body").addClass("scroll");
};
/*TYPEWRITER ANIMATION ENDS HERE*/
$(document).ready(function() {
	if ($(window).width() < 650) {
		var dropdownheight = getDropdownHeight();
		var aboutoffset = $("#about").offset().top - 60 + dropdownheight;
		var servicesoffset = $("#services").offset().top - 60;
		var portfoliooffset = $("#portfolio").offset().top - 60 + dropdownheight;
		var mobilecontactoffset =
			$("#mobilecontact").offset().top - 60 + dropdownheight;
		$("body").click(function(event) {
			if (event.target.className === "navbar-header") {
				return;
			}
			if ($(event.target).closest(".responsivenavbar").length) {
				return;
			}
			if ($(".navbar-collapse.collapse").hasClass("in")) {
				$(".navbar-collapse.collapse").removeClass("in");
			}
		});

		$(".services").click(function(event) {
			$(".navbar-collapse.collapse").removeClass("in");
			event.preventDefault();
			$(".nav li").each(function() {
				if ($(this).hasClass("active")) {
					$(this).removeClass();
				}
			});
			$(".nav a.services")
				.parent("li")
				.addClass("active");
			$("html, body").animate(
				{
					scrollTop: servicesoffset + 20,
				},
				2000
			);
			setTimeout(function() {
				if (
					!$(
						".transparent_navigation a.services, .opaque_navigation a.services, footer a.services"
					).hasClass("selected")
				) {
					$(
						".transparent_navigation a, .opaque_navigation a, footer a"
					).removeClass("selected");
					$(
						".opaque_navigation a.services, .transparent_navigation a.services, footer a.services"
					).addClass("selected");
				}
			}, 1900);
		});
		$(".about").click(function(event) {
			$(".navbar-collapse.collapse").removeClass("in");
			event.preventDefault();
			$(".nav li").each(function() {
				if ($(this).hasClass("active")) {
					$(this).removeClass();
				}
			});
			$(".nav a.about")
				.parent("li")
				.addClass("active");
			$("html, body").animate(
				{
					scrollTop: aboutoffset + 20,
				},
				2000
			);
			setTimeout(function() {
				if (
					!$(
						".transparent_navigation a.about, .opaque_navigation a.about, footer a.about"
					).hasClass("selected")
				) {
					$(
						".transparent_navigation a, .opaque_navigation a, footer a"
					).removeClass("selected");
					$(
						".opaque_navigation a.about, .transparent_navigation a.about, footer a.about"
					).addClass("selected");
				}
			}, 1900);
		});
		$(".portfolioo").click(function(event) {
			$(".navbar-collapse.collapse").removeClass("in");
			event.preventDefault();
			$(".nav li").each(function() {
				if ($(this).hasClass("active")) {
					$(this).removeClass();
				}
			});
			$(".nav a.portfolioo")
				.parent("li")
				.addClass("active");
			$("html, body").animate(
				{
					scrollTop: portfoliooffset + 20,
				},
				1500
			);
		});
		$("a.contactt").click(function(event) {
			event.preventDefault();
			$(".navbar-collapse.collapse").removeClass("in");
			$(".nav li").each(function() {
				if ($(this).hasClass("active")) {
					$(this).removeClass();
				}
			});
			$(".nav a.contactt")
				.parent("li")
				.addClass("active");
			$("html, body").animate(
				{
					scrollTop: mobilecontactoffset + 20,
				},
				2000
			);
			$('input[name="firstname"]').focus();
			$("footer input:not([type=submit]), footer textarea").addClass(
				"blinkers"
			);
			setTimeout(function() {
				if (
					!$(
						".transparent_navigation a.contact, .opaque_navigation a.contact, footer a.contact"
					).hasClass("selected")
				) {
					$(
						".transparent_navigation a, .opaque_navigation a, footer a"
					).removeClass("selected");
					$(".transparent_navigation a.contact, footer a.contact").addClass(
						"selected"
					);
				}
			}, 1900);
		});
	}
	var aboutoffset = $("#about").offset().top - 60;
	var servicesoffset = $("#services").offset().top - 60;
	var portfoliooffset = $("#portfolio").offset().top - 60;
	var contactoffset = $("#contact").offset().top - 60;
	$(".services").click(function(event) {
		event.preventDefault();
		$("html, body").animate(
			{
				scrollTop: servicesoffset + 20,
			},
			2000
		);
		setTimeout(function() {
			if (
				!$(
					".transparent_navigation a.services, .opaque_navigation a.services, footer a.services"
				).hasClass("selected")
			) {
				$(
					".transparent_navigation a, .opaque_navigation a, footer a"
				).removeClass("selected");
				$(
					".opaque_navigation a.services, .transparent_navigation a.services, footer a.services"
				).addClass("selected");
			}
		}, 1900);
	});
	$(".about").click(function(event) {
		event.preventDefault();
		$("html, body").animate(
			{
				scrollTop: aboutoffset + 20,
			},
			2000
		);
		setTimeout(function() {
			if (
				!$(
					".transparent_navigation a.about, .opaque_navigation a.about, footer a.about"
				).hasClass("selected")
			) {
				$(
					".transparent_navigation a, .opaque_navigation a, footer a"
				).removeClass("selected");
				$(
					".opaque_navigation a.about, .transparent_navigation a.about, footer a.about"
				).addClass("selected");
			}
		}, 1900);
		$(".portfolioo").click(function(event) {
			$(".navbar-collapse.collapse").removeClass("in");
			event.preventDefault();
			$(".nav li").each(function() {
				if ($(this).hasClass("active")) {
					$(this).removeClass();
				}
			});
			$(".nav a.portfolioo")
				.parent("li")
				.addClass("active");
			$("html, body").animate(
				{
					scrollTop: portfoliooffset + 20,
				},
				1500
			);
		});
		$("a.contactt").click(function(event) {
			event.preventDefault();
			$(".nav a.contactt")
				.parent("li")
				.addClass("active");
			/*$('html, body').animate({
                scrollTop: contactoffset + 20
            }, 2000);*/
			$('input[name="firstname"]').focus();
			$("footer input:not([type=submit]), footer textarea").addClass(
				"blinkers"
			);
			setTimeout(function() {
				if (
					!$(
						".transparent_navigation a.contact, .opaque_navigation a.contact, footer a.contact"
					).hasClass("selected")
				) {
					$(
						".transparent_navigation a, .opaque_navigation a, footer a"
					).removeClass("selected");
					$(".transparent_navigation a.contact, footer a.contact").addClass(
						"selected"
					);
				}
			}, 1900);
		});
	});

	$("button.navbar-toggle a, button.navbar-toggle").click(function(event) {
		event.preventDefault();
	});
	$("button.navbar-toggle a, button.navbar-toggle").bind("tap", function(
		event
	) {
		event.preventDefault();
	});
	if ($(window).width() > 650) {
		scrollSpy();
	}
	$(".checkheight").click(function() {
		setTimeout(function() {
			$("#dummy").html();
		}, 1200);
	});
	$(".successmessage").click(function() {
		$(this).fadeOut();
	});
	$(".successmessage").bind("tap", function() {
		$(this).fadeOut();
	});
	$(".errormessage").click(function() {
		$(this).fadeOut();
	});
	$(".errormessage").bind("tap", function() {
		$(this).fadeOut();
	});
	$("#first-bar, #second-bar, #third-bar").addClass("white");
	$(".responsivenavbar .logo").addClass("inverse");
	if ($("footer").length) {
		if ($(window).width() >= 651) {
			var downset = $("footer").offset().top;
		} else {
			var downset =
				$("footer").offset().top -
				$("#myNavbar.navbar-collapse.collapse.in").outerHeight();
		}
		$("footer input:not([type=submit]), footer textarea").keydown(function() {
			$("footer input:not([type=submit]), footer textarea").removeClass(
				"blinkers"
			);
		});
	}
	if ($(".welcome-banner").length) {
		$(".welcome-banner")
			.outerHeight($(window).height())
			.outerWidth($(window).width());
		$(".em-item.content").outerWidth($(window).width());
		$("ul.animated li").hide();
		$("ul.animated li")
			.eq(0)
			.show();
		$(
			".text-div, nav.transparent_navigation ul.navigation_ul li:not(.logo) a, footer .secondary-navigation a"
		).hover(
			function() {
				$(".text-div").addClass("somehowhovered");
				$(
					"nav.transparent_navigation ul.navigation_ul li:not(.logo) a"
				).addClass("somehowhovered");
				$("footer .secondary-navigation a:not(.selected)").addClass(
					"somehowhovered"
				);
			},
			function() {
				$(".text-div").removeClass("somehowhovered");
				$(
					"nav.transparent_navigation ul.navigation_ul li:not(.logo) a"
				).removeClass("somehowhovered");
				$("footer .secondary-navigation a:not(.selected)").removeClass(
					"somehowhovered"
				);
			}
		);
	}

	var offsett = 70;
	$(".incrementpercent").each(function() {
		var start = $(this).attr("data-start");
		$(this).html(start + "%");
    });
    
	$(document.body).on("touchmove", onScroll); // for mobile
	$(window).on("scroll", onScroll);
	function onScroll(event) {
		event.preventDefault();
		var height = $(window).height();
		var hundrethheight = height / 100;
		$(".rotatein").each(function() {
			var rotateinoffset = $(this).offset().top;
			if (rotateinoffset < 60 * hundrethheight + $(window).scrollTop()) {
				$(this).addClass("rotated");
			}
		});
		if ($(".ghost").length) {
			var slide = $(".ghost").offset().top;

			if (slide < 60 * hundrethheight + $(window).scrollTop()) {
				$(".ghost").addClass("appear");
			}
		}
		$(".slide").each(function() {
			var slide = $(this).offset().top;
			var height = $(window).height();
			var hundrethheight = height / 100;
			if (slide < $(window).scrollTop() + 60 * hundrethheight)
				$(this).addClass("sliding");
		});

		if ($("div.proress_div").length) {
			$("div.proress_div div.proress").each(function() {
				var slide = $(this).offset().top;
				var height = $(window).height();
				var hundrethheight = height / 100;
				if (slide < $(window).scrollTop() + 60 * hundrethheight)
					$(this).addClass("incrementing");
			});
		}
		$(".incrementpercent").each(function() {
			var stringstart = $(this).attr("data-start");
			var start = parseInt(stringstart, 10);
			var stringend = $(this).attr("data-end");
			var end = parseInt(stringend, 10);
			var thiss = $(this);
			var i = 0;
			var intermediate = start;
			if (
				$(this).offset().top <
				$(window).scrollTop() + 60 * ($(window).height() / 100)
			) {
				if (!$(this).hasClass("stoppp")) {
					var increment = setInterval(function() {
						intermediate += 1;
						thiss.html(intermediate + "%");
						if (intermediate >= end) {
							clearInterval(increment);
						}
					}, 40);
					i++;
				}
				i++;
				if (i >= 1) {
					$(this).addClass("stoppp");
				}
			}
		});

		var windowheight = $(window).height();
		if ($(window).scrollTop() > offsett) {
			if ($(window).width() < 666) {
				$(".responsivenavbar")
					.removeClass("transparentbar")
					.addClass("opaquebar");
				$("#first-bar, #second-bar, #third-bar").removeClass("white");
				$(".responsivenavbar .logo").removeClass("inverse");
			}
			$("nav.opaque_navigation").slideDown("fast");
		} else {
			$("nav.opaque_navigation").slideUp("fast");
			if ($(window).width() < 666) {
				$(".responsivenavbar")
					.removeClass("opaquebar")
					.addClass("transparentbar");
				$("#first-bar, #second-bar, #third-bar").addClass("white");
				$(".responsivenavbar .logo").addClass("inverse");
			}
		}
		if ($(window).scrollTop() > windowheight - 80) {
			$(".gotop").fadeIn("slow");
		} else {
			$(".gotop").fadeOut("slow");
		}
	}
	$(".gotop").click(function(event) {
		event.preventDefault();
		$("html, body").animate(
			{
				scrollTop: 0,
			},
			2000
		);
	});
	$(".gotop").bind("tap", gotop);

	function gotop(event) {
		event.preventDefault();
		$("html, body").animate(
			{
				scrollTop: 0,
			},
			2000
		);
	}
});

function EricSlideshow(delayy, transitiondurationn) {
	delay = parseInt(delayy, 10) || 3000;
	transitionduration = parseInt(transitiondurationn, 10) || 2000;
	var length = $("ul.animated li").length;
	var reallength = length - 1;
	var n = 0;
	var initialvalue;
	var value;
	$("ul.animated li")
		.eq(n)
		.show();
	setInterval(function() {
		n += 1;
		if (n > reallength) {
			n = 0;
		}

		var value = Math.floor(Math.random() * 10);

		while (
			value != 0 &&
			value != 1 &&
			value != 2 &&
			value != 3 &&
			value == initialvalue /* && value != 4 && value != 5*/
		) {
			value = Math.floor(Math.random() * 10);
		}

		initialvalue = value;

		$("ul.animated li").hide();
		if (value == 0) {
			$("ul.animated li")
				.eq(n)
				.show()
				.addClass("jumpin")
				.delay(4000);
		} else if (value == 1) {
			$("ul.animated li")
				.eq(n)
				.show()
				.addClass("jumpdown")
				.delay(4000);
		} else if (value == 2) {
			$("ul.animated li")
				.eq(n)
				.show()
				.addClass("rotatedown")
				.delay(4000);
		} else {
			$("ul.animated li")
				.eq(n)
				.show()
				.addClass("flip")
				.delay(4000);
		}
	}, delay);
}

function scrollSpy() {
	var aboutoffset = $("#about").offset().top - 60;
	var servicesoffset = $("#services").offset().top - 60;
	var portfoliooffset = $("#portfolio").offset().top - 60;
	var contactoffset = $("#contact").offset().top - 60;
	$(window).scroll(function() {
		if ($(window).scrollTop() >= 0 && $(window).scrollTop() < servicesoffset) {
			if (
				!$(
					".transparent_navigation a.home, .opaque_navigation a.home, footer a.home"
				).hasClass("selected")
			) {
				$(
					".transparent_navigation a, .opaque_navigation a, footer a"
				).removeClass("selected");
				$(
					".opaque_navigation a.home, .transparent_navigation a.home, footer a.home"
				).addClass("selected");
			}
		} else if (
			$(window).scrollTop() >= servicesoffset &&
			$(window).scrollTop() < aboutoffset
		) {
			if (
				!$(
					".transparent_navigation a.services, .opaque_navigation a.services, footer a.services"
				).hasClass("selected")
			) {
				$(
					".transparent_navigation a, .opaque_navigation a, footer a"
				).removeClass("selected");
				$(
					".opaque_navigation a.services, .transparent_navigation a.services, footer a.services"
				).addClass("selected");
			}
		} else if (
			$(window).scrollTop() >= aboutoffset &&
			$(window).scrollTop() < portfoliooffset
		) {
			if (
				!$(
					".transparent_navigation a.about, .opaque_navigation a.about, footer a.about"
				).hasClass("selected")
			) {
				$(
					".transparent_navigation a, .opaque_navigation a, footer a"
				).removeClass("selected");
				$(
					".opaque_navigation a.about, .transparent_navigation a.about, footer a.about"
				).addClass("selected");
			}
		} else if (
			$(window).scrollTop() >= portfoliooffset &&
			$(window).scrollTop() < contactoffset
		) {
			if (
				!$(
					".transparent_navigation a.portfolio, .opaque_navigation a.portfolio, footer a.portfolio"
				).hasClass("selected")
			) {
				$(
					".transparent_navigation a, .opaque_navigation a, footer a"
				).removeClass("selected");
				$(
					".opaque_navigation a.portfolio, .transparent_navigation a.portfolio, footer a.portfolio"
				).addClass("selected");
			}
		} /*
         else if($(window).scrollTop() >= blogoffset && $(window).scrollTop() < contactoffset){
         if(!$('.transparent_navigation a.blog, .opaque_navigation a.blog, footer a.blog').hasClass('selected')){
         $('.transparent_navigation a, .opaque_navigation a, footer a').removeClass('selected');
         $('.opaque_navigation a.blog, .transparent_navigation a.blog, footer a.blog').addClass('selected');
         }
         }*/ else if (
			$(window).scrollTop() >= contactoffset
		) {
			if (
				!$(
					".transparent_navigation a.contact, .opaque_navigation a.contact, footer a.contact"
				).hasClass("selected")
			) {
				$(
					".transparent_navigation a, .opaque_navigation a, footer a"
				).removeClass("selected");
				$(".transparent_navigation a.contact, footer a.contact").addClass(
					"selected"
				);
			}
		}
	});
}

function responsive() {
	var windowheight = $(window).height();
	var windowwidth = $(window).width();
	$(".welcome-banner").outerHeight(windowheight);
	$(window).resize(function() {
		$(
			".welcome-banner, .background-container, .welcome-banner .content"
		).outerHeight(windowheight);
		$(
			".welcome-banner, .background-container, .welcome-banner .content"
		).outerWidth(windowwidth);
	});
}
function getDropdownHeight() {
	$(".collapse.navbar-collapse").addClass("in");
	var heit = $(".collapse.navbar-collapse.in").outerHeight();
	$(".collapse.navbar-collapse").removeClass("in");
	return heit;
}
