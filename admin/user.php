<script type="text/javascript" src="js/admin.js"></script>
    <script type="text/javascript" src="js/dist/Chart.js"></script>
    <script src="js/jquery-3.4.1.min.js"></script>
<script>
   
    a.hover(function(){
        $(this).css("opacity",1);
    },function(){
            $(this).css("opacity",".7");
        });
    btn = $("button");
    btn .css('opacity','.7');;
    btn.hover(function(){
        $(this).css("opacity",1);
    },function(){
            $(this).css("opacity",".7");
        });
    var dmenu = $(".content .header .header-container ul.nav-right li.dropdown:nth-child(3) ul.dropdown-menu")
    im = $("#admin-image");
   im.click(function(e){
      dmenu.toggleClass('hiding');
      if (dmenu.hasClass('hiding')){
          im.css("opacity","0");
      }else{
          im.css('opacity',".4");
      }
    }); 
      
</script>
<script>
        showdel = document.getElementById("delete");
        showed = document.getElementById("edit");
        usernamedel = document.getElementById('user-name-del');
    close = $('button.close');
        close.click(function(){
            $('.modal').css('display','none');
            $('.modal-succes').css('display','none');
            $('.modal-error').css('display','none');
        });
    /* for user */
        function del(delname,delid){
            showdel.style.display="block";
            usernamedel.innerHTML=delname;
            $('#delete .userid').attr("value",delid);
        };
        function edit(em,pass,fir,las,add,con,edid){
            showed.style.display="block";
            $("#edit_email").val(em);
            $('#edit .userid').attr("value",edid);
            $("#edit_password").val(pass);
            $("#edit_firstname").val(fir);
            $("#edit_lastname").val(las);
            $("#edit_address").val(add);
//            $("#edit_contact'").val(con);
            
        }
    /* edit foto */
    function edphotus(name,id){
        $("#edit_photo").css("display","block");
        $("#edit_photo .fullname").text(name);
        $("#edit_photo .userid").attr("value",id);
    }
    addnew = $(".user-show .container .head a");
        showaddnew = $("#addnew");
        addnew.click(function(){
            showaddnew.css("display","block");
        });
    
      /* for product*/
       function descr(name,descrp){
           $("#description").css("display","block");
            $("#prodnamedes").text(name);
            $("#desc").text(descrp);
        }
        function delproduct(prodid,prodname){
            $("#delete").css("display","block");
            $("#delete .prodid").attr("value",prodid);
            $("#delete h2.name").text(prodname);
        }
    function edprod(id,name,cat,price,descr){
        $("#edit").css("display","block");
        $("#edit .prodid").attr("value",id);
        $("#edit_name").val(name);
        $("#description-text").val(descr);
        $("#editcategory").attr("value",cat);
        $("#edit_price").val(price);
    }
    function addnewprod(){
        $("#addnew").css("display","block");
    }
    function edphot(id,name){
        $("#edit_photo").css("display","block");
        $("#edit_photo .name").text(name);
        $("#edit_photo .prodid").attr("value",id);
        
    }
    /*for categories*/
    function addnewcat(){
        $("#addnew").css("display","block");
    }
    function editcat(id, name){
        $("#edit").css("display","block");
        $("#edit .catid").attr("value",id);
        $("#edit_name").val(name);
    }
    function delcat(id,name){
        $("#delete").css("display","block");
        $("#delete .catid").attr("value",id);
        $("#delete .catname").text(name);
    }
    
</script>