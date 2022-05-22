(function($) {
	"use strict";
	
	var header = {};
	eltdf.modules.header = header;
	
	header.eltdfSetDropDownMenuPosition     = eltdfSetDropDownMenuPosition;
	header.eltdfSetDropDownWideMenuPosition = eltdfSetDropDownWideMenuPosition;
	
	header.eltdfOnDocumentReady = eltdfOnDocumentReady;
	header.eltdfOnWindowLoad = eltdfOnWindowLoad;
	
	$(document).ready(eltdfOnDocumentReady);
	$(window).on('load', eltdfOnWindowLoad);
	
	/*
	 All functions to be called on $(document).ready() should be in this function
	 */
	function eltdfOnDocumentReady() {
		eltdfSetDropDownMenuPosition();
		eltdfDropDownMenu();
	}
	
	/*
	 All functions to be called on $(window).on('load', ) should be in this function
	 */
	function eltdfOnWindowLoad() {
		eltdfSetDropDownWideMenuPosition();
	}
	
	/**
	 * Set dropdown position
	 */
	function eltdfSetDropDownMenuPosition() {
		var menuItems = $('.eltdf-drop-down > ul > li.narrow.menu-item-has-children');
		
		if (menuItems.length) {
			menuItems.each(function (i) {
				var thisItem = $(this),
					menuItemPosition = thisItem.offset().left,
					dropdownHolder = thisItem.find('.second'),
					dropdownMenuItem = dropdownHolder.find('.inner ul'),
					dropdownMenuWidth = dropdownMenuItem.outerWidth(),
					menuItemFromLeft = eltdf.windowWidth - menuItemPosition;
				
				if (eltdf.body.hasClass('eltdf-boxed')) {
					menuItemFromLeft = eltdf.boxedLayoutWidth - (menuItemPosition - (eltdf.windowWidth - eltdf.boxedLayoutWidth ) / 2);
				}
				
				var dropDownMenuFromLeft; //has to stay undefined beacuse 'dropDownMenuFromLeft < dropdownMenuWidth' condition will be true
				
				if (thisItem.find('li.sub').length > 0) {
					dropDownMenuFromLeft = menuItemFromLeft - dropdownMenuWidth;
				}
				
				dropdownHolder.removeClass('right');
				dropdownMenuItem.removeClass('right');
				if (menuItemFromLeft < dropdownMenuWidth || dropDownMenuFromLeft < dropdownMenuWidth) {
					dropdownHolder.addClass('right');
					dropdownMenuItem.addClass('right');
				}
			});
		}
	}
	
	/**
	 * Set dropdown wide position
	 */
	function eltdfSetDropDownWideMenuPosition(){
		var menuItems = $(".eltdf-drop-down > ul > li.wide");
		
		if(menuItems.length) {
			menuItems.each( function(i) {
				var menuItemSubMenu = $(menuItems[i]).find('.second');
				
				if(menuItemSubMenu.length && !menuItemSubMenu.hasClass('left_position') && !menuItemSubMenu.hasClass('right_position')) {
					menuItemSubMenu.css('left', 0);
					
					var left_position = menuItemSubMenu.offset().left;
					
					if(eltdf.body.hasClass('eltdf-boxed')) {
						var boxedWidth = $('.eltdf-boxed .eltdf-wrapper .eltdf-wrapper-inner').outerWidth();
						left_position = left_position - (eltdf.windowWidth - boxedWidth) / 2;
						
						menuItemSubMenu.css('left', -left_position);
						menuItemSubMenu.css('width', boxedWidth);
					} else {
						menuItemSubMenu.css('left', -left_position);
						menuItemSubMenu.css('width', eltdf.windowWidth);
					}
				}
			});
		}
	}
	
	function eltdfDropDownMenu() {
		var menu_items = $('.eltdf-drop-down > ul > li');
		
		menu_items.waitForImages(function(){
			menu_items.each(function(i) {
				if($(menu_items[i]).find('.second').length > 0) {
					var thisItem = $(menu_items[i]),
						dropDownSecondDiv = thisItem.find('.second');
					
					if(thisItem.hasClass('wide')) {
						//set columns to be same height - start
						var tallest = 0,
							dropDownSecondItem = $(this).find('.second > .inner > ul > li');
						
						dropDownSecondItem.each(function() {
							var thisHeight = $(this).height();
							if(thisHeight > tallest) {
								tallest = thisHeight;
							}
						});
						
						dropDownSecondItem.css('height', ''); // delete old inline css - via resize
						dropDownSecondItem.height(tallest);
						//set columns to be same height - end
					}
					
					if(!eltdf.menuDropdownHeightSet) {
						thisItem.data('original_height', dropDownSecondDiv.height() + 'px');
						dropDownSecondDiv.height(0);
					}
					
					if(navigator.userAgent.match(/(iPod|iPhone|iPad)/)) {
						thisItem.on("touchstart mouseenter", function() {
							dropDownSecondDiv.css({
								'height': thisItem.data('original_height'),
								'overflow': 'visible',
								'visibility': 'visible',
								'opacity': '1'
							});
						}).on("mouseleave", function() {
							dropDownSecondDiv.css({
								'height': '0px',
								'overflow': 'hidden',
								'visibility': 'hidden',
								'opacity': '0'
							});
						});
					} else {
						if(eltdf.body.hasClass('eltdf-dropdown-animate-height')) {
							var config = {
								interval: 0,
								over: function() {
									dropDownSecondDiv.css({
										'visibility': 'visible',
										'height': '0px',
										'opacity': '0'
									});
									dropDownSecondDiv.stop().animate({
										'height': thisItem.data('original_height'),
										opacity: 1
									}, 300, function() {
										dropDownSecondDiv.css('overflow', 'visible');
									});
								},
								timeout: 150,
								out: function() {
									dropDownSecondDiv.stop().animate({
										'height': '0px'
									}, 150, function() {
										dropDownSecondDiv.css({
											'overflow': 'hidden',
											'visibility': 'hidden'
										});
									});
								}
							};
							thisItem.hoverIntent(config);
						} else {
							var config = {
								interval: 0,
								over: function() {
									setTimeout(function() {
										dropDownSecondDiv.addClass('eltdf-drop-down-start');
										dropDownSecondDiv.stop().css({'height': thisItem.data('original_height')});
									}, 150);
								},
								timeout: 150,
								out: function() {
									dropDownSecondDiv.stop().css({'height': '0px'});
									dropDownSecondDiv.removeClass('eltdf-drop-down-start');
								}
							};
							thisItem.hoverIntent(config);
						}
					}
				}
			});
			
			$('.eltdf-drop-down ul li.wide ul li a').on('click', function(e) {
				if (e.which == 1){
					var $this = $(this);
					setTimeout(function() {
						$this.mouseleave();
					}, 500);
				}
			});
			
			eltdf.menuDropdownHeightSet = true;
		});
	}
	
})(jQuery);