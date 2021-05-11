<?php
/**
 * Business One Page functions and definitions.
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package Business_One_Page
 */

//define theme version
if ( ! defined( 'BUSINESS_ONE_PAGE_THEME_VERSION' ) ) {
	$theme_data = wp_get_theme();	
	define ( 'BUSINESS_ONE_PAGE_THEME_VERSION', $theme_data->get( 'Version' ) );
}

if ( ! function_exists( 'business_one_page_setup' ) ) :
/**
 * Sets up theme defaults and registers support for various WordPress features.
 *
 * Note that this function is hooked into the after_setup_theme hook, which
 * runs before the init hook. The init hook is too late for some features, such
 * as indicating support for post thumbnails.
 */
function business_one_page_setup() {
	/*
	 * Make theme available for translation.
	 * Translations can be filed in the /languages/ directory.
	 * If you're building a theme based on Business One Page, use a find and replace
	 * to change 'business-one-page' to the name of your theme in all the template files.
	 */
	load_theme_textdomain( 'business-one-page', get_template_directory() . '/languages' );
    
	// Add default posts and comments RSS feed links to head.
	add_theme_support( 'automatic-feed-links' );

	/*
	 * Let WordPress manage the document title.
	 * By adding theme support, we declare that this theme does not use a
	 * hard-coded <title> tag in the document head, and expect WordPress to
	 * provide it for us.
	 */
	add_theme_support( 'title-tag' );

	/*
	 * Enable support for Post Thumbnails on posts and pages.
	 *
	 * @link https://developer.wordpress.org/themes/functionality/featured-images-post-thumbnails/
	 */
	add_theme_support( 'post-thumbnails' );

	// This theme uses wp_nav_menu() in one location.
	register_nav_menus( array(
		'primary' => esc_html__( 'Primary', 'business-one-page' ),
	) );

	/*
	 * Switch default core markup for search form, comment form, and comments
	 * to output valid HTML5.
	 */
	add_theme_support( 'html5', array(
		'search-form',
		'gallery',
		'caption',
	) );

	/*
	 * Enable support for Post Formats.
	 * See https://developer.wordpress.org/themes/functionality/post-formats/
	 */
	add_theme_support( 'post-formats', array(
		'aside',
		'image',
		'video',
		'quote',
		'link',
	) );

	// Set up the WordPress core custom background feature.
	add_theme_support( 'custom-background', apply_filters( 'business_custom_background_args', array(
		'default-color' => 'ffffff',
		'default-image' => '',
	) ) );
    
    /* Custom Logo */
    add_theme_support( 'custom-logo', array(
    	'header-text' => array( 'site-title', 'site-description' ),
    ) );
    
    //Custom Image Sizes
    add_image_size( 'business-one-page-post-thumb', 80, 70, true);    
    add_image_size( 'business-one-page-slider', 1400, 577, true);
    add_image_size( 'business-one-page-full', 1170, 480, true);
    add_image_size( 'business-one-page-with-sidebar', 750, 460, true);
    add_image_size( 'business-one-page-cat-blog', 750, 360, true);
    add_image_size( 'business-one-page-blog', 360, 280, true);
    add_image_size( 'business-one-page-testimonial', 111, 111, true);
    add_image_size( 'business-one-page-team', 340, 310, true);
    add_image_size( 'business-one-page-360x340', 360, 340, true);
    add_image_size( 'business-one-page-360x380', 360, 380, true);
    add_image_size( 'business-one-page-360x500', 360, 500, true);
    add_image_size( 'business-one-page-schema', 600, 60, true);

    //WooCommerce Support
    add_theme_support( 'woocommerce' );
}
endif;
add_action( 'after_setup_theme', 'business_one_page_setup' );

/**
 * Set the content width in pixels, based on the theme's design and stylesheet.
 *
 * Priority 0 to make it available to lower priority callbacks.
 *
 * @global int $content_width
 */
function business_one_page_content_width() {
	$GLOBALS['content_width'] = apply_filters( 'business_one_page_content_width', 750 );
}
add_action( 'after_setup_theme', 'business_one_page_content_width', 0 );

/**
* Adjust content_width value according to template.
*
* @return void
*/
function business_one_page_template_redirect_content_width() {

	// Full Width in the absence of sidebar.
	if( is_page() ){
	   $sidebar_layout = business_one_page_sidebar_layout();
       if( ( $sidebar_layout == 'no-sidebar' ) || ! ( is_active_sidebar( 'right-sidebar' ) ) ) $GLOBALS['content_width'] = 1170;
        
	}elseif ( ! ( is_active_sidebar( 'right-sidebar' ) ) ) {
		$GLOBALS['content_width'] = 1170;
	}

}
add_action( 'template_redirect', 'business_one_page_template_redirect_content_width' );

/**
 * Register widget area.
 *
 * @link https://developer.wordpress.org/themes/functionality/sidebars/#registering-a-sidebar
 */
function business_one_page_widgets_init() {
	register_sidebar( array(
		'name'          => esc_html__( 'Right Sidebar', 'business-one-page' ),
		'id'            => 'right-sidebar',
		'description'   => '',
		'before_widget' => '<section id="%1$s" class="widget %2$s">',
		'after_widget'  => '</section>',
		'before_title'  => '<h2 class="widget-title">',
		'after_title'   => '</h2>',
	) );
    
    register_sidebar( array(
		'name'          => esc_html__( 'Footer One', 'business-one-page' ),
		'id'            => 'footer-one',
		'description'   => '',
		'before_widget' => '<section id="%1$s" class="widget %2$s">',
		'after_widget'  => '</section>',
		'before_title'  => '<h2 class="widget-title">',
		'after_title'   => '</h2>',
	) );
    
    register_sidebar( array(
		'name'          => esc_html__( 'Footer Two', 'business-one-page' ),
		'id'            => 'footer-two',
		'description'   => '',
		'before_widget' => '<section id="%1$s" class="widget %2$s">',
		'after_widget'  => '</section>',
		'before_title'  => '<h2 class="widget-title">',
		'after_title'   => '</h2>',
	) );
    
    register_sidebar( array(
		'name'          => esc_html__( 'Footer Three', 'business-one-page' ),
		'id'            => 'footer-three',
		'description'   => '',
		'before_widget' => '<section id="%1$s" class="widget %2$s">',
		'after_widget'  => '</section>',
		'before_title'  => '<h2 class="widget-title">',
		'after_title'   => '</h2>',
	) );
}
add_action( 'widgets_init', 'business_one_page_widgets_init' );

/**
 * Enqueue scripts and styles.
 */
function business_one_page_scripts() {

	$build  = ( defined( 'SCRIPT_DEBUG' ) && SCRIPT_DEBUG ) ? '/build' : '';
    $suffix = ( defined( 'SCRIPT_DEBUG' ) && SCRIPT_DEBUG ) ? '' : '.min';
	
    $query_args = array(
		'family' => 'Source+Sans+Pro:400,400italic,600|Oxygen:400,700',
	);
    
    wp_enqueue_style( 'business-one-page-google-fonts', add_query_arg( $query_args, "//fonts.googleapis.com/css" ) );        
    wp_enqueue_style( 'sidr-style', get_template_directory_uri() . '/css' . $build . '/jquery.sidr.light' . $suffix . '.css' );
    wp_enqueue_style( 'owl-theme-default', get_template_directory_uri(). '/css' . $build . '/owl.theme.default' . $suffix . '.css', array(), '2.2.1' );
    wp_enqueue_style( 'owl-carousel', get_template_directory_uri(). '/css' . $build . '/owl.carousel' . $suffix . '.css', array(), '2.2.1' );
    wp_enqueue_style( 'business-one-page-style', get_stylesheet_uri(), '', BUSINESS_ONE_PAGE_THEME_VERSION );

    wp_enqueue_script( 'all', get_template_directory_uri() . '/js' . $build . '/all' . $suffix . '.js', array( 'jquery' ), '5.3.1', true );
    wp_enqueue_script( 'v4-shims', get_template_directory_uri() . '/js' . $build . '/v4-shims' . $suffix . '.js', array( 'jquery' ), '5.3.1', false );
	wp_enqueue_script( 'masonry' );
    wp_enqueue_script( 'owl-carousel', get_template_directory_uri() . '/js' . $build . '/owl.carousel' . $suffix . '.js', array( 'jquery' ), '2.2.1', true );
    wp_enqueue_script( 'sidr', get_template_directory_uri() . '/js' . $build . '/jquery.sidr' . $suffix . '.js', array('jquery'), '2.2.1', true );
    wp_enqueue_script( 'headroom', get_template_directory_uri() . '/js' . $build . '/headroom' . $suffix . '.js', array('jquery'), '0.7.0', true );
    wp_enqueue_script( 'scrollnav', get_template_directory_uri() . '/js' . $build . '/scroll-nav' . $suffix . '.js', array('jquery'), '3.0.0', true );
    wp_register_script( 'business-one-page-custom', get_template_directory_uri() . '/js' . $build . '/custom' . $suffix . '.js', array('jquery'), BUSINESS_ONE_PAGE_THEME_VERSION, true );
    
    $slider_auto      = get_theme_mod( 'business_one_page_slider_auto', '1' );
    $slider_loop      = get_theme_mod( 'business_one_page_slider_loop', '1' );
    $slider_pager     = get_theme_mod( 'business_one_page_slider_pager', '1' );    
    $slider_animation = get_theme_mod( 'business_one_page_slider_animation', 'slide' );
    $slider_speed     = get_theme_mod( 'business_one_page_slider_speeds', 400 );
    $slider_pause     = get_theme_mod( 'business_one_page_slider_pause', 6000 );
    
    $array = array(
        'auto'      => esc_attr( $slider_auto ),
        'loop'      => esc_attr( $slider_loop ),
        'pager'     => esc_attr( $slider_pager ),
        'animation' => esc_attr( $slider_animation ),
        'speed'     => absint( $slider_speed ),
        'pause'     => absint( $slider_pause ),
        'rtl'       => is_rtl(),
    );
    
    wp_localize_script( 'business-one-page-custom', 'business_one_page_data', $array );
    wp_enqueue_script( 'business-one-page-custom' );
    
	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}
}
add_action( 'wp_enqueue_scripts', 'business_one_page_scripts' );

function business_one_page_admin_scripts() {
	wp_enqueue_style( 'business-one-page-admin-style',get_template_directory_uri().'/inc/css/admin.css', BUSINESS_ONE_PAGE_THEME_VERSION, 'screen' );    
    wp_enqueue_script( 'business-one-page-admin-js', get_template_directory_uri().'/inc/js/customize.js', array( 'jquery' ), BUSINESS_ONE_PAGE_THEME_VERSION, true );
}
add_action( 'customize_controls_enqueue_scripts', 'business_one_page_admin_scripts' );

/**
 * Custom template tags for this theme.
 */
require get_template_directory() . '/inc/template-tags.php';

/**
 * Custom functions that act independently of the theme templates.
 */
require get_template_directory() . '/inc/extras.php';

/**
 * Customizer additions.
 */
require get_template_directory() . '/inc/customizer.php';

/**
 * Load Jetpack compatibility file.
 */
require get_template_directory() . '/inc/jetpack.php';

/**
 * Post Meta Box
 */
require get_template_directory() . '/inc/metabox.php';

/**
 * Widget Recent Post
 */
require get_template_directory() . '/inc/widget-recent-post.php';

/**
 * Widget Popular Post
 */
require get_template_directory() . '/inc/widget-popular-post.php';

/**
 * Widget Social Links
 */
require get_template_directory() . '/inc/widget-social-links.php';

/**
 * Multiple Image Field
 * 
 * @link https://github.com/lucatume/wp-customizer
 */
require get_template_directory() . '/inc/multiimage-custom-control.php';

/**
 * Multi Check Control
*/
require get_template_directory() . '/inc/control-checkbox-multiple.php';

/**
 * Theme Info
*/
require get_template_directory() . '/inc/info.php';

/**
 * Plugin Recommendation
*/
require get_template_directory() . '/inc/tgmpa/recommended-plugins.php';

