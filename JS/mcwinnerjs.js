$(window).bind('load', function() {

});
$(document).ready(function() {
  $('#mcwinnerloader').fadeOut();
  $('div.loading').removeClass('loading');
  $('#loadslideup').addClass('slidingup');
  $(".bottomslideup").each(function() {
    $(this).addClass("slideup");
  });
  $('.rotateinplus').each(function() {
    $(this).addClass('rotateplus');
  });
  $('.leftslidein').each(function() {
    (this).addClass('slideright');
  });
  $('.rightslidein').each(function() {
    $(this).addClass('slideleft');
  });
  $('.topslidein').each(function() {
    $(this).addClass('slidedown');
  });
  $('.rotatein').each(function() {
    $(this).addClass('rotate');
  });
  if ($(window).width() > 700) {
    $('.search_box input').focus(function(event) {
      event.preventDefault();
      width = $(window).width();
      wide = (width / 100) * 30;
      $('.second-header').animate({
        'width': wide
      }, 50);
    });
    $('.search_box input').blur(function(event) {
      event.preventDefault();
      width = $(window).width();
      narrow = (width / 100) * 25;
      $('.second-header').animate({
        'width': narrow
      }, 1800);
    });
  }
  var windowheight = $(window).height();
  var navbarheight = 75;
  var popuplinkoffset = $('.calculatePopupOffset').offset().top;
  popuplinkoffset += 40;
  if ($(window).height() < 490 && $(window).width() < 481) {
    popuplinkoffset = 90;
  }
  $('.mcwinner_popup').css({
    'top': popuplinkoffset
  });
  /*$(window).scroll(function(){

   });*/
  $('.show').click(function(e) {
    e.preventDefault();
    $('li.hidden').slideToggle();

  });
  $('.calculatePopupOffset').click(function(event) {
    event.preventDefault();

    $('.mcwinner_popup').toggleClass('abracadabra tada');
    $('.invisible-modal').toggleClass('invisible');
  });
  $('.invisible-modal').click(function() {
    $('.mcwinner_popup').toggleClass('abracadabra tada');
    $(this).toggleClass('invisible');
  });



  //RESPONSIVE.JS
  if ($(window).width() < 1200) {
    $('.header-middle div.container, .header-bottom div.container, .header_top div.container').removeClass('container').addClass('container-fluid fluid-padding');
  }
  if ($(window).width() < 994) {
    $('.button_group_div').removeClass('col-sm-3').addClass('col-sm-2');
    $('.menu_div').removeClass('col-sm-9').addClass('col-sm-10');
  } else {
    $('.button_group_div').addClass('col-sm-3').removeClass('col-sm-2');
    $('.menu_div').addClass('col-sm-9').removeClass('col-sm-10');
  }
  if ($(window).width() < 993) {

    $('.button_group_div').addClass('col-sm-3').removeClass('col-sm-2');
    $('.menu_div').addClass('col-sm-9').removeClass('col-sm-10');
    // $('.btn-group').removeClass('pull-right');
    $('.side_icon.home').removeClass('side_icon');
    $('.side_icon.home').removeClass('side_icon').css('color', 'white');

  }
  if ($(window).width() < 992) {
    $('.responsive').removeClass('container').addClass('container-fluid fluid-padding');
  }
  if ($(window).width() < 400) {
    $('.second-header').removeClass('small_animation');
  }
  $(window).resize(function(event) {
    event.preventDefault();
    if ($(window).width() < 1200)
      $('.header-middle div.container, .header-bottom div.container, .header_top div.container').removeClass('container').addClass('container-fluid fluid-padding');
    else
      $('.header-middle div.container, .header-bottom div.container, .header_top div.container').removeClass('container').removeClass('container-fluid fluid-padding');
    if ($(window).width() < 994) {
      $('.button_group_div').removeClass('col-sm-3').addClass('col-sm-2');
      $('.menu_div').removeClass('col-sm-9').addClass('col-sm-10');
    } else {
      $('.button_group_div').addClass('col-sm-3').removeClass('col-sm-2');
      $('.menu_div').addClass('col-sm-9').removeClass('col-sm-10');
    }
    if ($(window).width() < 993) {
      $('.button_group_div').addClass('col-sm-3').removeClass('col-sm-2');
      $('.menu_div').addClass('col-sm-9').removeClass('col-sm-10');
      $('.side_icon.home').removeClass('side_icon').css('color', 'white');
    }
    if ($(window).width() < 992) {
      $('.responsive').removeClass('container').addClass('container-fluid fluid-padding');
    }
    if ($(window).width() < 400) {
      $('.second-header').removeClass('small_animation');
    }
  });


});
