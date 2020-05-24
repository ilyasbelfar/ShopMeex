
<!--Magnify -->

<!-- Custom Scripts -->
<script>

$(function(){
 
  getCart();
  
  getTotal();



   $(function(){
    $(document).on('click', '.remove-item-button', function(e){
        e.preventDefault();
        var id = $(this).data('id');
        $.ajax({
            type: 'POST',
            url: '../cart_delete.php',
            data: {id:id},
            dataType: 'json',
            success: function(response){
                if(!response.error){
                   
                    getCart();
                    getTotal()
                   
                }
            }
        });
    });
    });



function getCart(){
  $.ajax({
    type: 'POST',
    url: '../cart_fetch.php',
    dataType: 'json',
    success: function(response){
      $('#cart_menu').html(response.list);
      $('.notify').html(response.count);
    }
  });
}

  
$(document).ready(function(){
            $('a.add_to_c').click(function(e) { 
                e.preventDefault();
                var id = $(this).attr('rel');
                $.ajax({
                      type: 'POST',
                      url: '../cart_add.php',
                      data: {id:id},
                      dataType: 'json',
                  success: function(response){
                    alert(response.message)
                    if(response.error){
                      $('.callout1').removeClass('callout-success').addClass('callout-danger');
                    }
                    else{
                    $('.callout1').removeClass('callout-danger').addClass('callout-success');
                    getCart();
                    getTotal();
                    }
                 }
            });
        });
});




  



 


function getTotal(){
    $.ajax({
        type: 'POST',
        url: '../cart_total.php',
        dataType: 'json',
        success:function(response){
            total = response;
            $('.amount').html(response);
        }
    });
}


$(document).ready(function(){
            $('a.delete_cart').click(function() { 
             var id = $(this).attr('rel');
             $.ajax({
             type: 'POST',
             url: '../cart_delete.php',
             data: {id:id},
                dataType: 'json',
                success: function(response){
                if(!response.error){
                   
                    getCart();
                    getTotal()
                   
                }
            }
        });

               
         });
        });
});



</script>


