  if($('body').hasClass('home')){
    Zulk.init();
  }

  if($('body').hasClass('post')){
    Post.init();
  }


  /****** Interações ******/

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

  if($('body').hasClass('page')){

    $('[class^="sub-"]').mouseenter(function(){
      var back = $(this).children('.back');
      var front = $(back).children('.front');
      var HEIGHT = 165;
      var WIDTH = 221;

      if($(this).hasClass('sub-1')){
        front.blurjs({
          source: $(this).children('.back'),
          overlay: 'rgba(255,255,255,0.2)',
          optClass: 'blur',
          radius: 50,
          cache: false,
          backgrounPosition: '0px 0px',
          backgroundSize: '667px 332px',
          backgroundAttachment: 'fixed'
        });
      }
      if($(this).hasClass('sub-2')){
        front.blurjs({
          source: $(this).children('.back'),
          overlay: 'rgba(255,255,255,0.2)',
          optClass: 'blur',
          radius: 50,
          cache: false,
          backgrounPosition: '667px 0px',
          backgroundSize: '221px 165px',
          backgroundAttachment: 'fixed'
        });
      }
      if($(this).hasClass('sub-3')){
        front.blurjs({
          source: $(this).children('.back'),
          overlay: 'rgba(255,255,255,0.2)',
          optClass: 'blur',
          radius: 50,
          cache: false,
          backgrounPosition: '667px 165px',
          backgroundSize: '221px 165px',
          backgroundAttachment: 'fixed'
        });
      }
      if($(this).hasClass('sub-4')){
        front.blurjs({
          source: $(this).children('.back'),
          overlay: 'rgba(255,255,255,0.2)',
          optClass: 'blur',
          radius: 50,
          cache: false,
          backgrounPosition: '0px 333px',
          backgroundSize: '221px 165px',
          backgroundAttachment: 'fixed'
        });
      }
      if($(this).hasClass('sub-5')){
        front.blurjs({
          source: $(this).children('.back'),
          overlay: 'rgba(255,255,255,0.2)',
          optClass: 'blur',
          radius: 50,
          cache: false,
          backgrounPosition: WIDTH+'px 333px',
          backgroundSize: '221px 165px',
          backgroundAttachment: 'fixed'
        });
      }
      if($(this).hasClass('sub-6')){
        front.blurjs({
          source: $(this).children('.back'),
          overlay: 'rgba(255,255,255,0.2)',
          optClass: 'blur',
          radius: 50,
          cache: false,
          backgrounPosition: WIDTH*2+'px 333px',
          backgroundSize: '221px 165px',
          backgroundAttachment: 'fixed'
        });
      }
      if($(this).hasClass('sub-7')){
        front.blurjs({
          source: $(this).children('.back'),
          overlay: 'rgba(255,255,255,0.2)',
          optClass: 'blur',
          radius: 50,
          cache: false,
          backgrounPosition: WIDTH*3+'px 333px',
          backgroundSize: '221px 165px',
          backgroundAttachment: 'fixed'
        });
      }

      front.addClass('move');

    }).mouseleave(function(){
      $(this).find('.back > .front').removeClass('move');
    });

  }