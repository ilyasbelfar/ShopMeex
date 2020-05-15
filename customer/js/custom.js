// Cart Checkout Widget NavBar
function cartIconAnimation() {
    var tl = new TimelineMax({
        delay: 0.1
    });
    tl.staggerFromTo('#cart-icon .st1', 0.3, {
        opacity: 0,
        scaleX: 0,
        ease: Back.easeOut
    }, {
        opacity: 1,
        scaleX: 1,
        ease: Back.easeOut
    }, 0.1);
}

function cartRemoveIconAnimation() {
    var tl = new TimelineMax({
        delay: 0.1
    });
    tl.staggerFromTo('#cart-icon .st1', 0.3, {
        opacity: 1,
        scaleX: 1,
        ease: Back.easeOut
    }, {
        opacity: 0,
        scaleX: 0,
        ease: Back.easeOut
    }, 0.1);
}
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
$('.loader_container').delay(1000).fadeOut('slow');
$('[placeholder]').focus(function() {
    $(this).attr('data-text', $(this).attr('placeholder')); // For Hiding & Showing Placeholder Text
    $(this).attr('placeholder', '');
}).blur(function() {
    $(this).attr('placeholder', $(this).attr('data-text'));
});
$('.fa-times').on('click', function(e) {
    e.preventDefault();
    $('.promo-popup, .popup-overlay').fadeOut(400);
});
// $(window).on('scroll', function() {
//     if ($(this).scrollTop() > 200) {
//         $('header').addClass("sticky");
//     } else {
//         $('header').removeClass("sticky");
//     }
// });
$('.gototop').on('click', function(e) {
    e.preventDefault();
    $('html, body').animate({
        scrollTop: $('html').offset().top
    }, 500);
});
$(window).on('scroll', function(e) {
    e.preventDefault();
    if ($(window).scrollTop() > 200) {
        $('.gototop').addClass('active');
    } else {
        $('.gototop').removeClass('active');
    }
});
$('select').niceSelect();
$("svg#cart-icon").mouseenter(function() {
    cartIconAnimation();
});
$("svg#cart-icon").mouseleave(function() {
    cartRemoveIconAnimation();
});
$('.banner-slides').owlCarousel({
    items: 1,
    loop: true,
    autoplay: true,
    nav: true,
});
$('.owl-carousel').owlCarousel({
    items: 1,
    loop: true,
    nav: true,
    autoplay: true,
});
$('div.tab-panel.newpro').show();
$('.nav-link.active').attr('aria-selected', 'true');
$('.tab-panel:eq(0)').css('display', 'block');
$('.nav-link').click(function(e) {
    e.preventDefault();
    $('.nav-link.active').removeClass('active');
    $('.nav-link').attr('aria-selected', 'false');
    $(this).addClass('active');
    $(this).attr('aria-selected', 'true');
    for (var i = 0; i < 8; i++) {
        var idTabPanel = $('.tab-panel')[i].id;
        var myId = $('.nav-link.active').attr('href');
        if (myId == '#' + idTabPanel) {
            $('.tab-panel').fadeOut(350);
            $('.tab-panel:eq(' + i + ')').fadeIn(350);
            $('div.tab-panel.newpro').show();
        }
    }
    $('div.tab-panel.newpro').show();
});
$('[data-countdown]').each(function() {
    var $this = $(this),
        finalDate = $(this).data('countdown');
    $this.countdown(finalDate, function(event) {
        $this.html(event.strftime('<div class="cdown"><span class="days"><strong>%-D</strong><p>Days.</p></span></div><div class="cdown"><span class="hour"><strong> %-H</strong><p>Hours.</p></span></div> <div class="cdown"><span class="minutes"><strong>%M</strong> <p>MINUTES.</p></span></div><div class="cdown"><span class="second"><strong> %S</strong><p>SECONDS.</p></span></div>'));
    });
});
$(document).on('click', '#button-minus', function() {
    var currentNumber = parseInt($(this).parent().siblings('input#quantity').val()) - 1;
    if (currentNumber >= 1) {
        $(this).parent().siblings('input#quantity').val(currentNumber);
    }
    var priceUnit = parseInt($(this).closest('td').siblings('td.prix').find('.unit-price').text());
    if (currentNumber > 0) {
        $(this).closest('td').next().find('span.amount').text(priceUnit * currentNumber);
    }
});
$(document).on('click', '#button-plus', function() {
    var currentNumber = parseInt($(this).parent().siblings('input#quantity').val()) + 1;
    if (currentNumber >= 0) {
        $(this).parent().siblings('input#quantity').val(currentNumber);
    }
    var priceUnit = parseInt($(this).closest('td').siblings('td.prix').find('.unit-price').text());
    if (currentNumber > 0) {
        $(this).closest('td').next().find('span.amount').text(priceUnit * currentNumber);
    }
});
$('p.stars a').click(function(e) {
    e.preventDefault();
    var currentStar = $(this);
    var hiddenSelect = $(this).closest("#respond").find("#rating");
    var paraStars = $(this).closest(".stars");
    hiddenSelect.val(currentStar.text());
    currentStar.siblings("a").removeClass("active");
    currentStar.addClass("active");
    paraStars.addClass("selected");
});
$("body").on("init", ".tabs-wrapper, .tabs", function() {
    $(".paneltbs, .tabs .paneltbs:not(.paneltbs .paneltbs)").hide();
    var t = window.location.hash;
    var e = window.location.href;
    var i = $(this).find(".tabs, ul.tabs").first();
    0 <= t.toLowerCase().indexOf("comment-") || "#reviews" === t || "#tab-reviews" === t ? i.find("li.reviews_tab a").click() : 0 < e.indexOf("comment-page-") || 0 < e.indexOf("cpage=") ? i.find("li.reviews_tab a").click() : "#tab-additional_information" === t ? i.find("li.additional_information_tab a").click() : i.find("li:first a").click()
}).on("click", ".tabs li a, ul.tabs li a", function(t) {
    t.preventDefault();
    var e = $(this),
        i = e.closest(".tabs-wrapper");
    i.find("ul.tabs").find("li").removeClass("active"), i.find(".paneltbs, .paneltbs:not(.paneltbs .paneltbs)").hide(), e.closest("li").addClass("active"), i.find(e.attr("href")).show()
});

function isEmpty(el) {
    return !$.trim(el.html())
}
$('.col-9').css('display', 'none');
$(document).on('click', 'a#remove-product', function(event) {
    event.preventDefault();
    $(this).closest('tr').remove();
    if (isEmpty($('.shopping-cart tbody'))) {
        $('.col-7').remove();
        $('.col-9').css('display', 'block');
    }
});
$('.inphidden').css('display', 'none');
$('#cbox').click(function() {
    if ($(this).is(':checked')) {
        $('.inphidden').slideDown(200);
    } else {
        $('.inphidden').slideUp(200);
    }
});

$(".set > a").on("click", function(e) {
    e.preventDefault();
    if ($(this).hasClass("active")) {
        $(this).removeClass("active");
        $(this).siblings(".content").slideUp(200);
        $(".set > a i").removeClass("fa-minus").addClass("fa-plus");
    } else {
        $(".set > a i").removeClass("fa-minus").addClass("fa-plus");
        $(this).find("i").removeClass("fa-plus").addClass("fa-minus");
        $(".set > a").removeClass("active");
        $(this).addClass("active");
        $(".content").slideUp(200);
        $(this).siblings(".content").slideDown(200);
    }
});

$('.category').slideUp();
$('.mobile-drop').click(function(event) {
    event.preventDefault();
    $('.category').slideToggle(700);
});


$('#icone-carte').click(function(event) {
    event.preventDefault();
    if (parseInt($(window).width()) > 992) {
        if ($('.sub-menu').hasClass('actived')) {
            $('.sub-menu').animate({
                opacity: 0,
                top: '100%'
            }, 'fast').css('visibility', 'hidden');
            $('.sub-menu').removeClass('actived');
        } else {
            $('.sub-menu').addClass('actived');
            $('.sub-menu').animate({
                opacity: 1,
                top: '130%'
            }, 'fast').css('visibility', 'visible');
        }
    } else {
        $(this).unbind('click');
    }
});

$('.commentlist li:gt(2)').css('display', 'none');
$('#collapseBtn').click(function(event) {
    event.preventDefault();
    if ($(this).hasClass('open')) {
        $('.commentlist li:gt(2)').slideUp(500);
        $(this).removeClass('open');
        $(this).html('See More Reviews');
    } else {
        $('.commentlist li:gt(2)').slideDown(500);
        $(this).addClass('open');
        $(this).html('See Less Reviews');
    }
});

var validateEmail = function(elementValue) {
    var emailPattern = /^[a-zA-Z0-9._-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,4}$/;
    return emailPattern.test(elementValue);
}
$('.form-group input[type=email]').blur(function() {
    var value = $(this).val();
    var valid = validateEmail(value);
    if (!valid) {
        $(this).css({
            color: 'red',
            border: '1px solid red'
        });
        if ($(this).parent().children().length == 2) {
            $(this).after('<p class=email-wrong>This doesn\'t look like an email</p>');
        }
        $(this).closest('.wrapper').find('.btn').css({
            pointerEvents: 'none',
            opacity: 0.5,
            cursor: 'not-allowed',
            userSelect: 'none'
        });
    } else {
        $(this).css({
            color: '#495057',
            border: '1px solid #e6e2f5'
        });
        $(this).next().remove();
        $(this).closest('.wrapper').find('.btn').css({
            pointerEvents: 'auto',
            opacity: 1,
            cursor: 'pointer',
            userSelect: 'auto'
        });
    }
});

$('.img-big-wrap').zoom();
$('a[data-rel^=lightcase]').lightcase();
