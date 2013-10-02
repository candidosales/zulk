$(document).ready(function() {  


    function ajax(){
            $('#prev a, #next a').on('click', function(e){  
              e.preventDefault();  
              var parentId = $(this).parent().prop('id');
              var signalWay = '+';
              var signalWayOpposite = '-';

              if(parentId!='next'){
                signalWay = '-';
                signalWayOpposite = '+';
              }

              var link  = $(this).attr('href').replace("http://localhost","");
              var title = $(this).attr('href');
              var time = 500;  
              $("#displayResults").animate({
                left: signalWay+'=1500px',
                opacity: 0
              }, time, function() {
    
                  console.log('Clicou em: '+link);
                  window.history.pushState("object or string", "title", link);
                  $.ajax({  
                          type: 'POST',  
                          url: 'http://localhost/zulk/wp-admin/admin-ajax.php',
                          cache: true,  
                          data: {  
                              action: 'ajax_prev_next',  
                              link: link,  
                          },
                          loading: function(data, textStatus, XMLHttpRequest){

                          },                    
                          success: function(data, textStatus, XMLHttpRequest){  
                              
                              $("#displayResults").html('');
                              $("#displayResults").append(data).animate({
                                  left: signalWayOpposite+'=2000px'
                                }, time-time*0.5).animate({
                                  opacity: 1,
                                  left: signalWay+'=500px'
                                }, time);  
 
                              ajax();
                          },  
                          error: function(MLHttpRequest, textStatus, errorThrown){  
                            alert(errorThrown);  
                          }  
                    });
              });

    
          }); 
    }

    ajax();
});     

 
