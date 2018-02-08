<?php
/**
 * Soma: Custom Stylesheet
 * 
 */

/**
 * Generate the CSS for the current custom scheme.
 */
function somalite_custom_stylesheet_css() {	


	$body_font_size= absint(get_theme_mod( 'sm_body_font_size','14' ));

	$body_font_family= esc_attr(get_theme_mod( 'sm_body_font_family' ));
	$heading_font_family= esc_attr(get_theme_mod( 'sm_heading_font_family' ));

	$headings_color= sanitize_hex_color(get_theme_mod( 'sm_headings_color','#dd3333' ));

	$h1_font_size= absint(get_theme_mod( 'sm_h1_font_size','45' ));
	$h2_font_size= absint(get_theme_mod( 'sm_h2_font_size','30' ));
	$h3_font_size= absint(get_theme_mod( 'sm_h3_font_size','25' ));
	$h4_font_size= absint(get_theme_mod( 'sm_h4_font_size','18' ));
	$h5_font_size= absint(get_theme_mod( 'sm_h5_font_size','16' ));
	$h6_font_size= absint(get_theme_mod( 'sm_h6_font_size','14' ));

	$page_heading_color= sanitize_hex_color(get_theme_mod( 'sm_page_heading_color','#ffffff' ));
	$link_color= sanitize_hex_color(get_theme_mod( 'sm_link_color','#b5b4b4' ));
	$link_hover_color= sanitize_hex_color(get_theme_mod( 'sm_link_hover_color','#dd3333' ));
	$cta_btn_hover_color= sanitize_hex_color(get_theme_mod( 'sm_cta_btn_hover_color','#dd3333' ));
	$footer_heading_color= sanitize_hex_color(get_theme_mod( 'sm_footer_heading_color','#ffffff' ));
	$footer_content_color= sanitize_hex_color(get_theme_mod( 'sm_footer_content_color','#ffffff' ));  
    $cta_content_color=sanitize_hex_color(get_theme_mod( 'sm_cta_content_color','#555555' ));



	$css = '


	html, body {        
	    font-size: ' . $body_font_size . 'px !important;
	    font-family: ' . $body_font_family . ' !important;
	}

	h1,h2,h3,h4,h5,h6{
	    font-family: ' . $heading_font_family . ' !important;   
	    color: ' . $headings_color . ' !important; 
	}

	h1{
	    font-size: ' . $h1_font_size . 'px !important;
	}

	h2{
	    font-size: ' . $h2_font_size . 'px !important;
	}

	h3{
	    font-size: ' . $h3_font_size . 'px !important;
	}

	h4{
	    font-size: ' . $h4_font_size . 'px !important;
	}

	h5{
	    font-size: ' . $h5_font_size . 'px !important;
	}

	h6{
	    font-size: ' . $h6_font_size . 'px !important;
	}

	#page-title h1{
	    color: ' . $page_heading_color . ' !important;    
	}

	a{
	    color: ' . $link_color . ';  
	}

	.isotope #filter li.selected a,
	.isotope #filter li a:hover,
	.navbar-inverse .navbar-nav>li>a:focus,
	.navbar-inverse .navbar-nav>li>a:hover,
	.navbar-inverse .navbar-nav > .open > a,
	.navbar-inverse .navbar-nav > .open > a:hover, 
	.navbar-inverse .navbar-nav > .open > a:focus{
	   color: ' . $link_hover_color . ' !important;  
	}

	a.wcmenucart-contents span.badge,
	.dropdown-menu>.active>a,
	.dropdown-menu > li > a:hover,
	.dropdown-menu > .active > a, 
	.dropdown-menu > .active > a:hover, 
	.dropdown-menu > .active > a:focus,
	.woocommerce span.onsale,
	.woocommerce .widget_price_filter .ui-slider .ui-slider-handle,
	.hvr-underline-from-left:before{
	    background: ' . $link_hover_color . ';    
	}

	#navigation .navbar-nav > .active > a{
	    box-shadow: inset 0 -2px 0 ' . $link_hover_color . ' ;   
	}

	[class^=\'imghvr-shutter-in-\']:after, 
	[class^=\'imghvr-shutter-in-\']:before, 
	[class*=\' imghvr-shutter-in-\']:after, 
	[class*=\' imghvr-shutter-in-\']:before{
	    background-color: ' . $link_hover_color . ' !important; 
	}

	.blog-post .read-more a:hover,
	.cta-section .read-more a:hover,
	.woocommerce a.button:hover, 
	.woocommerce input.button:hover,
	.read-more a:hover{
	    background: ' . $link_hover_color . ' !important; 
	    border: 1px solid ' . $link_hover_color . ' !important;	    
	}

	.woocommerce ul.products li.product .button:hover,
	.dropdown-menu > li > a:hover,
	.dropdown-menu > li > a:focus{
	    background: ' . $link_hover_color . ' !important;     	   
	}

	.btn-default:hover,
	#commentform input[type=submit]:hover,
	.woocommerce #respond input#submit.alt:hover, 
	.woocommerce a.button.alt:hover, 
	.woocommerce button.button.alt:hover, 
	.woocommerce input.button.alt:hover,
	.contact-form form input[type=submit]:hover,
	.woocommerce .widget_price_filter .price_slider_amount .button:hover{
	    background: ' . $link_hover_color . ' !important; 
	    border: 1px solid ' . $link_hover_color . ' !important;
	}

	html input[type=button], 
	input[type=reset], 
	input[type=submit]{
		color: #fff !important;
		background: ' . $link_hover_color . ' !important; 
	    border: 1px solid ' . $link_hover_color . ' !important;	
	}

	.woocommerce div.product .woocommerce-tabs ul.tabs li.active{
	    border-bottom: 3px solid ' . $link_hover_color . ' !important; 
	}

	.woocommerce nav.woocommerce-pagination ul li a:focus, 
	.woocommerce nav.woocommerce-pagination ul li a:hover, 
	.woocommerce nav.woocommerce-pagination ul li span.current{
	    background: ' . $link_hover_color . ' !important; 	   
	}

	.cta-section .read-more a:hover{
	    background: ' . $cta_btn_hover_color . ' !important; 
	    border: 1px solid ' . $cta_btn_hover_color . ' !important;
	}

	a:hover{
	   color: ' . $link_hover_color . ' !important; 
	}

	footer h4 {
    	color: ' . $footer_heading_color . ' !important;
    }

    #soma-footer-section,
    footer .social-icons i,
    footer a{
    	color: ' . $footer_content_color . ' !important;
    }

    .cta-section .heading h4,
    .cta-section p{
    	color: ' . $cta_content_color . ' !important;
    }

    .cta-section .read-more a{
    	color: ' . $cta_content_color . ';	
    	border: 1px solid ' . $cta_content_color . ';
    }


';

if(false===get_theme_mod( 'sm_sticky_menu',false )) {
	$css .='		
		.scroll-fix{ 
			position: inherit !important;
			top:0px !important;
			border:0 !important;
		}

	    #slider .inner-overlay{
	    	margin-top:0px !important;
	    }
    ';	
}

if('center'===esc_attr(get_theme_mod( 'sm_addcart_styles','center' ))) {
	$css .='		
		.woocommerce ul.products li.product .price {
            float: none;
            text-align: center;
        }
            
        .woocommerce-page.columns-3 ul.products li.product, 
        .woocommerce.columns-3 ul.products li.product,
        .woocommerce ul.products li.product, 
        .woocommerce-page ul.products li.product{
            text-align:center;
            
        }
    ';	
}
else{
	$css .='		
		.woocommerce ul.products li.product .price {
            float: right;
        }
    ';		
}
	
	return apply_filters( 'somalite_custom_stylesheet_css', $css);
}
