<?php get_header(); ?>
<body class="paused">
 <div id="tile-1" class="twelve columns">
<?php  include('menu.php'); ?>
    <div class="row thumb">
    <div id="principal-1" class="six columns principal thumbFade bounceTop1 animate">
      <!-- class: animacao antiga widget animation unloaded -->
   <?php 
    $historias_zulk = new WP_Query(array('showposts' => 4,'category_name' => 'historias-zulk'));
    ?>
      <div class="extras-top">
        <a href="<?php bloginfo('url')?>/category/historias-zulk">
          <p class="title-category-parent"><?php categoryNameBySlug('historias-zulk') ?></p>
        </a>
        <ul>
            <li class="heart"><span aria-hidden="true" class="icon-heart icon"></span> </li>
            <li class="share"><span aria-hidden="true" class="icon-export icon"></span> </li>
            <li class="share">
              <a href="<?php bloginfo('url')?>/category/historias-zulk">
                <span aria-hidden="true" class="icon-th icon"></span>
              </a>
            </li>
            <li class="share"><span aria-hidden="true" class="icon-menu icon"></span> </li>
        </ul>
      </div>
      <div id="slide-1" class="slide">
        <?php
            if($historias_zulk->have_posts()){
              while($historias_zulk->have_posts()) { 
                $historias_zulk->the_post();
                $thumb = thumbUrl($post->ID, 'home-thumb-1');
                $diff = diffBetweenDates(the_date("Y-m-d",'','',FALSE));
        ?>
        <a itemprop="photo" href="<?php the_permalink(); ?>" rel="bookmark" title="<?php the_title_attribute(); ?>" data-view="3" data-comment="17" data-favorite="50" data-date="<?php echo $diff->d ?>">
           <img src="<?php echo $thumb ?>"/>
        </a>
        <?php 
              }
            }
        ?>
     </div>
        <div class="category-list animated">
          <ul>
            <?php wp_list_categories('orderby=name&child_of=20&title_li=')?>
          </ul>
        </div>
        <div class="extras">
          <div class="twelve columns">
            <a class="link-category-child" href="" rel="bookmark" title="">
              <p class="title-category-child"></p>
            </a>
            <p class="small"><span class="date">0</span> dias atrás | <span aria-hidden="true" class="icon-baloon icon"></span> <span class="view">0</span> 
               <span aria-hidden="true" class="icon-eye icon"></span> <span class="comment">0</span>
               <span aria-hidden="true" class="icon-heart icon"></span> <span class="favorite">0</span>  
             </p>
          </div>
        </div>
      </div>



    <div id="principal-2" class="six columns principal thumbFade  bounceTop2 animate">
    <?php 
       $cine_zulk = new WP_Query(array('showposts' => 4,'category_name' => 'zulk-tv'));
    ?>
      <div class="extras-top">
        <p class="title-category-parent"><?php categoryNameBySlug('zulk-tv') ?></p>
        <ul>
            <li class="heart"><span aria-hidden="true" class="icon-heart icon"></span> </li>
            <li class="share"><span aria-hidden="true" class="icon-export icon"></span> </li>
            <li class="share">
              <a href="<?php bloginfo('url')?>/category/cinezulk">
                <span aria-hidden="true" class="icon-th icon"></span>
              </a>
            </li>
            <li class="share"><span aria-hidden="true" class="icon-menu icon"></span> </li>
        </ul>
      </div>
        <div id="slide-2" class="slide video">
          <?php
            if($cine_zulk->have_posts()){
              while($cine_zulk->have_posts()) { 
                $cine_zulk->the_post();
                $thumb = thumbUrl($post->ID, 'home-thumb-1');
                $diff = diffBetweenDates(the_date("Y-m-d",'','',FALSE));
                $video = videoUrl($post->ID, 'url_video','home');
          ?>
          <a itemprop="photo" href="<?php the_permalink(); ?>" rel="bookmark" title="<?php the_title_attribute(); ?>" data-view="3" data-comment="17" data-favorite="50" data-date="<?php echo $diff->d ?>">
             <?php echo $video ?>
          </a>
          <?php 
                }
              }
          ?>
        </div>
        <div class="category-list animated">
          <ul>
            <li>CONTRATE A ZULK</li>
            <li>TRABALHE AQUI</li>
          </ul>
        </div>
        <div class="extras">
          <div class="twelve columns">
            <a class="link-category-child" href="" rel="bookmark" title="">
              <p class="title-category-child"></p>
            </a>
            <p class="small"><span class="date">0</span> dias atrás | <span aria-hidden="true" class="icon-baloon icon"></span> <span class="view">0</span> 
               <span aria-hidden="true" class="icon-eye icon"></span> <span class="comment">0</span>
               <span aria-hidden="true" class="icon-heart icon"></span> <span class="favorite">0</span>  
             </p>
          </div>
        </div>
      </div>
    </div>
    <!--- row sub-principal -->
    <div class="row thumb">
      <div class="three columns sub-principal thumbFade bounceBottom1 animate">
         <?php 
          $fotografos = new WP_Query(array('showposts' => 4,'category_name' => 'fotografos'));
        ?>
        <div class="extras-top-2">
          <a href="<?php bloginfo('url')?>/category/fotografos">
            <p class="title-category-parent"><?php categoryNameBySlug('fotografos') ?></p>
          </a>
          <ul>
            <li class="share"><span aria-hidden="true" class="icon-export icon"></span></li>
            <li class="heart"><span aria-hidden="true" class="icon-heart icon"></span></li>
            <li class="heart">
              <a href="<?php bloginfo('url')?>/category/fotografos">
                <span aria-hidden="true" class="icon-th icon"></span>
              </a>
            </li>
            <li class="heart"><span aria-hidden="true" class="icon-menu icon"></span></li>
          </ul>
        </div>
        <div id="slide-3" class="slide">
          <?php
            if($fotografos->have_posts()){
              while($fotografos->have_posts()) { 
                $fotografos->the_post();
                $thumb = thumbUrl($post->ID, 'home-thumb-2');
                $diff = diffBetweenDates(the_date("Y-m-d",'','',FALSE));
          ?>
          <a itemprop="photo" href="<?php the_permalink(); ?>" rel="bookmark" title="<?php the_title_attribute(); ?>">
             <img src="<?php echo $thumb ?>" data-title="<?php the_title() ?>" data-view="3" data-comment="17" data-favorite="50" data-date="<?php echo $diff->d ?>"/>
          </a>
          <?php 
                }
              }
          ?>
        </div>
        <div class="category-list animated">
          <ul>
            <li>CONTRATE A ZULK</li>
            <li>TRABALHE AQUI</li>
          </ul>
        </div>
        <div class="extras">
          <div class="title">
              <a class="link-category-child" href="" rel="bookmark" title="">
                <p class="title-category-child"></p>
              </a>
              <p class="small"><span class="date">0</span> dias atrás | <span aria-hidden="true" class="icon-baloon icon"></span> <span class="view">0</span> 
               <span aria-hidden="true" class="icon-eye icon"></span> <span class="comment">0</span>
               <span aria-hidden="true" class="icon-heart icon"></span> <span class="favorite">0</span>  
             </p>
          </div>
        </div>
      </div>
      <div class="three columns sub-principal  thumbFade bounceBottom2 animate">
        <?php 
          $noiva = new WP_Query(array('showposts' => 4,'category_name' => 'noivas'));
        ?>
        <div class="extras-top-2">
           <a href="<?php bloginfo('url')?>/category/noivas">
            <p class="title-category-parent"><?php categoryNameBySlug('noivas') ?></p>
          </a>
          <ul>
            <li class="share"><span aria-hidden="true" class="icon-export icon"></span></li>
            <li class="heart"><span aria-hidden="true" class="icon-heart icon"></span></li>
            <li class="share">
              <a href="<?php bloginfo('url')?>/category/noivas">
                <span aria-hidden="true" class="icon-th icon"></span>
              </a>
            </li>
            <li class="heart"><span aria-hidden="true" class="icon-menu icon"></span></li>
          </ul>
        </div>
        <div id="slide-4" class="slide">
          <?php
            if($noiva->have_posts()){
              while($noiva->have_posts()) { 
                $noiva->the_post();
                $thumb = thumbUrl($post->ID, 'home-thumb-2');
                $diff = diffBetweenDates(the_date("Y-m-d",'','',FALSE));
          ?>
          <a itemprop="photo" href="<?php the_permalink(); ?>" rel="bookmark" title="<?php the_title_attribute(); ?>">
             <img src="<?php echo $thumb ?>" data-title="<?php the_title() ?>" data-view="3" data-comment="17" data-favorite="50" data-date="<?php echo $diff->d ?>"/>
          </a>
          <?php 
                }
              }
          ?>
        </div>
        <div class="category-list animated">
          <ul>
            <li>CONTRATE A ZULK</li>
            <li>TRABALHE AQUI</li>
          </ul>
        </div>
        <div class="extras">
          <div class="title">
              <a class="link-category-child" href="" rel="bookmark" title="">
                <p class="title-category-child"></p>
              </a>
              <p class="small">51 dias atrás | <span aria-hidden="true" class="icon-baloon icon"></span> 0 
               <span aria-hidden="true" class="icon-eye icon"></span> 155 
               <span aria-hidden="true" class="icon-heart icon"></span> 0  
             </p>
          </div>
        </div>
      </div>
      <div class="three columns sub-principal  thumbFade bounceBottom3 animate">
        <?php 
          $book = new WP_Query(array('showposts' => 4,'category_name' => 'zulkbook'));
        ?>
        <div class="extras-top-2">
          <a href="<?php bloginfo('url')?>/category/zulkbook">
            <p class="title-category-parent"><?php categoryNameBySlug('zulkbook') ?></p>
          </a>
          <ul>
            <li class="share"><span aria-hidden="true" class="icon-export icon"></span></li>
            <li class="heart"><span aria-hidden="true" class="icon-heart icon"></span></li>
            <li class="heart">
              <a href="<?php bloginfo('url')?>/category/zulkbook">
                <span aria-hidden="true" class="icon-th icon"></span>
              </a>
            </li>
            <li class="heart"><span aria-hidden="true" class="icon-menu icon"></span></li>
          </ul>
        </div>
        <div id="slide-5" class="slide">
          <?php
            if($book->have_posts()){
              while($book->have_posts()) { 
                $book->the_post();
                $thumb = thumbUrl($post->ID, 'home-thumb-2');
                $diff = diffBetweenDates(the_date("Y-m-d",'','',FALSE));
          ?>
          <a itemprop="photo" href="<?php the_permalink(); ?>" rel="bookmark" title="<?php the_title_attribute(); ?>">
             <img src="<?php echo $thumb ?>" data-title="<?php the_title() ?>" data-view="3" data-comment="17" data-favorite="50" data-date="<?php echo $diff->d ?>"/>
          </a>
          <?php 
                }
              }
          ?>
        </div>
        <div class="category-list">
          <ul>
            <li>CONTRATE A ZULK</li>
            <li>TRABALHE AQUI</li>
          </ul>
        </div>
        <div class="extras">
          <div class="title">
              <a class="link-category-child" href="" rel="bookmark" title="">
                <p class="title-category-child"></p>
              </a>
              <p class="small">51 dias atrás | <span aria-hidden="true" class="icon-baloon icon"></span> 0 
               <span aria-hidden="true" class="icon-eye icon"></span> 155 
               <span aria-hidden="true" class="icon-heart icon"></span> 0  
             </p>
          </div>
        </div>
      </div>
      <div class="three columns sub-principal  thumbFade bounceBottom4 animate">
         <?php 
          $cursos = new WP_Query(array('showposts' => 4,'category_name' => 'cursos'));
        ?>
        <div class="extras-top-2">
          <a href="<?php bloginfo('url')?>/category/cursos">
            <p class="title-category-parent"><?php categoryNameBySlug('cursos') ?></p>
          </a>
          <ul>
            <li class="share"><span aria-hidden="true" class="icon-export icon"></span></li>
            <li class="heart"><span aria-hidden="true" class="icon-heart icon"></span></li>
            <li class="heart">             
              <a href="<?php bloginfo('url')?>/category/cursos">
                <span aria-hidden="true" class="icon-th icon"></span>
              </a>
            </li>
            <li class="heart"><span aria-hidden="true" class="icon-menu icon"></span></li>
          </ul>
        </div>
        <div id="slide-6" class="slide">
          <?php
            if($cursos->have_posts()){
              while($cursos->have_posts()) { 
                $cursos->the_post();
                $thumb = thumbUrl($post->ID, 'home-thumb-2');
                $diff = diffBetweenDates(the_date("Y-m-d",'','',FALSE));
          ?>
          <a itemprop="photo" href="<?php the_permalink(); ?>" rel="bookmark" title="<?php the_title_attribute(); ?>">
             <img src="<?php echo $thumb ?>" data-title="<?php the_title() ?>" data-view="3" data-comment="17" data-favorite="50" data-date="<?php echo $diff->d ?>"/>
          </a>
          <?php 
                }
              }
          ?>
        </div>
        <div class="category-list">
          <ul>
            <li>CONTRATE A ZULK</li>
            <li>TRABALHE AQUI</li>
          </ul>
        </div>
        <div class="extras">
          <div class="title">
              <a class="link-category-child" href="" rel="bookmark" title="">
                <p class="title-category-child"></p>
              </a>
              <p class="small">51 dias atrás | <span aria-hidden="true" class="icon-baloon icon"></span> 0 
               <span aria-hidden="true" class="icon-eye icon"></span> 155 
               <span aria-hidden="true" class="icon-heart icon"></span> 0  
             </p>
          </div>
        </div>
      </div>
    </div>
  </div>
<?php get_footer(); ?>