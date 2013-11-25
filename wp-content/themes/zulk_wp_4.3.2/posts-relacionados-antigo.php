<div class="large-12 columns posts-relacionados">
        <div id="scroll">
          <div id="overview">
          <?php
            if (have_posts()){
                //for use in the loop, list 5 post titles related to first tag on current post
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