<script type="text/javascript" src="js/admin.js"></script>
<script type="text/javascript" src="js/dist/Chart.js"></script>
<script src="js/jquery-3.4.1.min.js"></script>
<script>
     btn = $("button").css('opacity','.7');
    btn.hover(function(){
        $(this).css("opacity",1);
    },function(){
            $(this).css("opacity",".7");
        });
    close = $('button.close');
        close.click(function(){
            
            $('.modal').css('display','none');
            $('.modal-succes').css('display','none');
            $('.modal-error').css('display','none');
        });
    function delpro(name,cartid,userid){
        $("#delete .modal-dialog").css("display","none");
      $('#delete').fadeIn(5,function(){
          
          $("#delete .modal-dialog").slideDown(100);
      });
      $("#delete .productname").text(name);
       $("#delete .cartid").attr("value",cartid); 
       $("#delete .userid").attr("value",userid); 
    }
    function edquan(name,quan,userid,cartid){
    $("#edit .modal-dialog").css("display","none");
      $('#edit').fadeIn(5,function(){
          
          $("#edit .modal-dialog").slideDown(100);
      });
        $("#edit .productname").text(name);
       $("#edit .cartid").attr("value",cartid); 
       $("#edit .userid").attr("value",userid);
        $("#edit_quantity").val(quan);
    }
    function addpro(userid){
            $("#addnew .modal-dialog").css("display","none");
                $('#addnew').fadeIn(5,function(){
          
                $("#addnew .modal-dialog").slideDown(100);
            });
        $("#addnew .userid").val(userid);
    }
   
</script>