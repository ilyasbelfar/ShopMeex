
var x = $('.popupcontainer .details i'),
    pop= $('.popupcontainer'),
    xhideback= $('body > *'),
    xshowpop =$('.product-view-grid '),
    xshowpop2 =$('section.product-area .maincontainer .wrapper aside.product-view .wrapper article.list-view .container .wrapper aside.Shop div div button.Details');
pop.addClass('hide');
xshowpop.click(function (){
    pop.removeClass('hide');
    xhideback.addClass('op');
    pop.removeClass('op');
});
xshowpop2.click(function (){
    pop.removeClass('hide');
    xhideback.addClass('op');
    pop.removeClass('op');
});
x.click(function (){
    pop.addClass('hide'); 
    xhideback.removeClass('op');
});


