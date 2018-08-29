function debounce(n,t,r){var o;return function(){var a=this,e=arguments;clearTimeout(o),o=setTimeout(function(){o=null,r||n.apply(a,e)},t),r&&!o&&n.apply(a,e)}}function hexToRGB(a,e){var n=parseInt(a.slice(1,3),16),t=parseInt(a.slice(3,5),16),r=parseInt(a.slice(5,7),16);return e?"rgba("+n+", "+t+", "+r+", "+e+")":"rgb("+n+", "+t+", "+r+")"}transparent=!0,transparentDemo=!0,fixedTop=!1,navbar_initialized=!1,backgroundOrange=!1,sidebar_mini_active=!1,toggle_initialized=!1,seq=0,delays=80,durations=500,seq2=0,delays2=80,durations2=500,isWindows=-1<navigator.platform.indexOf("Win"),isWindows?($(".sidebar .sidebar-wrapper, .main-panel").perfectScrollbar(),$("html").addClass("perfect-scrollbar-on")):$("html").addClass("perfect-scrollbar-off"),$(document).ready(function(){$('[data-toggle="tooltip"], [rel="tooltip"]').tooltip(),$('[data-toggle="popover"]').each(function(){color_class=$(this).data("color"),$(this).popover({template:'<div class="popover popover-'+color_class+'" role="tooltip"><div class="arrow"></div><h3 class="popover-header"></h3><div class="popover-body"></div></div>'})});var a=$(".tagsinput").data("color");0!=$(".tagsinput").length&&$(".tagsinput").tagsinput(),$(".bootstrap-tagsinput").addClass(a+"-badge"),0!=$(".selectpicker").length&&$(".selectpicker").selectpicker({iconBase:"nc-icon",tickIcon:"nc-check-2"}),0!=$(".modal").length&&$(".modal").appendTo("body"),0==$(".full-screen-map").length&&0==$(".bd-docs").length&&$(".collapse").on("show.bs.collapse",function(){$(this).closest(".navbar").removeClass("navbar-transparent").addClass("bg-white")}).on("hide.bs.collapse",function(){$(this).closest(".navbar").addClass("navbar-transparent").removeClass("bg-white")}),paperDashboard.initMinimizeSidebar(),$navbar=$(".navbar[color-on-scroll]"),scroll_distance=$navbar.attr("color-on-scroll")||500,0!=$(".navbar[color-on-scroll]").length&&(paperDashboard.checkScrollForTransparentNavbar(),$(window).on("scroll",paperDashboard.checkScrollForTransparentNavbar)),$(".form-control").on("focus",function(){$(this).parent(".input-group").addClass("input-group-focus")}).on("blur",function(){$(this).parent(".input-group").removeClass("input-group-focus")}),$(".bootstrap-switch").each(function(){$this=$(this),data_on_label=$this.data("on-label")||"",data_off_label=$this.data("off-label")||"",$this.bootstrapSwitch({onText:data_on_label,offText:data_off_label})})}),$(document).on("click",".navbar-toggle",function(){$toggle=$(this),1==paperDashboard.misc.navbar_menu_visible?($("html").removeClass("nav-open"),paperDashboard.misc.navbar_menu_visible=0,setTimeout(function(){$toggle.removeClass("toggled"),$("#bodyClick").remove()},550)):(setTimeout(function(){$toggle.addClass("toggled")},580),div='<div id="bodyClick"></div>',$(div).appendTo("body").click(function(){$("html").removeClass("nav-open"),paperDashboard.misc.navbar_menu_visible=0,setTimeout(function(){$toggle.removeClass("toggled"),$("#bodyClick").remove()},550)}),$("html").addClass("nav-open"),paperDashboard.misc.navbar_menu_visible=1)}),$(window).resize(function(){seq=seq2=0,0==$(".full-screen-map").length&&0==$(".bd-docs").length&&($navbar=$(".navbar"),isExpanded=$(".navbar").find('[data-toggle="collapse"]').attr("aria-expanded"),$navbar.hasClass("bg-white")&&991<$(window).width()?$navbar.removeClass("bg-white").addClass("navbar-transparent"):$navbar.hasClass("navbar-transparent")&&$(window).width()<991&&"false"!=isExpanded&&$navbar.addClass("bg-white").removeClass("navbar-transparent"))}),paperDashboard={misc:{navbar_menu_visible:0},checkScrollForTransparentNavbar:debounce(function(){$(document).scrollTop()>scroll_distance?transparent&&(transparent=!1,$(".navbar[color-on-scroll]").removeClass("navbar-transparent")):transparent||(transparent=!0,$(".navbar[color-on-scroll]").addClass("navbar-transparent"))},17),checkSidebarImage:function(){$sidebar=$(".sidebar"),image_src=$sidebar.data("image"),void 0!==image_src&&(sidebar_container='<div class="sidebar-background" style="background-image: url('+image_src+') "/>',$sidebar.append(sidebar_container))},initMinimizeSidebar:function(){$("#minimizeSidebar").click(function(){$(this);1==paperDashboard.misc.sidebar_mini_active?($("body").removeClass("sidebar-mini"),paperDashboard.misc.sidebar_mini_active=!1):($("body").addClass("sidebar-mini"),paperDashboard.misc.sidebar_mini_active=!0);var a=setInterval(function(){window.dispatchEvent(new Event("resize"))},180);setTimeout(function(){clearInterval(a)},1e3)})},startAnimationForLineChart:function(a){a.on("draw",function(a){"line"===a.type||"area"===a.type?a.element.animate({d:{begin:600,dur:700,from:a.path.clone().scale(1,0).translate(0,a.chartRect.height()).stringify(),to:a.path.clone().stringify(),easing:Chartist.Svg.Easing.easeOutQuint}}):"point"===a.type&&(seq++,a.element.animate({opacity:{begin:seq*delays,dur:durations,from:0,to:1,easing:"ease"}}))}),seq=0},startAnimationForBarChart:function(a){a.on("draw",function(a){"bar"===a.type&&(seq2++,a.element.animate({opacity:{begin:seq2*delays2,dur:durations2,from:0,to:1,easing:"ease"}}))}),seq2=0},showSidebarMessage:function(a){try{$.notify({icon:"nc-icon nc-bell-55",message:a},{type:"info",timer:4e3,placement:{from:"top",align:"right"}})}catch(a){console.log("Notify library is missing, please make sure you have the notifications library added.")}}};
/////
$(document).ready(function () {
    $('.search-box input[type="text"]').on("keyup input", function () {
        /* Get input value on change */
        var inputVal = $(this).val();
        var resultDropdown = $(this).siblings(".result");
        if (inputVal.length) {
            $.get("ajax.php", { term: inputVal }).done(function (data) {
                // Display the returned data in browser
                resultDropdown.html(data);
            });
        } else {
            resultDropdown.empty();
        }
    });

    // Set search input value on click of result item
    $(document).on("click", ".result p", function () {
        $(this).parents(".search-box").find('input[type="text"]').val($(this).text());
        $(this).parent(".result").empty();
    });

});


////////////////////////////



$(document).ready(function () {
    // Javascript method's body can be found in assets/js/demos.js
    demo.initDashboardPageCharts();


    demo.initVectorMap();

});

function goBack() {
    window.history.back();
}

$(document).ready(function () {

    $sidebar = $('.sidebar');
    $sidebar_img_container = $sidebar.find('.sidebar-background');

    $full_page = $('.full-page');

    $sidebar_responsive = $('body > .navbar-collapse');
    sidebar_mini_active = true;

    window_width = $(window).width();

    fixed_plugin_open = $('.sidebar .sidebar-wrapper .nav li.active a p').html();

    // if( window_width > 767 && fixed_plugin_open == 'Dashboard' ){
    //     if($('.fixed-plugin .dropdown').hasClass('show-dropdown')){
    //         $('.fixed-plugin .dropdown').addClass('show');
    //     }
    //
    // }

    $('.theme-plugin a').click(function (event) {
        // Alex if we click on switch, stop propagation of the event, so the dropdown will not be hide, otherwise we set the  section active
        if ($(this).hasClass('switch-trigger')) {
            if (event.stopPropagation) {
                event.stopPropagation();
            } else if (window.event) {
                window.event.cancelBubble = true;
            }
        }
    });

    $('.theme-plugin .active-color button').click(function () {
        $full_page_background = $('.full-page-background');

        $(this).siblings().removeClass('active');
        $(this).addClass('active');

        var new_color = $(this).data('color');

        if ($sidebar.length != 0) {
            $sidebar.attr('data-active-color', new_color);
        }

        if ($full_page.length != 0) {
            $full_page.attr('data-active-color', new_color);
        }

        if ($sidebar_responsive.length != 0) {
            $sidebar_responsive.attr('data-active-color', new_color);
        }
    });

    $('.theme-plugin .background-color button').click(function () {
        $(this).siblings().removeClass('active');
        $(this).addClass('active');

        var new_color = $(this).data('color');

        if ($sidebar.length != 0) {
            $sidebar.attr('data-color', new_color);
        }

        if ($full_page.length != 0) {
            $full_page.attr('filter-color', new_color);
        }

        if ($sidebar_responsive.length != 0) {
            $sidebar_responsive.attr('data-color', new_color);
        }
    });

    $('.theme-plugin .img-holder').click(function () {
        $full_page_background = $('.full-page-background');

        $(this).parent('li').siblings().removeClass('active');
        $(this).parent('li').addClass('active');


        var new_image = $(this).find("img").attr('src');

        if ($sidebar_img_container.length != 0 && $('.switch-sidebar-image input:checked').length != 0) {
            $sidebar_img_container.fadeOut('fast', function () {
                $sidebar_img_container.css('background-image', 'url("' + new_image + '")');
                $sidebar_img_container.fadeIn('fast');
            });
        }

        if ($full_page_background.length != 0 && $('.switch-sidebar-image input:checked').length != 0) {
            var new_image_full_page = $('.theme-plugin li.active .img-holder').find('img').data('src');

            $full_page_background.fadeOut('fast', function () {
                $full_page_background.css('background-image', 'url("' + new_image_full_page + '")');
                $full_page_background.fadeIn('fast');
            });
        }

        if ($('.switch-sidebar-image input:checked').length == 0) {
            var new_image = $('.theme-plugin li.active .img-holder').find("img").attr('src');
            var new_image_full_page = $('.theme-plugin li.active .img-holder').find('img').data('src');

            $sidebar_img_container.css('background-image', 'url("' + new_image + '")');
            $full_page_background.css('background-image', 'url("' + new_image_full_page + '")');
        }

        if ($sidebar_responsive.length != 0) {
            $sidebar_responsive.css('background-image', 'url("' + new_image + '")');
        }
    });

    $('.switch-sidebar-image input').on("switchChange.bootstrapSwitch", function () {
        $full_page_background = $('.full-page-background');

        $input = $(this);

        if ($input.is(':checked')) {
            if ($sidebar_img_container.length != 0) {
                $sidebar_img_container.fadeIn('fast');
                $sidebar.attr('data-image', '#');
            }

            if ($full_page_background.length != 0) {
                $full_page_background.fadeIn('fast');
                $full_page.attr('data-image', '#');
            }

            background_image = true;
        } else {
            if ($sidebar_img_container.length != 0) {
                $sidebar.removeAttr('data-image');
                $sidebar_img_container.fadeOut('fast');
            }

            if ($full_page_background.length != 0) {
                $full_page.removeAttr('data-image', '#');
                $full_page_background.fadeOut('fast');
            }

            background_image = false;
        }
    });


    $('.switch-mini input').on("switchChange.bootstrapSwitch", function () {
        $body = $('body');

        $input = $(this);

        if (paperDashboard.misc.sidebar_mini_active == true) {
            $('body').removeClass('sidebar-mini');
            paperDashboard.misc.sidebar_mini_active = false;

            $('.sidebar .sidebar-wrapper, .main-panel').perfectScrollbar();

        } else {

            $('.sidebar .sidebar-wrapper, .main-panel').perfectScrollbar('destroy');

            setTimeout(function () {
                $('body').addClass('sidebar-mini');

                paperDashboard.misc.sidebar_mini_active = true;
            }, 300);
        }

        // we simulate the window Resize so the charts will get updated in realtime.
        var simulateWindowResize = setInterval(function () {
            window.dispatchEvent(new Event('resize'));
        }, 180);

        // we stop the simulation of Window Resize after the animations are completed
        setTimeout(function () {
            clearInterval(simulateWindowResize);
        }, 1000);

    });

});
//# sourceMappingURL=_site_dashboard_pro/assets/js/dashboard-pro.js.map