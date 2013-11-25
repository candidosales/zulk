<?php
function add_custom_meta_boxes() {  
    add_meta_box(
        'post_inner_meta_video',
        'Vídeo',
        'post_inner_meta_video',
        'post'
    ); 

    add_meta_box(
        'post_large',
        'Post Largo',
        'post_large',
        'post'
    ); 
} // end add_custom_meta_boxes  
add_action('add_meta_boxes', 'add_custom_meta_boxes');  


/******************************* Post Video *******************************/

function post_inner_meta_video( $post ) {
?>
<p>
  <label for="realizador">URL do vídeo:</label>
  <br />
  <input type="text" name="url_video" size="70" value="<?php echo get_post_meta( $post->ID, 'url_video', true ); ?>" />
  <strong>Exemplo: http://www.youtube.com/watch?v=fSAgFxjFSqY ou http://vimeo.com/70642037</strong>
</p>

<?php
}

add_action( 'save_post', 'save_post_meta_video');
function save_post_meta_video( $post_id) {
   // Verificar se os dados foram enviados, neste caso se a metabox existe, garantindo-nos que estamos a guardar valores da página de filmes.
   if (!$_POST['url_video']) return;
 
   // Fazer a saneação dos inputs e guardá-los
   update_post_meta( $post_id, 'url_video',  $_POST['url_video'] );
   return true;
}


/******************************* Post Large *******************************/
function post_large( $post ) {
?>
<p>
  <label for="realizador">
    <?php if(get_post_meta( $post->ID, 'large', true ) != true){ ?>
      <input type="checkbox" name="large" value="true"> 
    <?php }else{ ?>
      <input type="checkbox" name="large" value="true" checked> 
    <?php } ?>
    Tornar o post mais destacado</label>
  <br />
</p>

<?php
}

add_action( 'save_post', 'save_post_large');
function save_post_large( $post_id) {
   // Verificar se os dados foram enviados, neste caso se a metabox existe, garantindo-nos que estamos a guardar valores da página de filmes.
   if (!$_POST['large']) return;
 
   // Fazer a saneação dos inputs e guardá-los
   update_post_meta( $post_id, 'large',  $_POST['large'] );
   return true;
}