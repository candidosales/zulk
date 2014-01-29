var Video = (function(){

	var video = null,
		expand = false,
		wrapper = $('#video'), 
		principal2 = $('#principal-2'),
		actionVideo = $('#action-video');
	
	function init(){
		console.info('Init video ...');
		$('a.video-play').click(function(){
			video = $(this);
			embed();
		});

		$('#expand-video').click(function(){
		    fullScreen();
		});

		$('#close-video').click(function(){
			close();
		 });
	}

	function embed(){
		console.info('Video embed ...');

	    var v = video.data('video');
	    console.log('video: '+v);
	    if(v.search('youtube')>0){
	      var video_id = youtubeParser(v);
	      console.log('video_id: '+video_id);
	      wrapper.append('<iframe width="463" height="316"  src="http://www.youtube.com/embed/'+video_id+'" frameborder="0" allowfullscreen></iframe>');
	    }else{
	      var video_id = vimeoParser(v);
	      console.log('video_id: '+video_id);
	      wrapper.append('<iframe src="http://player.vimeo.com/video/'+video_id+'?title=0&amp;byline=0&amp;portrait=0" width="463" height="316" frameborder="0" webkitAllowFullScreen mozallowfullscreen allowFullScreen></iframe>');
	    }

	    principal2.removeClass('thumbFade bounceTop2 animate flipInY').addClass('animated flipOutY');
	    setTimeout(function() { 
	      show();
	    }, 500);
	}

	function show(){
		console.info('Video show ...');

       	principal2.addClass('hidden');
        actionVideo.removeClass('hidden');
        wrapper.removeClass('animated flipOutY hidden').addClass('animated flipInY');
       // actionVideo.addClass();
    }

    function fullScreen(){
      console.info('Video fullscreen ...');
      if(expand){
        wrapper.removeClass('large-12').addClass('large-6').css({"position":"relative","z-index":"1"});
        wrapper.find('> iframe').attr('width','463').attr('height', '316');
        expand = false;
      }else{
        wrapper.removeClass('large-6').addClass('large-12').css({"position":"absolute","z-index":"4"});
        wrapper.find('> iframe').attr('width','974').attr('height', '609');
        expand = true;
      }
    }

    function close(){
    	console.info('Video close ...');
        if(expand!=true){
          fullScreen();
        }
        
        wrapper.removeClass('animated flipInY').addClass('animated flipOutY');
        actionVideo.addClass('hidden');
        setTimeout(function() { 
          wrapper.removeClass('large-12').addClass('large-6 hidden').html('').css({"position":"relative","z-index":"1"});
          principal2.removeClass('hidden').removeClass('animated flipOutY').addClass('animated flipInY');
        }, 500);
     
    }

	function youtubeParser(url){
        var regExp = /^.*((youtu.be\/)|(v\/)|(\/u\/\w\/)|(embed\/)|(watch\?))\??v?=?([^#\&\?]*).*/;
        var match = url.match(regExp);
        if (match&&match[7].length==11){
            return match[7];
        }else{
            alert("not a youtube url");
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

	return{
		init:init
	}

})();