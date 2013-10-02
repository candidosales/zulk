<?php
function diffBetweenDates($date){
	$now = new DateTime(date("Y-m-d"));
	$ref = new DateTime($date);
	return $now->diff($ref);
}

function thumbUrl($id, $tam ){
	$thumb = wp_get_attachment_image_src( get_post_thumbnail_id($id), $tam );
	return $thumb['0']; 
}

function videoUrl($id, $meta, $local){
  $video_url = get_post_meta($id, $meta, true);
  if($video_url){
      $http_url = array('https' , 'httpv', 'http');

      switch ($local) {
          case "single":
              $tam = 'width="540" height="303"';
              break;
          case "home":
              $tam = 'width="460" height="209"';
              break;
          case "cine":
              $tam = 'width="540" height="304"';
              break;
      }

      if(verifyUrlVidoeo($video_url) == 'vimeo'){

       $video = str_replace('http://vimeo.com/','http://player.vimeo.com/video/',$video_url);  

       return '<iframe src="'.$video.'?title=0&amp;byline=0&amp;portrait=0" '.$tam.' frameborder="0" webkitAllowFullScreen mozallowfullscreen allowFullScreen></iframe>';

      }else{
          foreach ($http_url as $http) {

          $video_compare = strtolower($video_url);
          $pos = stripos($video_compare, $http);

          if($pos !== false ){
            $video = str_replace($http.'://www.youtube.com/watch?v=','http://www.youtube.com/embed/',$video_url);            
          }
        }
        $video = $video.'?egm=0&hd=1&showinfo=0&autohide=1';
         return '<iframe '.$tam.'  src="'.$video.'" frameborder="0" allowfullscreen></iframe>';
      }
    }

    return false;
}

function verifyUrlVidoeo($url){
   if (strpos($url,'vimeo') !== false) {
      return 'vimeo';
   }
   return 'youtube';
}

function gallery($post_content=''){
	preg_match('/\[gallery.*ids=.(.*).\]/', $post_content, $ids);
	if($post_content && $ids){
		$array_id = explode(",", $ids[1]);

    $list = '<ul class="clearing-thumbs" data-clearing>';
		foreach ($array_id as $id) {

			$doc = new DOMDocument();
			if(wp_get_attachment_image($id)){
			    $doc->loadHTML(wp_get_attachment_image($id));
			    $imageTags = $doc->getElementsByTagName('img');
          
			    foreach($imageTags as $tag) {
			        $src = $tag->getAttribute('src');
                  if(!empty($src)){
                    $list = $list.'<li><a href="'.str_replace('-150x150','',$src).'">'.wp_get_attachment_image($id).'</a><li>';
                  }
			    }
			}

		}
    $list = $list.'</ul>';
    return $list;  
	}
}

function categoryPostsBySlug($slug='',$tam=''){
  if($slug){
    $category =  get_category_by_slug($slug);
    categoryPosts($category->term_id, $tam);
  }
}

function categoryPosts($cat_id='',$tam=''){

           $cat_post = new WP_Query(array('showposts' => 1,'cat' => $cat_id));

            if($cat_post->have_posts()){
              while($cat_post->have_posts()) { 
                $cat_post->the_post();
                $thumb = thumbUrl(get_the_ID(), $tam);
                $diff = diffBetweenDates(the_date("Y-m-d",'','',FALSE));

                $tam == 'category-thumb-1' ? $class='large' : $class='small';
          
         echo '<div class="container-sub-cat">
            <a href="'.get_permalink(get_the_ID()).'" rel="bookmark" title="">
              <img class="principal"  src="'.$thumb.'" alt="">
            </a>
            <div class="back-image-'.$class.' move-image">
              <div class="extras">
                <p class="title-category-child">'.get_the_title().'</p>
                <p class="small"><span class="date">'.$diff->d.'</span> dias atrás | <span aria-hidden="true" class="icon-baloon icon"></span> <span class="view">0</span> 
                   <span aria-hidden="true" class="icon-eye icon"></span> <span class="comment">0</span>
                   <span aria-hidden="true" class="icon-heart icon"></span> <span class="favorite">0</span>  
                 </p>
              </div>
            </div>
          </div>
          <div class="action">
              <ul>
                <li class="heart"><span aria-hidden="true" class="icon-heart icon"></span> </li>
                <li class="share"><span aria-hidden="true" class="icon-export icon"></span> </li>
              </ul>
          </div>';
     
       }
    }
     
}

function categoryTodasPostsBySlug($slug=''){
  if($slug){
    $category =  get_category_by_slug($slug);
    categoryTodasPosts($category->term_id);
  }
}

function categoryTodasPosts($cat_id=''){

            $cat_post = new WP_Query(array('showposts' => 8,'cat' => $cat_id));
            if($cat_post->have_posts()){
              while($cat_post->have_posts()) { 
                $cat_post->the_post();
                $diff = diffBetweenDates(the_date("Y-m-d",'','',FALSE));
                $large = get_post_meta(get_the_ID(), 'large', true);

                $category = get_the_category();

                if($large != "true"){
                  $thumb = thumbUrl(get_the_ID(), 'todas-thumb-1');
                  $class = 'tiles';
 
                }else{
                  $thumb = thumbUrl(get_the_ID(), 'todas-thumb-2');
                  $class = 'tiles tilesLargo';
                }

             echo '<div class="'.$class.' widget animation unloaded">
             <a itemprop="photo" href="'.get_permalink(get_the_ID()).'" rel="bookmark" title="">
                 <img  src="'.$thumb.'" alt="">
              </a>
              <div class="extra">
                <div class="category">
                  <p>'.$category[0]->cat_name.'</p>
                </div>
                <div class="title">
                  <h2>'.get_the_title().'</h2>
                  <p class="small"><span class="date">'.$diff->d.'</span> dias atrás | <span aria-hidden="true" class="icon-baloon icon"></span> <span class="view">0</span> 
                   <span aria-hidden="true" class="icon-eye icon"></span> <span class="comment">0</span>
                   <span aria-hidden="true" class="icon-heart icon"></span> <span class="favorite">0</span>  
                 </p>
                </div>
              </div>
            </div>';

        }
    } 
}

function categoryName($id=''){
  if($id){
    echo get_the_category_by_ID($id);
  }
}

function categoryNameById($id=''){
  if($id){
    echo get_the_category_by_ID($id);
  }
}

function categoryNameBySlug($slug=''){
  if($slug){
    $category =  get_category_by_slug($slug);
    echo $category->name;
  }
}

function get_youtube_screen( $url = '', $type = 'default', $echo = true ) {
    if( empty( $url ) )
        return false;

    if( !isset( $type ) )
        $type = '';

    $url = esc_url( $url );

    preg_match("|[\\?&]v=([^&#]*)|",$url,$vid_id);

    if( !isset( $vid_id[1] ) )
        return false;

    $img_server_num =  'i'. rand(1,4);

    switch( $type ) {
        case 'large':
            $img = "<img src=\"http://{$img_server_num}.ytimg.com/vi/{$vid_id[1]}/0.jpg\" />";
            break;
        case 'first':
            // Thumbnail of the first frame
            $img = "<img src=\"http://{$img_server_num}.ytimg.com/vi/{$vid_id[1]}/1.jpg\" />";
            break;
        case 'small':
            // Thumbnail of a later frame(i'm not sure how they determine this)
            $img = "<img src=\"http://{$img_server_num}.ytimg.com/vi/{$vid_id[1]}/2.jpg\" />";
            break;
        case 'default':
        case '':
        default:
            $img = "<img src=\"http://{$img_server_num}.ytimg.com/vi/{$vid_id[1]}/default.jpg\" />";
            break;
    }
    if( $echo )
        echo $img;
    else
        return $img;
}
