setTimeout(function(){
  var widecardheight = $('.wide-card').outerHeight();
  var perwidecardheight = widecardheight/100;
  var firstheight = 54.2*perwidecardheight;
  var secondheight = 53.8*perwidecardheight;
  $('.mission-div').css({'padding-bottom': secondheight});
  $('.first-section').outerHeight(firstheight);
}, 1500);
