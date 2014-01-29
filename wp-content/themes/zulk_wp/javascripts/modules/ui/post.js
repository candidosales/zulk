var Post = (function(){

	var backgroundPost = $('.background-post'),
		backPost = $('.back-post'),
		contentPost = $('.content-post'),
		contentPostMain = $('.content-post .main'),
		actionTitle = $('.action-title'),
		body = $('body');

	function init(){
		console.info('Init post ...');
		enable();
		initback();
		initContent();

		$("img.lazy").lazyload({
			event : "sporty"
		});


		$(window).bind("load", function() {
			console.info('Post lazy load...');
			var timeout = setTimeout(function() {
				$("img.lazy").trigger("sporty")
			}, 20000);
		});

		//Clearing slideshow
		$(document).foundation();

		contentPost.blurjs({
			source: '.background-post',
			overlay: 'rgba(255,255,255,0.2)',
			optClass: 'blur',
			radius: 20,
			cache: false,
			backgrounPosition: '50% 50%',
			backgroundSize: 'cover',
			backgroundAttachment: 'fixed'
		});

		contentPost.on('click','.title', function() {
			if(isDisable()){
				backgroundPost.removeClass('disable');
				actionTitle.show();
				enable();
				hiddenCommands();
			}else{
				actionTitle.hide();
				showContent($('.content-post'));
				showCommands();
			}
		});

		$('.more-history').on('click', function(){
			if(isDisable()){
				backgroundPost.removeClass('disable');
				enable();
			}else{
				hiddenCommands();
				backgroundPost.addClass('disable');
				disable();
				contentPostMain.mCustomScrollbar("destroy");
			}
		});

		$('.left.gallery').on('click', function (e) {
			$('.clearing-thumbs li img').first().trigger('click');
		});
		$('.command-gallery').on('click', function (e) {
			$('.clearing-thumbs li img').first().trigger('click');
		});

		$('.command-top').on('click','.down', function(){
			actionTitle.show();
			hiddenCommands();
		});

		$('.command-left').on('click', '.icon-th', function(){
			if(isDisable()){
				backgroundPost.removeClass('disable');
			}else{
				hiddenCommands();
				backgroundPost.addClass('disable');
				disable();
			}
		});

	}

	function hiddenCommands(){
		console.info('Post hidden commands ...');

		$('.command-left, .command-right, .command-top, .content-post').removeClass('active');
		contentPostMain.mCustomScrollbar("destroy");
	}

	function showCommands(){
		console.info('Post show commands ...');

		$('.command-left, .command-right, .command-top').addClass('active');
	}

	function showContent(param){
		console.info('Post show content ...');
		param.addClass('active').css("height",$(window).height());

		if(!contentPostMain.hasClass('mCustomScrollbar')){
			console.info('Post custom scroll ...');
			contentPostMain.mCustomScrollbar({
				theme:"light-thin",
				scrollInertia:150
			});
		}
	}

	function isDisable(){
		return backgroundPost.hasClass('disable');
	}

	function enable(){
		console.info('Post enable ...');

		body.css({"padding":"0","overflow":"hidden"});
		
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

	function disable(){
		console.info('Post disable ...');
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

	function initback(){
		console.info('Post init back ...');

		backPost.css({
			"width":$(window).width(),
			"height":$(window).height()
		});
	}

	function initContent(){
		console.info('Post init content ...');

		contentPostMain.css({"height":$(window).height()/1.1});
	}

	return{
		init:init
	}
})();