
<!--Magnify -->

<!-- Custom Scripts -->
<script>
$(function(){
 
  getCart();
  getReview(); 
  getTotal();

  $('#productForm').submit(function(e){
    e.preventDefault();
    var product = $(this).serialize();
    $.ajax({
      type: 'POST',
      url: 'cart_add.php',
      data: product,
      dataType: 'json',
      success: function(response){
        $('.callout').show();
        $('.message').html(response.message);
        if(response.error){
          $('.callout').removeClass('callout-success').addClass('callout-danger');
        }
        else{
        $('.callout').removeClass('callout-danger').addClass('callout-success');
        getCart();
        getTotal()
        }
      }
    });
  });

  $(document).on('click', '.close', function(){
    $('.callout').hide();
  });



   $(function(){
    $(document).on('click', '.remove-item-button', function(e){
        e.preventDefault();
        var id = $(this).data('id');
        $.ajax({
            type: 'POST',
            url: 'cart_delete.php',
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

function getCart(){
  $.ajax({
    type: 'POST',
    url: 'cart_fetch.php',
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
                      url: 'cart_add.php',
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


  $(document).on('click', '.close1', function(){
    $('.callout1').hide();
  });

  
 $(document).ready(function(){
            $('a.add_to_wishlist').click(function(e) { 
                var id = $(this).attr('rel');
                $.ajax({
                  type: 'POST',
                  url: 'wishlist_add.php',
                  data: {id:id},
                  dataType: 'json',
                  success: function(response){
                    alert( response.message)
                     if(response.error){
                     $('.callout').removeClass('callout-success').addClass('callout-danger');
                      }
                      else{
                    $('.callout').removeClass('callout-danger').addClass('callout-success');
           
                     }
                    }
                });
                e.preventDefault();
             });
   });


 $('#commentform').submit(function(e){
    e.preventDefault();
    var review = $(this).serialize();
    $.ajax({
      type: 'POST',
      url: 'review_add.php',
      data: review,
      dataType: 'json',
      success: function(response){
        alert(response.message);
        if(!response.error){
            document.getElementById("commentform").reset();
        }
        getReview()
       
      }
    });
  });

 
 function getReview(){
  $.ajax({
    type: 'POST',
    url: 'review_fetch.php',
    dataType: 'json',
    success: function(response){
      $('.commentlist').html(response.list);
      $('.nbreview').html(response.count);

      
    }
  });
}

function getTotal(){
    $.ajax({
        type: 'POST',
        url: 'cart_total.php',
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
             url: 'cart_delete.php',
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



</script>


