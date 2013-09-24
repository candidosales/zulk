<?php get_header(); ?>
<body>
 
<div class="twelve columns">
 <div class="fixed-top">
  <?php include('menu.php');?>
  </div>
    <div class="metro">
      <div class="wrapper">
        <div class="header">
          <h2><?php categoryNameBySlug('historias-zulk') ?></h2>
          <div class="right next">
               <span aria-hidden='true' class='icon-arrow-right icon'></span>
          </div>
        </div>
        <div class="wrapper-content">
          <?php categoryTodasPostsBySlug('historias-zulk'); ?>      
        </div>    
       </div>
      <div class="wrapper">
        <div class="header">
          <div class="left prev">
            <span aria-hidden='true' class='icon-arrow-left icon'></span>
          </div>
          <h2><?php categoryNameBySlug('fotografos') ?></h2>
          <div class="right next">
            <span aria-hidden='true' class='icon-arrow-right icon'></span>
          </div>
        </div>
        <div class="wrapper-content">
          <?php categoryTodasPostsBySlug('fotografos'); ?>   
        </div>
      </div>
      <div class="wrapper">
        <div class="header">
          <div class="left prev">
            <span aria-hidden='true' class='icon-arrow-left icon'></span>
          </div>
          <h2><?php categoryNameBySlug('historias-zulk') ?></h2>
          <div class="right next">
               <span aria-hidden='true' class='icon-arrow-right icon'></span>
          </div>
        </div>
        <div class="wrapper-content">
          <?php categoryTodasPostsBySlug('historias-zulk'); ?>      
        </div>    
       </div>
    </div>

</div>

<?php get_footer(); ?>
