;(() => {
    "use strict";
    jQuery(document).ready(($) => {

        const browser = {
            w: document.documentElement.clientWidth,
            h: document.documentElement.clientHeight,
        };

        let iOS = /iPad|iPhone|iPod/.test(navigator.userAgent) && !window.MSStream;
        let ua = navigator.userAgent.toLowerCase();
        let Android = ua.indexOf("android") > -1;

        $(window).on('resize', function () {
            browser.w = document.documentElement.clientWidth;
            browser.h = document.documentElement.clientHeight;
        });



        if (iOS || Android || browser.w < 992) {
            $('*[data-kc-parallax="true"]').attr('data-kc-parallax', 'false');
        }

        /* HTML5 Validation to Comment Form */
        {
            let commentForm = $(".comment-form");
            if (commentForm.length) {
                commentForm.removeAttr('novalidate');
            }
        }

        /* Likes */
        {
            $(document).on('click', '.differ-likes-button', function () {
                var button = $(this);
                var post_id = button.attr('data-post-id');
                var security = button.attr('data-nonce');
                var iscomment = button.attr('data-iscomment');
                var allbuttons;
                if (iscomment === '1') {
                    allbuttons = $('.differ-likes-comment-button-' + post_id);
                } else {
                    allbuttons = $('.differ-likes-button-' + post_id);
                }
                if (post_id !== '') {
                    $.ajax({
                        type: 'POST',
                        url: ember.ajaxurl,
                        data: {
                            action: 'differ_like',
                            post_id: post_id,
                            nonce: security,
                            is_comment: iscomment,
                        },
                        beforeSend: function () {
                        },
                        success: function (response) {
                            var icon = response.icon;
                            var count = response.count;
                            allbuttons.html(icon + count);
                            if (response.status === 'unliked') {

                                allbuttons.removeClass('liked');
                            } else {

                                allbuttons.addClass('liked');
                            }
                        }
                    });

                }
                return false;
            });
        }

        /* Navigation */
        {
            let desktopNavReinit = () => {
                console.log('Desktop Navigation Init');

                let menu = $('.menu-wrap .menu'),
                    menuWrap = $('.menu-wrap');

                menuWrap.slideUp('fast').remove();
                menu.insertAfter($('.menu-flex .logo'));
                $(".nav .menu-icon").removeClass('active');
            }

            let mobileNavReinit = () => {
                console.log('Mobile Navigation Init');
                let menu = $('.menu-flex .menu');

                $('<div class="menu-wrap"></div>').appendTo($('.menu-flex'));
                menu.appendTo($('.menu-wrap'));
                if (nav.attr('data-mobile-type') === 'fixed') {
                    //  menu.append('<li class="disable" style="height: 50px;"></li><li class="disable" style="height: 50px;"></li>');
                }

                $('.menu-item-has-children > a').on('click', function (e) {
                    if (browser.w < 992) {
                        e.preventDefault();
                        $(this).siblings($('.sub-menu-wrapper')).slideToggle('fast');
                    }
                });
                let navToggle = $(".nav .menu-icon");

                navToggle.on('click', function () {
                    if (!$(this).hasClass('disabled')) {
                        $(this).toggleClass('active');
                        $('.menu-wrap').slideToggle('fast');
                        $(this).addClass('disabled');
                    }
                    setTimeout(function () {
                        navToggle.removeClass('disabled');
                    }, 10);

                });


                $(window).on('scroll', function () {
                    let nav = $('.admin-bar .nav[data-mobile-type="fixed"]'),
                        winOffset = window.pageYOffset;
                    if (browser.w < 783 && nav.length) {
                        if (winOffset >= 1) {
                            nav.addClass('active')
                        } else {
                            nav.removeClass('active')
                        }
                    }
                });


            }

            /* Nav State Watcher */
            let navState = browser.w <= 991 ? 'mobile' : 'desktop';
            $(window).on('resize', function () {
                let localState = browser.w <= 991 ? 'mobile' : 'desktop';

                if (browser.w >= 992) {
                    localState = 'desktop';
                } else {
                    localState = 'mobile';
                }
                if (localState !== navState) {
                    navState = localState;
                    if (navState === 'mobile') mobileNavReinit();
                    if (navState === 'desktop') desktopNavReinit();
                }
            });

            /* Desktop Nav Fixed On Scroll */
            let nav = $('.nav');
            $(window).on("scroll", function () {
                if (nav.attr('data-desktop-type') === 'fixed_on_scroll' && browser.w > 991) {
                    $(window).scrollTop() >= 1 ? nav.addClass("fixed") : nav.removeClass("fixed");
                }
            });

            /* Mobile Nav Init */
            if (browser.w <= 991) {
                mobileNavReinit();
            }
        }

        /* IOS Fixes */
        {
            iOS ? $(".parallax").css('background-attachment', 'scroll') : null;


            $('.kc_services_grid .section-flex .item, .vp-portfolio__item-wrap, .differ-pagination li, .differ_instagram_widget ul li, .differ_flickr_widget ul li').on('click', function () {
                // IOS HOVER FIX
            });

        }

        /* Clients Slider */
        {
            let slider = $(".clients-slider");
            if (slider.length && typeof Swiper === 'function') {
                let clientsSliderSwiper = new Swiper('.clients-slider', {
                    speed: 400,
                    grabCursor: true,
                    slidesPerView: 'auto',
                    loop: true,
                    loopedSlides: slider.find('.swiper-slide').length
                });
            }
        }



        /* Team Slider */
        {
            let slider = $('.kc_team_slider .swiper-container');
            if (slider.length) {

                let mySwiper = new Swiper('.kc_team_slider .swiper-container', {
                    direction: 'horizontal',
                    loop: slider.attr('data-loop') === 'yes' ? true : false,
                    loopedSlides: Number(slider.attr('data-count')),
                    slidesPerView: 'auto',
                    effect: 'slide',
                    speed: Number(slider.attr('data-speed')),
                    grabCursor: slider.attr('data-grab') === 'yes' ? true : false,
                    autoplay: slider.attr('data-autoplay') === 'yes' ? {disableOnInteraction: false, delay: Number(slider.attr('data-delay')),} : {},
                    navigation: {
                        nextEl: '.button-next',
                        prevEl: '.button-prev',
                    },
                })
            }
        }

        /* Google Map */
        {

            const Maps = {
                data: document.querySelectorAll('.map-section'),
                count: document.querySelectorAll('.map-section').length,
            }
            $(function () {

                for (let i = 0; i < Maps.count; i++) {
                    let mapsWrap = document.querySelectorAll('.map-section'),
                        mapWrap = mapsWrap.item(i),
                        mapElem = mapWrap.querySelector('.map');
                    if (mapElem) {

                        let zoom = Number(mapWrap.querySelector('.zoom').textContent),
                            mapLat = mapWrap.querySelector('.map_latitude').textContent,
                            mapLong = mapWrap.querySelector('.map_longitude').textContent,
                            markers = mapWrap.querySelectorAll('.marker'),
                            markersCount = markers.length;


                        let mapStyle;
                        if (mapWrap.querySelector('.map_style').textContent) {
                            mapStyle = JSON.parse(mapWrap.querySelector('.map_style').textContent);
                        } else {
                            mapStyle = false;
                        }

                        let GoogleMapInit = function () {
                            let map = new google.maps.Map(mapElem, {
                                zoom: zoom,
                                center: new google.maps.LatLng(mapLat, mapLong),
                                scrollwheel: false,
                                styles: mapStyle
                            });

                            for (let i = 1; i <= markersCount; i++) {

                                let markerLat = mapWrap.querySelector('.latitude' + i + '').textContent;
                                let markerLong = mapWrap.querySelector('.longitude' + i + '').textContent;
                                let markerTooltip = mapWrap.querySelector('.tooltip' + i + '').textContent;
                                const MapMarker = {
                                    icon: ''
                                }


                                MapMarker.icon = mapWrap.querySelector('.map_pin_icon').textContent;

                                let marker = new google.maps.Marker({
                                    position: new google.maps.LatLng(markerLat, markerLong),
                                    map: map,
                                    icon: MapMarker.icon,
                                    title: markerTooltip
                                });


                                let infowindow = new google.maps.InfoWindow({
                                    content: markerTooltip
                                });

                                if (mapWrap.querySelector('.tooltip' + i + '').textContent) {
                                    google.maps.event.addListener(marker, 'click', (function (marker, i) {
                                        return function () {
                                            infowindow.setContent(mapWrap.querySelector('.tooltip' + i + '').textContent);
                                            infowindow.open(map, marker);
                                        }
                                    })(marker, i));
                                }


                            } //for
                        }
                        google.maps.event.addDomListener(window, 'load', GoogleMapInit());
                    }
                }

            });

        }

        /* Scroll Up Button */
        {

            let body = document.body,
                html = document.documentElement,
                bodyHeight = Math.max(body.scrollHeight, body.offsetHeight, html.clientHeight, html.scrollHeight, html.offsetHeight),
                upArrow = $('.btn-up');

            $(window).on('scroll', function () {
                let pageOffset = window.pageYOffset;

                if (pageOffset > bodyHeight / 3) {
                    upArrow.addClass('active');
                } else {
                    upArrow.removeClass('active');
                }

            });

            upArrow.on('click', function () {
                $('body,html').animate({scrollTop: 0}, 500);
                return false;
            });
        }

        /* Gallery Post Format */
        {
            let slider = $('.post-gallery');
            if (slider.length) {
                slider.slick({
                    infinite: true,
                    slidesToShow: 1,
                    slidesToScroll: 1,
                    fade: true,
                    easing: 'linear',
                    nav: true,
                    dots: true,
                    arrows: true,
                    appendDots: slider,
                    appendArrows: slider,
                    /*
                    autoplay: true,
                    autoplaySpeed: 8000,
                      */
                    prevArrow: "<div class='prev'><i class='fa fa-angle-left'></i></div>",
                    nextArrow: "<div class='next'><i class='fa fa-angle-right'></i></div>",
                    swipe: true,
                    adaptiveHeight: true
                });
                slider.addClass('inited');
            }
        }


        /* Sticky Sidebar */
        {
            let sidebar = $('.posts-wrap , .sticky-sidebar-wrap ');
            if (sidebar.length) {
                sidebar.theiaStickySidebar({
                    additionalMarginTop: 120,
                    additionalMarginBottom: 40
                });
            }
        }


    }); // jQuery doc ready function

    /** Preloader **/
    {
        let inited = false,
            preloader = jQuery('.loader-wrapper'),
            preloadIcon = jQuery('.patheon-preloader');

        jQuery(window).on('load', function () {
            if (preloader.length) {
                preloader.delay(350).fadeOut(700);
                inited = true;
            }
        });


    }


})();



