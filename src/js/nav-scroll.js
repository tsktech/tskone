jQuery(document).ready(function($) {
  //dynamic scroll to top link
  $link = '<a href="#top" class="top fas fa-angle-up"></a>';
  $('body').append($link);
  $('.top').hide();
  $(window).scroll(function() {
    if ($(this).scrollTop() > 100) {
      $('.top').fadeIn();
    } else {
      $('.top').fadeOut();
    }
  });
  $('.top').click(function(e) {
    e.preventDefault();
    $('html, body').animate({scrollTop: 0}, 300);
  });

  // Open External links in a new tab
  $('a').
      filter('[href^="http"], [href^="//"]').
      not('[href*="' + window.location.host + '"]').
      attr('rel', 'noopener noreferrer').
      attr('target', '_blank');

  // $('figure').css('width', '100%');
});
/*
$(window).scroll(function(){
   if ($(window).scrollTop() == 0) {
    $(".navbar").removeClass("fixed-top");
 } else {
    $(".navbar").addClass("fixed-top");
 }
});
https://stackoverflow.com/questions/44526926/show-bootstrap-banner-at-the-top-before-navbar
*/

/*$(document).ready(function() {
  $('#navtest').affix({
    offset: {
      top: $('header').height()
    }
  });
  $('#navtest').on('affix.bs.affix', function () {
    var navHeight = $('.navbar').outerHeight(true);
    $('#navtest + .container').css('margin-top', navHeight);
  });
  $('#navtest').on('affix-top.bs.affix', function () {
    $('#navtest + .container').css('margin-top', 0);
  });
});
https://teamtreehouse.com/community/bootstrap-fixed-navbar-with-content-above*/
