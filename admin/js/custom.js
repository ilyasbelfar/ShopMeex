// loader
    var tl = new TimelineMax({ 
        delay: 0.1,
        repeat: -1,
        repeatDelay: 1,
        yoyo: true,
    });
    tl.staggerFromTo('.cart-loader .cls-2', 0.3, {
        opacity: 0,
        scaleX: 0,
        ease: Power4.easeOut
    }, {
        opacity: 1,
        scaleX: 1,
        ease: Power4.easeOut
    }, 0.2);
// Delete Loader After Loading of page
window.addEventListener('load', function() {
	var spinner = document.getElementsByClassName('loader_container')[0];
	spinner.style.display = 'none';
});


// For Hiding & Showing Placeholder Text
$(document).ready(function() {
	$('[placeholder]').focus(function() {
		$(this).attr('data-text', $(this).attr('placeholder'));
		$(this).attr('placeholder', '');
	}).blur(function() {
		$(this).attr('placeholder', $(this).attr('data-text'));
	});
    $('li.dropdown-menu1').hover(function() {
        $('.dropdown-list').eq(0).slideDown(300);
    }, function() {
        $('.dropdown-list').eq(0).slideUp(300);
    });
    $('i').click(function (){
        var curentarticle= $(this).parent().parent();
        var conteenthide = curentarticle.children('.content-tag');
        if (conteenthide.hasClass("ishide")) {
             conteenthide.slideDown(600);
             conteenthide.removeClass("ishide");
        }else{
            conteenthide.addClass("ishide");
            conteenthide.slideUp(600);
        }
    });
    var slistview=$('.select-list-view'),
        sgridview=$(".select-grid-view"),
        listview = $('.list-view'),
        gridview = $('.grid-view');


    slistview.click(function (){
        $(this).addClass('selected');
        sgridview.removeClass('selected');
        gridview.hide(300,function (){
            listview.show(500);
        });

    });
    sgridview.click(function (){
        $(this).addClass('selected');
        slistview.removeClass('selected');
         listview.hide(300,function (){
            gridview.slideDown(800);
        });

    });
    var listgroupe =$('section.user-content .maincontainer .wrapper aside.flexquart  ul.list-group a.list-group-item');
    listgroupe.click(function (){
        if (listgroupe.hasClass("active")) {
             listgroupe.removeClass("active");
        }
        $(this).addClass('active');
         
    });

});