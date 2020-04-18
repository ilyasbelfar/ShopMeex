
<!--Magnify -->

<!-- Custom Scripts -->
<script>
$(function(){
 
  getCart();
  getReview(); 

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

  
$('.myform').submit(function(){
    // `this` is the instance of myForm class the event occurred on

    
    var product = $(this).serialize();
    $.ajax({
      type: 'POST',
      url: 'cart_add.php',
      data: product,
      dataType: 'json',
      success: function(response){
        alert(response.message)
        if(response.error){
          $('.callout1').removeClass('callout-success').addClass('callout-danger');
        }
        else{
        $('.callout1').removeClass('callout-danger').addClass('callout-success');
        getCart();
        }
      }
    });


   

    return false;
});
  $(document).on('click', '.close1', function(){
    $('.callout1').hide();
  });

  
 $(function(){
    $(document).on('click', '.add-wishlist', function(e){
        e.preventDefault();
        var id = $(this).data('id');
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



</script>


