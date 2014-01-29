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
           $category =  get_the_category_by_ID($cat_id);


            if($cat_post->have_posts()){
              while($cat_post->have_posts()) { 
                $cat_post->the_post();
                $thumb = thumbUrl(get_the_ID(), $tam);
                $diff = diffBetweenDates(the_date("Y-m-d",'','',FALSE));     

              echo '<div class="back" style="background:url('.$thumb.') no-repeat center center;-webkit-background-size:local">
            
              <div class="front">

                <div class="category">
                  <h3>'.$category.'</h3>
                </div>
                <div class="title">
                  <a href="'.get_permalink(get_the_ID()).'" rel="bookmark" title="">
                    <h2>'.get_the_title().'</h2>
                  </a>
                  <p class="date">há 15 horas        356 views</p>
                  <span></span>
                </div>
                <p><span aria-hidden="true" class="icon-heart icon" title="Ame!"></span></p>
                
              </div>
            </div>';
/*
                
         //$tam == 'category-thumb-1' ? $class='large' : $class='small';
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
     */
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

add_filter('post_gallery', 'my_post_gallery', 10, 2);
function my_post_gallery($output, $attr) {
    global $post;

    if (isset($attr['orderby'])) {
        $attr['orderby'] = sanitize_sql_orderby($attr['orderby']);
        if (!$attr['orderby'])
            unset($attr['orderby']);
    }

    extract(shortcode_atts(array(
        'order' => 'ASC',
        'orderby' => 'menu_order ID',
        'id' => $post->ID,
        'itemtag' => 'dl',
        'icontag' => 'dt',
        'captiontag' => 'dd',
        'columns' => 3,
        'size' => 'thumbnail',
        'include' => '',
        'exclude' => ''
    ), $attr));

    $id = intval($id);
    if ('RAND' == $order) $orderby = 'none';

    if (!empty($include)) {
        $include = preg_replace('/[^0-9,]+/', '', $include);
        $_attachments = get_posts(array('include' => $include, 'post_status' => 'inherit', 'post_type' => 'attachment', 'post_mime_type' => 'image', 'order' => $order, 'orderby' => $orderby));

        $attachments = array();
        foreach ($_attachments as $key => $val) {
            $attachments[$val->ID] = $_attachments[$key];
        }
    }

    if (empty($attachments)) return '';

    // Here's your actual output, you may customize it to your need
    $output .= "<ul id=\"clearing\" class=\"clearing-thumbs\" data-clearing>\n";

    // Now you loop through each attachment
    foreach ($attachments as $id => $attachment) {
        // Fetch the thumbnail (or full image, it's up to you)
//      $img = wp_get_attachment_image_src($id, 'medium');
//      $img = wp_get_attachment_image_src($id, 'my-custom-image-size');
        $img_th = wp_get_attachment_image_src($id, 'thumbnail');
        $img = wp_get_attachment_image_src($id, 'full');

        $output .= "<li>\n";
        $output .= "<a class=\"th\" href=\"{$img[0]}\"><img src=\"{$img_th[0]}\" width=\"{$img_th[1]}\" height=\"{$img_th[2]}\" alt=\"\" /></a>\n";
        $output .= "</li>\n";
    }

    $output .= "</ul>\n";

    return $output;
}

 function gallery_hidden( $id ) {

  $post = get_post($id);

  $content = '';
  // Only do this on singular items
  if( ! is_singular() )
    return $content;

  // Make sure the post has a gallery in it
  if( ! has_shortcode( $post->post_content, 'gallery' ) )
    return $content;

  // Retrieve all galleries of this post
  //$galleries = get_post_galleries_images( $post );

  $gallery = get_post_gallery( $id, false );
  $ids_images = explode(',',$gallery['ids']);

  $image_list = '<ul class="clearing-thumbs" data-clearing>';

    // Loop through each image in each gallery
    foreach( $ids_images as $id ) {
      $img_th = wp_get_attachment_image_src($id, 'thumbnail');
      $img = wp_get_attachment_image_src($id, 'full');

      $image_list .= '<li><a class="th" href="' . $img[0] . '"><img src="'.$img_th[0].'" width="'.$img_th[1].'" height="'.$img_th[2].'" ></a></li>';

    }

  $image_list .= '</ul>';

  // Append our image list to the content of our post
  $content .= $image_list;

  return $content;

 }