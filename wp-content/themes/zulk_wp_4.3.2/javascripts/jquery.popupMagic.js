(function( $ ){
 
  $.fn.popupMagic = function( selector, settings ) {  
 
    // Criar alguns padrões, estendendo-os com todas as opções que foram fornecidos
    // settings
     var config = {
            'zoomIn': '200%',
            'opacity': ''
        };

    if (settings){$.extend(config, settings);}

    // variables
    var obj = $(selector);
 
    obj.click(function(){
      console.log('Click pop');
      obj.css({"zoom":config.zoomIn});
    });
 
  };
})( jQuery );