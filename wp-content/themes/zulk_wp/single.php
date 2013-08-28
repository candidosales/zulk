<?php get_header(); ?>
<body class="post-body">
   <div class="twelve columns posts-relacionados">
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

  <div id="post" class="twelve columns post">
      <div class="habilita-posts-relacionados">
      </div>
      <div class="row">
        <div class="ten columns">
          <div class="logo left">
            <a href="<?php bloginfo('url')?>">
              <img src="<?php bloginfo('template_url'); ?>/images/logo.png">
            </a>
            <a href="">
              <img src="<?php bloginfo('template_url'); ?>/images/like.png" class="animate-tada like-facebook">
            </a>
          </div>
        </div>
        <div class="two columns">
          <a class="contrate">Contrate a Zulk</a>
          <div class="ultimas-noticias">
            <a href="ultimas-noticias.php">
              <p><span class="small">ÚLTIMAS</span><br><span class="noticias">Notícias</span></p>
                <span class="qtd">
                  3
                </span>
            </a>
        </div>
        </div>
      </div>

  <?php 
          while (have_posts()) {
            the_post(); ?>


    <div id="displayResults">
      <div class="row">
          <div id="prev" class="arrow-left left">
             <?php previous_post_link( '%link', '<span  aria-hidden="true" class="icon-arrow-left icon"></span>' ); ?>
          </div>
        <header class="title">
          <h1>
            <?php the_title(); ?>
          </h1>
          <p class="author">Escrito por <?php the_author(); ?> | <?php the_time('l, j \d\e F \d\e Y \à\s g:i'); ?> | 0</p>
        </header>
        <div  id="next" class="arrow-right right">        
            <?php next_post_link( '%link', '<span aria-hidden="true" class="icon-arrow-right icon"></span>' ); ?>
        </div>
      </div>
      <div class="row">
        <div class="one column">
          <ul class="share-social">
            <li>
                <span aria-hidden="true" class="has-tip tip-top icon-heart icon" title="Ame!"></span>
            </li>
            <li>
              <a href="http://www.facebook.com/sharer.php?u=<?php rawurlencode(the_title())  ?>" target="_blank">
                <span aria-hidden="true" class="has-tip tip-top icon-thumbs-up icon" title="Curtiu?"></span>
              </a>
            </li>
            <li>
              <a href="http://twitter.com/share?url=<?php rawurlencode(the_permalink()) ?>&text=<?php rawurlencode(the_title()) ?>" class="twitter-share-button" data-lang="pt-BR"  target="_blank">
                <span aria-hidden="true" class="has-tip tip-top icon-twitter icon" title="Tweeta ai!"></span>
              </a>
            </li>
            <li>
              <a href="https://plus.google.com/share?url=<?php rawurlencode(the_title())  ?>">
                <span aria-hidden="true" class="has-tip tip-top icon-google-plus icon"></span>
              </a>
            </li>
            <li>
              <span aria-hidden="true" class="icon-pinterest icon" title="Pinei!"></span>
            </li>
            <li>
              <a href="mailto:?Subject=<?php the_title() ?>&Body=<?php the_title() ?> <?php rawurlencode(the_title())  ?>">
                <span aria-hidden="true" class="icon-email icon"></span>
              </a>
            </li>
          </ul>
        </div>
        <div class="nine columns">
          <section>
            
              <?php
                $video = videoUrl($post->ID, 'url_video', 'single');
                if($video){ 
                ?>
                <?php echo $video ?> 

              <?php }else{?>
                <div class="thumb-principal">
                  <?php the_post_thumbnail()?>
                </div>
              <?php } ?>
            
            <?php the_content(); ?>
          </section>
        </div>
        <div class="two columns">
          <aside>
               <?php echo gallery(get_the_content());  ?>
          </aside>
        </div>
      </div>
    </div>
  </div>
 
  <?php 
      }
    }
  ?>

<?php get_footer(); ?>
