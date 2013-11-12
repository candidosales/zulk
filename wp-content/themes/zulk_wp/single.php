<?php get_header();  
      while (have_posts()) {  the_post(); 
        $src = wp_get_attachment_image_src( get_post_thumbnail_id( $post->ID ), 'full' );

        ?>
        

<body class="post-body">
  <div class="command-left">
    <ul>
      <li id="prev" class="arrow-left left">
          <?php previous_post_link( '%link', '<span  aria-hidden="true" class="icon-arrow-left icon"></span>' ); ?>
      </li>
      <li>
        <a href="#">
          <span  aria-hidden="true" class="icon-th icon"></span>
        </a>
      </li>
    </ul>
  </div>
  <div class="command-right">
    <ul>
      <li  id="next" class="arrow-right right">        
          <?php next_post_link( '%link', '<span aria-hidden="true" class="icon-arrow-right icon"></span>' ); ?>
      </li>
    </ul>
  </div>
  <div class="command-top">
       <span aria-hidden="true" class="icon-chevron-down icon down"></span>
  </div>
  <div class="back-post">
    <div class="row">
      <div class="large-6 large-centered columns top">
        <div class="menu">
          <ul>
            <li>
              <a href="<?php bloginfo('url')?>">
                <span aria-hidden="true" class="icon-home"></span>
              </a>
            </li>
            <li>
              <a href="<?php bloginfo('url')?>">
                <span aria-hidden="true" class="icon-windows"></span>
              </a>
            </li>
            <li>
              <a href="<?php bloginfo('url')?>">
                <span class="qtd">3</span>
              </a>
            </li>
          </ul>
        </div>
        <div>
          <a class="contrate">Contrate a Zulk</a>
        </div>
      </div>
    </div>
    <div class="row-fluid">
        <?php include('posts-relacionados.php'); ?>
    </div>
    <div class="row-fluid">
      <div class="large-5 push-1 columns menu">
        <div class="logo">
          <a href="<?php bloginfo('url')?>">
            <img src="<?php bloginfo('template_url'); ?>/images/logo.png" />
          </a>
        </div>
        <div class="menu-side">
          <ul>
            <?php wp_list_categories('orderby=name&child_of=20&title_li=')?>
          </ul>
        </div>
      </div>
    </div>
  </div>
  <div class="background-post" style="background:url(<?php echo $src[0]?>) no-repeat center center fixed;-webkit-background-size:cover">
    <div class="content-post" >
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
  </div>
<script type="text/javascript">
  $(function() {
    /*$.vegas({
      src:'<?php echo $src[0]?>'
    })('overlay', {
      src:'/vegas/overlays/13.png'
    });*/
  });
</script>
<?php 

}
get_footer(); ?>
