<?php get_header(); ?>
<body class="page">
 
<div class="large-12 columns">
    <?php include('menu.php');?>
    <div class="row">
      <div class="large-12 columns no-padding">
          <h2 class="parent-category"><?php categoryNameBySlug('noivas') ?></h2>
      </div>
    </div>
    <div class="row margin-btn-2">
      <div class="large-12 columns no-padding wrapper-page">
        <div class="main">
          <div class="sub-1">
            <?php categoryPostsBySlug('casamento-mes','category-thumb-3');?>
          </div>
          <div class="sub-2">
            <?php categoryPostsBySlug('ideias-legais','category-thumb-4');?>
          </div>
          <div class="sub-2">
            <?php categoryPostsBySlug('fornecedores','category-thumb-4');?>
          </div>
        </div>
          <div class="sub-2">
            <?php categoryPostsBySlug('planejando-casamento','category-thumb-4');?>
          </div>
          <div class="sub-2">
            <?php categoryPostsBySlug('certo-errado','category-thumb-4');?>
          </div>
          <div class="sub-2">
            <?php categoryPostsBySlug('livros-casamento','category-thumb-4');?>
          </div>
          <div class="sub-2">
            <?php categoryPostsBySlug('livros-casamento','category-thumb-4');?>
          </div>
      </div>
    </div>
</div>
<script type="text/javascript">

</script>

<?php get_footer(); ?>
