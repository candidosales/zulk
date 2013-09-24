<?php get_header(); ?>
<body>
 
<div id="tile-2" class="twelve columns">
    <?php include('menu.php');?>
    <div class="row">
      <h2><?php categoryNameBySlug('ultimas-noticias') ?></h2>
    </div>
    <div class="row">
      <div class="container">
           <?php 
            $ultimas_historias = new WP_Query(array('showposts' => 5,'category_name' => 'ultimas-noticias'));

            $count = 0;

            if($ultimas_historias->have_posts()){ 

              while($ultimas_historias->have_posts()) { 
              $ultimas_historias->the_post();
              $thumb = thumbUrl($post->ID, 'ultimas-thumb-1');
              $diff = diffBetweenDates(the_date("Y-m-d",'','',FALSE));

                if ($count < 1){
                    $thumb = thumbUrl($post->ID, 'ultimas-thumb-1');
                }elseif ($count >= 1 && $count < 3){
                    $thumb = thumbUrl($post->ID, 'ultimas-thumb-2');
                }elseif ($count >= 3){
                    $thumb = thumbUrl($post->ID, 'ultimas-thumb-3');
                }

                ?>
        <div class="box widget animation unloaded">

          <div href="#" class="link-category">
            <p class="date">há <?php echo $diff->i ?> minutos</p>
            <a itemprop="photo" href="<?php the_permalink(); ?>" rel="bookmark" title="<?php the_title_attribute(); ?>">
               <img src="<?php echo $thumb ?>"/>
            </a>
            <div class="label-category">
              <p class="title"> <?php the_title(); ?><span aria-hidden="true" class="icon-eye icon right"> 155</span> </p>
              <div class="extra">
                <div class="comment">
                  <p class="like"><span aria-hidden="true" class="has-tip tip-top icon-thumbs-up icon" title="Curtiu?"></span></p>
                  <p> <?php echo substr(get_the_content(), 0, 150); ?>...</p>
                 
                </div>
                <div class="action">
                  <a href="#">COMENTAR <span aria-hidden="true" class="icon-baloon icon"></span> </a>
                  <span aria-hidden="true" class="icon-export icon right"></span> 
                </div>
              </div>
           </div>
         </div>
       </div>
       <?php 
               $count++;
              }
            }
        ?>

</div>
</div>
</div>

<?php get_footer(); ?>
