
/* Scroll to section easing */
jQuery(document).ready(function(){
    jQuery( ".slider-nav > a" ).click(function( event ) {
        event.preventDefault();
        jQuery("html, body").animate({ scrollTop: jQuery(jQuery(this).attr("href")).offset().top - 110 }, 500);
        var currentMarginTop = jQuery(".line").css("margin-top");
        var indexOfli = jQuery(this).index();
        var newMarginTop =  -90 + (indexOfli - 1)*30
        jQuery(".line").animate({margin: newMarginTop+"px 0 0 0"});
    });
});

/* Add remove fixed class to slider nav */
jQuery(window).scroll(function() {    
    var scroll = jQuery(window).scrollTop();
    if((scroll >= 1850 && scroll <= 2500) || (scroll >= 3300 && scroll <= 4200) )  {
        jQuery(".slider-nav").addClass("dark");
    } else {
            jQuery(".slider-nav").removeClass("dark");
    }

    if (scroll >= 730) {
        jQuery(".slider-nav").addClass("fixed");
    } else {
        jQuery(".slider-nav").removeClass("fixed");
    }
});


jQuery(document).ready(function(){
    jQuery(".slidingDiv").hide();
    jQuery(".hideshow").click(function(){
        jQuery(".slidingDiv").toggle(1000);
    });
    AOS.init();
});


function reste_a_faire()
{
    return true;
}

if(reste_a_faire())
    console.log('rien n\'est fait');



