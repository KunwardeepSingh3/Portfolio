<?php
/*site identities sections*/
$biography_customizer_defaults['biography-logo'] = '';
$biography_customizer_defaults['biography-header-image'] = get_template_directory_uri().'/assets/img/banner.jpg';
$biography_customizer_defaults['biography-header-contact-url'] = '';
$biography_customizer_defaults['biography-header-resume-url'] = '';
$biography_customizer_defaults['biography-enable-social-icons'] = '';

/*color section*/
$biography_customizer_defaults['biography-h1-h6-color'] = '#212121';
$biography_customizer_defaults['biography-link-color'] = '#212121';
$biography_customizer_defaults['biography-link-hover-color'] = '#ff0000';
$biography_customizer_defaults['biography-site-identity-color'] = '#ffffff';
$biography_customizer_defaults['biography-color-reset-settings'] = '';
/*feature slider section*/

/*Feature Text Slider*/
$biography_customizer_defaults['biography-fs-enable'] = 1;
$biography_customizer_defaults['biography-fs-page-1'] = 0;
$biography_customizer_defaults['biography-fs-page-2'] = 0;
$biography_customizer_defaults['biography-fs-page-3'] = 0;

/*google fonts defaults*/
$biography_customizer_defaults['biography-font-family-site-identity'] = 'Raleway:400,300,500,600,700,900';
$biography_customizer_defaults['biography-font-family-h1-h6'] = 'Raleway:400,300,500,600,700,900';

/*theme options*/
$biography_customizer_defaults['biography-default-layout'] = 'right-sidebar';
$biography_customizer_defaults['biography-archive-layout'] = 'excerpt';

$biography_customizer_defaults['biography-copyright-text'] = esc_html__('Copyright &copy; All right reserved','biography');
$biography_customizer_defaults['biography-custom-css'] = '';
$biography_customizer_defaults['biography-enable-breadcrumb'] = 0;
$biography_customizer_defaults['biography-enable-back-to-top'] = 0;
$biography_customizer_defaults['biography-pagination-options'] = 'numeric';
$biography_customizer_defaults['biography-excerpt-length'] = '50';

/*service section*/
$biography_customizer_defaults['biography-home-service-enable'] = 1;
$biography_customizer_defaults['biography-home-service-page-1'] = 0;
$biography_customizer_defaults['biography-home-service-page-2'] = 0;
$biography_customizer_defaults['biography-home-service-page-3'] = 0;
$biography_customizer_defaults['biography-home-service-icon-1'] = 'fa-desktop';
$biography_customizer_defaults['biography-home-service-icon-2'] = 'fa-camera-retro';
$biography_customizer_defaults['biography-home-service-icon-3'] = 'fa-rocket';

/*Review Section*/
$biography_customizer_defaults['biography-home-review-enable'] = 1;
$biography_customizer_defaults['biography-home-about-page-id'] = 0;
$biography_customizer_defaults['biography-home-about-read-more'] = esc_html__( "Read More",'biography' );
// $biography_customizer_defaults['biography-home-testimonial-title'] = esc_html__( "Client's testimonial",'biography' );
// $biography_customizer_defaults['biography-home-testimonial-page-1'] = 0;
// $biography_customizer_defaults['biography-home-testimonial-page-2'] = 0;
// $biography_customizer_defaults['biography-home-testimonial-page-3'] = 0;

/*History Section*/
$biography_customizer_defaults['biography-home-history-enable'] = 1;
$biography_customizer_defaults['biography-home-history-title'] = esc_html__( "EDUCATION & JOBS",'biography' );;
$biography_customizer_defaults['biography-home-history-duration'] = '';
$biography_customizer_defaults['biography-home-history-page-icon'] = 'fa-desktop';
$biography_customizer_defaults['biography-home-history-duration-1'] = '';
$biography_customizer_defaults['biography-home-history-duration-2'] = '';
$biography_customizer_defaults['biography-home-history-duration-3'] = '';
$biography_customizer_defaults['biography-home-history-duration-4'] = '';
$biography_customizer_defaults['biography-home-history-page-1'] = 0;
$biography_customizer_defaults['biography-home-history-page-2'] = 0;
$biography_customizer_defaults['biography-home-history-page-3'] = 0;
$biography_customizer_defaults['biography-home-history-page-4'] = 0;
$biography_customizer_defaults['biography-home-history-icon-1'] = 'fa-desktop';
$biography_customizer_defaults['biography-home-history-icon-2'] = 'fa-camera-retro';
$biography_customizer_defaults['biography-home-history-icon-3'] = 'fa-rocket';
$biography_customizer_defaults['biography-home-history-icon-4'] = 'fa-rocket';


/*google fonts array*/
$biography_google_fonts = array(
    'Raleway:400,300,500,600,700,900' => esc_html__( 'Raleway','biography' ),
    'Inconsolata:400,700' => esc_html__( 'Inconsolata','biography' ),
    'Yanone+Kaffeesatz:400,400italic,600,700' => esc_html__( 'Yanone Kaffeesatz','biography' ),
    'Francois+One:400,400italic,600,700' => esc_html__( 'Francois One','biography' ),
    'Architects+Daughter:400' => esc_html__( 'Architects Daughter','biography' ),
    'Crete+Round:400' => esc_html__( 'Crete Round','biography' ),
    'Lobster+Two:400,700' => esc_html__( 'Lobster Two','biography' ),
    'Varela:400' => esc_html__( 'Varela','biography' ),
    'Boogaloo:400' => esc_html__( 'Boogaloo','biography' ),
    'Patrick+Hand:400' => esc_html__( 'Patrick Hand','biography' ),
    'Homenaje:400' => esc_html__( 'Homenaje','biography' ),
);
/**
 * Reset color settings to default
 * @param  $input
 *
 * @since biography 1.0
 */
if ( ! function_exists( 'biography_color_reset' ) ) :
    function biography_color_reset() {

        global $biography_customizer_defaults;
        /*getting fields*/
        $biography_customizer_saved_values = biography_get_all_options();

        if ( $biography_customizer_saved_values['biography-color-reset-settings'] == 1 ) {

            /*setting fields */
            $biography_customizer_saved_values['biography-h1-h6-color'] = $biography_customizer_defaults['biography-h1-h6-color'];
            $biography_customizer_saved_values['biography-link-color'] = $biography_customizer_defaults['biography-link-color'];
            $biography_customizer_saved_values['biography-link-hover-color'] = $biography_customizer_defaults['biography-link-hover-color'];
            $biography_customizer_saved_values['biography-site-identity-color'] = $biography_customizer_defaults['biography-site-identity-color'];

            $biography_customizer_saved_values['biography-color-reset-settings'] = '';

            /*resetting fields*/
            biography_reset_options( $biography_customizer_saved_values );
        }
        else {
            return false;
        }
    }
endif;
add_action( 'customize_save_after','biography_color_reset' );

if ( ! function_exists( 'biography_sanitize_checkbox' ) ) :
    /**
     * Function to sanitize checkbox
     *
     * @access public
     * @since 1.1
     *
     * @param $biography_input
     * @return boolean
     *
     */
    function biography_sanitize_checkbox( $checked ) {
        // Boolean check.
        return ( ( isset( $checked ) && true == $checked ) ? true : false );
    }

endif;
if ( ! function_exists( 'biography_sanitize_hex_color' ) ) :
    /**
     * Function to sanitize hex color
     *
     * @access public
     * @since 1.1
     *
     * @param $biography_input
     * @return string
     *
     */
    function biography_sanitize_hex_color( $biography_hex_color, $biography_setting ) {
        // Sanitize $biography_hex_color as a hex value without the hash prefix.
        $biography_hex_color = sanitize_hex_color( $biography_hex_color );

        // If $biography_hex_color is a valid hex value, return it; otherwise, return the default.
        return ( null != $biography_hex_color ? $biography_hex_color : $biography_setting->default );
    }

endif;

if ( ! function_exists( 'biography_sanitize_number' ) ) :
    /**
     * Function to sanitize number
     *
     * @access public
     * @since 1.1
     *
     * @param $biography_input
     * @param $biography_setting
     * @return int || float || numeric value
     *
     */
    function biography_sanitize_number ( $biography_input, $biography_setting ) {
        $biography_sanitize_text = sanitize_text_field( $biography_input );

        // If the input is an number, return it; otherwise, return the default
        return ( is_numeric( $biography_sanitize_text ) ? $biography_sanitize_text : $biography_setting->default );
    }

endif;

if ( ! function_exists( 'biography_sanitize_select' ) ) :
    /**
     * Function to sanitize select
     *
     * @access public
     * @since 1.0.9
     *
     * @param $biography_input
     * @param $biography_setting
     * @return string
     *
     */
    function biography_sanitize_select( $biography_input, $biography_setting ) {

        // Ensure input is a slug.
        $biography_input = sanitize_key( $biography_input );

        // Get list of choices from the control associated with the setting.
        $biography_choices = $biography_setting->manager->get_control( $biography_setting->id )->choices;

        // If the input is a valid key, return it; otherwise, return the default.
        return ( array_key_exists( $biography_input, $biography_choices ) ? $biography_input : $biography_setting->default );
    }

endif;

if ( ! function_exists( 'biography_sanitize_select_fonts' ) ) :
    /**
     * Function to sanitize select fonts
     *
     * @access public
     * @since 1.1.4
     *
     * @param $biography_input
     * @param $biography_setting
     * @return string
     *
     */
    function biography_sanitize_select_fonts( $biography_input, $biography_setting ) {

        // Ensure input is a slug.
        $biography_input = sanitize_text_field( $biography_input );

        // Get list of choices from the control associated with the setting.
        $biography_choices = $biography_setting->manager->get_control( $biography_setting->id )->choices;

        // If the input is a valid key, return it; otherwise, return the default.
        return ( array_key_exists( $biography_input, $biography_choices ) ? $biography_input : $biography_setting->default );
    }

endif;

if ( ! function_exists( 'biography_sanitize_post' ) ) :
    /**
     * Function to sanitize post/page/post type
     *
     * @access public
     * @since 1.1
     *
     * @param int $biography_post_id
     * @param object $biography_setting
     * @return int || float
     *
     */
    function biography_sanitize_post( $biography_post_id, $biography_setting ) {
        // Ensure $biography_post_id is an absolute integer.
        $biography_post_id = absint( $biography_post_id );

        // If $biography_post_id is an ID of a published page, return it; otherwise, return the default.
        return ( 'publish' == get_post_status( $biography_post_id ) ? $biography_post_id : $biography_setting->default );
    }

endif;

if ( ! function_exists( 'biography_sanitize_image' ) ) :
    /**
     * Function to sanitize image
     *
     * @access public
     * @since 1.1
     *
     * @param $biography_image
     * @return string
     *
     */
    function biography_sanitize_image( $biography_image, $biography_setting ) {
        /*
         * Array of valid image file types.
         *
         * The array includes image mime types that are included in wp_get_mime_types()
         */
        $biography_mimes = array(
            'jpg|jpeg|jpe' => 'image/jpeg',
            'gif'          => 'image/gif',
            'png'          => 'image/png',
            'bmp'          => 'image/bmp',
            'tif|tiff'     => 'image/tiff',
            'ico'          => 'image/x-icon'
        );
        // Return an array with file extension and mime_type.
        $biography_file = wp_check_filetype( $biography_image, $biography_mimes );
        // If $biography_image has a valid mime_type, return it; otherwise, return the default.
        return ( $biography_file['ext'] ? $biography_image : $biography_setting->default );
    }

endif;

if ( ! function_exists( 'biography_sanitize_custom_css' ) ) :
    /**
     * Sanitizes Custom CSS
     * @param  $input
     * @return $input || null
     *
     * @since 1.1
     */
    function biography_sanitize_custom_css( $input ) {
        if ( $input != '' ) {
            $input = str_replace( '<=', '&lt;=', $input );

            $input = wp_kses_split( $input, array(), array() );

            $input = str_replace( '&gt;', '>', $input );

            $input = strip_tags( $input );

            return $input;
        }
        else {
            return '';
        }
    }

endif;

if ( class_exists( 'WP_Customize_Control' ) && ! class_exists( 'Biography_Customize_Message_Control' )):

    /**
     * Custom Control for html display
     * @since 1.0.0
     *
     */
    class Biography_Customize_Message_Control extends WP_Customize_Control {

        /**
         * Declare the control type.
         *
         * @access public
         * @var string
         */
        public $type = 'message';

        /**
         * Function to  render the content on the theme customizer page
         *
         * @access public
         * @since 1.0.0
         *
         * @param null
         * @return void
         *
         */
        public function render_content() {
            if ( empty( $this->description ) ) {
                return;
            }
            ?>
            <div class="coder-customize-customize-message">
                <?php echo wp_kses_post( $this->description ); ?>
            </div> <!-- .coder-customize-customize-message -->
            <?php
        }
    }

endif;
/**
 * Returns biography_important_links
 *
 * @since Biography 1.1.3
 */
if ( ! function_exists( 'biography_important_links' ) ) :
    function biography_important_links(){
        $important_links = array(
            'pro_link' => array(
                'link'	=> esc_url( 'http://themepalace.com/downloads/biography-pro/' ),
                'text' 	=> esc_html__( 'Upgrade To Pro', 'biography' )
            ),
            'theme_author' => array(
                'link'	=> esc_url( 'http://www.yamchhetri.com/' ),
                'text' 	=> esc_html__( 'Theme Author', 'biography' )
            ),
            'support' => array(
                'link'	=> esc_url( 'https://wordpress.org/support/theme/biography' ),
                'text' 	=> esc_html__( 'Support', 'biography' )
            ),
            'review' => array(
                'link'	=> esc_url( 'https://wordpress.org/support/view/theme-reviews/biography' ),
                'text' 	=> esc_html__( 'Review', 'biography' )
            )
        );
        $important_links_text = '';
        foreach ( $important_links as $important_link) {
            $important_links_text .= '<p><a target="_blank" href="' . $important_link['link'] .'" >' . esc_attr( $important_link['text'] ) .' </a></p>';
        }
        return $important_links_text;
    }
endif;

/**
 * reset options
 * @param  array $reset_options
 * @return void
 *
 * @since biography 1.1.0
 */
if ( ! function_exists( 'biography_reset_options' ) ) :
    function biography_reset_options( $reset_options ) {
        set_theme_mod( 'biography-options', $reset_options );
    }
endif;

/*Resetting all Values*/
/**
 * Reset color settings to default
 * @param  $input
 *
 * @since biography 1.0
 */
$biography_customizer_defaults['biography-customizer-reset-settings'] = '';
if ( ! function_exists( 'biography_customizer_reset' ) ) :
    function biography_customizer_reset() {

        global $biography_customizer_saved_values,$biography_customizer_defaults;

        $biography_customizer_saved_values = biography_get_all_options();

        if ( $biography_customizer_saved_values['biography-customizer-reset-settings'] == 1 ) {
            
            $biography_customizer_defaults['biography-customizer-reset-settings'] = '';
            /*resetting fields*/
            biography_reset_options( $biography_customizer_defaults );

            remove_theme_mod( 'background_color' );
            remove_theme_mod( 'background_image' );
            remove_theme_mod( 'background_repeat' );
            remove_theme_mod( 'background_position_x' );
            remove_theme_mod( 'background_attachment' );

            // Remove header image
            remove_theme_mod( 'header_image' );
            remove_theme_mod( 'header_image_data' );
        }
        else {
            return false;
        }
    }
endif;
add_action( 'customize_save_after', 'biography_customizer_reset' );

/**
 * get all saved options
 * @param  null
 * @return array saved options
 *
 * @since biography 1.0
 */
if ( ! function_exists( 'biography_get_all_options' ) ) :
    function biography_get_all_options( $merge_default = 0 ) {
        $biography_customizer_saved_values = get_theme_mod( 'biography-options' );
        if( 1 == $merge_default ){
            global $biography_customizer_defaults;
            if(is_array( $biography_customizer_saved_values )){
                $biography_customizer_saved_values = array_merge($biography_customizer_defaults, $biography_customizer_saved_values );
            }
            else{
                $biography_customizer_saved_values = $biography_customizer_defaults;
            }
        }
        return $biography_customizer_saved_values;
    }
endif;
