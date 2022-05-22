<?php

if(!function_exists('esmarts_elated_design_styles')) {
    /**
     * Generates general custom styles
     */
    function esmarts_elated_design_styles() {
	    $font_family = esmarts_elated_options()->getOptionValue( 'google_fonts' );
	    if ( ! empty( $font_family ) && esmarts_elated_is_font_option_valid( $font_family ) ) {
		    $font_family_selector = array(
			    'body'
		    );
		    echo esmarts_elated_dynamic_css( $font_family_selector, array( 'font-family' => esmarts_elated_get_font_option_val( $font_family ) ) );
	    }

		$first_main_color = esmarts_elated_options()->getOptionValue('first_color');
        if(!empty($first_main_color)) {
            $color_selector = array(
	            'a:hover',
	            'h1 a:hover',
	            'h2 a:hover',
	            'h3 a:hover',
	            'h4 a:hover',
	            'h5 a:hover',
	            'h6 a:hover',
	            'p a:hover',
	            '.eltdf-comment-holder .eltdf-comment-text .comment-edit-link:hover',
	            '.eltdf-comment-holder .eltdf-comment-text .comment-reply-link:hover',
	            '.eltdf-comment-holder .eltdf-comment-text .replay:hover',
	            '.eltdf-comment-holder .eltdf-comment-text #cancel-comment-reply-link:hover',
	            '.eltdf-newsletter-form input.wpcf7-form-control.wpcf7-submit',
	            '.eltdf-contact-form-animation.eltdf-contact-form-animation-light',
	            '.eltdf-owl-slider .owl-nav .owl-next:hover',
	            '.eltdf-owl-slider .owl-nav .owl-prev:hover',
	            '.eltdf-404-page .eltdf-page-not-found .eltdf-btn.eltdf-btn-light-style',
	            'aside.eltdf-sidebar .widget.eltdf-course-list-widget .eltdf-cl-minimal article .eltdf-ci-price-holder span.eltdf-ci-price-free',
	            'aside.eltdf-sidebar .widget.widget_nav_menu ul.menu>li ul.sub-menu li.current-menu-item>a',
	            'aside.eltdf-sidebar .widget.widget_nav_menu ul.menu>li.menu-item-has-children>a.eltdf-custom-menu-active',
	            'aside.eltdf-sidebar .widget.widget_nav_menu ul.menu>li.menu-item-has-children>a:before',
	            'aside.eltdf-sidebar .widget.widget_nav_menu ul.menu>li ul.sub-menu li a:hover',
	            '.widget.widget_rss .eltdf-widget-title .rsswidget:hover',
	            '.widget.eltdf-course-categories-widget .eltdf-course-categories-list-title>i',
	            '.widget.eltdf-course-categories-widget .eltdf-course-categories-list-title>span',
	            '.eltdf-page-footer .widget a:hover',
	            '.eltdf-page-footer .widget.widget_rss .eltdf-widget-title .rsswidget:hover',
	            '.eltdf-page-footer .widget.eltdf-course-list-widget .eltdf-course-list-holder article .eltdf-cli-top-info a:hover',
	            '.eltdf-footer-bottom-holder .widget a:hover',
	            '.widget.widget_eltdf_twitter_widget .eltdf-twitter-widget.eltdf-twitter-standard li .eltdf-twitter-icon',
	            '.widget.widget_eltdf_twitter_widget .eltdf-twitter-widget.eltdf-twitter-slider li .eltdf-tweet-text a',
	            '.widget.widget_eltdf_twitter_widget .eltdf-twitter-widget.eltdf-twitter-slider li .eltdf-tweet-text span',
	            '.widget.widget_eltdf_twitter_widget .eltdf-twitter-widget.eltdf-twitter-standard li .eltdf-tweet-text a:hover',
	            '.widget.widget_eltdf_twitter_widget .eltdf-twitter-widget.eltdf-twitter-slider li .eltdf-twitter-icon i',
	            '.select2-container.select2-container--default .select2-selection--single',
	            '.select2-container.select2-container--default .select2-selection--multiple',
	            '#bbpress-forums li.bbp-body .bbp-forum-freshness .bbp-author-name:hover',
	            'body.forum-archive #bbpress-forums li.bbp-body .bbp-topic-started-by .bbp-author-name:hover',
	            '#bbpress-forums fieldset.bbp-form select',
	            'body.forum #bbpress-forums .subscription-toggle:hover',
	            'body.forum #bbpress-forums li.bbp-body ul.topic .bbp-topic-title .bbp-topic-permalink:hover',
	            'body.forum #bbpress-forums li.bbp-body ul.topic .bbp-topic-freshness-author .bbp-author-name:hover',
	            'body.forum #bbpress-forums li.bbp-body ul.topic.sticky:after',
	            'body.forum #bbpress-forums li.bbp-body .bbp-topic-started-by .bbp-author-name',
	            '#bbpress-forums #bbp-single-user-details #bbp-user-navigation li.current a',
	            '#bbpress-forums #bbp-single-user-details #bbp-user-navigation li a:hover',
	            '#bbpress-forums #bbp-user-body .bbp-topic-freshness-author .bbp-author-name',
	            '#bbpress-forums #bbp-user-body .bbp-topic-started-by .bbp-author-name',
	            '.eltdf-sidebar .widget.widget_display_replies ul li',
	            '.eltdf-sidebar .widget.widget_display_topics ul li',
	            '.eltdf-sidebar .widget_display_forums li a:after',
	            '.eltdf-sidebar .widget_display_views li a:after',
	            '.eltdf-sidebar .widget_display_forums li a:hover',
	            '.eltdf-sidebar .widget_display_views li a:hover',
	            '.eltdf-blog-holder article.sticky .eltdf-post-title a',
	            '.eltdf-blog-holder article .eltdf-post-info-top>div a:hover',
	            '.eltdf-bl-standard-pagination ul li.eltdf-bl-pag-active a',
	            '.eltdf-blog-pagination ul li a.eltdf-pag-active',
	            '.eltdf-blog-pagination ul li a:hover',
	            '.eltdf-blog-list-holder .eltdf-bli-info>div a:hover',
	            '#tribe-events-content-wrapper #tribe-events-content table.tribe-events-calendar tbody td div[id*=tribe-events-daynum-] a:hover',
	            '.eltdf-main-menu ul li a:hover',
	            '.eltdf-main-menu>ul>li.eltdf-active-item>a',
	            '.eltdf-light-header .eltdf-page-header>div:not(.eltdf-sticky-header):not(.fixed) .eltdf-main-menu>ul>li.eltdf-active-item>a',
	            '.eltdf-light-header .eltdf-page-header>div:not(.eltdf-sticky-header):not(.fixed) .eltdf-main-menu>ul>li>a:hover',
	            '.eltdf-drop-down .second .inner ul li.current-menu-ancestor>a',
	            '.eltdf-drop-down .second .inner ul li.current-menu-item>a',
	            '.eltdf-drop-down .second .inner ul li:hover>a',
	            '.eltdf-drop-down .wide .second .inner>ul>li.current-menu-ancestor>a',
	            '.eltdf-drop-down .wide .second .inner>ul>li.current-menu-item>a',
	            'nav.eltdf-fullscreen-menu ul li ul li.current-menu-ancestor>a',
	            'nav.eltdf-fullscreen-menu ul li ul li.current-menu-item>a',
	            'nav.eltdf-fullscreen-menu>ul>li.eltdf-active-item>a',
	            'nav.eltdf-fullscreen-menu ul li a:hover',
	            '.eltdf-mobile-header .eltdf-mobile-menu-opener.eltdf-mobile-menu-opened a',
	            '.eltdf-mobile-header .eltdf-mobile-nav .eltdf-grid>ul>li.eltdf-active-item>a',
	            '.eltdf-mobile-header .eltdf-mobile-nav .eltdf-grid>ul>li.eltdf-active-item>h6',
	            '.eltdf-mobile-header .eltdf-mobile-nav ul li a:hover',
	            '.eltdf-mobile-header .eltdf-mobile-nav ul li h6:hover',
	            '.eltdf-mobile-header .eltdf-mobile-nav ul ul li.current-menu-ancestor>a',
	            '.eltdf-mobile-header .eltdf-mobile-nav ul ul li.current-menu-ancestor>h6',
	            '.eltdf-mobile-header .eltdf-mobile-nav ul ul li.current-menu-item>a',
	            '.eltdf-mobile-header .eltdf-mobile-nav ul ul li.current-menu-item>h6',
	            '.eltdf-search-page-holder article.sticky .eltdf-post-title a',
	            '.eltdf-search-cover .eltdf-search-icon',
	            '.eltdf-search-cover input',
	            '.eltdf-search-cover input:focus',
	            '.eltdf-search-cover .eltdf-search-close a',
	            '.eltdf-side-menu-button-opener.opened',
	            '.eltdf-side-menu-button-opener:hover',
	            '.eltdf-side-menu a.eltdf-close-side-menu',
	            '.eltdf-accordion-holder .eltdf-accordion-title .eltdf-accordion-mark',
	            '.eltdf-btn.eltdf-btn-light',
	            '.eltdf-btn.eltdf-btn-outline',
	            '.eltdf-counter-holder .eltdf-counter',
	            '.eltdf-icon-list-holder .eltdf-il-icon-holder>*',
	            '.eltdf-price-table ul li .eltdf-pt-price',
	            '.eltdf-section-title-holder span.eltdf-st-tagline',
	            '.eltdf-service-table table .eltdf-st-item-title span',
	            '.eltdf-service-table table .eltdf-st-item-price',
	            '.eltdf-service-table table .eltdf-st-item-mark .eltdf-mark.eltdf-checked',
	            '.eltdf-social-share-holder.eltdf-dropdown .eltdf-social-share-dropdown-opener:hover',
	            '.eltdf-tabs.eltdf-tabs-vertical .eltdf-tabs-nav li.ui-state-active a',
	            '.eltdf-tabs.eltdf-tabs-vertical .eltdf-tabs-nav li.ui-state-hover a',
	            '.eltdf-cl-filter-holder .eltdf-course-layout-filter span:hover',
	            '.eltdf-cl-standard-pagination ul li a:hover',
	            '.eltdf-cl-standard-pagination ul li.eltdf-cl-pag-active a',
	            '.eltdf-advanced-course-search .select2 .select2-selection--single .select2-selection__rendered:before',
	            '.eltdf-course-features-holder .eltdf-course-features li .eltdf-item-icon',
	            '.eltdf-course-list-holder.eltdf-cl-minimal article:hover .eltdf-cli-title',
	            '.eltdf-course-single-holder .eltdf-course-tabs-wrapper .eltdf-course-curriculum .eltdf-section-elements .eltdf-section-elements-summary i',
	            '.eltdf-course-single-holder .eltdf-course-tabs-wrapper .eltdf-course-curriculum .eltdf-section-element.eltdf-section-quiz .eltdf-element-title .eltdf-element-icon',
	            '.eltdf-course-popup .eltdf-course-popup-items .eltdf-section-elements-summary i',
	            '.eltdf-course-popup .eltdf-course-popup-items .eltdf-section-element.eltdf-section-quiz .eltdf-element-title .eltdf-element-icon',
	            '.eltdf-course-popup .eltdf-course-popup-navigation .eltdf-course-popup-next:hover .eltdf-course-popup-nav-label',
	            '.eltdf-course-popup .eltdf-course-popup-navigation .eltdf-course-popup-prev:hover .eltdf-course-popup-nav-label',
	            '.eltdf-instructor-list-holder .eltdf-instructor-social .eltdf-icon-shortcode a:hover',
	            '.eltdf-lesson-single-holder .eltdf-lms-message'
            );

            $woo_color_selector = array();
            if(esmarts_elated_is_woocommerce_installed()) {
                $woo_color_selector = array(
	                '.eltdf-woocommerce-page .cart-collaterals table td strong',
	                '.woocommerce-pagination .page-numbers li a.current',
	                '.woocommerce-pagination .page-numbers li a:hover',
	                '.woocommerce-pagination .page-numbers li span.current',
	                '.woocommerce-pagination .page-numbers li span:hover',
	                '.woocommerce-page .eltdf-content .eltdf-quantity-buttons .eltdf-quantity-minus:hover',
	                '.woocommerce-page .eltdf-content .eltdf-quantity-buttons .eltdf-quantity-plus:hover',
	                'div.woocommerce .eltdf-quantity-buttons .eltdf-quantity-minus:hover',
	                'div.woocommerce .eltdf-quantity-buttons .eltdf-quantity-plus:hover',
	                '.eltdf-woo-single-page .eltdf-single-product-summary .eltdf-woo-social-share-holder .eltdf-social-share-title',
	                '.eltdf-woo-single-page .eltdf-single-product-summary .eltdf-woo-social-share-holder .social_share',
	                '.eltdf-shopping-cart-holder .eltdf-header-cart:hover .eltdf-cart-icon',
	                '.eltdf-light-header .eltdf-page-header>div:not(.eltdf-sticky-header):not(.fixed) .eltdf-shopping-cart-holder .eltdf-header-cart:hover .eltdf-cart-icon',
	                '.eltdf-light-header .eltdf-page-header>div:not(.eltdf-sticky-header):not(.fixed) .eltdf-shopping-cart-holder .eltdf-cart-number',
	                '.eltdf-shopping-cart-dropdown .eltdf-item-info-holder .remove:hover',
	                '.widget.woocommerce.widget_layered_nav ul li.chosen a',
	                '.widget.woocommerce.widget_price_filter .price_slider_amount .button:hover',
	                '.widget.woocommerce.widget_product_categories ul li a:hover',
	                '.widget.woocommerce.widget_products ul li a:hover',
	                '.widget.woocommerce.widget_recently_viewed_products ul li a:hover',
	                '.widget.woocommerce.widget_top_rated_products ul li a:hover'
                );
            }

            $color_selector = array_merge($color_selector, $woo_color_selector);

	        $color_important_selector = array(
		        '.eltdf-light-header .eltdf-page-header>div:not(.fixed):not(.eltdf-sticky-header) .eltdf-menu-area .widget a:hover',
		        '.eltdf-light-header .eltdf-page-header>div:not(.fixed):not(.eltdf-sticky-header).eltdf-menu-area .widget a:hover',
		        '.eltdf-light-header .eltdf-page-header>div:not(.eltdf-sticky-header):not(.fixed) .eltdf-search-opener:hover',
		        '.eltdf-light-header .eltdf-top-bar .eltdf-search-opener:hover',
		        '.eltdf-light-header .eltdf-page-header>div:not(.eltdf-sticky-header):not(.fixed) .eltdf-side-menu-button-opener.opened',
		        '.eltdf-light-header .eltdf-page-header>div:not(.eltdf-sticky-header):not(.fixed) .eltdf-side-menu-button-opener:hover',
		        '.eltdf-light-header .eltdf-top-bar .eltdf-side-menu-button-opener.opened',
		        '.eltdf-light-header .eltdf-top-bar .eltdf-side-menu-button-opener:hover',
		        '.eltdf-banner-holder .eltdf-banner-content .eltdf-btn.eltdf-btn-outline',
		        '.eltdf-btn.eltdf-btn-light:not(.eltdf-btn-custom-hover-color):hover',
		        '.eltdf-btn.eltdf-hover-animation.eltdf-btn-light:not(.eltdf-btn-custom-hover-color):hover',
		        '.eltdf-woocommerce-page .eltdf-content .woocommerce-message a.button:not(.added_to_cart):not(.checkout-button)'
	        );

            $background_color_selector = array(
	            '.eltdf-st-loader .pulse',
	            '.eltdf-st-loader .double_pulse .double-bounce1',
	            '.eltdf-st-loader .double_pulse .double-bounce2',
	            '.eltdf-st-loader .cube',
	            '.eltdf-st-loader .rotating_cubes .cube1',
	            '.eltdf-st-loader .rotating_cubes .cube2',
	            '.eltdf-st-loader .stripes>div',
	            '.eltdf-st-loader .wave>div',
	            '.eltdf-st-loader .two_rotating_circles .dot1',
	            '.eltdf-st-loader .two_rotating_circles .dot2',
	            '.eltdf-st-loader .five_rotating_circles .container1>div',
	            '.eltdf-st-loader .five_rotating_circles .container2>div',
	            '.eltdf-st-loader .five_rotating_circles .container3>div',
	            '.eltdf-st-loader .atom .ball-1:before',
	            '.eltdf-st-loader .atom .ball-2:before',
	            '.eltdf-st-loader .atom .ball-3:before',
	            '.eltdf-st-loader .atom .ball-4:before',
	            '.eltdf-st-loader .clock .ball:before',
	            '.eltdf-st-loader .mitosis .ball',
	            '.eltdf-st-loader .lines .line1',
	            '.eltdf-st-loader .lines .line2',
	            '.eltdf-st-loader .lines .line3',
	            '.eltdf-st-loader .lines .line4',
	            '.eltdf-st-loader .fussion .ball',
	            '.eltdf-st-loader .fussion .ball-1',
	            '.eltdf-st-loader .fussion .ball-2',
	            '.eltdf-st-loader .fussion .ball-3',
	            '.eltdf-st-loader .fussion .ball-4',
	            '.eltdf-st-loader .wave_circles .ball',
	            '.eltdf-st-loader .pulse_circles .ball',
	            '#submit_comment',
	            '.post-password-form input[type=submit]',
	            'input.wpcf7-form-control.wpcf7-submit',
	            '.eltdf-contact-form-animation',
	            '.eltdf-nav-full-width .eltdf-owl-slider .owl-nav .owl-next:hover',
	            '.eltdf-nav-full-width .eltdf-owl-slider .owl-nav .owl-prev:hover',
	            '.eltdf-owl-slider .owl-dots .owl-dot.active span',
	            '.eltdf-owl-slider .owl-dots .owl-dot:hover span',
	            '#eltdf-back-to-top>span:hover',
	            '.eltdf-contact-form-7-widget .eltdf-cf7-mark',
	            '.widget #wp-calendar td#today',
	            '.eltdf-page-footer .widget #wp-calendar td#today',
	            '.widget.eltdf-search-post-type-widget .eltdf-search-icon-holder',
	            '#bbpress-forums fieldset.bbp-form button',
	            '.eltdf-sidebar .bbp_widget_login button:hover',
	            '.eltdf-blog-holder article .eltdf-post-info-bottom .eltdf-post-info-bottom-left>div a:nth-child(3n+2)',
	            '.eltdf-blog-holder article.format-quote .eltdf-post-text',
	            '.eltdf-blog-holder article.format-audio .eltdf-blog-audio-holder .mejs-container .mejs-controls>.mejs-time-rail .mejs-time-total .mejs-time-current',
	            '.eltdf-blog-holder article.format-audio .eltdf-blog-audio-holder .mejs-container .mejs-controls>a.mejs-horizontal-volume-slider .mejs-horizontal-volume-current',
	            '.eltdf-events-list-item-title-holder .eltdf-events-list-item-price.eltdf-free',
	            '#tribe-events-content-wrapper #tribe-bar-form .tribe-bar-filters .tribe-bar-submit .tribe-events-button',
	            '#tribe-events-content-wrapper #tribe-events-content table.tribe-events-calendar tbody td.tribe-events-has-events div[id*=tribe-events-daynum-]',
	            '.eltdf-tribe-events-single .eltdf-events-single-title-holder .eltdf-events-single-cost.eltdf-free',
	            '.eltdf-testimonials-holder.eltdf-testimonials-boxed .eltdf-testimonials-mark',
	            '.eltdf-banner-simple-holder',
	            '.eltdf-banner-holder .eltdf-banner-text-holder',
	            '.eltdf-btn.eltdf-btn-solid',
	            '.eltdf-tml-holder .eltdf-timeline .eltdf-tml-item-holder:not(:last-of-type)::after',
	            '.eltdf-tml-holder .eltdf-timeline .eltdf-tml-item-holder .eltdf-tml-item-circle',
	            '.eltdf-icon-shortcode.eltdf-circle',
	            '.eltdf-icon-shortcode.eltdf-dropcaps.eltdf-circle',
	            '.eltdf-icon-shortcode.eltdf-square',
	            '.eltdf-progress-bar .eltdf-pb-content-holder .eltdf-pb-content',
	            '.eltdf-course-list-holder article .eltdf-ci-price-holder span.eltdf-ci-price-free',
	            '.eltdf-course-table-holder .eltdf-ci-price-holder span.eltdf-ci-price-free',
	            '.eltdf-course-single-holder .eltdf-course-single-type.eltdf-free-course'
            );

            $woo_background_color_selector = array();
            if(esmarts_elated_is_woocommerce_installed()) {
                $woo_background_color_selector = array(
	                '.woocommerce-page .eltdf-content .wc-forward:not(.added_to_cart):not(.checkout-button)',
	                '.woocommerce-page .eltdf-content a.added_to_cart',
	                '.woocommerce-page .eltdf-content a.button',
	                '.woocommerce-page .eltdf-content button[type=submit]:not(.eltdf-woo-search-widget-button)',
	                '.woocommerce-page .eltdf-content input[type=submit]',
	                'div.woocommerce .wc-forward:not(.added_to_cart):not(.checkout-button)',
	                'div.woocommerce a.added_to_cart',
	                'div.woocommerce a.button',
	                'div.woocommerce button[type=submit]:not(.eltdf-woo-search-widget-button)',
	                'div.woocommerce input[type=submit]',
	                '.eltdf-product-new',
	                'ul.products>.product .added_to_cart',
	                'ul.products>.product .button',
	                '.eltdf-shopping-cart-holder .eltdf-header-cart .eltdf-cart-number',
	                '.eltdf-shopping-cart-dropdown .eltdf-cart-bottom .eltdf-btn-holder a',
	                '.eltdf-shopping-cart-dropdown .eltdf-cart-bottom .eltdf-btn-holder a:hover',
	                '.eltdf-pl-holder .eltdf-pli-inner .eltdf-pli-image .eltdf-product-new',
	                '.eltdf-pl-holder .eltdf-pli-inner .eltdf-pli-text-inner .eltdf-pli-add-to-cart.eltdf-default-skin .added_to_cart',
	                '.eltdf-pl-holder .eltdf-pli-inner .eltdf-pli-text-inner .eltdf-pli-add-to-cart.eltdf-default-skin .button',
	                '.eltdf-pl-holder .eltdf-pli-inner .eltdf-pli-text-inner .eltdf-pli-add-to-cart.eltdf-light-skin .added_to_cart:hover',
	                '.eltdf-pl-holder .eltdf-pli-inner .eltdf-pli-text-inner .eltdf-pli-add-to-cart.eltdf-light-skin .button:hover',
	                '.eltdf-pl-holder .eltdf-pli-inner .eltdf-pli-text-inner .eltdf-pli-add-to-cart.eltdf-dark-skin .added_to_cart:hover',
	                '.eltdf-pl-holder .eltdf-pli-inner .eltdf-pli-text-inner .eltdf-pli-add-to-cart.eltdf-dark-skin .button:hover',
	                '.eltdf-pl-holder .added_to_cart',
	                '.eltdf-pl-holder .button'
                );
            }

            $background_color_selector = array_merge($background_color_selector, $woo_background_color_selector);
	
	        $background_color_important_selector = array (
	            '.eltdf-404-page .eltdf-page-not-found .eltdf-btn.eltdf-btn-light-style:hover',
	            '.eltdf-tribe-events-single .eltdf-events-single-main-content .tribe-events-cal-links .tribe-events-button',
	            '.eltdf-tribe-events-single .eltdf-events-single-main-content .tribe-events-cal-links .tribe-events-button:hover',
	            '.eltdf-banner-holder .eltdf-banner-content .eltdf-btn.eltdf-btn-outline:hover',
	            '.eltdf-btn.eltdf-btn-outline:not(.eltdf-btn-custom-hover-bg):hover',
	            '.eltdf-btn.eltdf-hover-animation:not(.eltdf-btn-custom-hover-bg):hover',
		        '.eltdf-course-single-holder .eltdf-course-basic-info-wrapper .eltdf-course-action .eltdf-buy-item-form button:hover'
            );

            $border_color_selector = array(
	            '.eltdf-st-loader .pulse_circles .ball',
	            '.select2-container.select2-container--default .select2-selection--single',
	            '.select2-container.select2-container--default .select2-selection--multiple',
	            '#bbpress-forums fieldset.bbp-form select',
	            '#tribe-events-content-wrapper #tribe-bar-form .tribe-bar-filters input[type=text]:focus',
	            '.eltdf-btn.eltdf-btn-outline',
	            '.eltdf-drop-down .second .inner',
				'.eltdf-drop-down .narrow .second .inner ul li ul',
				'.eltdf-service-table table thead tr th:nth-child(3)',
	            '.eltdf-woo-single-page .eltdf-single-product-summary .eltdf-woo-social-share-holder .eltdf-social-share-dropdown-opener',
	            '.eltdf-shopping-cart-dropdown'
            );
	
	        $border_color_important_selector = array (
		        '.eltdf-404-page .eltdf-page-not-found .eltdf-btn.eltdf-btn-light-style:hover',
		        '.eltdf-banner-holder .eltdf-banner-content .eltdf-btn.eltdf-btn-outline:hover',
		        '.eltdf-btn.eltdf-btn-outline:not(.eltdf-btn-custom-border-hover):hover',
		        '.eltdf-btn.eltdf-hover-animation:not(.eltdf-btn-custom-border-hover):hover'
	        );

            echo esmarts_elated_dynamic_css($color_selector, array('color' => $first_main_color));
	        echo esmarts_elated_dynamic_css($color_important_selector, array('color' => $first_main_color.'!important'));
	        echo esmarts_elated_dynamic_css($background_color_selector, array('background-color' => $first_main_color));
	        echo esmarts_elated_dynamic_css($background_color_important_selector, array('background-color' => $first_main_color.'!important'));
	        echo esmarts_elated_dynamic_css($border_color_selector, array('border-color' => $first_main_color));
	        echo esmarts_elated_dynamic_css($border_color_important_selector, array('border-color' => $first_main_color.'!important'));
        }
	
	    $page_background_color = esmarts_elated_options()->getOptionValue( 'page_background_color' );
	    if ( ! empty( $page_background_color ) ) {
		    $background_color_selector = array(
			    'body',
			    '.eltdf-content',
			    '.eltdf-container'
		    );
		    echo esmarts_elated_dynamic_css( $background_color_selector, array( 'background-color' => $page_background_color ) );
	    }
	
	    $selection_color = esmarts_elated_options()->getOptionValue( 'selection_color' );
	    if ( ! empty( $selection_color ) ) {
		    echo esmarts_elated_dynamic_css( '::selection', array( 'background' => $selection_color ) );
		    echo esmarts_elated_dynamic_css( '::-moz-selection', array( 'background' => $selection_color ) );
	    }
	
	    $preload_background_styles = array();
	
	    if ( esmarts_elated_options()->getOptionValue( 'preload_pattern_image' ) !== "" ) {
		    $preload_background_styles['background-image'] = 'url(' . esmarts_elated_options()->getOptionValue( 'preload_pattern_image' ) . ') !important';
	    }
	
	    echo esmarts_elated_dynamic_css( '.eltdf-preload-background', $preload_background_styles );
    }

    add_action('esmarts_elated_action_style_dynamic', 'esmarts_elated_design_styles');
}

if ( ! function_exists( 'esmarts_elated_content_styles' ) ) {
	function esmarts_elated_content_styles() {
		$content_style = array();
		
		$padding_top = esmarts_elated_options()->getOptionValue( 'content_top_padding' );
		if ( $padding_top !== '' ) {
			$content_style['padding-top'] = esmarts_elated_filter_px( $padding_top ) . 'px';
		}
		
		$content_selector = array(
			'.eltdf-content .eltdf-content-inner > .eltdf-full-width > .eltdf-full-width-inner',
		);
		
		echo esmarts_elated_dynamic_css( $content_selector, $content_style );
		
		$content_style_in_grid = array();
		
		$padding_top_in_grid = esmarts_elated_options()->getOptionValue( 'content_top_padding_in_grid' );
		if ( $padding_top_in_grid !== '' ) {
			$content_style_in_grid['padding-top'] = esmarts_elated_filter_px( $padding_top_in_grid ) . 'px';
		}
		
		$content_selector_in_grid = array(
			'.eltdf-content .eltdf-content-inner > .eltdf-container > .eltdf-container-inner',
		);
		
		echo esmarts_elated_dynamic_css( $content_selector_in_grid, $content_style_in_grid );
	}
	
	add_action( 'esmarts_elated_action_style_dynamic', 'esmarts_elated_content_styles' );
}

if ( ! function_exists( 'esmarts_elated_h1_styles' ) ) {
	function esmarts_elated_h1_styles() {
		$margin_top    = esmarts_elated_options()->getOptionValue( 'h1_margin_top' );
		$margin_bottom = esmarts_elated_options()->getOptionValue( 'h1_margin_bottom' );
		
		$item_styles = esmarts_elated_get_typography_styles( 'h1' );
		
		if ( $margin_top !== '' ) {
			$item_styles['margin-top'] = esmarts_elated_filter_px( $margin_top ) . 'px';
		}
		if ( $margin_bottom !== '' ) {
			$item_styles['margin-bottom'] = esmarts_elated_filter_px( $margin_bottom ) . 'px';
		}
		
		$item_selector = array(
			'h1'
		);
		
		if ( ! empty( $item_styles ) ) {
			echo esmarts_elated_dynamic_css( $item_selector, $item_styles );
		}
	}
	
	add_action( 'esmarts_elated_action_style_dynamic', 'esmarts_elated_h1_styles' );
}

if ( ! function_exists( 'esmarts_elated_h2_styles' ) ) {
	function esmarts_elated_h2_styles() {
		$margin_top    = esmarts_elated_options()->getOptionValue( 'h2_margin_top' );
		$margin_bottom = esmarts_elated_options()->getOptionValue( 'h2_margin_bottom' );
		
		$item_styles = esmarts_elated_get_typography_styles( 'h2' );
		
		if ( $margin_top !== '' ) {
			$item_styles['margin-top'] = esmarts_elated_filter_px( $margin_top ) . 'px';
		}
		if ( $margin_bottom !== '' ) {
			$item_styles['margin-bottom'] = esmarts_elated_filter_px( $margin_bottom ) . 'px';
		}
		
		$item_selector = array(
			'h2'
		);
		
		if ( ! empty( $item_styles ) ) {
			echo esmarts_elated_dynamic_css( $item_selector, $item_styles );
		}
	}
	
	add_action( 'esmarts_elated_action_style_dynamic', 'esmarts_elated_h2_styles' );
}

if ( ! function_exists( 'esmarts_elated_h3_styles' ) ) {
	function esmarts_elated_h3_styles() {
		$margin_top    = esmarts_elated_options()->getOptionValue( 'h3_margin_top' );
		$margin_bottom = esmarts_elated_options()->getOptionValue( 'h3_margin_bottom' );
		
		$item_styles = esmarts_elated_get_typography_styles( 'h3' );
		
		if ( $margin_top !== '' ) {
			$item_styles['margin-top'] = esmarts_elated_filter_px( $margin_top ) . 'px';
		}
		if ( $margin_bottom !== '' ) {
			$item_styles['margin-bottom'] = esmarts_elated_filter_px( $margin_bottom ) . 'px';
		}
		
		$item_selector = array(
			'h3'
		);
		
		if ( ! empty( $item_styles ) ) {
			echo esmarts_elated_dynamic_css( $item_selector, $item_styles );
		}
	}
	
	add_action( 'esmarts_elated_action_style_dynamic', 'esmarts_elated_h3_styles' );
}

if ( ! function_exists( 'esmarts_elated_h4_styles' ) ) {
	function esmarts_elated_h4_styles() {
		$margin_top    = esmarts_elated_options()->getOptionValue( 'h4_margin_top' );
		$margin_bottom = esmarts_elated_options()->getOptionValue( 'h4_margin_bottom' );
		
		$item_styles = esmarts_elated_get_typography_styles( 'h4' );
		
		if ( $margin_top !== '' ) {
			$item_styles['margin-top'] = esmarts_elated_filter_px( $margin_top ) . 'px';
		}
		if ( $margin_bottom !== '' ) {
			$item_styles['margin-bottom'] = esmarts_elated_filter_px( $margin_bottom ) . 'px';
		}
		
		$item_selector = array(
			'h4'
		);
		
		if ( ! empty( $item_styles ) ) {
			echo esmarts_elated_dynamic_css( $item_selector, $item_styles );
		}
	}
	
	add_action( 'esmarts_elated_action_style_dynamic', 'esmarts_elated_h4_styles' );
}

if ( ! function_exists( 'esmarts_elated_h5_styles' ) ) {
	function esmarts_elated_h5_styles() {
		$margin_top    = esmarts_elated_options()->getOptionValue( 'h5_margin_top' );
		$margin_bottom = esmarts_elated_options()->getOptionValue( 'h5_margin_bottom' );
		
		$item_styles = esmarts_elated_get_typography_styles( 'h5' );
		
		if ( $margin_top !== '' ) {
			$item_styles['margin-top'] = esmarts_elated_filter_px( $margin_top ) . 'px';
		}
		if ( $margin_bottom !== '' ) {
			$item_styles['margin-bottom'] = esmarts_elated_filter_px( $margin_bottom ) . 'px';
		}
		
		$item_selector = array(
			'h5'
		);
		
		if ( ! empty( $item_styles ) ) {
			echo esmarts_elated_dynamic_css( $item_selector, $item_styles );
		}
	}
	
	add_action( 'esmarts_elated_action_style_dynamic', 'esmarts_elated_h5_styles' );
}

if ( ! function_exists( 'esmarts_elated_h6_styles' ) ) {
	function esmarts_elated_h6_styles() {
		$margin_top    = esmarts_elated_options()->getOptionValue( 'h6_margin_top' );
		$margin_bottom = esmarts_elated_options()->getOptionValue( 'h6_margin_bottom' );
		
		$item_styles = esmarts_elated_get_typography_styles( 'h6' );
		
		if ( $margin_top !== '' ) {
			$item_styles['margin-top'] = esmarts_elated_filter_px( $margin_top ) . 'px';
		}
		if ( $margin_bottom !== '' ) {
			$item_styles['margin-bottom'] = esmarts_elated_filter_px( $margin_bottom ) . 'px';
		}
		
		$item_selector = array(
			'h6'
		);
		
		if ( ! empty( $item_styles ) ) {
			echo esmarts_elated_dynamic_css( $item_selector, $item_styles );
		}
	}
	
	add_action( 'esmarts_elated_action_style_dynamic', 'esmarts_elated_h6_styles' );
}

if ( ! function_exists( 'esmarts_elated_text_styles' ) ) {
	function esmarts_elated_text_styles() {
		$item_styles = esmarts_elated_get_typography_styles( 'text' );
		
		$item_selector = array(
			'p'
		);
		
		if ( ! empty( $item_styles ) ) {
			echo esmarts_elated_dynamic_css( $item_selector, $item_styles );
		}
	}
	
	add_action( 'esmarts_elated_action_style_dynamic', 'esmarts_elated_text_styles' );
}

if ( ! function_exists( 'esmarts_elated_link_styles' ) ) {
	function esmarts_elated_link_styles() {
		$link_styles      = array();
		$link_color       = esmarts_elated_options()->getOptionValue( 'link_color' );
		$link_font_style  = esmarts_elated_options()->getOptionValue( 'link_fontstyle' );
		$link_font_weight = esmarts_elated_options()->getOptionValue( 'link_fontweight' );
		$link_decoration  = esmarts_elated_options()->getOptionValue( 'link_fontdecoration' );
		
		if ( ! empty( $link_color ) ) {
			$link_styles['color'] = $link_color;
		}
		if ( ! empty( $link_font_style ) ) {
			$link_styles['font-style'] = $link_font_style;
		}
		if ( ! empty( $link_font_weight ) ) {
			$link_styles['font-weight'] = $link_font_weight;
		}
		if ( ! empty( $link_decoration ) ) {
			$link_styles['text-decoration'] = $link_decoration;
		}
		
		$link_selector = array(
			'a',
			'p a'
		);
		
		if ( ! empty( $link_styles ) ) {
			echo esmarts_elated_dynamic_css( $link_selector, $link_styles );
		}
	}
	
	add_action( 'esmarts_elated_action_style_dynamic', 'esmarts_elated_link_styles' );
}

if ( ! function_exists( 'esmarts_elated_link_hover_styles' ) ) {
	function esmarts_elated_link_hover_styles() {
		$link_hover_styles     = array();
		$link_hover_color      = esmarts_elated_options()->getOptionValue( 'link_hovercolor' );
		$link_hover_decoration = esmarts_elated_options()->getOptionValue( 'link_hover_fontdecoration' );
		
		if ( ! empty( $link_hover_color ) ) {
			$link_hover_styles['color'] = $link_hover_color;
		}
		if ( ! empty( $link_hover_decoration ) ) {
			$link_hover_styles['text-decoration'] = $link_hover_decoration;
		}
		
		$link_hover_selector = array(
			'a:hover',
			'p a:hover'
		);
		
		if ( ! empty( $link_hover_styles ) ) {
			echo esmarts_elated_dynamic_css( $link_hover_selector, $link_hover_styles );
		}
		
		$link_heading_hover_styles = array();
		
		if ( ! empty( $link_hover_color ) ) {
			$link_heading_hover_styles['color'] = $link_hover_color;
		}
		
		$link_heading_hover_selector = array(
			'h1 a:hover',
			'h2 a:hover',
			'h3 a:hover',
			'h4 a:hover',
			'h5 a:hover',
			'h6 a:hover'
		);
		
		if ( ! empty( $link_heading_hover_styles ) ) {
			echo esmarts_elated_dynamic_css( $link_heading_hover_selector, $link_heading_hover_styles );
		}
	}
	
	add_action( 'esmarts_elated_action_style_dynamic', 'esmarts_elated_link_hover_styles' );
}

if ( ! function_exists( 'esmarts_elated_smooth_page_transition_styles' ) ) {
	function esmarts_elated_smooth_page_transition_styles( $style ) {
		$id            = esmarts_elated_get_page_id();
		$loader_style  = array();
		$current_style = '';
		
		$background_color = esmarts_elated_get_meta_field_intersect( 'smooth_pt_bgnd_color', $id );
		if ( ! empty( $background_color ) ) {
			$loader_style['background-color'] = $background_color;
		}
		
		$loader_selector = array(
			'.eltdf-smooth-transition-loader'
		);
		
		if ( ! empty( $loader_style ) ) {
			$current_style .= esmarts_elated_dynamic_css( $loader_selector, $loader_style );
		}
		
		$spinner_style = array();
		$spinner_color = esmarts_elated_get_meta_field_intersect( 'smooth_pt_spinner_color', $id );
		if ( ! empty( $spinner_color ) ) {
			$spinner_style['background-color'] = $spinner_color;
		}
		
		$spinner_selectors = array(
			'.eltdf-st-loader .eltdf-rotate-circles > div',
			'.eltdf-st-loader .pulse',
			'.eltdf-st-loader .double_pulse .double-bounce1',
			'.eltdf-st-loader .double_pulse .double-bounce2',
			'.eltdf-st-loader .cube',
			'.eltdf-st-loader .rotating_cubes .cube1',
			'.eltdf-st-loader .rotating_cubes .cube2',
			'.eltdf-st-loader .stripes > div',
			'.eltdf-st-loader .wave > div',
			'.eltdf-st-loader .two_rotating_circles .dot1',
			'.eltdf-st-loader .two_rotating_circles .dot2',
			'.eltdf-st-loader .five_rotating_circles .container1 > div',
			'.eltdf-st-loader .five_rotating_circles .container2 > div',
			'.eltdf-st-loader .five_rotating_circles .container3 > div',
			'.eltdf-st-loader .atom .ball-1:before',
			'.eltdf-st-loader .atom .ball-2:before',
			'.eltdf-st-loader .atom .ball-3:before',
			'.eltdf-st-loader .atom .ball-4:before',
			'.eltdf-st-loader .clock .ball:before',
			'.eltdf-st-loader .mitosis .ball',
			'.eltdf-st-loader .lines .line1',
			'.eltdf-st-loader .lines .line2',
			'.eltdf-st-loader .lines .line3',
			'.eltdf-st-loader .lines .line4',
			'.eltdf-st-loader .fussion .ball',
			'.eltdf-st-loader .fussion .ball-1',
			'.eltdf-st-loader .fussion .ball-2',
			'.eltdf-st-loader .fussion .ball-3',
			'.eltdf-st-loader .fussion .ball-4',
			'.eltdf-st-loader .wave_circles .ball',
			'.eltdf-st-loader .pulse_circles .ball'
		);
		
		if ( ! empty( $spinner_style ) ) {
			$current_style .= esmarts_elated_dynamic_css( $spinner_selectors, $spinner_style );
		}
		
		$current_style = $current_style . $style;
		
		return $current_style;
	}
	
	add_filter( 'esmarts_elated_filter_add_page_custom_style', 'esmarts_elated_smooth_page_transition_styles' );
}