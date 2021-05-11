jQuery(document).ready(function($) {
    
    var slider_auto, slider_loop, slider_control, rtl, mrtl, slider_animation;
    /** Variables from Customizer for Slider settings */
    if( business_one_page_data.auto == '1' ){
        slider_auto = true;
    }else{
        slider_auto = false;
    }
    
    if( business_one_page_data.loop == '1' ){
        slider_loop = true;
    }else{
        slider_loop = false;
    }
    
    if( business_one_page_data.pager == '1' ){
        slider_control = true;
    }else{
        slider_control = false;
    }
    
    if( business_one_page_data.rtl == '1' ){
        rtl = true;
        mrtl = false;
    }else{
        rtl = false;
        mrtl = true;
    }
    
    if( business_one_page_data.animation == 'slide' ){
        slider_animation = '';
    }else{
        slider_animation = 'fadeOut';
    }

    /** Home Page Slider */
    $(".banner-slider").owlCarousel({
        items           : 1,
        margin          : 0,
        loop            : slider_loop,
        autoplay        : slider_auto,
        dots            : slider_control,
        nav             : false,
        animateOut      : slider_animation,
        autoplayTimeout : business_one_page_data.pause,
        lazyLoad        : true,
        mouseDrag       : false,
        rtl             : rtl,
        autoplaySpeed   : business_one_page_data.speed,
    });

    $(".testimonial-slide").owlCarousel({
        items           : 1,
        margin          : 0,
        dots            : true,
        nav             : false,
        lazyLoad        : true,
        mouseDrag       : false,
        rtl             : rtl,
        autoplaySpeed   : 500,
    });

    $("#lightSlider").owlCarousel({
        items           : 3,
        margin          : 30,
        loop            : true,
        dots            : false,
        nav             : true,
        lazyLoad        : true,
        mouseDrag       : false,
        rtl             : rtl,
        responsive : {
            // breakpoint from 0 up
            0 : {
                items : 1,
            },
            // breakpoint from 480 up
            640 : {
                items : 2,
            },

            768 : {
                items : 3,
            }
        }
    });
    
    //scrollup javascript
    $('.scrollup').click(function () {
        $("html, body").animate({
            scrollTop: 0
        }, 800);
        return false;
    });
    
    // grab an element
	var myElement = document.querySelector("header");
	// construct an instance of Headroom, passing the element
	var headroom  = new Headroom(myElement);
	// initialise
	headroom.init();
    
	$('#site-navigation').onePageNav({
        currentClass: 'current-menu-item',
        changeHash: false,
        scrollSpeed: 1500,
        scrollThreshold: 0.5,
        filter: '',
        easing: 'swing',        
    });
    
     //responsive menu
     $("#nav-anchor").click(function(){
		$("#site-navigation").slideToggle("slow");
	});
    
    /** Masonry */
    $('.js-masonry').imagesLoaded(function(){ 
        $('.js-masonry').masonry({
            itemSelector : '.portfolio-col',
            isOriginLeft : mrtl
        }); 
    });
    
    //same height js
    // these are (ruh-roh) globals. You could wrap in an
        // immediately-Invoked Function Expression (IIFE) if you wanted to...
        var currentTallest = 0,
            currentRowStart = 0,
            rowDivs = new Array();

        function setConformingHeight(el, newHeight) {
            // set the height to something new, but remember the original height in case things change
            el.data("originalHeight", (el.data("originalHeight") == undefined) ? (el.height()) : (el.data("originalHeight")));
            el.height(newHeight);
        }

        function getOriginalHeight(el) {
            // if the height has changed, send the originalHeight
            return (el.data("originalHeight") == undefined) ? (el.height()) : (el.data("originalHeight"));
        }

        function columnConform() {

            // find the tallest DIV in the row, and set the heights of all of the DIVs to match it.
            $('.three-cols > .row > .col').each(function() {

                // "caching"
                var $el = $(this);

                var topPosition = $el.position().top;

                if (currentRowStart != topPosition) {

                    // we just came to a new row.  Set all the heights on the completed row
                    for(currentDiv = 0 ; currentDiv < rowDivs.length ; currentDiv++) setConformingHeight(rowDivs[currentDiv], currentTallest);

                    // set the variables for the new row
                    rowDivs.length = 0; // empty the array
                    currentRowStart = topPosition;
                    currentTallest = getOriginalHeight($el);
                    rowDivs.push($el);

                } else {

                    // another div on the current row.  Add it to the list and check if it's taller
                    rowDivs.push($el);
                    currentTallest = (currentTallest < getOriginalHeight($el)) ? (getOriginalHeight($el)) : (currentTallest);

                }
                // do the last row
                for (currentDiv = 0 ; currentDiv < rowDivs.length ; currentDiv++) setConformingHeight(rowDivs[currentDiv], currentTallest);

            });

        }
        
        columnConform();
        
        $(window).resize(function() {
            columnConform();
        });

     /** Responsive Menu */
     
    $('#responsive-menu-button-primary').sidr({
        name: 'sidr-main-primary',
        source: '#site-navigation',
        side: 'right'
    });
    
    $('.sidr-inner').prepend('<a class="btn-closed"><i class="fa fa-times"></i></a>');
    
    $('body').on( 'click', '.btn-closed', function(){
        $.sidr('close', 'sidr-main-primary');
        $.sidr('close', 'sidr-main');
    });
    
    $('#sidr-main-primary li').click(function(){        
        $.sidr('close', 'sidr-main-primary');
        $.sidr('close', 'sidr-main');
    });
        
});