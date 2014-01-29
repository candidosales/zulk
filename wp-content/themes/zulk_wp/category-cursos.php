<?php get_header(); ?>
<body class="page">
 
<div class="large-12 columns">
    <?php include('menu.php');?>
    <div class="row">
      <div class="large-12 columns no-padding">
          <h2 class="parent-category"><?php categoryNameBySlug('cursos') ?></h2>
      </div>
    </div>
    <div class="row margin-btn-2">
      <div class="large-12 columns no-padding wrapper-page">
        <div class="main">
          <div class="sub-1">
            <?php categoryPostsBySlug('criando-fotos-espetaculares-2','category-thumb-3');?>
          </div>
          <div class="sub-2">
            <?php categoryPostsBySlug('zulk-master-class','category-thumb-4');?>
          </div>
          <div class="sub-2 sub-3">
            <?php categoryPostsBySlug('flash','category-thumb-4');?>
          </div>
        </div>
          <div class="sub-2 sub-4">
            <?php categoryPostsBySlug('fotografia','category-thumb-4');?>
          </div>
          <div class="sub-2 sub-5">
            <?php categoryPostsBySlug('pos-producao','category-thumb-4');?>
          </div>
          <div class="sub-2 sub-6">
            <?php categoryPostsBySlug('criando-portfolio','category-thumb-4');?>
          </div>
          <div class="sub-2 sub-7">
            <?php categoryPostsBySlug('criando-portfolio','category-thumb-4');?>
          </div>
      </div>
    </div>
</div>
<script type="text/javascript">

</script>

<?php get_footer(); ?>
