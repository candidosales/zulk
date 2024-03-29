;(function ($, window, undefined) {
  'use strict';

  var $doc = $(document);
  Modernizr = window.Modernizr;

  $(document).ready(function() {
    $.fn.foundationAlerts           ? $doc.foundationAlerts() : null;
    $.fn.foundationButtons          ? $doc.foundationButtons() : null;
    $.fn.foundationAccordion        ? $doc.foundationAccordion() : null;
    $.fn.foundationNavigation       ? $doc.foundationNavigation() : null;
    $.fn.foundationTopBar           ? $doc.foundationTopBar() : null;
    $.fn.foundationCustomForms      ? $doc.foundationCustomForms() : null;
    $.fn.foundationMediaQueryViewer ? $doc.foundationMediaQueryViewer() : null;
    $.fn.foundationTabs             ? $doc.foundationTabs({callback : $.foundation.customForms.appendCustomMarkup}) : null;
    $.fn.foundationTooltips         ? $doc.foundationTooltips() : null;
    $.fn.foundationMagellan         ? $doc.foundationMagellan() : null;
    $.fn.foundationClearing         ? $doc.foundationClearing() : null;

    $.fn.placeholder                ? $('input, textarea').placeholder() : null;
  });

  // UNCOMMENT THE LINE YOU WANT BELOW IF YOU WANT IE8 SUPPORT AND ARE USING .block-grids
  // $('.block-grid.two-up>li:nth-child(2n+1)').css({clear: 'both'});
  // $('.block-grid.three-up>li:nth-child(3n+1)').css({clear: 'both'});
  // $('.block-grid.four-up>li:nth-child(4n+1)').css({clear: 'both'});
  // $('.block-grid.five-up>li:nth-child(5n+1)').css({clear: 'both'});

  // Hide address bar on mobile devices (except if #hash present, so we don't mess up deep linking).
  if (Modernizr.touch && !window.location.hash) {
    $(window).load(function () {
      setTimeout(function () {
        window.scrollTo(0, 1);
      }, 0);
    });
  }

  $("#slide-1, #slide-2").orbit({
    bullets: true,
    bulletThumbs: false,
    captions: false,
    fluid: true,
    directionalNav: false,
    advanceSpeed: 500,
    timer: false,
    afterSlideChange: function(){

        var y = this.$slides.eq(this.activeSlide);

        var a = new Array();
        a['obj'] = $(y);
        a['title'] = $(y).data('title');
        a['view'] = $(y).data('view');
        a['comment'] = $(y).data('comment');
        a['favorite'] = $(y).data('favorite');
        a['date'] = $(y).data('date');

        a['id'] = '#'+$(y).closest('.slide').attr('id');
        a['class'] = '.principal';

        insertCaption(a);
    }
  });

    $("#slide-3, #slide-4, #slide-5, #slide-6").orbit({
    bullets: true,
    bulletThumbs: false,
    captions: false,
    fluid: true,
    directionalNav: false,
    advanceSpeed: 500,
    timer: false,
    afterSlideChange: function(){

        var y = this.$slides.eq(this.activeSlide);

        var a = new Array();
        a['obj'] = $(y);
        a['title'] = $(y).data('title');
        a['view'] = $(y).data('view');
        a['comment'] = $(y).data('comment');
        a['favorite'] = $(y).data('favorite');
        a['date'] = $(y).data('date');

        a['id'] = '#'+$(y).closest('.slide').attr('id');
        a['class'] = '.sub-principal';

        insertCaption(a);
    }
  });

    var count = 0;
    $('.slide').each(function(){
        var img = $(this).find('img:first-child');

        var a = new Array();
        a['title'] = img.data('title');
        a['view'] = img.data('view');
        a['comment'] = img.data('comment');
        a['favorite'] = img.data('favorite');
        a['date'] = img.data('date');

        a['id'] = '#'+$(this).attr('id');
        if(count < 2){
           a['class'] = '.principal';
         }else{
           a['class'] = '.sub-principal';
         }
         count++;
        insertCaption(a);
    });

    function insertCaption(y){
        $(y['id']).closest(y['class']).find('.title-category-child').html(y['title']);
        $(y['id']).closest(y['class']).find('span.view').html(y['view']);
        $(y['id']).closest(y['class']).find('span.comment').html(y['comment']);
        $(y['id']).closest(y['class']).find('span.favorite').html(y['favorite']);
        $(y['id']).closest(y['class']).find('span.date').html(y['date']);
    }


   $('#slide-1, #slide-2, #slide-3, #slide-4, #slide-5, #slide-6').trigger('orbit.stop');

   
   $('ul.orbit-bullets li').mouseenter(function(){

      var index = $(this).index();

      console.log(index);
      var obj = $(this).closest('.principal').find('.slide');
      obj.trigger('orbit.goto', index);


      var obj = $(this).closest('.sub-principal').find('.slide');
      obj.trigger('orbit.goto', index);
    });

/****** Interações ******/

  $(".icon-menu").click(function(){
      $(this).closest('.principal').find('.category-list').removeClass('fadeOutDown').addClass('block fadeInUp');
  });
  
  $('.category-list').on("mouseleave",function(){
    $(this).closest('.principal').find('.category-list').removeClass('fadeInUp').addClass('fadeOutDown');
  });

  $('.wrapper').each(function(){
    console.log('index wrapper: '+$(this).index());
  });

  var currentPosition = 0;
  var nextPosition = 0;
  var index = 0;

  $('.next').click(function(){
    index = $(this).closest('.wrapper').index()+1;

    currentPosition = $('.wrapper:eq('+index+')').offset().left
    nextPosition = $('.wrapper:eq('+index+')').offset().left - $('.wrapper:eq('+index+')').offset().left * 0.25;

    console.log('currentPosition: '+currentPosition);
    console.log('nextPosition: '+nextPosition);

      /*$('html, body').animate({
        scrollLeft: nextPosition
      }, 1500);*/

    $('html, body').scrollTo('.wrapper:eq('+index+')', 1000, {offset:-400} );
  });

  $('.prev').click(function(){
    var value = 0;
    if($(this).closest('.wrapper').index()>0){
        console.log('é maior');

        index = $(this).closest('.wrapper').index()-1;
        console.log('index: '+index);

        /*nextPosition = nextPosition - nextPosition * (0.9-(index/10)) ;

        console.log('value: '+nextPosition);*/

        /*$('html, body').animate({
          scrollLeft: nextPosition
        }, 1500);*/
        $('html, body').scrollTo('.wrapper:eq('+index+')', 1000, {offset:-400} );
    }    
  });
  

  $('.animate-tada').mouseenter(function(){
    $(this).addClass('animated tada');
  }).mouseleave(function(){
    $(this).removeClass('animated tada');
  });

  /**** Post ****/
  $('.habilita-posts-relacionados').mouseenter(function(){
        $('.posts-relacionados').addClass('height-move');
  });
    
$('.post').mouseenter(function(){
    if($('.posts-relacionados').hasClass('height-move')){
        $('.posts-relacionados').removeClass('height-move');
    }
    
});
  
  $('.image').hover(function(){
	   $(this).addClass('flip');
  },function(){
	   $(this).removeClass('flip');
  });

  /* Animation all */
  var a = {  
      widgets: null,
      init: function () {
        a.widgets = $(".widget");
        $(document.body).addClass("loaded");
          a.widgets.each(function (a) {
            var b = $(this);
            setTimeout(function () {
              b.removeClass("unloaded");
              setTimeout(function () {
                b.removeClass("animation")
              }, 300)
            }, 100 * a)  
          });
      }

   };
  

  $(document).ready(a.init);

  $(window).load(function(){ /*code here*/ 
       var $container = $('.container');
      $container.imagesLoaded( function(){
        $container.masonry({
          itemSelector : '.box',
          isAnimated: true,
          columnWidth: 40
        });
      });
  });

})(jQuery, this);