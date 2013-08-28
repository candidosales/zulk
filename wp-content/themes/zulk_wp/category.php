<?php get_header(); ?>
<body>
 
<div class="twelve columns">
    <?php include('menu.php');?>
     <?php
        if(in_category('cinezulk')){
          $cat = get_category(get_query_var('cat'),false);

          //print_r($cat);
      ?>
    <div class="row">
      <h2><?php categoryName(21) ?> > <?php echo $cat->name?></h2>
    </div>
    <div class="row margin-btn-2">
      <div class="two columns">
        <ul>
            <?php wp_list_categories('orderby=name&child_of=21&title_li=')?>
          </ul>
      </div>
      <div class="eight columns cine">
        <?php
          $cine_zulk = wp_get_recent_posts(array('numberposts' => 1,'category' => $cat->term_taxonomy_id));
          foreach( $cine_zulk as $recent ){
                $video = videoUrl($recent["ID"], 'url_video','cine');
                ?>
                <ul>
                  <li class="share"><span aria-hidden="true" class="icon-export icon"></span> </li>
                  <li class="share"><span aria-hidden="true" class="icon-thumbs-up icon"></span></li>
                  <li class="share"><span aria-hidden="true" class="icon-heart icon"></span> </li>
                  <li id="lamp" class="heart"><span aria-hidden="true" class="icon-lightbulb icon"></span> </li>
                </ul>
                <div id="video">
                  <?php echo $video ?>
                </div>
        <?php
              }
        ?>
      </div>
      <div class="two columns">
      </div>
    </div>
    <div class="row">
       <div class="twelve columns posts-relacionados">
        <div id="scroll">
          <div id="overview">
          <?php
      
              $tags       = wp_get_post_tags($post->ID);
              $categories = wp_get_post_categories($post->ID);
                if ($categories) {
                  //$first_tag = $tags[0]->term_id;
                  $string_categories = implode(",", $categories);
                  $args=array(
                    'cat' => $string_categories,
                    'post__not_in' => array($post->ID),
                    'showposts'=>10,
                    'ignore_sticky_posts'=>1
                   );
                  $my_query = new WP_Query($args);
                  if( $my_query->have_posts() ) {
                    while ($my_query->have_posts()) : $my_query->the_post(); 
                      $thumb = thumbUrl($post->ID, 'related-post-1');
                    ?>
                     <div class="image">
                        <div class="front">
                            <img src="<?php echo $thumb ?>"/>
                        </div>
                        
                        <div class="back" >
                            <a href="<?php the_permalink() ?>" title="<?php the_title(); ?>" rel="bookmark" >
                                <p><?php the_title(); ?> </p>
                                <span aria-hidden="true" class="icon-heart icon" title="Ame!"></span>
                            </a>
                         </div>
                     </div>
                      <?php
                    endwhile;
                  }
              }  
          ?>
             </div>
        </div>
    </div>
    </div>
    <?php } ?>
</div>

<?php get_footer(); ?>
