;(function ($, window, undefined) {
  'use strict';

  var $doc = $(document),
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
    advanceSpeed: 2500,
    afterSlideChange: function(){

        var y = this.$slides.eq(this.activeSlide);

        if($(y).index()){
          var index = $(y).index() - 1;
        }

        var title = $(y).data('title');
        var view = $(y).data('view');
        var comment = $(y).data('comment');
        var favorite = $(y).data('favorite');
        var date = $(y).data('date');

        $(y).closest('.principal').find('.title-category-child-1').html(title);
        $(y).closest('.principal').find('span.view').html(view);
        $(y).closest('.principal').find('span.comment').html(comment);
        $(y).closest('.principal').find('span.favorite').html(favorite);
        $(y).closest('.principal').find('span.date').html(date);
    }
  });

    $("#slide-3, #slide-4, #slide-5, #slide-6").orbit({
    bullets: true,
    bulletThumbs: false,
    captions: false,
    fluid: true,
    directionalNav: false,
    advanceSpeed: 2500,
    afterSlideChange: function(){

        var y = this.$slides.eq(this.activeSlide);

        if($(y).index()){
          var index = $(y).index() - 1;
        }

        var title = $(y).data('title');
        var view = $(y).data('view');
        var comment = $(y).data('comment');
        var favorite = $(y).data('favorite');
        var date = $(y).data('date');

        $(y).closest('.sub-principal').find('.title-category-child-1').html(title);
        $(y).closest('.sub-principal').find('span.view').html(view);
        $(y).closest('.sub-principal').find('span.comment').html(comment);
        $(y).closest('.sub-principal').find('span.favorite').html(favorite);
        $(y).closest('.sub-principal').find('span.date').html(date);
    }
  });



   $('#slide-1, #slide-2, #slide-3, #slide-4, #slide-5, #slide-6').trigger('orbit.stop');

   $('#slide-1, #slide-2').on("mouseenter", function(){
      $(this).trigger('orbit.start');
      $(this).closest('.principal').find('.title-category-child-1, .small, .extras-top ul').fadeToggle("fast","linear");
   }).on("mouseleave",function(){
      $(this).trigger('orbit.stop');
      $(this).closest('.principal').find('.title-category-child-1, .small, .extras-top ul').fadeToggle("fast","linear");
   });

   $('#slide-3, #slide-4, #slide-5, #slide-6').on("mouseenter", function(){
      $(this).trigger('orbit.start');
      $(this).closest('.sub-principal').find('.extras-top-2 ul, .extras .title').fadeToggle("fast","linear");
    }).on("mouseleave",function(){
      $(this).trigger('orbit.stop');
      $(this).closest('.sub-principal').find('.extras-top-2 ul, .extras .title').fadeToggle("fast","linear");
    });
/****** Interações ******/

  $(".icon-menu").click(function(){
      $(this).closest('.principal').find('.category-list').removeClass('fadeOutDown').addClass('block fadeInUp');
  });
  
  $('.category-list').on("mouseleave",function(){
    $(this).closest('.principal').find('.category-list').removeClass('fadeInUp').addClass('fadeOutDown');
  });

  $('.link-category').each(function() {
    var category = $(this).data('category');
    $(this).find('.label-category p').html(category);
  });

  $('.link-category').mouseenter(function(){
    var title = $(this).data('title');
    $(this).find('.title p:first-child').html(title);
    

    /* Quadrados menores */
    if($(this).hasClass('small')){
      $(this).find('.label-category').css('display','block').animate( { bottom:'29%'});
    }else{
      $(this).find('.label-category').css('display','block').animate( { bottom:'39%'});
    }
    
    $(this).find('.title').css('display','block').animate( { bottom:'0%'});
  }).mouseleave(function(){
    $(this).find('.title').animate( { bottom:'-39%'}).fadeToggle("fast","linear");
    $(this).find('.label-category').css('display','block').animate( { bottom:'2%'});
  });


    var $container = $('.container');

    $container.imagesLoaded( function(){
      $container.masonry({
        itemSelector : '.box',
        isAnimated: true,
        columnWidth: 240
      });
    });

  $(".arrow-right").click(function () { 
    console.log('right:ok');
      $('html, body').animate({
          scrollTop: 0,
          scrollLeft: 1000
      }, 1000);
  });

  $(".arrow-left").click(function () { 
    console.log('left:ok');
      $('html, body').animate({
          scrollTop: 0,
          scrollLeft: 0
      }, 1000);
  });

  $('.arrow-left, .arrow-right').mouseenter(function(){
    $(this).addClass('animated shake');
  }).mouseleave(function(){
    $(this).removeClass('animated shake');
  });

  $('.animate-tada').mouseenter(function(){
    $(this).addClass('animated tada');
  }).mouseleave(function(){
    $(this).removeClass('animated tada');
  });

  /* Ajax */

  var href = null;

      $('#test-ajax').on('click', function(e) {
        //$("#loading").show();
        href = $(this).attr("href");
        console.log("href: "+href);
        loadContent(href);
        
        // HISTORY.PUSHSTATE
        history.pushState('', 'New URL: '+href, href);
        e.preventDefault();
      });
      

    function loadContent(url){
      // USES JQUERY TO LOAD THE CONTENT
      console.log('ajax1:ok');

      $.ajax({
          url: 'post-content.html',
          type: "GET",
          dataType: "html"
        }).done(function ( data ) {

            $('.tile').css("display","none");
            $('body').css('width','auto');
            //$().after(data).fadeIn("slow");
              
              var rows = $('body > header');
              rows.hide();
              rows.after(data);
              rows.fadeIn("slow");
        });

      
    }


})(jQuery, this);