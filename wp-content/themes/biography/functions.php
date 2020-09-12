<?php
/**
 * Biography functions and definitions.
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package Biography
 */

/**
 * require biography int.
 */
/**
 * Implement the core functions
 */
require trailingslashit( get_template_directory() ).'inc/init.php';


if ( ! function_exists( 'biography_setup' ) ) :
/**
 * Sets up theme defaults and registers support for various WordPress features.
 *
 * Note that this function is hooked into the after_setup_theme hook, which
 * runs before the init hook. The init hook is too late for some features, such
 * as indicating support for post thumbnails.
 */
function biography_setup() {
	/*
	 * Make theme available for translation.
	 * Translations can be filed in the /languages/ directory.
	 * If you're building a theme based on Biography, use a find and replace
	 * to change 'biography' to the name of your theme in all the template files.
	 */
	load_theme_textdomain( 'biography', get_template_directory() . '/languages' );

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
		'primary' => esc_html__( 'Primary Menu', 'biography' ),
		'social' => esc_html__( 'Social Menu', 'biography' ),
	) );

	/*
	 * Switch default core markup for search form, comment form, and comments
	 * to output valid HTML5.
	 */
	add_theme_support( 'html5', array(
		'search-form',
		'comment-form',
		'comment-list',
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
	add_theme_support( 'custom-background', apply_filters( 'biography_custom_background_args', array(
		'default-color' => 'ffffff',
		'default-image' => '',
	) ) );
	if ( function_exists( 'has_custom_logo' ) ) {
			/**
			* Setup Custom Logo Support for theme
			* Supported from WordPress version 4.5 onwards
			* More Info: https://make.wordpress.org/core/2016/03/10/custom-logo/
			*/
			add_theme_support( 'custom-logo' );
		}
	


	/*woocommerce support*/
	add_theme_support( 'woocommerce' );
	if ( class_exists( 'WooCommerce' ) ) {
    	global $woocommerce;

    	if( version_compare( $woocommerce->version, '3.0.0', ">=" ) ) {
      		add_theme_support( 'wc-product-gallery-zoom' );
			add_theme_support( 'wc-product-gallery-lightbox' );
			add_theme_support( 'wc-product-gallery-slider' );
		}
  	}

  	// Gutenberg support
	add_theme_support( 'editor-color-palette', array(
       	array(
			'name' => esc_html__( 'Blue', 'biography' ),
			'slug' => 'blue',
			'color' => '#2c7dfa',
       	),
       	array(
           	'name' => esc_html__( 'Green', 'biography' ),
           	'slug' => 'green',
           	'color' => '#07d79c',
       	),
       	array(
           	'name' => esc_html__( 'Orange', 'biography' ),
           	'slug' => 'orange',
           	'color' => '#ff8737',
       	),
       	array(
           	'name' => esc_html__( 'Black', 'biography' ),
           	'slug' => 'black',
           	'color' => '#2f3633',
       	),
       	array(
           	'name' => esc_html__( 'Grey', 'biography' ),
           	'slug' => 'grey',
           	'color' => '#82868b',
       	),
   	));

	add_theme_support( 'align-wide' );
	add_theme_support( 'editor-font-sizes', array(
	   	array(
	       	'name' => esc_html__( 'small', 'biography' ),
	       	'shortName' => esc_html__( 'S', 'biography' ),
	       	'size' => 12,
	       	'slug' => 'small'
	   	),
	   	array(
	       	'name' => esc_html__( 'regular', 'biography' ),
	       	'shortName' => esc_html__( 'M', 'biography' ),
	       	'size' => 16,
	       	'slug' => 'regular'
	   	),
	   	array(
	       	'name' => esc_html__( 'larger', 'biography' ),
	       	'shortName' => esc_html__( 'L', 'biography' ),
	       	'size' => 36,
	       	'slug' => 'larger'
	   	),
	   	array(
	       	'name' => esc_html__( 'huge', 'biography' ),
	       	'shortName' => esc_html__( 'XL', 'biography' ),
	       	'size' => 48,
	       	'slug' => 'huge'
	   	)
	));
	add_theme_support('editor-styles');
	add_theme_support( 'wp-block-styles' );
}
endif; // biography_setup
add_action( 'after_setup_theme', 'biography_setup' );

function biography_logo_migrate() {
	$ver = get_theme_mod( 'logo_version', false );

	// Return if update has already been run
	if ( version_compare( $ver, '2' ) >= 0 ) {
		return;
	}

	/**
	 * Get Theme Options Values
	 */
	$options = get_theme_mod('biography-options');

	// If a logo has been set previously, update to use logo feature introduced in WordPress 4.5
	if ( function_exists( 'the_custom_logo' ) ) {
		if( isset( $options['biography-logo']) && '' != $options['biography-logo'] ) {
			// Since previous logo was stored a URL, convert it to an attachment ID
			$logo = attachment_url_to_postid( $options['biography-logo'] );

			if ( is_int( $logo ) ) {
				set_theme_mod( 'custom_logo', $logo );
			}
		}

  		// Update to match logo_version so that script is not executed continously
		set_theme_mod( 'logo_version', '2' );
	}

}
add_action( 'after_setup_theme', 'biography_logo_migrate' );

/**
 * Register widget area.
 *
 * @link https://developer.wordpress.org/themes/functionality/sidebars/#registering-a-sidebar
 */
function biography_widgets_init() {
	register_sidebar( array(
		'name'          => esc_html__( 'Sidebar', 'biography' ),
		'id'            => 'sidebar-1',
		'description'   => '',
		'before_widget' => '<aside id="%1$s" class="widget %2$s">',
		'after_widget'  => '</aside>',
		'before_title'  => '<h2 class="widget-title">',
		'after_title'   => '</h2>',
	) );
}
add_action( 'widgets_init', 'biography_widgets_init' );

/**
 * Set the content width in pixels, based on the theme's design and stylesheet.
 *
 * Priority 0 to make it available to lower priority callbacks.
 *
 * @global int $content_width
 */
function biography_content_width() {
	$GLOBALS['content_width'] = apply_filters( 'biography_content_width', 640 );
}
add_action( 'after_setup_theme', 'biography_content_width', 0 );
	
/**
 * Enqueue scripts and styles.
 */
function biography_scripts() {
	global $biography_customizer_saved_options;
	/*Bootstrap css*/
    wp_enqueue_style( 'bootstrap', get_template_directory_uri() . '/assets/others/bootstrap/css/bootstrap.css', array(), '3.3.4' );/*added*/

	/*google font*/
	$biography_font_family_site_identity = $biography_customizer_saved_options['biography-font-family-site-identity'];
	$biography_font_family_h1_h6 = $biography_customizer_saved_options['biography-font-family-h1-h6'];

	if( $biography_font_family_h1_h6 == $biography_font_family_site_identity ){
		wp_enqueue_style( 'biography-googleapis', '//fonts.googleapis.com/css?family='.$biography_font_family_h1_h6.'', array(), '' );/*added*/
	}
	else{
		wp_enqueue_style( 'biography-googleapis-site-identity', '//fonts.googleapis.com/css?family='.$biography_font_family_site_identity.'', array(), '' );/*added*/
		wp_enqueue_style( 'biography-googleapis-h1-h6', '//fonts.googleapis.com/css?family='.$biography_font_family_h1_h6.'', array(), '' );/*added*/
	}
	/*body*/
    wp_enqueue_style( 'biography-googleapis', '//fonts.googleapis.com/css?family=Raleway:400,300,600,700', array(), '' );/*added*/

	/*Font-Awesome-master*/
	wp_enqueue_style( 'fontawesome', get_template_directory_uri() . '/assets/others/Font-Awesome/css/font-awesome.min.css', array(), '4.4.0' );/*added*/

    /*blocks style*/
	wp_enqueue_style('biography-blocks', get_template_directory_uri() . '/assets/css/blocks.min.css');

    /*main style*/
    wp_enqueue_style( 'biography-style', get_stylesheet_uri() );

    /*jquery start*/
	wp_enqueue_script('jquery-easing', get_template_directory_uri() . '/assets/others/jquery.easing/jquery.easing.js', array('jquery'), '0.3.6', 1);
	wp_enqueue_script('bootstrap', get_template_directory_uri() . '/assets/others/bootstrap/js/bootstrap.min.js', array('jquery'), '3.3.5', 1);
	wp_enqueue_script('biography-custom', get_template_directory_uri() . '/assets/js/biography-custom.js', array('jquery'), '1.0.1', 1);

    wp_enqueue_script( 'biography-navigation', get_template_directory_uri() . '/assets/js/navigation.js', array(), '20120206', true );

    wp_enqueue_script( 'biography-skip-link-focus-fix', get_template_directory_uri() . '/assets/js/skip-link-focus-fix.js', array(), '20130115', true );

	// Load the html5 shiv.
	wp_enqueue_script( 'html5', get_template_directory_uri() . '/assets/others/html5shiv/html5shiv.min.js', array(), '3.7.3' );
	wp_script_add_data( 'html5', 'conditional', 'lt IE 9' );

	// Load the respond js.
	wp_enqueue_script( 'respond', get_template_directory_uri() . '/assets/others/respond/respond.min.js', array(), '1.4.2' );
	wp_script_add_data( 'respond', 'conditional', 'lt IE 9' );

    if ( is_singular() && comments_open() && get_option( 'thread_comments' ) && !(is_front_page()) ) {
        wp_enqueue_script( 'comment-reply' );
    }
}
add_action( 'wp_enqueue_scripts', 'biography_scripts' );

/**
 * Enqueue editor styles for Gutenberg
 *
 * @since Biography 1.0.0
 */
function biography_block_editor_styles() {
	// Block styles.
	wp_enqueue_style( 'biography-block-editor-style', get_theme_file_uri( '/assets/css/editor-blocks.min.css' ) );
}
add_action( 'enqueue_block_editor_assets', 'biography_block_editor_styles' );

/**
 * Implement the Custom Header feature.
 */
require get_template_directory() . '/inc/custom-header.php';
/**
 * Custom template tags for this theme.
 */
require trailingslashit( get_template_directory() ).'inc/template-tags.php';

/**
 * Custom functions that act independently of the theme templates.
 */
require trailingslashit( get_template_directory() ).'inc/extras.php';

/**
 * Load Jetpack compatibility file.
 */
require trailingslashit( get_template_directory() ).'inc/jetpack.php';

require trailingslashit( get_template_directory() ).'inc/hooks/wp-head.php';