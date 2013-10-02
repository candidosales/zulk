<?php
require ('helpers.php'); 
require ('custom_meta/custom_input.php');
//Thumbnails

if (function_exists('add_theme_support')) { 
	add_theme_support('post-formats', array( 'aside', 'gallery','audio','video' ) );	
	add_theme_support('post-thumbnails'); 
	add_image_size( 'home-thumb-1', 440, 208, true );
	add_image_size( 'home-thumb-2', 220, 190, true );
	add_image_size( 'post-thumb-1', 764, 384, true );
	add_image_size( 'category-thumb-1', 424, 160, true );
	add_image_size( 'category-thumb-2', 195, 160, true );
	add_image_size( 'related-post-1', 168, 110, true );
	add_image_size( 'ultimas-thumb-1', 540, 260, true );
	add_image_size( 'ultimas-thumb-2', 295, 190, true );
	add_image_size( 'ultimas-thumb-3', 255, 116, true );
	add_image_size( 'todas-thumb-1', 202, 202, true );
	add_image_size( 'todas-thumb-2', 402, 202, true );
	
	add_theme_support('menus');
}

//Assinatura
function modify_footer_admin () {
  echo 'Criado por <a href="http://facebook.com/WWiinnggss">Wings</a>';
  echo ' | <a href="http://WordPress.org">WordPress</a>.';
}
add_filter('admin_footer_text', 'modify_footer_admin');

function ajax_prev_next(){  
  //get the data from ajax() call 
   $url = get_site_url();
   $link = str_replace($url, "", $_POST['link']);
   $array_link = explode("/", $link); 
   $id = $array_link[2];

   $query = new WP_Query( 'p='.$id.'' );
   if($query->have_posts()){
      while($query->have_posts()) { 
      		$query->the_post();

	   echo  "<div class='row'>
		   			<div id='prev' class='arrow-left left'>        
            			<a href='".get_permalink(get_adjacent_post(false,'',false))."' rel='prev'>
            				<span aria-hidden='true' class='icon-arrow-left icon'>
            				</span>
            			</a>
            		</div>
		   			<header class='title'>
		   				<h1>".get_the_title()."</h1>
			            <p class='author'>Escrito por ".get_the_author()." | ".get_the_time('l, j \d\e F \d\e Y \à\s g:i')." | 0</p>
			        </header>
			        <div id='next' class='arrow-right right'>        
            			<a href='".get_permalink(get_adjacent_post(false,'',true))."' rel='next'>
            				<span aria-hidden='true' class='icon-arrow-right icon'>
            				</span>
            			</a>
            		</div>
			      </div>
			      <div class='row'>
			        <div class='one column'>
			          <ul class='share-social'>
			            <li>
			                <span aria-hidden='true' class='has-tip tip-top icon-heart icon' title='Ame!''></span>
			            </li>
			            <li>
			              <a href='http://www.facebook.com/sharer.php?u=".rawurlencode(get_the_title())."' target='_blank'>
			                <span aria-hidden='true' class='has-tip tip-top icon-thumbs-up icon' title='Curtiu?''></span>
			              </a>
			            </li>
			            <li>
			              <a href='http://twitter.com/share?url=".rawurlencode(get_the_title())."&text=".rawurlencode(get_the_title())." class='twitter-share-button' data-lang='pt-BR'  target='_blank'>
			                <span aria-hidden='true' class='has-tip tip-top icon-twitter icon' title='Tweeta ai!'></span>
			              </a>
			            </li>
			            <li>
			              <a href='https://plus.google.com/share?url=".rawurlencode(get_the_title())."'>
			                <span aria-hidden='true' class='has-tip tip-top icon-google-plus icon'></span>
			              </a>
			            </li>
			            <li>
			              <span aria-hidden='true' class='icon-pinterest icon' title='Pinei!'></span>
			            </li>
			            <li>
			              <a href='mailto:?Subject=<?php the_title() ?>&Body=<?php the_title() ?> <?php rawurlencode(the_title())  ?>'>
			                <span aria-hidden='true' class='icon-email icon'></span>
			              </a>
			            </li>
			          </ul>
			        </div>
			        <div class='nine columns'>
			          <section>
			            <div class='thumb-principal'>".get_the_post_thumbnail()."</div>
			            ".get_the_content()."
			          </section>
			        </div>
			        <div class='two columns'>
			          <aside>
			            <ul data-clearing>".gallery(get_the_content())."</ul>
			          </aside>
			        </div>
			      </div>";
	   }
  }  

  die();
}
  // creating Ajax call for WordPress  
add_action( 'wp_ajax_nopriv_ajax_prev_next', 'ajax_prev_next' );  
add_action( 'wp_ajax_ajax_prev_next', 'ajax_prev_next' );  


function add_myjavascript(){  
  wp_enqueue_script( 'ajax-implementation.js', get_bloginfo('template_directory') . "/scripts/ajax-implementation.js", array( 'jquery' ) );  
}  
  add_action( 'init', 'add_myjavascript' );