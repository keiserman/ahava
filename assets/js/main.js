// Wrapp around image

jQuery( "#menu-item-32 .sub-menu li a img" ).wrap( "<div class='hoverNavImg'></div>" );


// Toggle Nav
function toggle(id){
  var n = document.getElementById(id);
  n.style.display =  (n.style.display != 'none' ? 'none' : '' );
}

// Close nav on escape
jQuery(document).keyup(function(e) {
     if (e.key === "Escape") { 
        jQuery('.sub-menu').removeClass('nav-drop');
    }
});

// Close search on escape
jQuery('.search-hidden').keyup(function(e) {
     if (e.key === "Escape") {
        jQuery('#search-wrapper').removeClass('show');
    }
});



// Slide down nav

// Detect if a link's href goes to the current page
    function getSamePageAnchor(link) {
        if (
            link.protocol !== window.location.protocol ||
            link.host !== window.location.host ||
            link.pathname !== window.location.pathname ||
            link.search !== window.location.search
        ) {
            return false;
        }

        return link.hash;
    }

    // Scroll to a given hash, preventing the event given if there is one
    function scrollToHash(hash, e) {
        const elem = hash ? document.querySelector(hash) : false;
        if (elem) {
            if (e) e.preventDefault();
            gsap.to(window, 1, {scrollTo:{y:elem, offsetY: 150 }});
        }
    }

    // If a link's href is within the current page, scroll to it instead
    document.querySelectorAll('a[href]').forEach(a => {
        a.addEventListener('click', e => {
            scrollToHash(getSamePageAnchor(a), e);
        });
    });

    // Scroll to the element in the URL's hash on load
    scrollToHash(window.location.hash);

// End scroll effect



// Desk nav

if (window.innerWidth > 992) {

    jQuery('.menu-main-menu-container .menu-item-has-children').on('mouseenter', function(){
        jQuery(this).find('ul:first').addClass('nav-drop');
        jQuery('body').addClass('shaddow');
    });

    jQuery('.menu-main-menu-container .menu-item-has-children').on('mouseleave', function(){
        jQuery(this).find('ul:first').removeClass('nav-drop');
        jQuery('body').removeClass('shaddow');
    });

}



// Nav btn

jQuery('.toggle-menu').click (function(){
    jQuery(this).toggleClass('active');
    jQuery('.nav').fadeToggle();
});


if (window.innerWidth < 992) {

// Nav drop

jQuery('.nav #menu-main-menu > li.menu-item-has-children').click(function(e){
	console.log('click 2');
	jQuery(this).toggleClass('nav-drop-open').siblings().removeClass('nav-drop-open');	
}).children().click((e) => { 
	console.log(e.target);
	if(jQuery(e.target).hasClass('menu-item-has-children')) {
		console.log('here');
		jQuery(e.target).toggleClass('nav-drop-open').siblings().removeClass('nav-drop-open');	
		return false;
	} else {
		
	} 
});

}

// Custom active class in nav


jQuery(document).ready(function() {
    if(window.location.pathname.match('locations')){
        jQuery(".menu-item-32").addClass("current-menu-item");
    }

    if(window.location.pathname.match('doctors')){
        jQuery(".menu-item-31").addClass("current-menu-item");
    }

    if(window.location.pathname.match('news')){
        jQuery(".menu-item-29").addClass("current-menu-item");
    }

    if(window.location.pathname.match('careers')){
        jQuery(".menu-item-1616").addClass("current-menu-item");
    }

});


// Question and answers accordion


jQuery(function () {
    var Accordion = function (el, multiple) {
        this.el = el || {};
        this.multiple = multiple || false;

        var links = this.el.find('.article-title');
        links.on('click', {
            el: this.el,
            multiple: this.multiple
        }, this.dropdown)
    }

    Accordion.prototype.dropdown = function (e) {
        var jQueryel = e.data.el;
        jQuerythis = jQuery(this),
            jQuerynext = jQuerythis.next();

        jQuerynext.slideToggle();
            jQuerythis.parent().toggleClass('open');

            if (!e.data.multiple) {
                jQueryel.find('.accordion-content').not(jQuerynext).slideUp().parent().removeClass('open');
            }
            ;
        }
    var accordion = new Accordion(jQuery('.accordion-container'), false);
 });



jQuery('.accordion-container article:first-child').addClass('open');



// Testimonial


jQuery('#testimonial_sider').owlCarousel({
    loop:true,
    margin:15,
    
    autoplay:true,
    autoplayTimeout:4000,
    nav:true,
    autoplayHoverPause: true, // Stops autoplay
    responsive:{
        0:{
            items:1,
            autoHeight:true
        },
        768:{
            items:1
        },
        1400:{
            margin:95,
            items:3
        }
    }
});





// Doctors on location

jQuery('#dr_location_slide').owlCarousel({
    loop:false,
    margin:15,

    
    
    autoplay:true,
    autoplayTimeout:566200,
    nav:true,
    autoplayHoverPause: true, // Stops autoplay
    responsive:{
        0:{
            items:2,
            autoHeight:true
        },
        768:{
            items:3
        },
        1400:{
            margin:55,
            items:5
        }
    }
});






// About us page

jQuery('#about_us_page').owlCarousel({
    loop:true,
    margin:0,
    smartSpeed: 800,
    autoplay:true,
    autoplayTimeout:5000,
    nav:true,
    autoplayHoverPause: true, // Stops autoplay
    responsive:{
        0:{
            items:1,
            autoHeight:true
        },
        768:{
            items:1
        },
        1400:{
            margin:55,
            items:1
        }
    }
});



// About us page

jQuery('#career_testimonial').owlCarousel({
    loop:true,
    margin:15,
    smartSpeed: 800,
    autoplay:true,
    autoplayTimeout:5000,
    nav:true,
    autoplayHoverPause: true, // Stops autoplay
    responsive:{
        0:{
            items:1,
            autoHeight:true
        },
        768:{
            items:1
        },
        1400:{
            items:1
        }
    }
});




// Mobile location

jQuery('.mobile_location_slide').owlCarousel({
    loop:true,
    margin:15,
    
    autoplay:true,
    autoplayTimeout:455200,
    nav:true,
    autoplayHoverPause: true, // Stops autoplay
    responsive:{
        0:{
            items:1.08,
        },
        768:{
            items:2.15,
        },
        1400:{
            margin:95,
            items:1
        }
    }
});





// Home news

if (window.innerWidth < 991) {

jQuery('.homepage_news_slide').owlCarousel({
    loop:true,
    margin:15,
    
    autoplay:true,
    autoplayTimeout:455200,
    nav:true,
    autoplayHoverPause: true, // Stops autoplay
    responsive:{
        0:{
            items:1,
        },
        768:{
            items:2.15,
        },
        1400:{
            margin:95,
            items:1
        }
    }
});

}


// Counter

jQuery('.counter').countUp({
    delay: 100,
    time: 2000,
    triggerOnce:true,
});


// Contact form active

jQuery(document).ready(function($){
    // on focus
    $(".wpcf7-form input, .wpcf7-form textarea, .form-group input, .form-group textarea").focus(function() {
            $(this).addClass('active_form');
            $(this).parent().siblings('label').addClass('has-value');
    })
    // blur input fields on unfocus + if has no value
    .blur(function() {
        var text_val = $(this).val();
        if(text_val === "") {
            $(this).parent().siblings('label').removeClass('has-value');
            $(this).removeClass('active_form');
        }
    });
});



// Contact img


jQuery('.main_contact_box img').each(function(){
 var src = $(this).attr('src');
 if (!src){
  jQuery(this).parent('li').parent('ul').parent('.main_contact_box').addClass('hide_field');
 }
});


// Filter drop


jQuery( ".doctor_filter h4, .location_filter h4" ).click(function() {
  jQuery(this).toggleClass('open_filter');
  jQuery(this).next('ul').slideToggle(0);
});


jQuery(document).ready(function(e){
	jQuery('select.wpcf7-form-control.wpcf7-select.skip-first').find('option:first-child').attr('disabled', 'disabled');
})

// Open Search
jQuery("#open-search").click(function(e) {
	jQuery('#search-wrapper').toggleClass('show');
	jQuery('.search-hidden input').focus();
})

jQuery("#close-search").click(function(e) {
	jQuery('#search-wrapper').removeClass('show');
	jQuery('.search-hidden input').blur();
})

