<?php get_header(); ?>
<body class="post-body">
   <?php  include('posts-relacionados.php'); ?>

  <div id="post" class="large-12 columns post">
      <div class="habilita-posts-relacionados">
      </div>
      <div class="row">
        <div class="large-10 columns">
          <div class="logo left">
            <a href="<?php bloginfo('url')?>">
              <img src="<?php bloginfo('template_url'); ?>/images/logo.png">
            </a>
            <a href="">
              <img src="<?php bloginfo('template_url'); ?>/images/like.png" class="animate-tada like-facebook">
            </a>
          </div>
        </div>
        <div class="large-2 columns">
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
        <div class="large-1 column">
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
        <div class="large-9 columns">
          <section>
            <?php
                $video = videoUrl($post->ID, 'url_video', 'single');
                if($video){ 
                ?>
                <?php echo $video ?> 

              <?php }else{?>
                <div class="thumb-principal">
                  <?php the_post_thumbnail('post-thumb-1')?>
                </div>
              <?php } ?>
          </section>  
          <section class="content">            
            <?php the_content(); ?>
          </section>
        </div>
        <div class="large-2 columns">
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
