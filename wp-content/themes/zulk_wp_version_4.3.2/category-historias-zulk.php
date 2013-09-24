<?php get_header(); ?>
<body>
 
<div class="twelve columns">
    <?php include('menu.php');?>
    <div class="row">
      <h2><?php categoryNameBySlug('historias-zulk') ?></h2>
    </div>
    <div class="row margin-btn-2">
      <div class="three columns">
        <ul class="nav-category">
          <li><a href="">Depoimentos</a></li>
          <li><a href="">Produtos e Serviços</a></li>
          <li><a href="">Trabalhe com a Zulk</a></li>
          <li><a href="">Contrate a Zulk</a></li>
          <li><a href="">Entenda a Zulk</a></li>
        </ul>
        <div class="question">
          <p>Por que a Zulk chama sua atenção?</p>
          <input type="text">
        </div>
      </div>
      <div class="nine columns">
        <div class="eight columns category">
          <div class="right">
         <p class="title-category">+ <?php categoryNameBySlug('casamentos') ?></p>
          <?php 
            categoryPostsBySlug('casamentos', 'category-thumb-1');
          ?>
          
          </div>
        </div>
        <div class="four columns category small">
           <p class="title-category">+ <?php categoryNameBySlug('formaturas') ?></p>
          <?php 
            categoryPostsBySlug('formaturas', 'category-thumb-2');
          ?>
        </div>
      </div>
    </div>
    <div class="row">
      <div class="three columns category small">
        <p class="title-category">+ <?php categoryNameBySlug('15-anos') ?></p>
          <?php 
            categoryPostsBySlug('15-anos', 'category-thumb-2');
          ?>
      </div>
      <div class="three columns category small">
        <p class="title-category">+ <?php categoryNameBySlug('criancas') ?></p>
          <?php 
            categoryPostsBySlug('criancas', 'category-thumb-2');
          ?>
      </div>
      <div class="three columns category small">
        <p class="title-category">+ <?php categoryNameBySlug('sensuais') ?></p>
          <?php 
            categoryPostsBySlug('sensuais', 'category-thumb-2');
          ?>
      </div>
      <div class="three columns category small">
       <p class="title-category">+ <?php categoryNameBySlug('gravidas') ?></p>
          <?php 
            categoryPostsBySlug('gravidas', 'category-thumb-2');
          ?>
      </div>
    </div>
</div>

<?php get_footer(); ?>
