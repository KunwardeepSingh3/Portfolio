<?php
/**
 * Sample implementation of the Custom Header feature.
 *
 * You can add an optional custom header image to header.php like so ...
 *
	<?php if ( get_header_image() ) : ?>
	<a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home">
		<img src="<?php header_image(); ?>" width="<?php echo esc_attr( get_custom_header()->width ); ?>" height="<?php echo esc_attr( get_custom_header()->height ); ?>" alt="">
	</a>
	<?php endif; // End header image check. ?>
 *
 * @link https://developer.wordpress.org/themes/functionality/custom-headers/
 *
 * @package biography
 */

/**
 * Set up the WordPress core custom header feature.
 *
 * @uses biography_header_style()
 */
function biography_custom_header_setup() {
	add_theme_support( 'custom-header', apply_filters( 'biography_custom_header_args', array(
		'default-image'          => get_template_directory_uri().'/assets/img/banner.jpg',
		'default-text-color'     => '000000',
		'width'                  => 5472,
		'height'                 => 3648,
		'flex-height'            => true,
	) ) );
}
add_action( 'after_setup_theme', 'biography_custom_header_setup' );