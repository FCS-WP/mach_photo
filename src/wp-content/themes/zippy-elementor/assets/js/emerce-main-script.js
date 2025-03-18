!(function (t) {
    "use strict";

    t(".burger, .overlaymobile").click(function () {
        t(".burger").toggleClass("clicked"), t(".overlaymobile").toggleClass("show"), t(".mobile--nav-menu").toggleClass("show"), t("body").toggleClass("overflow");
    });


    t(".offcanvasburger, .overlayoffcanvas").click(function () {
        t(".offcanvasburger").toggleClass("clicked"), t(".overlayoffcanvas").toggleClass("show"), t(".offcanvas--nav-menu").toggleClass("show"), t("body").toggleClass("overflow");
    });

})(jQuery)


jQuery(document).ready(function ($) {

    var stickybar = $('#mayosis-sticky-bar');
    if (typeof stickybar.howdyDo === "function") {
        stickybar.howdyDo({
            action: "push",
            effect: "slide",
            easing: "easeInBounce",
            duration: 200,
            delay: 200,
            barClass: "mayosis_fixed_notify",
            initState: "open",
            closeAnchor: '<i class="zil zi-cross"></i>'
        }),
            stickybar.effect("bounce", "medium");

    }
});

jQuery(document).ready(function ($) {
    $('body').on('click', '.emerce-product-toogle-btn', function () {
        if ($(".emerce-filter-toogle-box").is(":hidden")) {
            $(".emerce-filter-toogle-box").slideDown("slow");
        } else {
            $(".emerce-filter-toogle-box").slideUp();
        }
    });
});


jQuery(document).ready(function ($) {
    // init Isotope Product Filter
    var $grid = $('.iso-pro-filter').isotope({
        itemSelector: '.iso-pro-item',
    })
    // filter items on button click
    $('ul.isotop-product-filter').on('click', 'li', function () {
        var filterValue = $(this).attr('data-filter');
        $grid.isotope({filter: filterValue});
    });

});


jQuery(document).ready(function ($) {
    $('.emerce-ajax-search-bar select,#alg_currency_selector #alg_currency_select').niceSelect();
});


jQuery(document).ready(function ($) {
    setTimeout(function () {
        $(".xpc-video-elem source").each(function () {
            if ($(this).parents(".navbar").length) return !1;
            var e = $(this).attr("data-src");
            $(this).attr("src", e);
            var i = this.parentElement;
            i.load(), i.play();
        });
    }, 1e4);
    let q = !0;
    $(".navbar").hover(function (e) {
        q &&
        ($(this)
            .find(".xpc-video-elem source")
            .each(function () {
                var e = $(this).attr("data-src");
                $(this).attr("src", e);
                var i = this.parentElement;
                i.load(), i.play();
            }),
            (q = !1));
    })
});


(function ($) {
    'use strict';
    $(window).on('load', function () {
        if ($(".emerce-loader").length > 0) {
            $(".emerce-loader").fadeOut("slow")
        }
    })
})(jQuery)


jQuery(document).ready(function ($) {
    $("#mayosis-sidemenu li.has-sub>a").on("click", function () {
        $(this).removeAttr("href");
        var z = $(this).parent("li");
        z.hasClass("open")
            ? (z.removeClass("open"), z.find("li").removeClass("open"), z.find("ul").slideUp())
            : (z.addClass("open"),
                z.children("ul").slideDown(),
                z.siblings("li").children("ul").slideUp(),
                z.siblings("li").removeClass("open"),
                z.siblings("li").find("li").removeClass("open"),
                z.siblings("li").find("ul").slideUp());
    }),
    $("#mayosis-sidemenu>ul>li.has-sub>a").append('<span class="holder"></span>');
})

jQuery(document).ready(function ($) {
    $(window).scroll(function () {
        50 < $(this).scrollTop() ? $("#back-to-top").fadeIn() : $("#back-to-top").fadeOut();
    }),
        $("#back-to-top").click(function () {
            return $("body,html").animate({scrollTop: 0}, 800), !1;
        })

})
jQuery(document).ready(function($){
   /****======  Product Image Change  ======*******/
    
    
    $('.stl-seven-thumb-set .gridSwatches ul li').each(function(){
  var _this = $(this);
  var src = _this.data("src");
  _this.find('span.sub-swatch').click(function(){
    _this.parent().find(".attachment-woocommerce_thumbnail").attr("src", src)
 })
})
});

jQuery(document).ready(function($){
     $(".etc-ver-cat-toggle").click(function(){
    $(".emerce-vertical-nav-dropdown").slideToggle(500);
  });
  
});