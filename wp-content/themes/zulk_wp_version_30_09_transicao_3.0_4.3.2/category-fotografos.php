<?php get_header(); ?>
<body>
 
<div class="twelve columns">
    <?php include('menu.php');?>
    <div class="row">
      <h2><?php categoryNameBySlug('fotografos') ?></h2>
    </div>
    <div class="row margin-btn-2">
      <div class="three columns">
        <ul class="nav-category">
          <li><a href="">Encadernação de livros fotográficos</a></li>
          <li><a href="">Revelação fineart</a></li>
          <li><a href="">Dicas de pós produção</a></li>
        </ul>
        <div class="question">
          <p>Que curso vc gostaria de fazer na Zulk?</p>
          <input type="text">
        </div>
      </div>
      <div class="nine columns">
        <div class="eight columns category">
          <div class="right">
          <p class="title-category">+ <?php categoryNameBySlug('dicas') ?></p>
          <?php 
            categoryPostsBySlug('dicas', 'category-thumb-1');
          ?>
          </div>
        </div>
        <div class="four columns category small">
           <p class="title-category">+ <?php categoryNameBySlug('equipamentos') ?></p>
          <?php 
            categoryPostsBySlug('equipamentos', 'category-thumb-2');
          ?>
           
        </div>
      </div>
    </div>
    <div class="row">
      <div class="three columns category small">
        <p class="title-category">+ <?php categoryNameBySlug('feiras-eventos') ?></p>
         <?php 
            categoryPostsBySlug('feiras-eventos', 'category-thumb-2');
          ?>
      </div>
      <div class="three columns category small">
        <p class="title-category">+ <?php categoryNameBySlug('diagramacao') ?></p>
          <?php 
            categoryPostsBySlug('diagramacao', 'category-thumb-2');
          ?>
      </div>
      <div class="three columns category small">
        <p class="title-category">+ <?php categoryNameBySlug('inspiracao') ?></p>
          <?php 
            categoryPostsBySlug('inspiracao', 'category-thumb-2');
          ?>
      </div>
      <div class="three columns category small">
        <p class="title-category">+ <?php categoryNameBySlug('cursos-2') ?></p>
          <?php 
            categoryPostsBySlug('cursos-2', 'category-thumb-2');
          ?>
      </div>
    </div>
</div>

<?php get_footer(); ?>
