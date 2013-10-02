<?php get_header(); ?>
<body>
 
<div class="twelve columns">
    <?php include('menu.php');?>
    <div class="row">
      <div class="twelve columns">
        <div class="eight columns no-padding">
          <h2 class="parent-category"><?php categoryNameBySlug('historias-zulk') ?></h2>
        </div>
        
        <div class="four columns question">
          <input type="text" placeholder="Por que a Zulk chama sua atenção?">
        </div>
      </div>
    </div>
    <div class="row">
      <div class="twelve columns">
        <ul class="nav-category">
          <li><a href="">Depoimentos</a></li>
          <li><a href="">Produtos e Serviços</a></li>
          <li><a href="">Trabalhe com a Zulk</a></li>
          <li><a href="">Contrate a Zulk</a></li>
          <li><a href="">Entenda a Zulk</a></li>
        </ul>

      </div>
    </div>
    <div class="row margin-btn-2">
      <div class="twelve columns no-padding">
        <div class="six columns category">
         <p class="title-category"><span aria-hidden="true" class="icon-th icon"></span> <?php categoryNameBySlug('casamentos') ?></p>
          <?php 
            categoryPostsBySlug('casamentos', 'category-thumb-1');
          ?>
        </div>
        <div class="three columns category small">
           <p class="title-category"><span aria-hidden="true" class="icon-th icon"></span> <?php categoryNameBySlug('formaturas') ?></p>
          <?php 
            categoryPostsBySlug('formaturas', 'category-thumb-2');
          ?>
        </div>
        <div class="three columns category small">
          <p class="title-category"><span aria-hidden="true" class="icon-th icon"></span> <?php categoryNameBySlug('15-anos') ?></p>
            <?php 
              categoryPostsBySlug('15-anos', 'category-thumb-2');
            ?>
        </div>
      </div>
    </div>
    <div class="row">
      <div class="twelve columns no-padding">  
        <div class="three columns category small">
          <p class="title-category"><span aria-hidden="true" class="icon-th icon"></span> <?php categoryNameBySlug('criancas') ?></p>
            <?php 
              categoryPostsBySlug('criancas', 'category-thumb-2');
            ?>
        </div>
        <div class="three columns category small">
          <p class="title-category"><span aria-hidden="true" class="icon-th icon"></span> <?php categoryNameBySlug('sensuais') ?></p>
            <?php 
              categoryPostsBySlug('sensuais', 'category-thumb-2');
            ?>
        </div>
        <div class="three columns category small">
         <p class="title-category"><span aria-hidden="true" class="icon-th icon"></span> <?php categoryNameBySlug('gravidas') ?></p>
            <?php 
              categoryPostsBySlug('gravidas', 'category-thumb-2');
            ?>
        </div>
        <div class="three columns category small">
         <p class="title-category"><span aria-hidden="true" class="icon-th icon"></span> <?php categoryNameBySlug('gravidas') ?></p>
            <?php 
              categoryPostsBySlug('gravidas', 'category-thumb-2');
            ?>
        </div>
      </div> 
    </div>
</div>

<?php get_footer(); ?>
