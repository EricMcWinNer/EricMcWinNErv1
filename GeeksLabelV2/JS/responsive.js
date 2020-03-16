/**
  * Geek Label's Responsive Javascript script for Compucorp
  *
  * Built by Eric Aprioku AKA Eric McwinNEr
  *
  * 13-07-2017
  **/
$(document).ready(function(){
  $('[id$="-slide"]').outerHeight($(window).height());//Declare height and make it work for older browsers/mobile browsers that do not support "vh" css unit
  /*RESPONSIVE SCRIPTS FOR FIRST SLIDE*/
  var windowheight = $(window).height();//Delcaring variables
  var perwindow = windowheight/100;
  var firstslideheight = $('.logocontainer').outerHeight();
  var marginbottom = (3*perwindow) + 50 + (10*perwindow);
  if($(window).height() <= 320)
    marginbottom = (3*perwindow) + 50;
  var margintop = windowheight - firstslideheight - marginbottom;
  $('.logocontainer').css({"margin-top":margintop, "margin-bottom":marginbottom});//Set a calculated dynamic top & bottom margins for the contents of the first slide to help make it responsive
  /*END OF RESPONSIVE SCRIPTS FOR FIRST SLIDE*/
  /*RESPONSIVE SCRIPTS FOR SECOND, THIRD AND FOURTH SLIDES*/
  $('.greyslidecol').each(function(){
    marginbottom = (3*perwindow) + 50 + (5*perwindow);
    var colheight = $(this).outerHeight();
    margintop = windowheight - colheight - marginbottom;
    $(this).css({"margin-top":margintop, "margin-bottom":marginbottom});
  });
  /*END OF RESPONSIVE SCRIPTS FOR SECOND, THIRD AND FOURTH SLIDES*/
  /*RESPONSIVE SCRIPTS OF FIFTH SLIDE*/
  var servicerow = $('.servicerow').outerHeight();
  var fifthtitle = $('#fifth-slide p.title').outerHeight() + parseInt($('#fifth-slide p.title').css("margin-top"), 10) + parseInt($('#fifth-slide p.title').css("margin-bottom"), 10);
  marginbottom = (3*perwindow) + 50 + (10*perwindow) + (6*perwindow);
  if($(window).width() <= 600 || $(window).height() <= 460){
    marginbottom = (3*perwindow) + 50 + (10*perwindow) + (32*perwindow);
    margintop = windowheight - fifthtitle - servicerow - marginbottom;
    $('.servicerow .col-md-3').removeClass('col-xs-3 col-sm-3');
    $('.servicerow').css({"margin-top":margintop});
    if($(window).width() <= 460){
      $('.servicerow .col-md-3').removeClass('col-xs-3');
      marginbottom = (3*perwindow) + 50 + (10*perwindow) + (32*perwindow) - (5*perwindow);
      margintop = windowheight - fifthtitle - servicerow - marginbottom;
      $('.servicerow').css({"margin-top":margintop});
    }
  }
  else{
    margintop = windowheight - fifthtitle - servicerow - marginbottom;
    $('.servicerow').css({"margin-top":margintop});
  }
  /*RESPONSIVE SCRIPTS OF FIFTH SLIDE END*/
  /*RESPONSIVE SCRIPTS OF SEVENTH SLIDE*/
  if((($(window).width() < 990) && $(window).height() < 500) || ($(window).height() > $(window).width())){
    var src = $('img#findus').attr('src');
    $('img#findus').hide();
    $('div.full-width').css({
      'background-image':'url(' + src + ')',
      'background-size':'cover',
      'background-position':'center'
    });
  }
  /*RESPONSIVE SCRIPTS OF SEVENTH SLIDE END*/
  $(window).resize(function(){
    $('[id$="-slide"]').outerHeight($(window).height());//Make the slide dynamic by changing the height to suite the device's height whenever the window is resized.
    /*RESPONSIVE SCRIPTS FOR FIRST SLIDE*/
    var windowheight = $(window).height();
    var perwindow = windowheight/100;
    var firstslideheight = $('.logocontainer').outerHeight();
    var marginbottom = (3*perwindow) + 50 + (10*perwindow);
    if($(window).height() <= 320)
      marginbottom = (3*perwindow) + 50;
    else
      marginbottom = (3*perwindow) + 50 + (10*perwindow);
    var margintop = windowheight - firstslideheight - marginbottom;
    $('.logocontainer').css({"margin-top":margintop, "margin-bottom":marginbottom});
    /*END OF RESPONSIVE SCRIPTS FOR FIRST SLIDE*/
    /*RESPONSIVE SCRIPTS FOR SECOND, THIRD AND FOURTH SLIDES*/
    $('.greyslidecol').each(function(){
      marginbottom = (3*perwindow) + 50 + (5*perwindow);
      var colheight = $(this).outerHeight();
      margintop = windowheight - colheight - marginbottom;
      $(this).css({"margin-top":margintop, "margin-bottom":marginbottom});
    });
    /*END OF RESPONSIVE SCRIPTS FOR SECOND, THIRD AND FOURTH SLIDES*/
    /*RESPONSIVE SCRIPTS OF FIFTH SLIDE/
    var servicerow = $('.servicerow').outerHeight();
    marginbottom = (3*perwindow) + 50 + (10*perwindow);
    var fifthtitle = $('#fifth-row p.title').outerHeight() + parseInt($('#fifth-row p.title').css("margin-top"), 10) + parseInt($('#fifth-row p.title').css("margin-bottom"), 10);
    margintop = windowheight - fifthtitle - firstslideheight - marginbottom;
    $('.servicerow').css({"margin-top":margintop});
    if(($(window).height() <= 460) || ($(window).width() <= 600))
      $('.servicerow .col-md-3').removeClass('col-xs-3 col-sm-3');
    else
      $('.servicerow .col-md-3').addClass('col-xs-3');
    /(RESPONSIVE SCRIPTS OF FIFTH SLIDE END/*/
    /*RESPONSIVE SCRIPTS OF FIFTH SLIDE*/
    var servicerow = $('.servicerow').outerHeight();
    var fifthtitle = $('#fifth-slide p.title').outerHeight() + parseInt($('#fifth-slide p.title').css("margin-top"), 10) + parseInt($('#fifth-slide p.title').css("margin-bottom"), 10);
    marginbottom = (3*perwindow) + 50 + (10*perwindow) + (6*perwindow);
    if($(window).width() <= 600 || $(window).height() <= 460){
      marginbottom = (3*perwindow) + 50 + (10*perwindow) + (32*perwindow);
      margintop = windowheight - fifthtitle - servicerow - marginbottom;
      $('.servicerow .col-md-3').removeClass('col-xs-3 col-sm-3');
      $('.servicerow').css({"margin-top":margintop});
      if($(window).width() <= 460){
        $('.servicerow .col-md-3').removeClass('col-xs-3');
        marginbottom = (3*perwindow) + 50 + (10*perwindow) + (32*perwindow) - (5*perwindow);
        margintop = windowheight - fifthtitle - servicerow - marginbottom;
        $('.servicerow').css({"margin-top":margintop});
      }
      else{
        marginbottom = (3*perwindow) + 50 + (10*perwindow) + (32*perwindow);
        margintop = windowheight - fifthtitle - servicerow - marginbottom;
        $('.servicerow .col-md-3').removeClass('col-xs-3 col-sm-3');
        $('.servicerow').css({"margin-top":margintop});
      }
    }
    else{
      var servicerow = $('.servicerow').outerHeight();
      var fifthtitle = $('#fifth-slide p.title').outerHeight() + parseInt($('#fifth-slide p.title').css("margin-top"), 10) + parseInt($('#fifth-slide p.title').css("margin-bottom"), 10);
      marginbottom = (3*perwindow) + 50 + (10*perwindow) + (6*perwindow);
      margintop = windowheight - fifthtitle - servicerow - marginbottom;
      $('.servicerow').css({"margin-top":margintop});
    }

    /*RESPONSIVE SCRIPTS OF FIFTH SLIDE END*/
    /*RESPONSIVE SCRIPTS OF SEVENTH SLIDE*/
    if((($(window).width() < 990) && $(window).height() < 500) || ($(window).height() > $(window).width())){
      var src = $('img#findus').attr('src');
      $('img#findus').hide();
      $('div.full-width').css({
        'background-image':'url(' + src + ')',
        'background-size':'cover'
      });
    }
    else{
      $('img#findus').show();
      $('div.full-width').css({
        'background-image':'none'
      });
    }
    /*RESPONSIVE SCRIPTS OF SEVENTH SLIDE END*/
  });
});
