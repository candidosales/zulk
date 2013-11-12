var Zulk  = (function () {

    var expand = false;

    function insertCaption(y){
        $(y['id']).closest(y['class']).find('.title-category-child').html(y['title']);

        $(y['id']).closest(y['class']).find('.link-category-child').prop('title', (y['title']));
        $(y['id']).closest(y['class']).find('.link-category-child').prop('href', (y['href']))

        $(y['id']).closest(y['class']).find('span.view').html(y['view']);
        $(y['id']).closest(y['class']).find('span.comment').html(y['comment']);
        $(y['id']).closest(y['class']).find('span.favorite').html(y['favorite']);
        $(y['id']).closest(y['class']).find('span.date').html(y['date']);
    }

    function hoverBulletsNext(){
         $('ol.flex-control-nav li').mouseenter(function(){
          var index = $(this).index();
          var obj = $(this).closest('.flexslider');
          $('#'+obj.attr('id')).data('flexslider').flexAnimate(index);
        });
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


    return {
        insertCaption:insertCaption,
        hoverBulletsNext:hoverBulletsNext,
        expandVideo:expandVideo,
        closeVideo:closeVideo,
        showVideo:showVideo,
        youtubeParser:youtubeParser,
        vimeoParser:vimeoParser
      }
  }());
    


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
          Zulk.insertCaption(a);
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
          Zulk.insertCaption(a);
      }
    });

    //Inserir as informações na primeira imagem do slide
      var count = 0;
      $('.slide').each(function(){
          var link = $(this).find('a').first();

          var a = new Array();
          a['title'] = link.attr('title');
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
          Zulk.insertCaption(a);
      });

Zulk.hoverBulletsNext();

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


var backgroundPost = $('.background-post');
var backPost = $('.back-post');
var contentPostMain = $('.content-post .main');

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
}

function disablePost(){
  backgroundPost.css({
    "width":$(window).width()/1.5,
    "height":$(window).height()/1.5,
    "top":$(window).height()/3.2,
    "background-size":"contain",
    "background-attachment":"local",
    "background-position":"50% 50%"});
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
  $(document).ready($("body").removeClass("paused"));

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

