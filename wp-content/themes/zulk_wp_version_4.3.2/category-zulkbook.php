<?php get_header(); ?>
<body>
 
<div class="twelve columns">
    <?php include('menu.php');?>
    <div class="row">
      <h2><?php categoryNameBySlug('zulkbook') ?></h2>
    </div>
    <div class="row margin-btn-2">
      <div class="three columns">
        <ul class="nav-category">
          <li><a href="">Encomende um zulk, book</a></li>
          <li><a href="">Seu pedido</a></li>
          <li><a href="">Livros econômicos</a></li>
        </ul>
        <div class="question">
          <p></p>
        </div>
      </div>
      <div class="nine columns">
        <div class="eight columns category">
          <div class="right">
          <p class="title-category">+ <?php categoryNameBySlug('livros-fotograficos') ?></p>
          <?php 
            categoryPostsBySlug('livros-fotograficos', 'category-thumb-1');
          ?>
          </div>
        </div>
        <div class="four columns category small">
           <p class="title-category">+ <?php categoryNameBySlug('dicas-diagramacao') ?></p>
          <?php 
            categoryPostsBySlug('dicas-diagramacao', 'category-thumb-2');
          ?>
           
        </div>
      </div>
    </div>
    <div class="row">
      <div class="three columns category small">
        <p class="title-category">+ <?php categoryNameBySlug('linha-mimo') ?></p>
         <?php 
            categoryPostsBySlug('linha-mimo', 'category-thumb-2');
          ?>
      </div>
      <div class="three columns category small">
        <p class="title-category">+ <?php categoryNameBySlug('linha-romana') ?></p>
          <?php 
            categoryPostsBySlug('linha-romana', 'category-thumb-2');
          ?>
      </div>
      <div class="three columns category small">
        <p class="title-category">+ <?php categoryNameBySlug('linha-moderna') ?></p>
          <?php 
            categoryPostsBySlug('linha-moderna', 'category-thumb-2');
          ?>
      </div>
      <div class="three columns category small">
        <p class="title-category">+ <?php categoryNameBySlug('linha-fineart') ?></p>
          <?php 
            categoryPostsBySlug('linha-fineart', 'category-thumb-2');
          ?>
      </div>
    </div>
</div>

<?php get_footer(); ?>
