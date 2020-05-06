
var x = $('.popupcontainer .details i'),
    x2 =$('.popupcontainer'),
    x3 =document.querySelectorAll(".negop"),
    xp =$('.product-view-grid'),
    xl =$('.list-view'),
    i=0,
    j=0;
xp.click(function (){
    x2.removeClass('hide');
    for(i=0;x3.length;i = i+1){
        if(!(x2.hasClass("hide"))){
            x3[i].style.opacity=".09"
        }
    }
});
xl.click(function (){
    x2.removeClass('hide');
    for(i=0;x3.length;i = i+1){
        if(!(x2.hasClass("hide"))){
            x3[i].style.opacity=".09"
        }
    }
});
x.click(function (){
        x2.addClass('hide'); 
        for(i=0;x3.length;i = i+1){
            x3[i].style.opacity="1";
        }
});


