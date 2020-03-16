$(document).ready(function(){
  if($(window).width() < 992){
    $('.container').addClass('remembercontainer container-fluid').removeClass('container');
    $('.portfolio-image').addClass('nonemargin');
  }
  if($(window).width() < 768){

  }
  if($(window).width() <= 600){
    $('.phone-4').removeClass('col-xs-4').addClass('col-xs-12');
  }
  if($(window).width() <= 480){
    $('.phone-6').removeClass('col-xs-6 col-xs-offset-3').addClass('col-xs-12');
  }
  if($(window).width() < 380){
      $('div.forms input:not([type="submit"])').removeClass('half').addClass('full').css({"margin-top":"2%", "margin-bottom":"2%"});
      $('div.forms textarea').css({"margin-top":"2%"});
  }
  $('.welcome-banner').outerHeight($(window).height()).outerWidth($(window).width());
  $(window).resize(function(){
    if($(window).width() < 992){
      $('.container').addClass('remembercontainer container-fluid').removeClass('container');
      $('.portfolio-image').addClass('nonemargin');
    }
    else{
      $('.remembercontainer').removeClass('container-fluid').addClass('container');
      $('.portfolio-image').removeClass('nonemargin');
    }
    if($(window).width() < 768){
      $('.container').addClass('remembercontainer container-fluid').removeClass('container');
      $('.portfolio-image').addClass('nonemargin');
    }
    else{
      $('remembercontainer').removeClass('container-fluid').addClass('container');
      $('.portfolio-image').removeClass('nonemargin');
    }
    if($(window).width() < 600){
      $('.phone-4').removeClass('col-xs-4').addClass('col-xs-12');
    }
    else{
        $('.phone-4').removeClass('col-xs-12').addClass('col-xs-4');
    }
    if($(window).width() <= 480){
      $('.phone-6').removeClass('col-xs-6 col-xs-offset-3').addClass('col-xs-12');
    }
    else{
      $('.phone-6').removeClass('col-xs-12').remove('col-xs-6 col-xs-offset-3');
    }
    if($(window).width() < 460){
        $('div.forms input:not([type="submit"])').removeClass('half').addClass('full').css({"margin-top":"2%", "margin-bottom":"2%"});
        $('div.forms textarea').css({"margin-top":"2%"});
    }
    else{
        $('div.forms input:not([type="submit"])').removeClass('full').addClass('add');
        $('div.forms textarea').css({"margin-top":"1%"});
    }
    $('.welcome-banner').outerHeight($(window).height()).outerWidth($(window).width());

  });
});