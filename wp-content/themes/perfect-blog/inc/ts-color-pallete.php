<?php
	
	$perfect_blog_theme_color_first = get_theme_mod('perfect_blog_theme_color_first');

	$custom_css = '';

	if($perfect_blog_theme_color_first != false){
		$custom_css .='a.button, .second-border a:hover, #footer input[type="submit"], .woocommerce span.onsale, .woocommerce #respond input#submit, .woocommerce a.button, .woocommerce button.button, .woocommerce input.button,.woocommerce #respond input#submit.alt, .woocommerce a.button.alt, .woocommerce button.button.alt, .woocommerce input.button.alt, #sidebar input[type="submit"], #sidebar .tagcloud a:hover, .pagination a:hover, .pagination .current, #header main-menu-navigation ul li:hover > ul li:hover,#comments input[type="submit"].submit, #menu-sidebar input[type="submit"],.tags p a:hover,.meta-nav:hover,#slider .inner_carousel .more-btn a:hover,#comments a.comment-reply-link,#sidebar aside#woocommerce_product_search-2 button{';
			$custom_css .='background-color: '.esc_html($perfect_blog_theme_color_first).';';
		$custom_css .='}';
	}
	if($perfect_blog_theme_color_first != false){
		$custom_css .='comments input[type="submit"].submit, nav.woocommerce-MyAccount-navigation ul li{';
			$custom_css .='background-color: '.esc_html($perfect_blog_theme_color_first).'!important;';
		$custom_css .='}';
	}
	if($perfect_blog_theme_color_first != false){
		$custom_css .='input[type="submit"], .social-media i:hover, main-menu-navigation ul li a:hover,main-menu-navigation ul li a:active, .copyright p a,.woocommerce-message::before, h1.entry-title, #footer li a:hover,.primary-navigation ul ul a,.primary-navigation ul ul,.tags i,.metabox a:hover,#sidebar ul li a:hover{';
			$custom_css .='color: '.esc_html($perfect_blog_theme_color_first).';';
		$custom_css .='}';
	}
	if($perfect_blog_theme_color_first != false){
		$custom_css .='#footer input[type="search"],.primary-navigation ul ul,.second-border a:hover{';
			$custom_css .='border-color: '.esc_html($perfect_blog_theme_color_first).';';
		$custom_css .='}';
	}
	if($perfect_blog_theme_color_first != false){
		$custom_css .='.primary-navigation ul ul{';
			$custom_css .='border-top-color: '.esc_html($perfect_blog_theme_color_first).'!important;';
		$custom_css .='}';
	}

	$perfect_blog_theme_color_second = get_theme_mod('perfect_blog_theme_color_second');

	if($perfect_blog_theme_color_second != false){
		$custom_css .='#header, .contentbox h4, #footer .tagcloud a, .copyright{';
			$custom_css .='background-color: '.esc_html($perfect_blog_theme_color_second).';';
		$custom_css .='}';
	}
	if($perfect_blog_theme_color_second != false){
		$custom_css .='.page-box h4 a,#sidebar h3, #header main-menu-navigation ul li:hover > ul li a,.tags p a,.meta-nav,.entry-content a, .woocommerce-product-details__short-description p a, .comment-body p a,#sidebar .textwidget a#sidebar .textwidget a#sidebar .textwidget a{';
			$custom_css .='color: '.esc_html($perfect_blog_theme_color_second).';';
		$custom_css .='}';
	}
	if($perfect_blog_theme_color_second != false){
		$custom_css .='#footer .tagcloud a,.tags p a{';
			$custom_css .='border-color: '.esc_html($perfect_blog_theme_color_second).';';
		$custom_css .='}';
	}

// media

	$custom_css .='@media screen and (max-width:1000px) {';
	if($perfect_blog_theme_color_second != false || $perfect_blog_theme_color_first != false){
	$custom_css .='#menu-sidebar, .primary-navigation ul ul a, .primary-navigation li a:hover, .primary-navigation li:hover a, #contact-info{
	background-image: linear-gradient(-90deg, '.esc_html($perfect_blog_theme_color_second).' 0%, '.esc_html($perfect_blog_theme_color_first).' 120%);
		} }';
	}
	$custom_css .='}';

	$custom_css .='@media screen and (max-width:720px) {';
	if($perfect_blog_theme_color_second != false){
		$custom_css .='.page-template-custom-front-page #header {
		background-color:'.esc_html($perfect_blog_theme_color_second).';
		}';
		}
	$custom_css .='}';

	/*---------------------------Width Layout -------------------*/

	$theme_lay = get_theme_mod( 'perfect_blog_theme_options','Default');
    if($theme_lay == 'Default'){
		$custom_css .='body{';
			$custom_css .='max-width: 100%;';
		$custom_css .='}';
		$custom_css .='.page-template-custom-front-page #header{';
			$custom_css .='width:100%';
		$custom_css .='}';
	}else if($theme_lay == 'Container'){
		$custom_css .='body{';
			$custom_css .='width: 100%;padding-right: 15px;padding-left: 15px;margin-right: auto;margin-left: auto;';
		$custom_css .='}';
		$custom_css .='.page-template-custom-front-page #header{';
			$custom_css .='width:97.7%';
		$custom_css .='}';
		$custom_css .='
		@media screen and (max-width: 1000px) and (min-width: 720px){
		.page-template-custom-front-page #header{';
		$custom_css .='width:96%;';
		$custom_css .='} }';
		$custom_css .='
		@media screen and (max-width: 1024px) and (min-width: 1000px){
		.page-template-custom-front-page #header{';
		$custom_css .='width:97.1%;';
		$custom_css .='} }';
		$custom_css .='
		@media screen and (max-width: 720px){
		.page-template-custom-front-page #header{';
		$custom_css .='width:100%;';
		$custom_css .='} }';
		
	}else if($theme_lay == 'Box Container'){
		$custom_css .='body{';
			$custom_css .='max-width: 1140px; width: 100%; padding-right: 15px; padding-left: 15px; margin-right: auto; margin-left: auto;';
		$custom_css .='}';
		$custom_css .='.page-template-custom-front-page #header{';
			$custom_css .='width:86.4%;';
		$custom_css .='}';	
		$custom_css .='
		@media screen and (max-width: 1000px) and (min-width: 720px){
		.page-template-custom-front-page #header{';
		$custom_css .='width:96%;';
		$custom_css .='} }';
		$custom_css .='
		@media screen and (max-width: 1024px) and (min-width: 1000px){
		.page-template-custom-front-page #header{';
		$custom_css .='width:97%;';
		$custom_css .='} }';
		$custom_css .='
		@media screen and (max-width: 720px){
		.page-template-custom-front-page #header{';
		$custom_css .='width:100%;';
		$custom_css .='} }';
	}

	if( get_theme_mod( 'perfect_blog_author_hide') == false ) {
	 	$custom_css .='.date-section{';
			$custom_css .='float:none; width:100%;';
		$custom_css .='}';
	}