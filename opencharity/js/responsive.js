$(document).ready(function(){

  $('.wrapper').addClass('responsivewrapper');
  if($(window).width() < 996){
    $('.responsivewrapper').removeClass('wrapper').addClass('largewrapper');
  }
  if($(window).width() < 638){
    $('#register_div, #register_div a').removeClass('float-right');

  }
  if($(window).width() < 601){
    var indicator = -1;
    var logo = $('div.navigation ul.navigation-content li img.logo');
    var widdth = logo.outerWidth();
    widdth += 30
    $(".menu").click(function (event) {
        event.preventDefault();
        indicator += 1;
        if(indicator == 0){
          widdth += (widdth/100) * 30;
          $('#menu-bar').addClass('animatenav');
          logo.css({"margin-left":-(widdth)});
          $('a.menu').css({'position':'absolute','top':'22px','left':0});
          $('div.navigation ul.navigation-content li.float-right').fadeIn();

        }
        else if((indicator%2) == 0){
          width += (widdth/100) * 30;
          $('#menu-bar').addClass('animatenav');
          logo.css({"margin-left":-(widdth)});
          $('a.menu').animate({'left':0}, 1500);
          $('a.menu').css({'position':'absolute','top':'22px','left':0});
          $('div.navigation ul.navigation-content li.float-right').fadeIn();
        }
        else if((indicator%2) == 1){
          logo.css({"margin-left":-(0)});
          $('#menu-bar').removeClass('animatenav');
          $('a.menu').css({'position':'static','top':0,'left':0});
          $('div.navigation ul.navigation-content li.float-right').fadeOut();
        }

    });
  }
  if($('div.content').outerHeight() + parseInt($('#content-div').css("padding-top"), 10) > $('#content-div').outerHeight()){
    $('#content-div,div.header').outerHeight($('div.content').outerHeight() + parseInt($('#content-div').css("padding-top"), 10) + 50);
  }
  $(window).resize(function(){
    if($('div.content').outerHeight() + parseInt($('#content-div').css("padding-top"), 10) > $('#content-div').outerHeight()){
      $('#content-div,div.header').outerHeight($('div.content').outerHeight() + parseInt($('#content-div').css("padding-top"), 10) + 50);
    }
    if($(window).width() < 996){
      $('.responsivewrapper').removeClass('wrapper').addClass('largewrapper');
    }
    else{
      $('.responsivewrapper').removeClass('largewrapper').addClass('wrapper');
    }
    if($(window).width() < 638){
      $('#register_div, #register_div a').removeClass('float-right');
    }
    else{
      $('#register_div, #register_div a').addClass('float-right');
    }
    if($(window).width() < 601){
      var indicator = -1;
      var logo = $('div.navigation ul.navigation-content li img.logo');
      var widdth = logo.outerWidth();
      widdth += 30
      $(".menu").click(function (event) {
          event.preventDefault();
          indicator += 1;
          if(indicator == 0){
            widdth += (widdth/100) * 30;
            $('#menu-bar').addClass('animatenav');
            logo.css({"margin-left":-(widdth)});
            $('a.menu').css({'position':'absolute','top':'22px','left':0});
            $('div.navigation ul.navigation-content li.float-right').fadeIn();

          }
          else if((indicator%2) == 0){
            widdth += (widdth/100) * 30;
            $('#menu-bar').addClass('animatenav');
            logo.css({"margin-left":-(widdth)});
            $('a.menu').animate({'left':0}, 1500);
            $('a.menu').css({'position':'absolute','top':'22px','left':0});
            $('div.navigation ul.navigation-content li.float-right').fadeIn();
          }
          else if((indicator%2) == 1){
            logo.css({"margin-left":-(0)});
            $('#menu-bar').removeClass('animatenav');
            $('a.menu').css({'position':'static','top':0,'left':0});
            $('div.navigation ul.navigation-content li.float-right').fadeOut();
          }
      });
    }
    else{
      $('div.navigation ul.navigation-content li.float-right').fadeIn();
    }
    var widecardheight = $('.wide-card').outerHeight();
    var perwidecardheight = widecardheight/100;
    var firstheight = 54.2*perwidecardheight;
    var secondheight = 53.8*perwidecardheight;
    $('.mission-div').css({'padding-bottom': secondheight});
    $('.first-section').outerHeight(firstheight);
  });
});
