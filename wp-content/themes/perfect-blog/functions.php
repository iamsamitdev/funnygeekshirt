<?php
/**
 * Perfect Blog functions and definitions
 *
 * @package perfect-blog
 */
/**
 * Set the content width based on the theme's design and stylesheet.
 */
 
/* Theme Setup */
if ( ! function_exists( 'perfect_blog_setup' ) ) :

function perfect_blog_setup() {
	
	$GLOBALS['content_width'] = apply_filters( 'perfect_blog_content_width', 640 );

	load_theme_textdomain( 'perfect-blog', get_template_directory() . '/languages' );
	add_theme_support( 'automatic-feed-links' );
	add_theme_support( 'post-thumbnails' );
	add_theme_support( 'woocommerce' );
	add_theme_support( 'title-tag' );
	add_theme_support( 'custom-logo', array(
		'height'      => 250,
		'width'       => 250,
		'flex-width'  => true,
		'flex-height' => true,
	) );

	add_image_size('perfect-blog-homepage-thumb',250,145,true);
    register_nav_menus( array(
		'primary' => __( 'Primary Menu', 'perfect-blog' ),
	) );

	add_theme_support( 'custom-background', array(
		'default-color' => 'f1f1f1'
	) );

	/*
	 * Enable support for Post Formats.
	 *
	 * See: https://codex.wordpress.org/Post_Formats
	 */
	add_theme_support(
		'post-formats', array(
			'image',
			'video',
			'gallery',
			'audio',
		)	
	);
	add_editor_style( array( 'css/editor-style.css', perfect_blog_font_url() ) );

	// Theme Activation Notice
	global $pagenow;
	
	if ( is_admin() && ('themes.php' == $pagenow) && isset( $_GET['activated'] ) ) {
		add_action( 'admin_notices', 'perfect_blog_activation_notice' );
	}
}

endif;
add_action( 'after_setup_theme', 'perfect_blog_setup' );

// Notice after Theme Activation
function perfect_blog_activation_notice() {
	echo '<div class="notice notice-success is-dismissible get-started">';
		echo '<p>'. esc_html__( 'Thank you for choosing ThemeShopy. We are sincerely obliged to offer our best services to you. Please proceed towards welcome page and give us the privilege to serve you.', 'perfect-blog' ) .'</p>';
		echo '<p><a href="'. esc_url( admin_url( 'themes.php?page=perfect_blog_guide' ) ) .'" class="button button-primary">'. esc_html__( 'Click here...', 'perfect-blog' ) .'</a></p>';
	echo '</div>';
}

/* Theme Widgets Setup */
function perfect_blog_widgets_init() {
	register_sidebar( array(
		'name'          => __( 'Blog Sidebar', 'perfect-blog' ),
		'description'   => __( 'Appears on blog page sidebar', 'perfect-blog' ),
		'id'            => 'sidebar-1',
		'before_widget' => '<aside id="%1$s" class="widget %2$s">',
		'after_widget'  => '</aside>',
		'before_title'  => '<h3 class="widget-title">',
		'after_title'   => '</h3>',
	) );

	register_sidebar( array(
		'name'          => __( 'Page Sidebar', 'perfect-blog' ),
		'description'   => __( 'Appears on page sidebar', 'perfect-blog' ),
		'id'            => 'sidebar-2',
		'before_widget' => '<aside id="%1$s" class="widget %2$s">',
		'after_widget'  => '</aside>',
		'before_title'  => '<h3 class="widget-title">',
		'after_title'   => '</h3>',
	) );

	register_sidebar( array(
		'name'          => __( 'Third Column Sidebar', 'perfect-blog' ),
		'description'   => __( 'Appears on page sidebar', 'perfect-blog' ),
		'id'            => 'sidebar-3',
		'before_widget' => '<aside id="%1$s" class="widget %2$s">',
		'after_widget'  => '</aside>',
		'before_title'  => '<h3 class="widget-title">',
		'after_title'   => '</h3>',
	) );

	register_sidebar( array(
		'name'          => __( 'Home Page Sidebar', 'perfect-blog' ),
		'description'   => __( 'Appears on Home Page', 'perfect-blog' ),
		'id'            => 'home-page',
		'before_widget' => '<aside id="%1$s" class="widget %2$s">',
		'after_widget'  => '</aside>',
		'before_title'  => '<h3 class="widget-title">',
		'after_title'   => '</h3>',
	) );

	register_sidebar( array(
		'name'          => __( 'Footer Navigation 1', 'perfect-blog' ),
		'description'   => __( 'Appears on footer', 'perfect-blog' ),
		'id'            => 'footer-1',
		'before_widget' => '<aside id="%1$s" class="widget %2$s">',
		'after_widget'  => '</aside>',
		'before_title'  => '<h3 class="widget-title">',
		'after_title'   => '</h3>',
	) );

	register_sidebar( array(
		'name'          => __( 'Footer Navigation 2', 'perfect-blog' ),
		'description'   => __( 'Appears on footer', 'perfect-blog' ),
		'id'            => 'footer-2',
		'before_widget' => '<aside id="%1$s" class="widget %2$s">',
		'after_widget'  => '</aside>',
		'before_title'  => '<h3 class="widget-title">',
		'after_title'   => '</h3>',
	) );

	register_sidebar( array(
		'name'          => __( 'Footer Navigation 3', 'perfect-blog' ),
		'description'   => __( 'Appears on footer', 'perfect-blog' ),
		'id'            => 'footer-3',
		'before_widget' => '<aside id="%1$s" class="widget %2$s">',
		'after_widget'  => '</aside>',
		'before_title'  => '<h3 class="widget-title">',
		'after_title'   => '</h3>',
	) );

	register_sidebar( array(
		'name'          => __( 'Footer Navigation 4', 'perfect-blog' ),
		'description'   => __( 'Appears on footer', 'perfect-blog' ),
		'id'            => 'footer-4',
		'before_widget' => '<aside id="%1$s" class="widget %2$s">',
		'after_widget'  => '</aside>',
		'before_title'  => '<h3 class="widget-title">',
		'after_title'   => '</h3>',
	) );
}

add_action( 'widgets_init', 'perfect_blog_widgets_init' );

/* Theme Font URL */
function perfect_blog_font_url(){
	$font_url = '';
	$font_family = array();
	$font_family[] = 'PT Sans:300,400,600,700,800,900';
	$font_family[] = 'Roboto:400,700';
	$font_family[] = 'Exo:100,100i,200,200i,300,300i,400,400i,500,500i,600,600i,700,700i,800,800i,900,900i';	
	$font_family[] = 'Open Sans';
	$font_family[] = 'Overpass';
	$font_family[] = 'Montserrat:300,400,600,700,800,900';
	$font_family[] = 'Playball:300,400,600,700,800,900';
	$font_family[] = 'Alegreya:300,400,600,700,800,900';
	$font_family[] = 'Julius Sans One';
	$font_family[] = 'Arsenal';
	$font_family[] = 'Slabo';
	$font_family[] = 'Lato';
	$font_family[] = 'Overpass Mono';
	$font_family[] = 'Source Sans Pro';
	$font_family[] = 'Raleway';
	$font_family[] = 'Merriweather';
	$font_family[] = 'Droid Sans';
	$font_family[] = 'Rubik';
	$font_family[] = 'Lora';
	$font_family[] = 'Ubuntu';
	$font_family[] = 'Cabin';
	$font_family[] = 'Arimo';
	$font_family[] = 'Playfair Display';
	$font_family[] = 'Quicksand';
	$font_family[] = 'Padauk';
	$font_family[] = 'Muli';
	$font_family[] = 'Inconsolata';
	$font_family[] = 'Bitter';
	$font_family[] = 'Pacifico';
	$font_family[] = 'Indie Flower';
	$font_family[] = 'VT323';
	$font_family[] = 'Dosis';
	$font_family[] = 'Frank Ruhl Libre';
	$font_family[] = 'Fjalla One';
	$font_family[] = 'Oxygen';
	$font_family[] = 'Arvo';
	$font_family[] = 'Noto Serif';
	$font_family[] = 'Lobster';
	$font_family[] = 'Crimson Text';
	$font_family[] = 'Yanone Kaffeesatz';
	$font_family[] = 'Anton';
	$font_family[] = 'Libre Baskerville';
	$font_family[] = 'Bree Serif';
	$font_family[] = 'Gloria Hallelujah';
	$font_family[] = 'Josefin Sans';
	$font_family[] = 'Abril Fatface';
	$font_family[] = 'Varela Round';
	$font_family[] = 'Vampiro One';
	$font_family[] = 'Shadows Into Light';
	$font_family[] = 'Cuprum';
	$font_family[] = 'Rokkitt';
	$font_family[] = 'Vollkorn';
	$font_family[] = 'Francois One';
	$font_family[] = 'Orbitron';
	$font_family[] = 'Patua One';
	$font_family[] = 'Acme';
	$font_family[] = 'Satisfy';
	$font_family[] = 'Josefin Slab';
	$font_family[] = 'Quattrocento Sans';
	$font_family[] = 'Architects Daughter';
	$font_family[] = 'Russo One';
	$font_family[] = 'Monda';
	$font_family[] = 'Righteous';
	$font_family[] = 'Lobster Two';
	$font_family[] = 'Hammersmith One';
	$font_family[] = 'Courgette';
	$font_family[] = 'Permanent Marker';
	$font_family[] = 'Cherry Swash';
	$font_family[] = 'Cormorant Garamond';
	$font_family[] = 'Poiret One';
	$font_family[] = 'BenchNine';
	$font_family[] = 'Economica';
	$font_family[] = 'Handlee';
	$font_family[] = 'Cardo';
	$font_family[] = 'Alfa Slab One';
	$font_family[] = 'Averia Serif Libre';
	$font_family[] = 'Cookie';
	$font_family[] = 'Chewy';
	$font_family[] = 'Great Vibes';
	$font_family[] = 'Coming Soon';
	$font_family[] = 'Philosopher';
	$font_family[] = 'Days One';
	$font_family[] = 'Kanit';
	$font_family[] = 'Shrikhand';
	$font_family[] = 'Tangerine';
	$font_family[] = 'IM Fell English SC';
	$font_family[] = 'Boogaloo';
	$font_family[] = 'Bangers';
	$font_family[] = 'Fredoka One';
	$font_family[] = 'Bad Script';
	$font_family[] = 'Volkhov';
	$font_family[] = 'Shadows Into Light Two';
	$font_family[] = 'Marck Script';
	$font_family[] = 'Sacramento';
	$font_family[] = 'Unica One';
	
	$query_args = array(
		'family'	=> rawurlencode(implode('|',$font_family)),
	);
	$font_url = add_query_arg($query_args,'//fonts.googleapis.com/css');
	return $font_url;
}	

/* Theme enqueue scripts */

function perfect_blog_scripts() {
	wp_enqueue_style( 'perfect-blog-font', perfect_blog_font_url(), array() );
	wp_enqueue_style( 'bootstrap', get_template_directory_uri().'/css/bootstrap.css' );
	wp_enqueue_style( 'perfect-blog-basic-style', get_stylesheet_uri() );
	wp_enqueue_style( 'perfect-blog-effect', get_template_directory_uri().'/css/effect.css' );
	wp_enqueue_style( 'font-awesome', get_template_directory_uri().'/css/fontawesome-all.css' );

	// Paragraph
	    $perfect_blog_paragraph_color = get_theme_mod('perfect_blog_paragraph_color', '');
	    $perfect_blog_paragraph_font_family = get_theme_mod('perfect_blog_paragraph_font_family', '');
	    $perfect_blog_paragraph_font_size = get_theme_mod('perfect_blog_paragraph_font_size', '');
	// "a" tag
		$perfect_blog_atag_color = get_theme_mod('perfect_blog_atag_color', '');
	    $perfect_blog_atag_font_family = get_theme_mod('perfect_blog_atag_font_family', '');
	// "li" tag
		$perfect_blog_li_color = get_theme_mod('perfect_blog_li_color', '');
	    $perfect_blog_li_font_family = get_theme_mod('perfect_blog_li_font_family', '');
	// H1
		$perfect_blog_h1_color = get_theme_mod('perfect_blog_h1_color', '');
	    $perfect_blog_h1_font_family = get_theme_mod('perfect_blog_h1_font_family', '');
	    $perfect_blog_h1_font_size = get_theme_mod('perfect_blog_h1_font_size', '');
	// H2
		$perfect_blog_h2_color = get_theme_mod('perfect_blog_h2_color', '');
	    $perfect_blog_h2_font_family = get_theme_mod('perfect_blog_h2_font_family', '');
	    $perfect_blog_h2_font_size = get_theme_mod('perfect_blog_h2_font_size', '');
	// H3
		$perfect_blog_h3_color = get_theme_mod('perfect_blog_h3_color', '');
	    $perfect_blog_h3_font_family = get_theme_mod('perfect_blog_h3_font_family', '');
	    $perfect_blog_h3_font_size = get_theme_mod('perfect_blog_h3_font_size', '');
	// H4
		$perfect_blog_h4_color = get_theme_mod('perfect_blog_h4_color', '');
	    $perfect_blog_h4_font_family = get_theme_mod('perfect_blog_h4_font_family', '');
	    $perfect_blog_h4_font_size = get_theme_mod('perfect_blog_h4_font_size', '');
	// H5
		$perfect_blog_h5_color = get_theme_mod('perfect_blog_h5_color', '');
	    $perfect_blog_h5_font_family = get_theme_mod('perfect_blog_h5_font_family', '');
	    $perfect_blog_h5_font_size = get_theme_mod('perfect_blog_h5_font_size', '');
	// H6
		$perfect_blog_h6_color = get_theme_mod('perfect_blog_h6_color', '');
	    $perfect_blog_h6_font_family = get_theme_mod('perfect_blog_h6_font_family', '');
	    $perfect_blog_h6_font_size = get_theme_mod('perfect_blog_h6_font_size', '');


		$custom_css ='
			p,span{
			    color:'.esc_html($perfect_blog_paragraph_color).'!important;
			    font-family: '.esc_html($perfect_blog_paragraph_font_family).';
			    font-size: '.esc_html($perfect_blog_paragraph_font_size).';
			}
			a{
			    color:'.esc_html($perfect_blog_atag_color).'!important;
			    font-family: '.esc_html($perfect_blog_atag_font_family).';
			}
			li{
			    color:'.esc_html($perfect_blog_li_color).'!important;
			    font-family: '.esc_html($perfect_blog_li_font_family).';
			}
			h1{
			    color:'.esc_html($perfect_blog_h1_color).'!important;
			    font-family: '.esc_html($perfect_blog_h1_font_family).'!important;
			    font-size: '.esc_html($perfect_blog_h1_font_size).'!important;
			}
			h2{
			    color:'.esc_html($perfect_blog_h2_color).'!important;
			    font-family: '.esc_html($perfect_blog_h2_font_family).'!important;
			    font-size: '.esc_html($perfect_blog_h2_font_size).'!important;
			}
			h3{
			    color:'.esc_html($perfect_blog_h3_color).'!important;
			    font-family: '.esc_html($perfect_blog_h3_font_family).'!important;
			    font-size: '.esc_html($perfect_blog_h3_font_size).'!important;
			}
			h4{
			    color:'.esc_html($perfect_blog_h4_color).'!important;
			    font-family: '.esc_html($perfect_blog_h4_font_family).'!important;
			    font-size: '.esc_html($perfect_blog_h4_font_size).'!important;
			}
			h5{
			    color:'.esc_html($perfect_blog_h5_color).'!important;
			    font-family: '.esc_html($perfect_blog_h5_font_family).'!important;
			    font-size: '.esc_html($perfect_blog_h5_font_size).'!important;
			}
			h6{
			    color:'.esc_html($perfect_blog_h6_color).'!important;
			    font-family: '.esc_html($perfect_blog_h6_font_family).'!important;
			    font-size: '.esc_html($perfect_blog_h6_font_size).'!important;
			}';
		wp_add_inline_style( 'perfect-blog-basic-style',$custom_css );

	wp_enqueue_script( 'SmoothScroll-jquery', get_template_directory_uri() . '/js/SmoothScroll.js', array('jquery') );
	wp_enqueue_script( 'perfect-blog-customscripts-jquery', get_template_directory_uri() . '/js/custom.js', array('jquery') );
	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}
	wp_enqueue_script( 'bootstrap', get_template_directory_uri() . '/js/bootstrap.js', array('jquery') );
	wp_enqueue_script( 'jquery-superfish', get_template_directory_uri() . '/js/jquery.superfish.js', array('jquery') ,'',true);
	require get_parent_theme_file_path( '/inc/ts-color-pallete.php' );
	wp_add_inline_style( 'perfect-blog-basic-style',$custom_css );

	wp_enqueue_style('perfect-blog-ie', get_template_directory_uri().'/css/ie.css', array('perfect-blog-basic-style'));
	wp_style_add_data( 'perfect-blog-ie', 'conditional', 'IE' );
}
add_action( 'wp_enqueue_scripts', 'perfect_blog_scripts' );

define('PERFECT_BLOG_BUY_NOW','https://www.themeshopy.com/themes/premium-wordpress-blog-theme/','perfect-blog');
define('PERFECT_BLOG_LIVE_DEMO','https://themeshopy.com/perfect-blog/','perfect-blog');
define('PERFECT_BLOG_PRO_DOC','https://themeshopy.com/demo/docs/perfect-blog-pro/','perfect-blog');
define('PERFECT_BLOG_FREE_DOC','https://themeshopy.com/demo/docs/free-perfect-blog/','perfect-blog');
define('PERFECT_BLOG_CONTACT','https://wordpress.org/support/theme/perfect-blog/','perfect-blog');
define('PERFECT_BLOG_CREDIT','https://www.themeshopy.com/themes/free-wordpress-blog-theme/','perfect-blog');

if ( ! function_exists( 'perfect_blog_credit' ) ) {
	function perfect_blog_credit(){
		echo "<a href=".esc_url(PERFECT_BLOG_CREDIT).">".esc_html__('Blog WordPress Theme','perfect-blog')."</a>";
	}
}

function perfect_blog_sanitize_dropdown_pages( $page_id, $setting ) {
  // Ensure $input is an absolute integer.
  $page_id = absint( $page_id );
  // If $page_id is an ID of a published page, return it; otherwise, return the default.
  return ( 'publish' == get_post_status( $page_id ) ? $page_id : $setting->default );
}

/*radio button sanitization*/
 function perfect_blog_sanitize_choices( $input, $setting ) {
    global $wp_customize; 
    $control = $wp_customize->get_control( $setting->id ); 
    if ( array_key_exists( $input, $control->choices ) ) {
        return $input;
    } else {
        return $setting->default;
    }
}
//* Excerpt Limit Begin */
function perfect_blog_string_limit_words($string, $word_limit) {
	$words = explode(' ', $string, ($word_limit + 1));
	if(count($words) > $word_limit)
	array_pop($words);
	return implode(' ', $words);
}
// Change number or products per row to 3
add_filter('loop_shop_columns', 'perfect_blog_loop_columns');
	if (!function_exists('perfect_blog_loop_columns')) {
		function perfect_blog_loop_columns() {
	return 3; // 3 products per row
	}
}

/* Custom header additions. */
require get_template_directory() . '/inc/custom-header.php';

/* Custom template tags for this theme. */
require get_template_directory() . '/inc/template-tags.php';

/* Customizer additions. */
require get_template_directory() . '/inc/customizer.php';
/* admin file. */
require get_template_directory() . '/inc/admin/admin.php';