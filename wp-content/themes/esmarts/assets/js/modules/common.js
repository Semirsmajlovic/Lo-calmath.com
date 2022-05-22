(function($) {
	"use strict";

    var common = {};
    eltdf.modules.common = common;

    common.eltdfFluidVideo = eltdfFluidVideo;
    common.eltdfEnableScroll = eltdfEnableScroll;
    common.eltdfDisableScroll = eltdfDisableScroll;
    common.eltdfOwlSlider = eltdfOwlSlider;
    common.eltdfInitParallax = eltdfInitParallax;
    common.eltdfInitSelfHostedVideoPlayer = eltdfInitSelfHostedVideoPlayer;
    common.eltdfSelfHostedVideoSize = eltdfSelfHostedVideoSize;
    common.eltdfPrettyPhoto = eltdfPrettyPhoto;
	common.eltdfStickySidebarWidget = eltdfStickySidebarWidget;
    common.getLoadMoreData = getLoadMoreData;
    common.setLoadMoreAjaxData = setLoadMoreAjaxData;

    common.eltdfOnDocumentReady = eltdfOnDocumentReady;
    common.eltdfOnWindowLoad = eltdfOnWindowLoad;
    common.eltdfOnWindowResize = eltdfOnWindowResize;

    $(document).ready(eltdfOnDocumentReady);
    $(window).on('load', eltdfOnWindowLoad);
    $(window).resize(eltdfOnWindowResize);
    
    /* 
        All functions to be called on $(document).ready() should be in this function
    */
    function eltdfOnDocumentReady() {
	    eltdfIconWithHover().init();
	    eltdfDisableSmoothScrollForMac();
	    eltdfInitAnchor().init();
	    eltdfInitBackToTop();
	    eltdfBackButtonShowHide();
	    eltdfInitSelfHostedVideoPlayer();
	    eltdfSelfHostedVideoSize();
	    eltdfFluidVideo();
	    eltdfPreloadBackgrounds();
	    eltdfPrettyPhoto();
	    eltdfSearchPostTypeWidget();
	    eltdfInitCustomMenuDropdown();
        eltdfLandingRowAnimation();
	    eltdfOwlSlider();
        eltdfSmoothTransition();
    }

    /* 
        All functions to be called on $(window).on('load', ) should be in this function
    */
    function eltdfOnWindowLoad() {
	    eltdfInitParallax();
	    eltdfStickySidebarWidget().init();
    }

    /* 
        All functions to be called on $(window).resize() should be in this function
    */
    function eltdfOnWindowResize() {
        eltdfSelfHostedVideoSize();
    }
	
	/*
	 ** Disable smooth scroll for mac if smooth scroll is enabled
	 */
	function eltdfDisableSmoothScrollForMac() {
		var os = navigator.appVersion.toLowerCase();
		
		if (os.indexOf('mac') > -1 && eltdf.body.hasClass('eltdf-smooth-scroll')) {
			eltdf.body.removeClass('eltdf-smooth-scroll');
		}
	}

	function eltdfDisableScroll() {
		if (window.addEventListener) {
			window.addEventListener('wheel', eltdfWheel, { passive: false});
		}
		
		// window.onmousewheel = document.onmousewheel = eltdfWheel;
		document.onkeydown = eltdfKeydown;
	}
	
	function eltdfEnableScroll() {
		if (window.removeEventListener) {
			window.removeEventListener('wheel', eltdfWheel, { passive: false});
		}
		
		window.onmousewheel = document.onmousewheel = document.onkeydown = null;
	}
	
	function eltdfWheel(e) {
		eltdfPreventDefaultValue(e);
	}
	
	function eltdfKeydown(e) {
		var keys = [37, 38, 39, 40];
		
		for (var i = keys.length; i--;) {
			if (e.keyCode === keys[i]) {
				eltdfPreventDefaultValue(e);
				return;
			}
		}
	}
	
	function eltdfPreventDefaultValue(e) {
		e = e || window.event;
		if (e.preventDefault) {
			e.preventDefault();
		}
		e.returnValue = false;
	}
	
	/*
	 **	Anchor functionality
	 */
	var eltdfInitAnchor = function() {
		/**
		 * Set active state on clicked anchor
		 * @param anchor, clicked anchor
		 */
		var setActiveState = function(anchor){
			
			$('.eltdf-main-menu .eltdf-active-item, .eltdf-mobile-nav .eltdf-active-item, .eltdf-fullscreen-menu .eltdf-active-item').removeClass('eltdf-active-item');
			anchor.parent().addClass('eltdf-active-item');
			
			$('.eltdf-main-menu a, .eltdf-mobile-nav a, .eltdf-fullscreen-menu a').removeClass('current');
			anchor.addClass('current');
		};
		
		/**
		 * Check anchor active state on scroll
		 */
		var checkActiveStateOnScroll = function(){
			var anchorData = $('[data-eltdf-anchor]');
			
			anchorData.waypoint( function(direction) {
				if(direction === 'down') {
					setActiveState($("a[href='"+window.location.href.split('#')[0]+"#"+$(this.element).data("eltdf-anchor")+"']"));
				}
			}, { offset: '50%' });
			
			anchorData.waypoint( function(direction) {
				if(direction === 'up') {
					setActiveState($("a[href='"+window.location.href.split('#')[0]+"#"+$(this.element).data("eltdf-anchor")+"']"));
				}
			}, { offset: function(){
				return -($(this.element).outerHeight() - 150);
			} });
			
		};
		
		/**
		 * Check anchor active state on load
		 */
		var checkActiveStateOnLoad = function(){
			var hash = window.location.hash.split('#')[1];
			
			if(hash !== "" && $('[data-eltdf-anchor="'+hash+'"]').length > 0){
				anchorClickOnLoad(hash);
			}
		};
		
		/**
		 * Handle anchor on load
		 */
		var anchorClickOnLoad = function ($this) {
			var scrollAmount,
				anchor = $('a'),
				hash = $this,
				anchorData = hash !== '' ? $('[data-eltdf-anchor="' + hash + '"]') : '';
			
			if (hash !== '' && anchorData.length > 0) {
				var anchoredElementOffset = anchorData.offset().top;
				scrollAmount = anchoredElementOffset - headerHeightToSubtract(anchoredElementOffset) - eltdfGlobalVars.vars.eltdfAddForAdminBar;
				
				setActiveState(anchor);
				
				eltdf.html.stop().animate({
					scrollTop: Math.round(scrollAmount)
				}, 1000, function () {
					//change hash tag in url
					if (history.pushState) {
						history.pushState(null, '', '#' + hash);
					}
				});
				return false;
			}
		};
		
		/**
		 * Calculate header height to be substract from scroll amount
		 * @param anchoredElementOffset, anchorded element offset
		 */
		var headerHeightToSubtract = function (anchoredElementOffset) {
			
			if (eltdf.modules.stickyHeader.behaviour === 'eltdf-sticky-header-on-scroll-down-up') {
				eltdf.modules.stickyHeader.isStickyVisible = (anchoredElementOffset > eltdf.modules.header.stickyAppearAmount);
			}
			
			if (eltdf.modules.stickyHeader.behaviour === 'eltdf-sticky-header-on-scroll-up') {
				if ((anchoredElementOffset > eltdf.scroll)) {
					eltdf.modules.stickyHeader.isStickyVisible = false;
				}
			}
			
			var headerHeight = eltdf.modules.stickyHeader.isStickyVisible ? eltdfGlobalVars.vars.eltdfStickyHeaderTransparencyHeight : eltdfPerPageVars.vars.eltdfHeaderTransparencyHeight;
			
			if (eltdf.windowWidth < 1025) {
				headerHeight = 0;
			}
			
			return headerHeight;
		};
		
		/**
		 * Handle anchor click
		 */
		var anchorClick = function () {
			eltdf.document.on("click", ".eltdf-main-menu a, .eltdf-fullscreen-menu a, .eltdf-btn, .eltdf-anchor, .eltdf-mobile-nav a", function () {
				var scrollAmount,
					anchor = $(this),
					hash = anchor.prop("hash").split('#')[1],
					anchorData = hash !== '' ? $('[data-eltdf-anchor="' + hash + '"]') : '';
				
				if (hash !== '' && anchorData.length > 0) {
					var anchoredElementOffset = anchorData.offset().top;
					scrollAmount = anchoredElementOffset - headerHeightToSubtract(anchoredElementOffset) - eltdfGlobalVars.vars.eltdfAddForAdminBar;
					
					setActiveState(anchor);
					
					eltdf.html.stop().animate({
						scrollTop: Math.round(scrollAmount)
					}, 1000, function () {
						//change hash tag in url
						if (history.pushState) {
							history.pushState(null, '', '#' + hash);
						}
					});
					return false;
				}
			});
		};
		
		return {
			init: function () {
				if ($('[data-eltdf-anchor]').length) {
					anchorClick();
					checkActiveStateOnScroll();
					$(window).on('load', function () {
						checkActiveStateOnLoad();
					});
				}
			}
		};
	};
	
	function eltdfInitBackToTop() {
		var backToTopButton = $('#eltdf-back-to-top');
		backToTopButton.on('click', function (e) {
			e.preventDefault();
			eltdf.html.animate({scrollTop: 0}, eltdf.window.scrollTop() / 3, 'linear');
		});
	}
	
	function eltdfBackButtonShowHide() {
		eltdf.window.scroll(function () {
			var b = $(this).scrollTop(),
				c = $(this).height(),
				d;
			
			if (b > 0) {
				d = b + c / 2;
			} else {
				d = 1;
			}
			
			if (d < 1e3) {
				eltdfToTopButton('off');
			} else {
				eltdfToTopButton('on');
			}
		});
	}
	
	function eltdfToTopButton(a) {
		var b = $("#eltdf-back-to-top");
		b.removeClass('off on');
		if (a === 'on') {
			b.addClass('on');
		} else {
			b.addClass('off');
		}
	}
	
	function eltdfInitSelfHostedVideoPlayer() {
		var players = $('.eltdf-self-hosted-video');
		
		if (players.length) {
			players.mediaelementplayer({
				audioWidth: '100%'
			});
		}
	}
	
	function eltdfSelfHostedVideoSize(){
		var selfVideoHolder = $('.eltdf-self-hosted-video-holder .eltdf-video-wrap');
		
		if(selfVideoHolder.length) {
			selfVideoHolder.each(function(){
				var thisVideo = $(this),
					videoWidth = thisVideo.closest('.eltdf-self-hosted-video-holder').outerWidth(),
					videoHeight = videoWidth / eltdf.videoRatio;
				
				if(navigator.userAgent.match(/(Android|iPod|iPhone|iPad|IEMobile|Opera Mini)/)){
					thisVideo.parent().width(videoWidth);
					thisVideo.parent().height(videoHeight);
				}
				
				thisVideo.width(videoWidth);
				thisVideo.height(videoHeight);
				
				thisVideo.find('video, .mejs-overlay, .mejs-poster').width(videoWidth);
				thisVideo.find('video, .mejs-overlay, .mejs-poster').height(videoHeight);
			});
		}
	}
	
	function eltdfFluidVideo() {
        fluidvids.init({
			selector: ['iframe'],
			players: ['www.youtube.com', 'player.vimeo.com']
		});
	}
	
	function eltdfSmoothTransition() {

		if (eltdf.body.hasClass('eltdf-smooth-page-transitions')) {

			//check for preload animation
			if (eltdf.body.hasClass('eltdf-smooth-page-transitions-preloader')) {
				var loader = $('body > .eltdf-smooth-transition-loader.eltdf-mimic-ajax'),
					revSlider = $('#eltdf-main-rev-holder .rev_slider');

				if (revSlider.length) {
					revSlider.on( 'revolution.slide.onchange', function(e, data){
                        loader.fadeOut(500);
					});
				} else {
					$(window).on('load', function(){
                        loader.fadeOut(500);

                        $(window).on( 'pageshow', function (event) {
                            if (event.originalEvent.persisted) {
                                loader.fadeOut(500);
                            }
                        });
					});
				}
			}

			// if back button is pressed, than reload page to avoid state where content is on display:none

			window.addEventListener( "pageshow", function ( event ) {
				var historyPath = event.persisted || ( typeof window.performance != "undefined" && window.performance.navigation.type === 2 );
				if ( historyPath ) {
					$('.qodef-wrapper-inner').show();
				}
			});

			//check for fade out animation
			if (eltdf.body.hasClass('eltdf-smooth-page-transitions-fadeout')) {
				var linkItem = $('a');
				
				linkItem.on('click',function (e) {
					var a = $(this);

					if ((a.parents('.eltdf-shopping-cart-dropdown').length || a.parent('.product-remove').length) && a.hasClass('remove')) {
						return;
					}

					if (
						e.which === 1 && // check if the left mouse button has been pressed
						a.attr('href').indexOf(window.location.host) >= 0 && // check if the link is to the same domain
						(typeof a.data('rel') === 'undefined') && //Not pretty photo link
						(typeof a.attr('rel') === 'undefined') && //Not VC pretty photo link
                        (!a.hasClass('lightbox-active')) && //Not lightbox plugin active
						(typeof a.attr('target') === 'undefined' || a.attr('target') === '_self') && // check if the link opens in the same window
						(a.attr('href').split('#')[0] !== window.location.href.split('#')[0]) // check if it is an anchor aiming for a different page
					) {
						e.preventDefault();
						$('.eltdf-wrapper-inner').fadeOut(1000, function () {
							window.location = a.attr('href');
						});
					}
				});
			}
		}
	}
	
	/*
	 *	Preload background images for elements that have 'eltdf-preload-background' class
	 */
	function eltdfPreloadBackgrounds(){
		var preloadBackHolder = $('.eltdf-preload-background');
		
		if(preloadBackHolder.length) {
			preloadBackHolder.each(function() {
				var preloadBackground = $(this);
				
				if(preloadBackground.css('background-image') !== '' && preloadBackground.css('background-image') !== 'none') {
					var bgUrl = preloadBackground.attr('style');
					
					bgUrl = bgUrl.match(/url\(["']?([^'")]+)['"]?\)/);
					bgUrl = bgUrl ? bgUrl[1] : "";
					
					if (bgUrl) {
						var backImg = new Image();
						backImg.src = bgUrl;
						$(backImg).on('load', function(){
							preloadBackground.removeClass('eltdf-preload-background');
						});
					}
				} else {
					$(window).on('load', function(){ preloadBackground.removeClass('eltdf-preload-background'); }); //make sure that eltdf-preload-background class is removed from elements with forced background none in css
				}
			});
		}
	}
	
	function eltdfPrettyPhoto() {
		/*jshint multistr: true */
		var markupWhole = '<div class="pp_pic_holder"> \
                        <div class="ppt">&nbsp;</div> \
                        <div class="pp_top"> \
                            <div class="pp_left"></div> \
                            <div class="pp_middle"></div> \
                            <div class="pp_right"></div> \
                        </div> \
                        <div class="pp_content_container"> \
                            <div class="pp_left"> \
                            <div class="pp_right"> \
                                <div class="pp_content"> \
                                    <div class="pp_loaderIcon"></div> \
                                    <div class="pp_fade"> \
                                        <a href="#" class="pp_expand" title="Expand the image">Expand</a> \
                                        <div class="pp_hoverContainer"> \
                                            <a class="pp_next" href="#"><span class="fa fa-angle-right"></span></a> \
                                            <a class="pp_previous" href="#"><span class="fa fa-angle-left"></span></a> \
                                        </div> \
                                        <div id="pp_full_res"></div> \
                                        <div class="pp_details"> \
                                            <div class="pp_nav"> \
                                                <a href="#" class="pp_arrow_previous">Previous</a> \
                                                <p class="currentTextHolder">0/0</p> \
                                                <a href="#" class="pp_arrow_next">Next</a> \
                                            </div> \
                                            <p class="pp_description"></p> \
                                            {pp_social} \
                                            <a class="pp_close" href="#">Close</a> \
                                        </div> \
                                    </div> \
                                </div> \
                            </div> \
                            </div> \
                        </div> \
                        <div class="pp_bottom"> \
                            <div class="pp_left"></div> \
                            <div class="pp_middle"></div> \
                            <div class="pp_right"></div> \
                        </div> \
                    </div> \
                    <div class="pp_overlay"></div>';
		
		$("a[data-rel^='prettyPhoto']").prettyPhoto({
			hook: 'data-rel',
			animation_speed: 'normal', /* fast/slow/normal */
			slideshow: false, /* false OR interval time in ms */
			autoplay_slideshow: false, /* true/false */
			opacity: 0.80, /* Value between 0 and 1 */
			show_title: true, /* true/false */
			allow_resize: true, /* Resize the photos bigger than viewport. true/false */
			horizontal_padding: 0,
			default_width: 960,
			default_height: 540,
			counter_separator_label: '/', /* The separator for the gallery counter 1 "of" 2 */
			theme: 'pp_default', /* light_rounded / dark_rounded / light_square / dark_square / facebook */
			hideflash: false, /* Hides all the flash object on a page, set to TRUE if flash appears over prettyPhoto */
			wmode: 'opaque', /* Set the flash wmode attribute */
			autoplay: true, /* Automatically start videos: True/False */
			modal: false, /* If set to true, only the close button will close the window */
			overlay_gallery: false, /* If set to true, a gallery will overlay the fullscreen image on mouse over */
			keyboard_shortcuts: true, /* Set to false if you open forms inside prettyPhoto */
			deeplinking: false,
			custom_markup: '',
			social_tools: false,
			markup: markupWhole
		});
	}

    function eltdfSearchPostTypeWidget() {
        var searchPostTypeHolder = $('.eltdf-search-post-type');

        if (searchPostTypeHolder.length) {
            searchPostTypeHolder.each(function () {
                var thisSearch = $(this),
                    searchField = thisSearch.find('.eltdf-post-type-search-field'),
                    resultsHolder = thisSearch.siblings('.eltdf-post-type-search-results'),
                    searchLoading = thisSearch.find('.eltdf-search-loading'),
                    searchIcon = thisSearch.find('.eltdf-search-icon');

                searchLoading.addClass('eltdf-hidden');

                var postType = thisSearch.data('post-type'),
                    keyPressTimeout;

                searchField.on('keyup paste', function() {
                    var field = $(this);
                    field.attr('autocomplete','off');
                    searchLoading.removeClass('eltdf-hidden');
                    searchIcon.addClass('eltdf-hidden');
                    clearTimeout(keyPressTimeout);

                    keyPressTimeout = setTimeout( function() {
                        var searchTerm = field.val();
                        if(searchTerm.length < 3) {
                            resultsHolder.html('');
                            resultsHolder.fadeOut();
                            searchLoading.addClass('eltdf-hidden');
                            searchIcon.removeClass('eltdf-hidden');
                        } else {
                            var ajaxData = {
                                action: 'esmarts_elated_search_post_types',
                                term: searchTerm,
                                postType: postType
                            };

                            $.ajax({
                                type: 'POST',
                                data: ajaxData,
                                url: eltdfGlobalVars.vars.eltdfAjaxUrl,
                                success: function (data) {
                                    var response = JSON.parse(data);
                                    if (response.status === 'success') {
                                        searchLoading.addClass('eltdf-hidden');
                                        searchIcon.removeClass('eltdf-hidden');
                                        resultsHolder.html(response.data.html);
                                        resultsHolder.fadeIn();
                                    }
                                },
                                error: function(XMLHttpRequest, textStatus, errorThrown) {
                                    console.log("Status: " + textStatus);
                                    console.log("Error: " + errorThrown);
                                    searchLoading.addClass('eltdf-hidden');
                                    searchIcon.removeClass('eltdf-hidden');
                                    resultsHolder.fadeOut();
                                }
                            });
                        }
                    }, 500);
                });

                searchField.on('focusout', function () {
                    searchLoading.addClass('eltdf-hidden');
                    searchIcon.removeClass('eltdf-hidden');
                    resultsHolder.fadeOut();
                });
            });
        }
    }
	
	/**
	 * Initializes load more data params
	 * @param container with defined data params
	 * return array
	 */
	function getLoadMoreData(container){
		var dataList = container.data(),
			returnValue = {};
		
		for (var property in dataList) {
			if (dataList.hasOwnProperty(property)) {
				if (typeof dataList[property] !== 'undefined' && dataList[property] !== false) {
					returnValue[property] = dataList[property];
				}
			}
		}
		
		return returnValue;
	}
	
	/**
	 * Sets load more data params for ajax function
	 * @param container with defined data params
	 * @param action with defined action name
	 * return array
	 */
	function setLoadMoreAjaxData(container, action) {
		var returnValue = {
			action: action
		};
		
		for (var property in container) {
			if (container.hasOwnProperty(property)) {
				
				if (typeof container[property] !== 'undefined' && container[property] !== false) {
					returnValue[property] = container[property];
				}
			}
		}
		
		return returnValue;
	}
	
	/**
	 * Object that represents icon with hover data
	 * @returns {{init: Function}} function that initializes icon's functionality
	 */
	var eltdfIconWithHover = function() {
		//get all icons on page
		var icons = $('.eltdf-icon-has-hover');
		
		/**
		 * Function that triggers icon hover color functionality
		 */
		var iconHoverColor = function(icon) {
			if(typeof icon.data('hover-color') !== 'undefined') {
				var changeIconColor = function(event) {
					event.data.icon.css('color', event.data.color);
				};
				
				var hoverColor = icon.data('hover-color'),
					originalColor = icon.css('color');
				
				if(hoverColor !== '') {
					icon.on('mouseenter', {icon: icon, color: hoverColor}, changeIconColor);
					icon.on('mouseleave', {icon: icon, color: originalColor}, changeIconColor);
				}
			}
		};
		
		return {
			init: function() {
				if(icons.length) {
					icons.each(function() {
						iconHoverColor($(this));
					});
				}
			}
		};
	};
	
	/*
	 ** Init parallax
	 */
	function eltdfInitParallax(){
		var parallaxHolder = $('.eltdf-parallax-row-holder');
		
		if(parallaxHolder.length){
			parallaxHolder.each(function() {
				var parallaxElement = $(this),
					image = parallaxElement.data('parallax-bg-image'),
					speed = parallaxElement.data('parallax-bg-speed') * 0.4,
					height = 0;
				
				if (typeof parallaxElement.data('parallax-bg-height') !== 'undefined' && parallaxElement.data('parallax-bg-height') !== false) {
					height = parseInt(parallaxElement.data('parallax-bg-height'));
				}
				
				parallaxElement.css({'background-image': 'url('+image+')'});
				
				if(height > 0) {
					parallaxElement.css({'min-height': height+'px', 'height': height+'px'});
				}
				
				parallaxElement.parallax('50%', speed);
			});
		}
	}
	
	/*
	 **  Init sticky sidebar widget
	 */
	function eltdfStickySidebarWidget(){
		var sswHolder = $('.eltdf-widget-sticky-sidebar'),
			headerHolder = $('.eltdf-page-header'),
			headerHeight = headerHolder.length ? headerHolder.outerHeight() : 0,
			widgetTopOffset = 0,
			widgetTopPosition = 0,
			sidebarHeight = 0,
			sidebarWidth = 0,
			objectsCollection = [];
		
		function addObjectItems() {
			if (sswHolder.length) {
				sswHolder.each(function () {
					var thisSswHolder = $(this),
						mainSidebarHolder = thisSswHolder.parents('aside.eltdf-sidebar'),
						widgetiseSidebarHolder = thisSswHolder.parents('.wpb_widgetised_column'),
						sidebarHolder = '',
						sidebarHolderHeight = 0;
					
					widgetTopOffset = thisSswHolder.offset().top;
					widgetTopPosition = thisSswHolder.position().top;
					sidebarHeight = 0;
					sidebarWidth = 0;
					
					if (mainSidebarHolder.length) {
						sidebarHeight = mainSidebarHolder.outerHeight();
						sidebarWidth = mainSidebarHolder.outerWidth();
						sidebarHolder = mainSidebarHolder;
						sidebarHolderHeight = mainSidebarHolder.parent().parent().outerHeight();
						
						var blogHolder = mainSidebarHolder.parent().parent().find('.eltdf-blog-holder');
						if (blogHolder.length) {
							sidebarHolderHeight -= parseInt(blogHolder.css('marginBottom'));
						}
					} else if (widgetiseSidebarHolder.length) {
						sidebarHeight = widgetiseSidebarHolder.outerHeight();
						sidebarWidth = widgetiseSidebarHolder.outerWidth();
						sidebarHolder = widgetiseSidebarHolder;
						sidebarHolderHeight = widgetiseSidebarHolder.parents('.vc_row').outerHeight();
					}
					
					objectsCollection.push({
						'object': thisSswHolder,
						'offset': widgetTopOffset,
						'position': widgetTopPosition,
						'height': sidebarHeight,
						'width': sidebarWidth,
						'sidebarHolder': sidebarHolder,
						'sidebarHolderHeight': sidebarHolderHeight
					});
				});
			}
		}
		
		function initStickySidebarWidget() {
			
			if (objectsCollection.length) {
				$.each(objectsCollection, function (i) {
					var thisSswHolder = objectsCollection[i]['object'],
						thisWidgetTopOffset = objectsCollection[i]['offset'],
						thisWidgetTopPosition = objectsCollection[i]['position'],
						thisSidebarHeight = objectsCollection[i]['height'],
						thisSidebarWidth = objectsCollection[i]['width'],
						thisSidebarHolder = objectsCollection[i]['sidebarHolder'],
						thisSidebarHolderHeight = objectsCollection[i]['sidebarHolderHeight'];
					
					if (eltdf.body.hasClass('eltdf-fixed-on-scroll')) {
						var fixedHeader = $('.eltdf-fixed-wrapper.fixed');
						
						if (fixedHeader.length) {
							headerHeight = fixedHeader.outerHeight() + eltdfGlobalVars.vars.eltdfAddForAdminBar;
						}
					} else if (eltdf.body.hasClass('eltdf-no-behavior')) {
						headerHeight = eltdfGlobalVars.vars.eltdfAddForAdminBar;
					}
					
					if (eltdf.windowWidth > 1024 && thisSidebarHolder.length) {
						var sidebarPosition = -(thisWidgetTopPosition - headerHeight),
							sidebarHeight = thisSidebarHeight - thisWidgetTopPosition - 40; // 40 is bottom margin of widget holder
						
						//move sidebar up when hits the end of section row
						var rowSectionEndInViewport = thisSidebarHolderHeight + thisWidgetTopOffset - headerHeight - thisWidgetTopPosition - eltdfGlobalVars.vars.eltdfTopBarHeight;
						
						if ((eltdf.scroll >= thisWidgetTopOffset - headerHeight) && thisSidebarHeight < thisSidebarHolderHeight) {
							if (thisSidebarHolder.hasClass('eltdf-sticky-sidebar-appeared')) {
								thisSidebarHolder.css({'top': sidebarPosition + 'px'});
							} else {
								thisSidebarHolder.addClass('eltdf-sticky-sidebar-appeared').css({
									'position': 'fixed',
									'top': sidebarPosition + 'px',
									'width': thisSidebarWidth,
									'margin-top': '-10px'
								}).animate({'margin-top': '0'}, 200);
							}
							
							if (eltdf.scroll + sidebarHeight >= rowSectionEndInViewport) {
								var absBottomPosition = thisSidebarHolderHeight - sidebarHeight + sidebarPosition - headerHeight;
								
								thisSidebarHolder.css({
									'position': 'absolute',
									'top': absBottomPosition + 'px'
								});
							} else {
								if (thisSidebarHolder.hasClass('eltdf-sticky-sidebar-appeared')) {
									thisSidebarHolder.css({
										'position': 'fixed',
										'top': sidebarPosition + 'px'
									});
								}
							}
						} else {
							thisSidebarHolder.removeClass('eltdf-sticky-sidebar-appeared').css({
								'position': 'relative',
								'top': '0',
								'width': 'auto'
							});
						}
					} else {
						thisSidebarHolder.removeClass('eltdf-sticky-sidebar-appeared').css({
							'position': 'relative',
							'top': '0',
							'width': 'auto'
						});
					}
				});
			}
		}
		
		return {
			init: function () {
				addObjectItems();
				
				initStickySidebarWidget();
				
				$(window).scroll(function () {
					initStickySidebarWidget();
				});
			},
			reInit: initStickySidebarWidget
		};
	}

    /**
     * Init Owl Carousel
     */
    function eltdfOwlSlider() {
        var sliders = $('.eltdf-owl-slider:not(.eltdf-owl-custom-slider)');

        if (sliders.length) {
            sliders.each(function(){
                var slider = $(this),
	                slideItemsNumber = slider.children().length,
	                numberOfItems = 1,
	                loop = true,
	                autoplay = true,
	                autoplayHoverPause = true,
	                sliderSpeed = 5000,
	                sliderSpeedAnimation = 600,
	                margin = 0,
	                responsiveMargin = 0,
	                responsiveMargin1 = 0,
	                stagePadding = 0,
	                stagePaddingEnabled = false,
	                center = false,
	                autoWidth = false,
	                animateInClass = false, // keyframe css animation
	                animateOut = false, // keyframe css animation
	                navigation = true,
	                navPosition = false,
	                pagination = false,
	                sliderIsPortfolio = !!slider.hasClass('eltdf-pl-is-slider'),
	                sliderDataHolder = sliderIsPortfolio ? slider.parent() : slider;  // this is condition for portfolio slider
	
	            if (typeof slider.data('number-of-items') !== 'undefined' && slider.data('number-of-items') !== false && !sliderIsPortfolio) {
		            numberOfItems = slider.data('number-of-items');
	            }
	            if (typeof sliderDataHolder.data('number-of-columns') !== 'undefined' && sliderDataHolder.data('number-of-columns') !== false && sliderIsPortfolio) {
		            numberOfItems = sliderDataHolder.data('number-of-columns');
	            }
	            if (sliderDataHolder.data('enable-loop') === 'no') {
		            loop = false;
	            }
	            if (sliderDataHolder.data('enable-autoplay') === 'no') {
		            autoplay = false;
	            }
	            if (sliderDataHolder.data('enable-autoplay-hover-pause') === 'no') {
		            autoplayHoverPause = false;
	            }
	            if (typeof sliderDataHolder.data('slider-speed') !== 'undefined' && sliderDataHolder.data('slider-speed') !== false) {
		            sliderSpeed = sliderDataHolder.data('slider-speed');
	            }
	            if (typeof sliderDataHolder.data('slider-speed-animation') !== 'undefined' && sliderDataHolder.data('slider-speed-animation') !== false) {
		            sliderSpeedAnimation = sliderDataHolder.data('slider-speed-animation');
	            }
	            if (typeof sliderDataHolder.data('slider-margin') !== 'undefined' && sliderDataHolder.data('slider-margin') !== false) {
		            if (sliderDataHolder.data('slider-margin') === 'no') {
			            margin = 0;
		            } else {
			            margin = sliderDataHolder.data('slider-margin');
		            }
	            } else {
		            if(slider.parent().hasClass('eltdf-huge-space')) {
			            margin = 60;
		            } else if (slider.parent().hasClass('eltdf-large-space')) {
			            margin = 50;
		            } else if (slider.parent().hasClass('eltdf-medium-space')) {
			            margin = 40;
		            } else if (slider.parent().hasClass('eltdf-normal-space')) {
			            margin = 30;
		            } else if (slider.parent().hasClass('eltdf-small-space')) {
			            margin = 20;
		            } else if (slider.parent().hasClass('eltdf-tiny-space')) {
			            margin = 10;
		            }
	            }
	            if (sliderDataHolder.data('slider-padding') === 'yes') {
		            stagePaddingEnabled = true;
		            stagePadding = parseInt(slider.outerWidth() * 0.28);
		            margin = 50;
	            }
	            if (sliderDataHolder.data('enable-center') === 'yes') {
		            center = true;
	            }
	            if (sliderDataHolder.data('enable-auto-width') === 'yes') {
		            autoWidth = true;
	            }
	            if (typeof sliderDataHolder.data('slider-animate-in') !== 'undefined' && sliderDataHolder.data('slider-animate-in') !== false) {
		            animateInClass = sliderDataHolder.data('slider-animate-in');
	            }
	            if (typeof sliderDataHolder.data('slider-animate-out') !== 'undefined' && sliderDataHolder.data('slider-animate-out') !== false) {
		            animateOut = sliderDataHolder.data('slider-animate-out');
	            }
	            if (sliderDataHolder.data('enable-navigation') === 'no') {
		            navigation = false;
	            }
	            if (sliderDataHolder.data('navigation-position') === 'full-width' && navigation) {
		            navPosition = true;
	            }
	            if (sliderDataHolder.data('enable-pagination') === 'yes') {
		            pagination = true;
	            }
	            
	            if(navigation && pagination) {
		            slider.addClass('eltdf-slider-has-both-nav');
	            }
	
	            if (slideItemsNumber <= 1) {
		            loop       = false;
		            autoplay   = false;
		            navigation = false;
		            pagination = false;
	            }
	
	            var responsiveNumberOfItems1 = 1,
		            responsiveNumberOfItems2 = 2,
		            responsiveNumberOfItems3 = 3,
		            responsiveNumberOfItems4 = numberOfItems;
	            
	            if (sliderDataHolder.data('responsive-2') === 'yes') {
		            responsiveNumberOfItems2 = 1;
	            }
	
	            if (numberOfItems < 3) {
		            responsiveNumberOfItems2 = numberOfItems;
		            responsiveNumberOfItems3 = numberOfItems;
	            }
	
	            if (numberOfItems > 4) {
		            responsiveNumberOfItems4 = 4;
	            }
	
	            if (stagePaddingEnabled || margin > 30) {
		            responsiveMargin = 20;
		            responsiveMargin1 = 30;
	            }
	
	            if (margin > 0 && margin <= 30) {
		            responsiveMargin = margin;
		            responsiveMargin1 = margin;
	            }
	
	            slider.waitForImages(function () {
		            slider.owlCarousel({
			            items: numberOfItems,
			            loop: loop,
			            autoplay: autoplay,
			            autoplayHoverPause: autoplayHoverPause,
			            autoplayTimeout: sliderSpeed,
			            smartSpeed: sliderSpeedAnimation,
			            margin: margin,
			            stagePadding: stagePadding,
			            center: center,
			            autoWidth: autoWidth,
			            animateInClass: animateInClass,
			            animateOut: animateOut,
			            dots: pagination,
			            nav: navigation,
			            navText: [
				            '<span class="eltdf-prev-icon ion-ios-arrow-left"></span>',
				            '<span class="eltdf-next-icon ion-ios-arrow-right"></span>'
			            ],
			            responsive: {
				            0: {
					            items: responsiveNumberOfItems1,
					            margin: responsiveMargin,
					            stagePadding: 0,
					            center: false,
					            autoWidth: false
				            },
				            681: {
					            items: responsiveNumberOfItems2,
					            margin: responsiveMargin1
				            },
				            769: {
					            items: responsiveNumberOfItems3,
					            margin: responsiveMargin1
				            },
				            1025: {
					            items: responsiveNumberOfItems4
				            },
				            1281: {
					            items: numberOfItems
				            }
			            },
			            onInitialize: function () {
				            slider.css('visibility', 'visible');
				            eltdfInitParallax();
			            },
			            onInitialized: function () {
				            if (navPosition) {
					            var sliderWidth = slider.outerWidth(),
						            navLeftArrow = slider.find('.owl-nav .owl-prev'),
						            navRightArrow = slider.find('.owl-nav .owl-next');
					
					            if(navLeftArrow.length) {
						            navLeftArrow.css({'left': -(eltdf.windowWidth - sliderWidth) / 2, 'opacity': '1'});
					            }
					
					            if(navRightArrow.length) {
						            navRightArrow.css({'right': -(eltdf.windowWidth - sliderWidth) / 2, 'opacity': '1'});
					            }
				            }
			            },
			            onResized: function () {
				            if (navPosition) {
					            var sliderWidth = slider.outerWidth(),
						            navLeftArrow = slider.find('.owl-nav .owl-prev'),
						            navRightArrow = slider.find('.owl-nav .owl-next');
					
					            if(navLeftArrow.length) {
						            navLeftArrow.css({'left': -(eltdf.windowWidth - sliderWidth) / 2, 'opacity': '1'});
					            }
					
					            if(navRightArrow.length) {
						            navRightArrow.css({'right': -(eltdf.windowWidth - sliderWidth) / 2, 'opacity': '1'});
					            }
				            }
			            },
			            onDrag: function (e) {
				            if (eltdf.body.hasClass('eltdf-smooth-page-transitions-fadeout')) {
					            var sliderIsMoving = e.isTrigger > 0;
					
					            if (sliderIsMoving) {
						            slider.addClass('eltdf-slider-is-moving');
					            }
				            }
			            },
			            onDragged: function () {
				            if (eltdf.body.hasClass('eltdf-smooth-page-transitions-fadeout') && slider.hasClass('eltdf-slider-is-moving')) {
					
					            setTimeout(function () {
						            slider.removeClass('eltdf-slider-is-moving');
					            }, 500);
				            }
			            }
		            });
	            });
            });
        }
    }
	
	function eltdfInitCustomMenuDropdown() {
		var menus = $('.eltdf-sidebar .widget_nav_menu .menu');
		
		var dropdownOpeners,
			currentMenu;
		
		if(menus.length) {
			menus.each(function() {
				currentMenu = $(this);
				
				dropdownOpeners = currentMenu.find('li.menu-item-has-children > a');
				
				if(dropdownOpeners.length) {
					dropdownOpeners.each(function() {
						var currentDropdownOpener = $(this);
						
						currentDropdownOpener.on('click', function(e) {
							e.preventDefault();
							
							var dropdownToOpen = currentDropdownOpener.parent().children('.sub-menu');
							
							if(dropdownToOpen.is(':visible')) {
								dropdownToOpen.slideUp();
								currentDropdownOpener.removeClass('eltdf-custom-menu-active');
							} else {
								dropdownToOpen.slideDown();
								currentDropdownOpener.addClass('eltdf-custom-menu-active');
							}
						});
					});
				}
			});
		}
	}

	function eltdfLandingRowAnimation() {
        var holder = $('.eltdf-landing-animation:not(.eltdf-landing-animation-first)'),
            holderFirst = $('.eltdf-landing-animation-first');

        holderFirst.addClass('eltdf-landing-animation-loaded');

        if (holder.length) {
            holder.each(function () {
                var thisHolder = $(this);

                thisHolder.appear(function () {
                    thisHolder.addClass('eltdf-landing-animation-loaded');
                }, {accX: 0, accY: eltdfGlobalVars.vars.eltdfElementAppearAmount});
            });
        }
    }


})(jQuery);