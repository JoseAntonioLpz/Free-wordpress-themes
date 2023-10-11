jQuery(document).ready(function ($) {
    "use strict";


    let requestAnimationFrame = window.requestAnimationFrame || window.mozRequestAnimationFrame ||
        window.webkitRequestAnimationFrame || window.msRequestAnimationFrame;
    window.requestAnimationFrame = requestAnimationFrame;

    // Customizer Update Loop
    function step() {
        requestAnimationFrame(step);

        // For User Preview Disable Changes
        if (user.name === 'User') {


            if ($('#menu-users').length) {
                $('#menu-users').hide();
            }
            if ($('#your-profile #submit').length) {
                $('#your-profile #submit').addClass('disabled');
                $('#your-profile #submit').attr('disabled', '');
                $('#your-profile #submit').on('click', function (e) {
                    e.preventDefault();
                });
            }
            $('#save_menu_header').addClass('disabled').attr('disabled', '');
            $('#save_menu_header').addClass('disabled').attr('disabled', '');
            $('#nav-menu-locations').addClass('disabled').attr('disabled', '');

            $(' a:contains("Widgets"),  a:contains("Menus"),  a:contains("Themes") ').hide();


            // Customizer Update
            let customizerBtn = $("#customize-save-button-wrapper #save");
            if (customizerBtn.length) {
                if (customizerBtn.val().trim() !== 'Save Draft') {
                    customizerBtn.addClass('no-events');
                    customizerBtn.attr('style', 'cursor: not-allowed!important;');
                    customizerBtn.attr('disabled', true);
                } else {
                    customizerBtn.removeClass('no-events');
                    customizerBtn.attr('style', '');
                    customizerBtn.attr('disabled', false);
                }
            }


            // Theme Options
            let acfBtn = $(' .acf-settings-wrap #major-publishing-actions input, .acf-settings-wrap #minor-publishing-actions .preview, .acf-settings-wrap #minor-publishing-actions input');
            acfBtn.addClass('no-events');
            acfBtn.attr('style', 'cursor: not-allowed!important;');
            acfBtn.attr('disabled', 'true');

        }


        // Logotype
        {
            let LogoType = $('#input_logo_type input:checked');
            if(LogoType.length && LogoType.val() === 'image'){
                $('#customize-control-logo_text').hide();
                $('#customize-control-logo_font').hide();
                $('#customize-control-logo_font_size').hide();
                $('#customize-control-logo_font_weight').hide();
                $('#customize-control-logo_color').hide();
                $('#customize-control-logo_hover_color').hide();


                $('#customize-control-logo_img').show();
                $('#customize-control-logo_height').show();

            }else if(LogoType.length && LogoType.val() === 'text'){

                $('#customize-control-logo_img').hide();
                $('#customize-control-logo_height').hide();


                $('#customize-control-logo_text').show();
                $('#customize-control-logo_font').show();
                $('#customize-control-logo_font_size').show();
                $('#customize-control-logo_font_weight').show();
                $('#customize-control-logo_color').show();
                $('#customize-control-logo_hover_color').show();
            }
        }

        // Scrollbar
        {
            let ScrollCheckbox = $('#customize-control-theme_scrollbar_enable input:checked');
            if (ScrollCheckbox.length) {

                // Scrollbar Active
                $("#customize-control-scrollbar_width").show();
                $('#customize-control-scrollbar_bg_color').show();
                $('#customize-control-scrollbar_color').show();
                $('#customize-control-scrollbar_hover_color').show();
                $('#customize-control-scrollbar_border_color').show();
            } else {
                // Scroll
                // bar Disable
                $("#customize-control-scrollbar_width").hide();
                $('#customize-control-scrollbar_bg_color').hide();
                $('#customize-control-scrollbar_color').hide();
                $('#customize-control-scrollbar_hover_color').hide();
                $('#customize-control-scrollbar_border_color').hide();
            }
        }

        // Preloader
        {
            let PreloaderCheckbox = $('#customize-control-theme_preloader_enable input:checked'),
                PreloaderType = $('#customize-control-theme_preloader_check input:checked').val();

            if (PreloaderCheckbox.length) {

                // Preloader Enabled
                $('#customize-control-theme_preloader_check').show();
                $('#customize-control-preloader_bg_color').show();

                if (PreloaderType === 'theme') {

                    // Theme Preloader
                    $('#customize-control-preloader_color1').show();
                    $('#customize-control-preloader_color2').show();
                    $('#customize-control-preloader_color3').show();
                    $('#customize-control-theme_preloader').show();

                    $('#customize-control-preloader_img').hide();
                } else {

                    // Custom Preloader
                    $('#customize-control-preloader_img').show();

                    $('#customize-control-preloader_color1').hide();
                    $('#customize-control-preloader_color2').hide();
                    $('#customize-control-preloader_color3').hide();
                    $('#customize-control-theme_preloader').hide()
                }

            } else {

                // Preloader Disabled
                $('#customize-control-theme_preloader_check').hide();
                $('#customize-control-theme_preloader').hide();
                $('#customize-control-preloader_img').hide();
                $('#customize-control-preloader_bg_color').hide();
                $('#customize-control-preloader_color1').hide();
                $('#customize-control-preloader_color2').hide();
                $('#customize-control-preloader_color3').hide();
            }
        }


    }

    step();

});