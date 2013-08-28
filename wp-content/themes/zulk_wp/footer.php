<!-- Included JS Files (Compressed) -->
<script src="<?php bloginfo('template_url'); ?>/javascripts/foundation.min.js"></script>
<script src="<?php bloginfo('template_url'); ?>/javascripts/jquery.masonry.min.js"></script>
<script src="<?php bloginfo('template_url'); ?>/javascripts/jquery.swipebox.min.js"></script>
<script src="<?php bloginfo('template_url'); ?>/javascripts/jquery.scrollTo-min.js"></script>

<script src="<?php bloginfo('template_url'); ?>/javascripts/smooth-div-scroll/jquery-ui-1.8.23.custom.min.js" type="text/javascript"></script>
<script src="<?php bloginfo('template_url'); ?>/javascripts/smooth-div-scroll/jquery.mousewheel.min.js" type="text/javascript"></script>
<script src="<?php bloginfo('template_url'); ?>/javascripts/smooth-div-scroll/jquery.kinetic.js" type="text/javascript"></script>
<script src="<?php bloginfo('template_url'); ?>/javascripts/smooth-div-scroll/jquery.smoothdivscroll-1.3-min.js" type="text/javascript"></script>
<script src="<?php bloginfo('template_url'); ?>/javascripts/jquery.nicescroll.min.js" type="text/javascript"></script>
<script src="<?php bloginfo('template_url'); ?>/javascripts/jquery.allofthelights.js" type="text/javascript"></script>

<!-- Initialize JS Plugins -->
<script src="<?php bloginfo('template_url'); ?>/javascripts/app.js" type="text/javascript"></script>
<script src="<?php bloginfo('template_url'); ?>/javascripts/previous-next-post-ajax.js" type="text/javascript"></script>

  <script type="text/javascript">
  $(document).ready(function(){
    $(".swipebox").swipebox({
        useCSS : true, // false will force the use of jQuery for animations
        hideBarsDelay : 3000 // 0 to always show caption and action bar
      });
    $('#scroll').niceScroll({cursoropacitymin:0,cursoropacitymax:0});
  });
   

  </script>

</body>
</html>