  var Zulk  = (function () {

    var body = $('body'),
    enter = $('.enter'),
    presentVideo = $('#presentation-video'),
    eventsFired = localStorage.getItem('fired');

    function init(){
        $(window).bind("load", function() {
          presentationVideo();
        });
    }

    function hoverBulletsNext(){
     $('ol.flex-control-nav li').mouseenter(function(){

      var index = $(this).index();
      console.log(index);

      var obj = $(this).closest('.flexslider');
      $('#'+obj.attr('id')).data('flexslider').flexAnimate(index);
    });
   }

   function configureAnimation(){
    var  widgets = null;
    widgets = $(".widget");
    $(document.body).addClass("loaded");
    widgets.each(function (a) {
      var b = $(this);
      setTimeout(function () {
        b.removeClass("unloaded");
        setTimeout(function () {
          b.removeClass("animation")
        }, 300)
      }, 100 * a)  
    });
  }

  /* Animation all */

  function iniciarIntroducao() {


    if (eventsFired != '1'){
      localStorage.setItem('fired', '1');
    }
  }

  iniciarIntroducao();

  function presentationVideo(){
    if (eventsFired != '1'){
      localStorage.setItem('fired', '1');
      body.css({"padding":"0","overflow":"hidden"});
      $(document).ready(configureAnimation());
      enter.addClass('active');
      $('#tile-1').hide();
      presentVideo.attr({
        height:$(window).height()*1.14, 
        width: $(window).width()*1.14
      }).css({
        "margin":"-7% 0 0 -7%"
      });

      enter.on('click','a', function(){
        presentVideo.css({"position":"absolute"}).animate({
          opacity: 0.25,
          top: "-=1100"
        }, 700, function() {
          $('#tile-1').show();
          initializeHome();
        });
      });
      return;
    }
    initializeHome();
  }

  function initializeHome(){
    body.css({"padding":"1.8% 0","overflow":"hidden"});
    enter.remove();
    presentVideo.remove();
          //Create Slide
          createAllSlide();
          insertCaptionFirst();
          //create interactions
          interactionSlide();
          hoverBulletsNext();
          Video.init();
          $(document).ready(body.removeClass("paused"));
        }

        function createAllSlide(){
          $('.principal > .flexslider').flexslider({
            animation: "slide",
            directionNav: false,
            slideshow: false, 
            after: function(slider) {
              var y = slider.slides.eq(slider.currentSlide).find('a');
              var a = new Array();
              a['obj'] = $(y);
              a['title'] = $(y).attr('title');
              a['href'] = $(y).attr('href');
              a['view'] = $(y).data('view');
              a['comment'] = $(y).data('comment');
              a['favorite'] = $(y).data('favorite');
              a['date'] = $(y).data('date');
              a['id'] = '#'+$(y).closest('.slide').attr('id');
              a['class'] = '.principal';
              insertCaption(a);
            }
          });

          $('.sub-principal > .flexslider ').flexslider({
            animation: "slide",
            directionNav: false,
            slideshow: false, 
            after: function(slider) {
              var y = slider.slides.eq(slider.currentSlide).find('a');
              var a = new Array();
              a['obj'] = $(y);
              a['title'] = $(y).attr('title');
              a['href'] = $(y).attr('href');
              a['view'] = $(y).data('view');
              a['comment'] = $(y).data('comment');
              a['favorite'] = $(y).data('favorite');
              a['date'] = $(y).data('date');
              a['id'] = '#'+$(y).closest('.slide').attr('id');
              a['class'] = '.sub-principal';
              insertCaption(a);
            }
          });

          //Inserir as informações na primeira imagem do slide

        }

        function insertCaption(y){
          $(y['id']).closest(y['class']).find('.title-category-child').html(y['title']);

          $(y['id']).closest(y['class']).find('.link-category-child').prop('title', (y['title']));
          $(y['id']).closest(y['class']).find('.link-category-child').prop('href', (y['href']))

          $(y['id']).closest(y['class']).find('span.view').html(y['view']);
          $(y['id']).closest(y['class']).find('span.comment').html(y['comment']);
          $(y['id']).closest(y['class']).find('span.favorite').html(y['favorite']);
          $(y['id']).closest(y['class']).find('span.date').html(y['date']);
        }

        function insertCaptionFirst(){
          var count = 0;
          $('.slide').each(function(){
            var link = $($(this).find('a')[1]);

            var a = new Array();
            a['title'] = link.attr('title');

            console.log('Insert caption title: '+a['title']+'\n');

            a['href'] = link.attr('href');
            a['view'] = link.data('view');
            a['comment'] = link.data('comment');
            a['favorite'] = link.data('favorite');
            a['date'] = link.data('date');

            a['id'] = '#'+$(this).attr('id');
            if(count < 2){
             a['class'] = '.principal';
           }else{
             a['class'] = '.sub-principal';
           }
           count++;
           insertCaption(a);
         });
        }

        function interactionSlide(){
         $(".icon-menu").click(function(){
          $(this).closest('.principal').find('.category-list').removeClass('fadeOutDown').addClass('block fadeInUp');
        });

         $('.category-list').on("mouseleave",function(){
          $(this).closest('.principal').find('.category-list').removeClass('fadeInUp').addClass('fadeOutDown');
        });
       }

       return {
        init:init
      }
    }());