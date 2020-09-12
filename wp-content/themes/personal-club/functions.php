<?php                   
/**
 * Personal Club functions and definitions
 *
 * @package Personal Club
 */

/**
 * Set the content width based on the theme's design and stylesheet.
 */

if ( ! function_exists( 'personal_club_setup' ) ) :
/**
 * Sets up theme defaults and registers support for various WordPress features.
 *
 * Note that this function is hooked into the after_setup_theme hook, which runs
 * before the init hook. The init hook is too late for some features, such as indicating
 * support post thumbnails.  
 */
function personal_club_setup() {		
	global $content_width;   
    if ( ! isset( $content_width ) ) {
        $content_width = 670; /* pixels */
    }	

	load_theme_textdomain( 'personal-club', get_template_directory() . '/languages' );
	add_theme_support( 'automatic-feed-links' );
	add_theme_support('woocommerce');
	add_theme_support('html5');
	add_theme_support( 'post-thumbnails' );	
	add_theme_support( 'title-tag' );	
	add_theme_support( 'custom-logo', array(
		'height'      => 60,
		'width'       => 160,
		'flex-height' => true,
	) );	
	add_theme_support( 'custom-background', array(
		'default-color' => 'ffffff'
	) );
	register_nav_menus( array(
		'primary' => __( 'Primary Menu', 'personal-club' ),	
		'footer' => __( 'Footer Menu', 'personal-club' ),											
	) );
	add_editor_style( 'editor-style.css' );
} 
endif; // personal_club_setup
add_action( 'after_setup_theme', 'personal_club_setup' );
function personal_club_widgets_init() { 	
	
	register_sidebar( array(
		'name'          => __( 'Blog Sidebar', 'personal-club' ),
		'description'   => __( 'Appears on blog page sidebar', 'personal-club' ),
		'id'            => 'sidebar-1',
		'before_widget' => '<aside id="%1$s" class="widget %2$s">',
		'after_widget'  => '</aside>',
		'before_title'  => '<h3 class="widget-title">',
		'after_title'   => '</h3>',
	) );
	
	register_sidebar( array(
		'name'          => __( 'Header Widget', 'personal-club' ),
		'description'   => __( 'Appears on the site header', 'personal-club' ),
		'id'            => 'header-widget',
		'before_widget' => '<aside id="%1$s" class="headerwidget %2$s">',
		'after_widget'  => '</aside>',
		'before_title'  => '<h3 class="header-title">',
		'after_title'   => '</h3>',
	) );
	
	register_sidebar( array(
		'name'          => __( 'Footer Widget 1', 'personal-club' ),
		'description'   => __( 'Appears on footer', 'personal-club' ),
		'id'            => 'footer-widget-1',
		'before_widget' => '<div id="%1$s" class="widget %2$s">',
		'after_widget'  => '</div>',
		'before_title'  => '<h5>',
		'after_title'   => '</h5>',
	) );
	
	register_sidebar( array(
		'name'          => __( 'Footer Widget 2', 'personal-club' ),
		'description'   => __( 'Appears on footer', 'personal-club' ),
		'id'            => 'footer-widget-2',
		'before_widget' => '<div id="%1$s" class="widget %2$s">',
		'after_widget'  => '</div>',
		'before_title'  => '<h5>',
		'after_title'   => '</h5>',
	) );
	
	register_sidebar( array(
		'name'          => __( 'Footer Widget 3', 'personal-club' ),
		'description'   => __( 'Appears on footer', 'personal-club' ),
		'id'            => 'footer-widget-3',
		'before_widget' => '<div id="%1$s" class="widget %2$s">',
		'after_widget'  => '</div>',
		'before_title'  => '<h5>',
		'after_title'   => '</h5>',
	) );
	
	register_sidebar( array(
		'name'          => __( 'Footer Widget 4', 'personal-club' ),
		'description'   => __( 'Appears on footer', 'personal-club' ),
		'id'            => 'footer-widget-4',
		'before_widget' => '<div id="%1$s" class="widget %2$s">',
		'after_widget'  => '</div>',
		'before_title'  => '<h5>',
		'after_title'   => '</h5>',
	) );
	
}
add_action( 'widgets_init', 'personal_club_widgets_init' );


function personal_club_font_url(){
		$font_url = '';		
		
		/* Translators: If there are any character that are not
		* supported by Roboto, trsnalate this to off, do not
		* translate into your own language.
		*/
		$roboto = _x('on','Roboto:on or off','personal-club');	
		
		/* Translators: If there are any character that are not
		* supported by Roboto Condensed, trsnalate this to off, do not
		* translate into your own language.
		*/
		$robotocondensed = _x('on','Roboto Condensed:on or off','personal-club');		
		
		    if('off' !== $roboto || 'off' !== $robotocondensed ){
			    $font_family = array();			
				
			if('off' !== $roboto){
				$font_family[] = 'Roboto:300,400,700';
			}
			
			if('off' !== $robotocondensed){
				$font_family[] = 'Roboto Condensed:300,400,700';
			}		
						
			$query_args = array(
				'family'	=> urlencode(implode('|',$font_family)),
			);
			
			$font_url = add_query_arg($query_args,'//fonts.googleapis.com/css');
		}
		
	return $font_url;
	}


function personal_club_scripts() {
	wp_enqueue_style('personal-club-font', personal_club_font_url(), array());
	wp_enqueue_style( 'personal-club-basic-style', get_stylesheet_uri() );	
	wp_enqueue_style( 'nivo-slider', get_template_directory_uri()."/css/nivo-slider.css" );
	wp_enqueue_style( 'fontawesome-all-style', get_template_directory_uri().'/fontsawesome/css/fontawesome-all.css' );
	wp_enqueue_style( 'personal-club-responsive', get_template_directory_uri()."/css/responsive.css" );
	wp_enqueue_script( 'jquery-nivo-slider', get_template_directory_uri() . '/js/jquery.nivo.slider.js', array('jquery') );
	wp_enqueue_script( 'personal-club-editable', get_template_directory_uri() . '/js/editable.js' );
	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}
}
add_action( 'wp_enqueue_scripts', 'personal_club_scripts' );

function personal_club_ie_stylesheet(){
	// Load the Internet Explorer specific stylesheet.
	wp_enqueue_style('personal-club-ie', get_template_directory_uri().'/css/ie.css', array( 'personal-club-style' ), '18022019' );
	wp_style_add_data('personal-club-ie','conditional','lt IE 10');
	
	// Load the Internet Explorer 8 specific stylesheet.
	wp_enqueue_style( 'personal-club-ie8', get_template_directory_uri() . '/css/ie8.css', array( 'personal-club-style' ), '18022019' );
	wp_style_add_data( 'personal-club-ie8', 'conditional', 'lt IE 9' );

	// Load the Internet Explorer 7 specific stylesheet.
	wp_enqueue_style( 'personal-club-ie7', get_template_directory_uri() . '/css/ie7.css', array( 'personal-club-style' ), '18022019' );
	wp_style_add_data( 'personal-club-ie7', 'conditional', 'lt IE 8' );	
	}
add_action('wp_enqueue_scripts','personal_club_ie_stylesheet');

define('PERSONAL_CLUB_THEME_DOC','https://gracethemes.com/documentation/personal-doc/#homepage-lite','personal-club');
define('PERSONAL_CLUB_PROTHEME_URL','https://gracethemes.com/themes/personal-wordpress-theme/','personal-club');
define('PERSONAL_CLUB_LIVE_DEMO','https://gracethemes.com/demo/personal/','personal-club');

//Custom Excerpt length.
function personal_club_excerpt_length( $length ) {
	return 60;
}
add_filter( 'excerpt_length', 'personal_club_excerpt_length', 999 );



//Logo Options
if ( ! function_exists( 'personal_club_the_custom_logo' ) ) :
/**
 * Displays the optional custom logo.
 *
 * Does nothing if the custom logo is not available.
 *
 */
function personal_club_the_custom_logo() {
	if ( function_exists( 'the_custom_logo' ) ) {
		the_custom_logo();
	}
}
endif;

/**
 * Customize Pro included.
 */
require_once get_template_directory() . '/customize-pro/example-1/class-customize.php';

/**
 * Implement the Custom Header feature.
 */
require get_template_directory() . '/inc/custom-header.php';

/**
 * Custom template tags for this theme.
 */
require get_template_directory() . '/inc/template-tags.php';

/**
 * Custom template for about theme.
 */
if ( is_admin() ) { 
require get_template_directory() . '/inc/about-themes.php';
}

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