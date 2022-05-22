(function($) {
    "use strict";

    window.eltdf = {};
    eltdf.modules = {};

    eltdf.scroll = 0;
    eltdf.window = $(window);
    eltdf.document = $(document);
    eltdf.windowWidth = $(window).width();
    eltdf.windowHeight = $(window).height();
    eltdf.body = $('body');
    eltdf.html = $('html, body');
    eltdf.htmlEl = $('html');
    eltdf.menuDropdownHeightSet = false;
    eltdf.defaultHeaderStyle = '';
    eltdf.minVideoWidth = 1500;
    eltdf.videoWidthOriginal = 1280;
    eltdf.videoHeightOriginal = 720;
    eltdf.videoRatio = 1.61;

    eltdf.eltdfOnDocumentReady = eltdfOnDocumentReady;
    eltdf.eltdfOnWindowLoad = eltdfOnWindowLoad;
    eltdf.eltdfOnWindowResize = eltdfOnWindowResize;
    eltdf.eltdfOnWindowScroll = eltdfOnWindowScroll;

    $(document).ready(eltdfOnDocumentReady);
    $(window).on('load', eltdfOnWindowLoad);
    $(window).resize(eltdfOnWindowResize);
    $(window).scroll(eltdfOnWindowScroll);
    
    /* 
        All functions to be called on $(document).ready() should be in this function
    */
    function eltdfOnDocumentReady() {
        eltdf.scroll = $(window).scrollTop();

        //set global variable for header style which we will use in various functions
        if(eltdf.body.hasClass('eltdf-dark-header')){ eltdf.defaultHeaderStyle = 'eltdf-dark-header';}
        if(eltdf.body.hasClass('eltdf-light-header')){ eltdf.defaultHeaderStyle = 'eltdf-light-header';}
    }

    /* 
        All functions to be called on $(window).on('load', ) should be in this function
    */
    function eltdfOnWindowLoad() {

    }

    /* 
        All functions to be called on $(window).resize() should be in this function
    */
    function eltdfOnWindowResize() {
        eltdf.windowWidth = $(window).width();
        eltdf.windowHeight = $(window).height();
    }

    /* 
        All functions to be called on $(window).scroll() should be in this function
    */
    function eltdfOnWindowScroll() {
        eltdf.scroll = $(window).scrollTop();
    }

    //set boxed layout width variable for various calculations

    switch(true){
        case eltdf.body.hasClass('eltdf-grid-1300'):
            eltdf.boxedLayoutWidth = 1350;
            break;
        case eltdf.body.hasClass('eltdf-grid-1200'):
            eltdf.boxedLayoutWidth = 1250;
            break;
        case eltdf.body.hasClass('eltdf-grid-1000'):
            eltdf.boxedLayoutWidth = 1050;
            break;
        case eltdf.body.hasClass('eltdf-grid-800'):
            eltdf.boxedLayoutWidth = 850;
            break;
        default :
            eltdf.boxedLayoutWidth = 1150;
            break;
    }

})(jQuery);