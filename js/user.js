var row = $(".content main.main-content .main-content .user-content tbody tr");
var chev = $(".content main.main-content .main-content .user-content .tit ul.nav  li:nth-child(1) i");
var foradd = $(".content main.main-content .main-content .user-content .tit ul.nav  li:nth-child(4) i");

row.click(function(){
    row.removeClass('selected');
    $(this).addClass("selected");
    var fordel= $(".content main.main-content .main-content .user-content .tit ul.nav li:nth-child(3) ");
    var fored= $(".content main.main-content .main-content .user-content .tit ul.nav li:nth-child(2) ");
    var xrow =$(this);
    fordel.click(function(){
        xrow.addClass("hide");
    });
    fored.click(function(){
        var usercontent = $(".content main.main-content .main-content .user-content")
        usercontent.addClass("hide");
        var tochange =$(".content main.main-content .main-content >.row");
        tochange.removeClass('hide');
    });
});
foradd.click(function(){
        var usercontent = $(".content main.main-content .main-content .user-content")
        usercontent.addClass("hide");
        var tochange =$(".content main.main-content .main-content >.row");
        tochange.removeClass('hide');
    });
chev.click(function(){
    if(chev.hasClass("fa-chevron-up")){
        $(this).removeClass('fa-chevron-up');
        $(this).addClass("fa-chevron-down");
    }else{
        $(this).removeClass('fa-chevron-down');
        $(this).addClass("fa-chevron-up");
    }
});