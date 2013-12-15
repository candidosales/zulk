<?php get_header(); ?>
<body>
 
<div class="twelve columns">
    <?php include('menu.php');?>
    <div class="row">
      <h2><?php categoryNameBySlug('cursos') ?></h2>
    </div>
    <div class="row margin-btn-2">
      <div class="three columns">
        <ul class="nav-category">
          <li><a href="">Curso Particular</a></li>
          <li><a href="">Módulo Diários</a></li>
          <li><a href="">Administração para fotográfos</a></li>
          <li><a href="">Vendas e Marketing</a></li>
          <li><a href="">Direito e Contratos</a></li>
        </ul>
        <div class="question">
          <p></p>
        </div>
      </div>
      <div class="nine columns">
        <div class="eight columns category">
          <div class="right">
          <p class="title-category">+ <?php categoryNameBySlug('criando-fotos-espetaculares-2') ?></p>
          <?php 
            categoryPostsBySlug('criando-fotos-espetaculares-2', 'category-thumb-1');
          ?>
          </div>
        </div>
        <div class="four columns category small">
           <p class="title-category">+ <?php categoryNameBySlug('zulk-master-class') ?></p>
          <?php 
            categoryPostsBySlug('zulk-master-class', 'category-thumb-2');
          ?>
           
        </div>
      </div>
    </div>
    <div class="row">
      <div class="three columns category small">
        <p class="title-category">+ <?php categoryNameBySlug('flash') ?></p>
         <?php 
            categoryPostsBySlug('flash', 'category-thumb-2');
          ?>
      </div>
      <div class="three columns category small">
        <p class="title-category">+ <?php categoryNameBySlug('fotografia') ?></p>
          <?php 
            categoryPostsBySlug('fotografia', 'category-thumb-2');
          ?>
      </div>
      <div class="three columns category small">
        <p class="title-category">+ <?php categoryNameBySlug('pos-producao') ?></p>
          <?php 
            categoryPostsBySlug('pos-producao', 'category-thumb-2');
          ?>
      </div>
      <div class="three columns category small">
        <p class="title-category">+ <?php categoryNameBySlug('criando-portfolio') ?></p>
          <?php 
            categoryPostsBySlug('criando-portfolio', 'category-thumb-2');
          ?>
      </div>
    </div>
</div>

<?php get_footer(); ?>
