<?php get_header(); ?>
<body>
 
<div class="twelve columns">
    <?php include('menu.php');?>
    <div class="row">
      <h2><?php categoryNameBySlug('noivas') ?></h2>
    </div>
    <div class="row margin-btn-2">
      <div class="three columns">
        <ul class="nav-category">
          <li><a href="">Contrate a zulk</a></li>
          <li><a href="">Escolhendo um fotográfo</a></li>
          <li><a href="">A nova moda do vídeo de casamento</a></li>
        </ul>
        <div class="question">
          <p></p>
        </div>
      </div>
      <div class="nine columns">
        <div class="eight columns category">
          <div class="right">
          <p class="title-category">+ <?php categoryNameBySlug('casamento-mes') ?></p>
          <?php 
            categoryPostsBySlug('casamento-mes', 'category-thumb-1');
          ?>
          </div>
        </div>
        <div class="four columns category small">
           <p class="title-category">+ <?php categoryNameBySlug('ideias-legais') ?></p>
          <?php 
            categoryPostsBySlug('ideias-legais', 'category-thumb-2');
          ?>
           
        </div>
      </div>
    </div>
    <div class="row">
      <div class="three columns category small">
        <p class="title-category">+ <?php categoryNameBySlug('fornecedores') ?></p>
         <?php 
            categoryPostsBySlug('fornecedores', 'category-thumb-2');
          ?>
      </div>
      <div class="three columns category small">
        <p class="title-category">+ <?php categoryNameBySlug('planejando-casamento') ?></p>
          <?php 
            categoryPostsBySlug('planejando-casamento', 'category-thumb-2');
          ?>
      </div>
      <div class="three columns category small">
        <p class="title-category">+ <?php categoryNameBySlug('certo-errado') ?></p>
          <?php 
            categoryPostsBySlug('certo-errado', 'category-thumb-2');
          ?>
      </div>
      <div class="three columns category small">
        <p class="title-category">+ <?php categoryNameBySlug('livros-casamento') ?></p>
          <?php 
            categoryPostsBySlug('livros-casamento', 'category-thumb-2');
          ?>
      </div>
    </div>
</div>

<?php get_footer(); ?>
