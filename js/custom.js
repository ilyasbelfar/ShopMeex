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
    $('button[name="update_cart"]').removeAttr('disabled');
});
$(document).on('click', '#button-plus', function() {
    var currentNumber = parseInt($(this).parent().siblings('input#quantity').val()) + 1;
    if (currentNumber >= 0) {
        $(this).parent().siblings('input#quantity').val(currentNumber);
    }
    $('button[name="update_cart"]').removeAttr('disabled');
});

$('a.delete_cart').click(function(e) {
    e.preventDefault();
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

if (isEmpty($('.shopping-cart tbody'))) {
        $('.col-7').remove();
    }

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
$('.form-group input[type=email]').keyup(function() {
    var value = $(this).val();
    var valid = validateEmail(value);
    if (!valid) {
        $(this).css({
            color: 'red',
            border: '1px solid red'
        });
        $(this).next().text('This doesn\'t look like an email!')
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
        $(this).next().text('');
        $(this).closest('.wrapper').find('.btn').css({
            pointerEvents: 'auto',
            opacity: 1,
            cursor: 'pointer',
            userSelect: 'auto'
        });
    }
});


$('.shopping-cart .qty .form-control').on("input", function() {
    $('button[name="update_cart"]').removeAttr('disabled');
});
if($('.cart-form').children().length == 0) {
    $(this).css('display', 'none');
    $('.col-9').css('display', 'block');
} else {
    $(this).css('display', 'block');
    $('.col-9').css('display', 'none');
}

var subTotal = $('.right span#subtot').text();
$('.total .amount').text(subTotal);


$('.activity-buttons button').click(function(e) {
    e.preventDefault();
    tabIndex = $(this).attr('tabindex');
    if ($('.activity-panel-wrapper[tabindex="'+tabIndex+'"]').hasClass('tab-open')) {
        $('.activity-panel-wrapper[tabindex!="'+tabIndex+'"]').removeClass('tab-open');
        $('.activity-panel-wrapper[tabindex="'+tabIndex+'"]').removeClass('tab-open');
    } else {
        $('.activity-panel-wrapper[tabindex!="'+tabIndex+'"]').removeClass('tab-open');
        $('.activity-panel-wrapper[tabindex="'+tabIndex+'"]').addClass('tab-open');
    }
});


$('.editable').click(function() {
    $(this).hide();
    $(this).next().show();
});

$('.stock-value').focusout(function() {
    $(this).hide();
    if ($(this).val()!='' && $.isNumeric($(this).val())) {
        $(this).prev().html($(this).val());
        $(this).attr('value', $(this).val());
    }
    $(this).prev().show();
});


$('#collapse_sidemenu a').on('click', function(e) {
    e.preventDefault();
    if (!($('#sellermenu-wrap, #sellermenu-back').hasClass('open'))) {
        $('#sellermenu-wrap > ul li a span').css('display', 'none');
        $(this).find('i').css('transform', 'rotate(180deg)');
        $('#sellermenu-wrap, #sellermenu-back').addClass('open');
        $('#sellermenu-wrap, #sellermenu-back').css('width', '70px');
        $('#dash-content').css('margin-left', '70px');
        $('#sellermenu-wrap > ul li a i').css('margin-right', '0');
    } else {
        $('#sellermenu-wrap > ul li a span').css('display', 'inline');
        $(this).find('i').css('transform', 'rotate(0deg)');
        $('#sellermenu-wrap, #sellermenu-back').removeClass('open');
        $('#sellermenu-wrap, #sellermenu-back').css('width', '160px');
        $('#dash-content').css('margin-left', '160px');
        $('#sellermenu-wrap > ul li a i').css('margin-right', '8px');
    }
});

$('.my-products table tbody tr').hover(function() {
    $(this).find('div.prod_actions').css('display', 'block');
}, function() {
    $(this).find('div.prod_actions').css('display', 'none');
});

$('tr a#quick_edit').click(function(e) {
    e.preventDefault();
    $('tr.produ_edit').hide();
    $('tr.produ_infos').show();
    $(this).closest('tr').next().show();
    $(this).closest('tr').hide();
});

$("a.cancel").click(function(e) {
    e.preventDefault();
    $(this).closest('tr').prev().show();
    $(this).closest('tr').hide();
});

$('.upload_zone').click(function() {
    $(this).parent().find('input').click();
});

$('.col-401.uploads input[type="file"]').change(function () {
    if (typeof (FileReader) != "undefined") {
        var dvPreview = $(".upload_zone_previews");
        var regex = /^([a-zA-Z0-9\s_\\.\-:])+(.jpg|.jpeg|.gif|.png|.bmp)$/;
        $($(this)[0].files).each(function () {
            var file = $(this);
            if (regex.test(file[0].name.toLowerCase())) {
                if (file[0].size > 2097152) {
                    alert("Try to upload image file less than 2MB!");
                } else {

                    function formatBytes(a,b=2){if(0===a)return"0 Bytes";const c=0>b?0:b,d=Math.floor(Math.log(a)/Math.log(1024));return parseFloat((a/Math.pow(1024,d)).toFixed(c))+" "+["Bytes","KB","MB","GB","TB","PB","EB","ZB","YB"][d]}

                    var reader = new FileReader();
                    reader.onload = function (e) {
                        var img = $("<img>", {
                            "alt": file[0].name
                        });
                        img.attr("src", e.target.result);

                        dvPreview.append('<div class="file_previews row"><div class="file_previews_col_01">');

                        dvPreview.find('div.file_previews:last-child div.file_previews_col_01').append(img);
                        dvPreview.find('div.file_previews:last-child').append('</div><div class="file_previews_col_02"><p class="file_name">' + file[0].name + '</p><p class="file_size"><strong>'+ formatBytes(file[0].size) +'</strong></p></div></div>');
                    }
                }
                reader.readAsDataURL(file[0]);
            } else {
                alert(file[0].name + " is not a valid image file.");
                dvPreview.html("");
                return false;
            }
        });
    } else {
        alert("Your browser does not support HTML5 FileReader.");
    }
});

$('ul.list-errors').each(function() {
    if ($(this).children().length == 0) {
        $(this).closest('.noticesGroup').css('display', 'none');
    } else {
        $(this).closest('.noticesGroup').css('display', 'block');
    } 
});

$('.close_modal').click(function(e) {
    e.preventDefault();
    $('.close_modal').closest('.order_det').hide();
    $('.close_modal').closest('.order_det').next().hide();
});

$('.order_title > strong, .order_preview').click(function(e) {
    e.preventDefault();
    $('.order_det, .modal-close').hide();
    $(this).closest('tr').next().find('.order_det').show();
    $(this).closest('tr').next().find('.modal-close').show();
});

$('input[name="prod_slug"]').keyup(function() {
    var flagFour = true;
    if (/\s/.test($(this).val())) {
        $(this).next().text('This field must not contain any spaces!');
        $(this).closest('tr').find('button[name="save"]').addClass('disabled');
        $(this).closest('tr').find('button[name="save"]').attr('type', 'button');
    } else {
        $(this).next().text('');
        $(this).next().text('');
        $(this).closest('tr').find('p.error').each(function() {
            if ($(this).text() != '') {
                flagFour = false;
            }
        });
        if(flagFour) {
            $(this).closest('tr').find('button[name="save"]').removeClass('disabled');
            $(this).closest('tr').find('button[name="save"]').attr('type', 'submit');
        }
    }
});

$('input[name="stock_status"], input[name="prod_price"]').keyup(function() {
    var flagFive = true;
    if(!$.isNumeric($(this).val())) {
        $(this).next().text('This field must contain only numbers!');
        $(this).closest('tr').find('button[name="save"]').addClass('disabled');
        $(this).closest('tr').find('button[name="save"]').attr('type', 'button');
    } else {
        $(this).next().text('');
        $(this).next().text('');
        $(this).closest('tr').find('p.error').each(function() {
            if ($(this).text() != '') {
                flagFive = false;
            }
        });
        if(flagFive) {
            $(this).closest('tr').find('button[name="save"]').removeClass('disabled');
            $(this).closest('tr').find('button[name="save"]').attr('type', 'submit');
        }
    }
});

$('span.trash a').click(function(e) {
    e.preventDefault();
    $(this).closest('tr.produ_infos').find('td.confirmation_wrapper .modal_wrapper').css('display', 'block');
    $(this).closest('tr.produ_infos').find('td.confirmation_modal section ').css('display', 'block');
    $(this).closest('tr.produ_infos').find('td.confirmation_modal').animate({top: '50%'}, '500');
});

$('span.close, button[value="cancel"]').click(function() {
    $(this).closest('td.confirmation_modal').animate({top: '35%'}, '500');
    $(this).closest('td.confirmation_modal').next().find('.modal_wrapper').css('display', 'none');
    $(this).closest('td.confirmation_modal').find('section ').css('display', 'none');
});

$('.pagination li.disabled a').click(function(e) {
    e.preventDefault();
});

$('.edit_coupon').click(function() {
    $(this).closest('tr').hide();
    $(this).closest('tr').next().show();
});

$('input[name="coupon_code"]').keyup(function() {
    var flagThree = true;
    if (/\s/.test($(this).val())) {
        $(this).next().text('This field must not contain any spaces!');
        $(this).closest('form').find('button[name="save_coupon_changes"]').addClass('disabled');
        $(this).closest('form').find('button[name="save_coupon_changes"]').attr('type', 'button');
    } else {
        $(this).next().text('');
        $(this).next().text('');
        $(this).closest('tr').find('p.error').each(function() {
            if ($(this).text() != '') {
                flagThree = false;
            }
        });
        if(flagThree) {
            $(this).closest('tr').find('button[name="save_coupon_changes"]').removeClass('disabled');
            $(this).closest('tr').find('button[name="save_coupon_changes"]').attr('type', 'submit');
        }
    }
});

$('input[name="discount"]').keyup(function() {
    var flagOne = true;
    if (/\s/.test($(this).val())) {
        $(this).next().text('This field must not contain any spaces!');
        $(this).closest('tr').find('button[name="save_coupon_changes"]').addClass('disabled');
        $(this).closest('tr').find('button[name="save_coupon_changes"]').attr('type', 'button');
    }
    else if(!$.isNumeric($(this).val())) {
        $(this).next().text('This field must contain only numbers!');
        $(this).closest('tr').find('button[name="save_coupon_changes"]').addClass('disabled');
        $(this).closest('tr').find('button[name="save_coupon_changes"]').attr('type', 'button');
    }
    else if($(this).val() > 100) {
        $(this).next().text('Percentage must be less than or equal to 100!');
        $(this).closest('tr').find('button[name="save_coupon_changes"]').addClass('disabled');
        $(this).closest('tr').find('button[name="save_coupon_changes"]').attr('type', 'button');
    }
    else {
        $(this).next().text('');
        $(this).closest('tr').find('p.error').each(function() {
            if ($(this).text() != '') {
                flagOne = false;
            }
        });
        if(flagOne) {
            $(this).closest('tr').find('button[name="save_coupon_changes"]').removeClass('disabled');
            $(this).closest('tr').find('button[name="save_coupon_changes"]').attr('type', 'submit');
        }
    }
});

$('input[name="usage_limit"]').keyup(function() {
    var flagTwo = true;
    if(!$.isNumeric($(this).val())) {
        $(this).next().text('This field must contain only numbers!');
        $(this).closest('tr').find('button[name="save_coupon_changes"]').addClass('disabled');
        $(this).closest('tr').find('button[name="save_coupon_changes"]').attr('type', 'button');
    }
    else {
        $(this).next().text('');
        $(this).closest('tr').find('p.error').each(function() {
            if ($(this).text() != '') {
                flagTwo = false;
            }
        });
        if(flagTwo) {
            $(this).closest('tr').find('button[name="save_coupon_changes"]').removeClass('disabled');
            $(this).closest('tr').find('button[name="save_coupon_changes"]').attr('type', 'submit');
        }
    }
});

$('.top-account > a').click(function(e) {
    e.preventDefault();
    if ($('.dropdown-top-account').hasClass('open')) {
        $('.dropdown-top-account').animate({top: '140%', opacity: 0}, 500).fadeOut();
        $('.dropdown-top-account').removeClass('open');
        $(this).css('background-color', 'transparent');
    } else {
        $('.dropdown-top-account').fadeIn(250).animate({top: '100%', opacity: 1}, 500);
        $('.dropdown-top-account').addClass('open');
        $(this).css('background-color', '#363c4e');
    }
});

$('.new-post').click(function(e) {
    e.preventDefault();
    if ($('.new-posts-dropdown').hasClass('open')) {
        $('.new-posts-dropdown').animate({top: '140%', opacity: 0}, 500).fadeOut();
        $('.new-posts-dropdown').removeClass('open');
        $(this).css('background-color', 'transparent');
    } else {
        $('.new-posts-dropdown').fadeIn(250).animate({top: '100%', opacity: 1}, 500);
        $('.new-posts-dropdown').addClass('open');
        $(this).css('background-color', '#363c4e');
    }
});

$('input[name="newprod_price"], input[name="newprod_weight"], input[name="newprod_qty"], input[name="newusage_limit"]').keyup(function() {
    var flag_22 = true;
    if(!$.isNumeric($(this).val())) {
        $(this).next().text('This field must contain only numbers!');
        $(this).closest('form').find('button[type="submit"]').addClass('disabled');
        $(this).closest('form').find('button[type="submit"]').attr('type', 'button');
    } else if (/\s/.test($(this).val())) {
        $(this).next().text('This field must not contain any spaces!');
        $(this).closest('form').find('button[type="submit"]').addClass('disabled');
        $(this).closest('form').find('button[type="submit"]').attr('type', 'button');
    } else {
        $(this).next().text('');
        $(this).closest('form').find('p.error').each(function() {
            if ($(this).text() != '') {
                flag_22 = false;
            }
        });
        if(flag_22) {
            $(this).closest('form').find('button[type="button"]').removeClass('disabled');
            $(this).closest('form').find('button[type="button"]').attr('type', 'submit');
        }
    }
});

$('input[name="newcoupon_code"], input[name="newprod_slug"]').keyup(function() {
    var flag_23 = true;
    if (/\s/.test($(this).val())) {
        $(this).next().text('This field must not contain any spaces!');
        $(this).closest('form').find('button[type="submit"]').addClass('disabled');
        $(this).closest('form').find('button[type="submit"]').attr('type', 'button');
    } else {
        $(this).next().text('');
        $(this).closest('form').find('p.error').each(function() {
            if ($(this).text() != '') {
                flag_23 = false;
            }
        });
        if(flag_23) {
            $(this).closest('form').find('button[type="button"]').removeClass('disabled');
            $(this).closest('form').find('button[type="button"]').attr('type', 'submit');
        }
    }
});

$('input[name="newdiscount"]').keyup(function() {
    var flag_24 = true;
    if (/\s/.test($(this).val())) {
        $(this).next().text('This field must not contain any spaces!');
        $(this).closest('form').find('button[type="submit"]').addClass('disabled');
        $(this).closest('form').find('button[type="submit"]').attr('type', 'button');
    }
    else if(!$.isNumeric($(this).val())) {
        $(this).next().text('This field must contain only numbers!');
        $(this).closest('form').find('button[type="submit"]').addClass('disabled');
        $(this).closest('form').find('button[type="submit"]').attr('type', 'button');
    }
    else if($(this).val() > 100) {
        $(this).next().text('Percentage must be less than or equal to 100!');
        $(this).closest('form').find('button[type="submit"]').addClass('disabled');
        $(this).closest('form').find('button[type="submit"]').attr('type', 'button');
    }
    else {
        $(this).next().text('');
        $(this).closest('form').find('p.error').each(function() {
            if ($(this).text() != '') {
                flag_24 = false;
            }
        });
        if(flag_24) {
            $(this).closest('form').find('button[type="button"]').removeClass('disabled');
            $(this).closest('form').find('button[type="button"]').attr('type', 'submit');
        }
    }
});

$('#mobile-drop').click(function(e) {
    e.preventDefault();
    if ($('#sellermenu-wrap.mobile-menu').hasClass('open')) {
        $('#sellermenu-wrap.mobile-menu').removeClass('open');
        $('#sellermenu-wrap.mobile-menu').css({'cssText': 'width: 0 !important'});
    } else {
        $('#sellermenu-wrap.mobile-menu').addClass('open');
        $('#sellermenu-wrap.mobile-menu').css({'cssText': 'width: 70px !important'});
    }
});

$('input[name="phone_num"]').keyup(function(event) {
    var flag_25 = true;
    if(!$.isNumeric($(this).val())) {
        $(this).css('border', '1px solid red');
        $(this).next().text('This field must contain only numbers!');
        $(this).closest('form').find('input[type="submit"]').css({
            pointerEvents: 'none',
            opacity: 0.5,
            cursor: 'not-allowed',
            userSelect: 'none'
        });
    } else {
        $(this).css('border', 'none');
        $(this).next().text('');
        $(this).closest('form').find('p.error').each(function() {
            if ($(this).text() != '') {
                flag_25 = false;
            }
        });
        if(flag_25) {
            $(this).closest('form').find('input[type="submit"]').css({
                pointerEvents: 'auto',
                opacity: 1,
                cursor: 'pointer',
                userSelect: 'auto'
            });
        }
    }
});
