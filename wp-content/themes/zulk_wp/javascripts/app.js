var Zulk  = (function () {

    var expand = false;

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

    function presentationVideo(){
      $('body').css({"padding":"0","overflow":"hidden"});
      $(document).ready(configureAnimation());
      $('#tile-1').hide();
      $('#presentation-video').attr({
                              height:$(window).height()*1.14, 
                              width: $(window).width()*1.14
                            }).css({
                              "margin":"-7% 0 0 -7%"
                            });

      setTimeout(function() {
        $('#presentation-video').remove();
        $('body').css({"padding":"1.8% 0","overflow":"hidden"});
        $('#tile-1').show();

        //Create Slide
        createAllSlide();
        insertCaptionFirst();
        //create interactions
        interactionSlide();
        hoverBulletsNext();

        $(document).ready($("body").removeClass("paused"));
      }, 1000);
    }

    function closeVideo(){
      $('#close-video').click(function(){
        expandVideo();
        $('#video').removeClass('animated flipInY').addClass('animated flipOutY');
        $('#action-video').removeClass('animated flipInY').addClass('animated flipOutY hidden');
        setTimeout(function() { 
          $('#video').addClass('hidden').html('');
          $('#principal-2').removeClass('hidden').removeClass('animated flipOutY').addClass('animated flipInY');
        }, 500);
      });
    }


    function expandVideo(){
      if(expand){
        $('#video').removeClass('large-12').addClass('large-6').css({"position":"relative", "z-index":"1"});
        $('#video > iframe').attr('width','460').attr('height', '304');
        expand = false;
      }else{
        $('#video').removeClass('large-6').addClass('large-12').css({"position":"absolute", "z-index":"4"});
        $('#video > iframe').attr('width','914').attr('height', '582');
        expand = true;
      }
    }

    function showVideo(){
        $('#principal-2').addClass('hidden');
        $('#action-video').removeClass('hidden animated flipOutY');
        $('#video').removeClass('animated flipOutY hidden').addClass('animated flipInY');
        $('#action-video').addClass('animated flipInY');
    }

    function youtubeParser(url){
        var regExp = /^.*((youtu.be\/)|(v\/)|(\/u\/\w\/)|(embed\/)|(watch\?))\??v?=?([^#\&\?]*).*/;
        var match = url.match(regExp);
        if (match&&match[7].length==11){
            return match[7];
        }else{
            alert("Url incorrecta");
        }
    }

    function vimeoParser(url){
       var match = /vimeo.*\/(\d+)/i.exec( url );
      // if the match isn't null (i.e. it matched)
      if ( match ) {
        // the grouped/matched digits from the regex
        return match[1];
      }else{
            console.log("not a vimeo url");
        }
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
        insertCaption:insertCaption,
        insertCaptionFirst:insertCaptionFirst,
        hoverBulletsNext:hoverBulletsNext,
        presentationVideo:presentationVideo,
        configureAnimation:configureAnimation,
        expandVideo:expandVideo,
        closeVideo:closeVideo,
        showVideo:showVideo,
        youtubeParser:youtubeParser,
        vimeoParser:vimeoParser,
        createAllSlide:createAllSlide,
        interactionSlide:interactionSlide
      }
  }());

  
if($('body').hasClass('home')){
  $('.loading-home').css({"height":$(window).height(), "width":$(window).width()});
  $(window).bind("load", function() {
      $('.loading-home').fadeOut('3000', function(){
        Zulk.presentationVideo();
      });
  });

}


/****** Interações ******/

 /* $('.wrapper').each(function(){
    console.log('index wrapper: '+$(this).index());
  });*/

  var currentPosition = 0;
  var nextPosition = 0;
  var index = 0;

  $('.next').click(function(){
    index = $(this).closest('.wrapper').index()+1;

    currentPosition = $('.wrapper:eq('+index+')').offset().left
    nextPosition = $('.wrapper:eq('+index+')').offset().left - $('.wrapper:eq('+index+')').offset().left * 0.25;

    console.log('currentPosition: '+currentPosition);
    console.log('nextPosition: '+nextPosition);


    $('html, body').scrollTo('.wrapper:eq('+index+')', 500, {offset:-400} );
  });

  $('.prev').click(function(){
    var value = 0;
    if($(this).closest('.wrapper').index()>0){
        console.log('é maior');

        index = $(this).closest('.wrapper').index()-1;
        console.log('index: '+index);

        $('html, body').scrollTo('.wrapper:eq('+index+')', 500, {offset:-400} );
    }    
  });
  

  $('.animate-tada').mouseenter(function(){
    $(this).addClass('animated tada');
  }).mouseleave(function(){
    $(this).removeClass('animated tada');
  });


/**** Post ****/
/*
$('.habilita-posts-relacionados').mouseenter(function(){
        $('.posts-relacionados').addClass('height-move');
  });
    
$('.post').mouseenter(function(){
    if($('.posts-relacionados').hasClass('height-move')){
        $('.posts-relacionados').removeClass('height-move');
    }
    
});*/

if($('body').hasClass('post-body')){
  var backgroundPost = $('.background-post');
  var backPost = $('.back-post');
  var contentPost = $('.content-post');
  var contentPostMain = $('.content-post .main');

      $('.content-post').blurjs({
          source: '.background-post',
          overlay: 'rgba(0,0,0,0.5)',
          optClass: 'blur',
          radius: 20,
          cache: false
        });

  $('.content-post').click(function() {
    if(isDisablePost()){
      backgroundPost.removeClass('disable');
      enablePost();
      showPost($('.content-post'));
      showCommands();
    }else{
      showPost($(this));
      showCommands();
    }
  });

  $('.command-top .down').click(function(){
    hiddenCommands();
  });

  $('.command-left .icon-th').click(function(){
    if(isDisablePost()){
      backgroundPost.removeClass('disable');
    }else{
      hiddenCommands();
      backgroundPost.addClass('disable');
      disablePost();
    }
  });

  enablePost();
  initbackPost();
  initContentPost();

  function hiddenCommands(){
    $('.command-left, .command-right, .command-top, .content-post').removeClass('active');
    contentPostMain.mCustomScrollbar("destroy");
  }

  function showCommands(){
    $('.command-left, .command-right, .command-top').addClass('active');
  }

  function showPost(param){
    param.addClass('active').css("height",$(window).height());
    if(!contentPostMain.hasClass('mCustomScrollbar')){
        contentPostMain.mCustomScrollbar({
                theme:"light-thin",
                scrollInertia:150
      });
    }
  }

  function isDisablePost(){
    return backgroundPost.hasClass('disable');
  }

  function enablePost(){
    backgroundPost.css({
      "width":$(window).width(),
      "height":$(window).height(),
      "top":"0"});

    contentPost.css({
      "width":$(window).width(),
      "height":$(window).height(),
      "background-size":"cover",
      "background-attachment":"fixed",
      "background-position":"50% 50%"});
  }

  function disablePost(){
    backgroundPost.css({
      "width":$(window).width()/1.5,
      "height":$(window).height()/1.5,
      "top":$(window).height()/3.2,
      "background-size":"cover",
      "background-attachment":"local",
      "background-position":"50% 50%"});

    contentPost.css({
      "width":$(window).width()/1.5,
      "height":$(window).height()/1.5,
      "top":$(window).height()/3.2,
      "background-size":"cover",
      "background-attachment":"local",
      "background-position":"50% 190%"});
  }  

  function initbackPost(){
    backPost.css({
      "width":$(window).width(),
      "height":$(window).height()
    });
  }

  function initContentPost(){
    contentPostMain.css({"height":$(window).height()/1.1});
  }
}
/**** Post ****/

  $('.image').hover(function(){
	   $(this).addClass('flip');
  },function(){
	   $(this).removeClass('flip');
  });


if($('body').hasClass('video')){
  $("#video").allofthelights({
        'switch_id':'lamp',
        'opacity': '0.7',
        'delay_turn_on': '1000',
        'clickable_bg': true,
  });
}
  

  function waitForIt(el, callback){
    el.on("mozAnimationEnd webkitAnimationEnd msAnimationEnd oAnimationEnd animationend mozAnimationEnd", callback);
  }

  waitForIt($("#borderTop"), function(){
    // When loaded, then animate everything
    $("body").removeClass("paused")
  })

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

  $('a.video-play').click(function(){
    var v = $(this).data('video');
    console.log('video: '+v);
    if(v.search('youtube')>0){
      var video_id = Zulk.youtubeParser(v);
      console.log('video_id: '+video_id);
      $('#video').append('<iframe width="460" height="304"  src="http://www.youtube.com/embed/'+video_id+'" frameborder="0" allowfullscreen></iframe>');
    }else{
      var video_id = Zulk.vimeoParser(v);
      console.log('video_id: '+video_id);
      $('#video').append('<iframe src="http://player.vimeo.com/video/'+video_id+'?title=0&amp;byline=0&amp;portrait=0" width="460" height="304" frameborder="0" webkitAllowFullScreen mozallowfullscreen allowFullScreen></iframe>');
    }

    $('#principal-2').removeClass('thumbFade bounceTop2 animate').addClass('animated flipOutY');
      setTimeout(function() { 
        Zulk.showVideo();
      }, 500);
    
  });

$('#expand-video').click(function(){
  Zulk.expandVideo();
});

Zulk.closeVideo();

