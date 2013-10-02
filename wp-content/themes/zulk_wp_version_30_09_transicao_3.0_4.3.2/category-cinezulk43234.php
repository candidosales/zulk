<?php get_header(); ?>
<body>
 
<div class="twelve columns">
    <?php include('menu.php');?>
    <div class="row">
      <h2><?php categoryName(21) ?></h2>
    </div>
    <div class="row margin-btn-2">
      <div class="two columns">
        <ul>
            <?php wp_list_categories('orderby=name&child_of=21&title_li=')?>
          </ul>
      </div>
      <div class="eight columns cine">
        <?php
        if(in_category('cinezulk')){

          $cine_zulk = wp_get_recent_posts(array('numberposts' => 1,'category' => 21));
          foreach( $cine_zulk as $recent ){
                $video = videoUrl($recent["ID"], 'url_video','cine');
                ?>
                <ul>
                  <li class="share"><span aria-hidden="true" class="icon-export icon"></span> </li>
                  <li class="share"><span aria-hidden="true" class="icon-thumbs-up icon"></span></li>
                  <li class="share"><span aria-hidden="true" class="icon-heart icon"></span> </li>
                  <li class="heart"><span aria-hidden="true" class="icon-lightbulb icon"></span> </li>
                </ul>
                <?php echo $video ?>
        <?php
              }
            }
        ?>
      </div>
      <div class="two columns">
      </div>
    </div>
</div>

<?php get_footer(); ?>
