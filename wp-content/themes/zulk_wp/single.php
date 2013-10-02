<?php get_header();  
      while (have_posts()) {  the_post(); 
        $src = wp_get_attachment_image_src( get_post_thumbnail_id( $post->ID ), 'full' );

        ?>

<body class="post-body">
  <div class="blur">
  </div>
  <div class="content-post">
    <div class="main">
      <header>
          <h1>
            <?php the_title(); ?>
          </h1>
          <p class="date">
            Postado em <?php the_time('j \d\e F \d\e Y'); ?>
          </p>
      </header>
      <article>
          <?php the_content(); ?>
      </article>    
    </div>
  </div>
<script type="text/javascript">
  $(function() {
    $.vegas({
      src:'<?php echo $src[0]?>'
    })('overlay', {
      src:'/vegas/overlays/13.png'
    });
  });
</script>
<?php 

}
get_footer(); ?>
