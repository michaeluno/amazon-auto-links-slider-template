/**
 * Lightslider Enabler - Amazon Auto Links Slider Template
 */
 
jQuery(document).ready(function(){
    
    console.log( lightslider_enabler );
    jQuery( '.amazon-products-slider' ).lightSlider( {
        loop: true,
        slideMove: 4,
        easing: 'cubic-bezier(0.25, 0, 0.25, 1)',
        speed: 600,
        pause: 4000,
        auto: true,
        item: 1,
        pauseOnHover: true,
        adaptiveHeight: true,
    } );
    
    jQuery( '.lSAction > .lSPrev' ).html( '&#x25C4;' );
    jQuery( '.lSAction > .lSNext' ).html( '&#x25BA;' );
    
})