<?php get_header(); ?>
<body class="page">
 
<div class="large-12 columns">
    <?php include('menu.php');?>
    <div class="row">
      <div class="large-12 columns no-padding">
          <h2 class="parent-category"><?php categoryNameBySlug('historias-zulk') ?></h2>
      </div>
    </div>
    <div class="row margin-btn-2">
      <div class="large-12 columns no-padding wrapper-page">
        <div class="main">
          <div class="sub-1">
            <?php categoryPostsBySlug('casamentos','category-thumb-3');?>
          </div>
          <div class="sub-2">
            <?php categoryPostsBySlug('formaturas','category-thumb-4');?>
          </div>
          <div class="sub-2">
            <?php categoryPostsBySlug('15-anos','category-thumb-4');?>
          </div>
        </div>
          <div class="sub-2">
            <?php categoryPostsBySlug('criancas','category-thumb-4');?>
          </div>
          <div class="sub-2">
            <?php categoryPostsBySlug('sensuais','category-thumb-4');?>
          </div>
          <div class="sub-2">
            <?php categoryPostsBySlug('gravidas','category-thumb-4');?>
          </div>
          <div class="sub-2">
            <?php categoryPostsBySlug('gravidas','category-thumb-4');?>
          </div>
      </div>
    </div>
</div>
<script type="text/javascript">

</script>

<?php get_footer(); ?>
