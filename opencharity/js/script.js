$(document).ready(function(){
  
  var missionoffset = $('.mission-div').offset().top;
  $('#about').click(function(event){
    event.preventDefault();
    $('html, body').animate({
      scrollTop: missionoffset - 80
    }, 1500);
  })
  /*SLICK SLIDE FOR MEMBER SECTION*/
  $('.owl-carousel').owlCarousel({
    loop:true,
    margin:10,
    nav:false,
    autoplay: true,
    responsive:{
        0:{
            items:2
        },

        600:{
            items:3,
            margin: 30,
            stagePadding: 0
        },
        800:{
          items: 4,
          margin: 10,

        },
        1000:{
            items:5
        }
    }
});

  var slider =   $(".blogggg").lightSlider({
      auto: true,
      loop: true,
      pager: false,
      speed: 1200,
      pause: 3450,
      item: 4,
      slideEndAnimation: false,
      slideMove: 1,
      responsive:[{
        breakpoint: 940,
        settings:{
          item: 1,
          slideMove: 1,
          loop: true,
          pager: false
        }
      }]
    });
    $('#left-blog').click(function(event){
      event.preventDefault();
      slider.goToPrevSlide();
    });
    $('#right-blog').click(function(event){
      event.preventDefault();
      slider.goToNextSlide();
    });
  $(window).scroll(function(event) {
    event.preventDefault();
    if($(window).scrollTop() >= $(window).height())
      $('div.animatescrolltop').fadeIn(1500);
    else
      $('div.animatescrolltop').fadeOut();
    $('.ghost').each(function(){
      var ghostfloat = $(this).offset().top;
      var windowheight = $(window).height();
      var windowheightpercent = windowheight/100;
      if(ghostfloat < $(window).scrollTop() + (60*windowheightpercent)){
        $(this).addClass('appear');
      }
    });

    $('.slide').each(function(){
      slide = $(this).offset().top;
      height = $(window).height();
      hundrethheight = height/100;
      if(slide < $(window).scrollTop() + (60*hundrethheight))
        $(this).addClass('sliding');
    });

  });
  $('div.animatescrolltop, a#gotothetop').click(function(event){
    event.preventDefault();
    $('html, body').animate({
      scrollTop: 0
    }, 1500);
  });
});


window.onload = function(){
  $(window).scroll(function(event){
    event.preventDefault();
    /*parallax effect script*/
    var height = $(window).height();
    if($(window).width() >= 760){
      if($(window).scrollTop() <= height){
        var adder = $(window).scrollTop();
        var actualadder = adder/1.5;
        var originalposition = 38;
        $('#background-div').css({'background-position-y':(originalposition-actualadder)});
      }
    }
    /*parallax effect script*/
  })
};
