/**
  * Geek Label's Main Javascript Script for Compucorp
  *
  * Built by Eric Aprioku AKA Eric McwinNEr
  *
  * 13-07-2017
  **/
//Slider Configuration
$(document).ready(function(){
var slider =   $("#lightSlider").lightSlider({
    auto: true,
    loop: true,
    pager: false,
    speed: 1200,
    pause: 3450,
    item: 3,
    slideEndAnimation: false,
    slideMove: 1,
    responsive:[{
      breakpoint: 940,
      settings:{
        item: 1,
        slideMove: 1,
        loop: true,
        pager: true
      }
    }]
  });
  $('#prevbutton').click(function(event){
    event.preventDefault();
    slider.goToPrevSlide();
  });
  $('#nextbutton').click(function(event){
    event.preventDefault();
    slider.goToNextSlide();
  });
















  $(window).resize(function(){









































    /*BUTTONS TO ANIMATE SCROLL DOWN EFFECT NOW MADE TO DYNAMICALLY CHANGE THE DISTANCE TO SCROLL EACH TIME THE WINDOW IS resized*/
    $('#first-slide a.bottom').click(function(event){
      event.preventDefault();
      $('html, body').animate({
        scrollTop: $(window).height()
      }, 600);
    });
    $('#second-slide a.bottom').click(function(event){
      event.preventDefault();
      $('html, body').animate({
        scrollTop: 2*($(window).height())
      }, 600);
    });
    $('#third-slide a.bottom').click(function(event){
      event.preventDefault();
      $('html, body').animate({
        scrollTop: 3*($(window).height())
      }, 600);
    });
    $('#fourth-slide a.bottom').click(function(event){
      event.preventDefault();
      $('html, body').animate({
        scrollTop: 4*($(window).height())
      }, 600);
    });
    $('#fifth-slide a.bottom').click(function(event){
      event.preventDefault();
      $('html, body').animate({
        scrollTop: 5*($(window).height())
      }, 600);
    });
    $('#sixth-slide a.bottom').click(function(event){
      event.preventDefault();
      $('html, body').animate({
        scrollTop: 6*($(window).height())
      }, 600);
    });
    $('#seventh-slide a.bottom').click(function(event){
      event.preventDefault();
      $('html, body').animate({
        scrollTop: 7*($(window).height())
      }, 600);
    });
  });
  /*BUTTONS TO ANIMATE SCROLL DOWN EFFECT*/
  $('#first-slide a.bottom').click(function(event){
    event.preventDefault();
    $('html, body').animate({
      scrollTop: $(window).height()
    }, 600);
  });
  $('#second-slide a.bottom').click(function(event){
    event.preventDefault();
    $('html, body').animate({
      scrollTop: 2*($(window).height())
    }, 600);
  });
  $('#third-slide a.bottom').click(function(event){
    event.preventDefault();
    $('html, body').animate({
      scrollTop: 3*($(window).height())
    }, 600);
  });
  $('#fourth-slide a.bottom').click(function(event){
    event.preventDefault();
    $('html, body').animate({
      scrollTop: 4*($(window).height())
    }, 600);
  });
  $('#fifth-slide a.bottom').click(function(event){
    event.preventDefault();
    $('html, body').animate({
      scrollTop: 5*($(window).height())
    }, 600);
  });
  $('#sixth-slide a.bottom').click(function(event){
    event.preventDefault();
    $('html, body').animate({
      scrollTop: 6*($(window).height())
    }, 600);
  });
  $('#seventh-slide a.bottom').click(function(event){
    event.preventDefault();
    $('html, body').animate({
      scrollTop: 7*($(window).height())
    }, 600);
  });
});
