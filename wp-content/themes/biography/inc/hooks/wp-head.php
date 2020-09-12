<?php
/**
 * Theme inline styles and javascripts
 *
 * @package Biography 1.1.2
 */

if ( ! function_exists( 'biography_inline_css' ) ) :
    // Add Custom Css
    function biography_inline_css() {
    global $biography_google_fonts,$biography_customizer_saved_options;
        $biography_customizer_saved_options['biography-font-family-site-identity'];
        $biography_font_family_site_identity = $biography_google_fonts[$biography_customizer_saved_options['biography-font-family-site-identity']];
        $biography_font_family_h1_h6 = $biography_google_fonts[$biography_customizer_saved_options['biography-font-family-h1-h6']];
        /*Color options */
        $biography_h1_h6_color = $biography_customizer_saved_options['biography-h1-h6-color'];
        $biography_link_color = $biography_customizer_saved_options['biography-link-color'];
        $biography_link_hover_color = $biography_customizer_saved_options['biography-link-hover-color'];
        $biography_site_identity_color = $biography_customizer_saved_options['biography-site-identity-color'];

    $css = '';

    // Color layout css
    $biography_inline_css = '';
    $biography_inline_css = '
      /*site identity font family*/
    .site-title,
    .site-title a,
    .site-description,
    .site-description a {
        font-family: '. esc_attr( $biography_font_family_site_identity ) .'!important;
    }
    /*Title font family*/
    h1, h1 a,
    h2, h2 a,
    h3, h3 a,
    h4, h4 a,
    h5, h5 a,
    h6, h6 a {
        font-family: '. esc_attr( $biography_font_family_h1_h6 ).'!important;
    }';

    /*Main h1-h6 color*/
    if( !empty($biography_h1_h6_color) ){ 
    $biography_inline_css .='
    h1, h1 a,
    h2, h2 a,
    h3, h3 a,
    h4, h4 a,
    h5, h5 a,
    h6, h6 a{
      color: '.esc_attr( $biography_h1_h6_color ).' !important; /*#212121*/
    }';
    }
    /*Link color*/
    if( !empty($biography_link_color) ){           
    $biography_inline_css .='
    a,
    a > p,
    .posted-on a,
    .cat-links a,
    .tags-links a,
    .author a,
    .comments-link a,
    .edit-link a,
    .nav-links .nav-previous a,
    .nav-links .nav-next a,
    .page-links a {
        color: '. esc_attr( $biography_link_color ).' !important; /*#212121*/
    }
    ';
    }
    /*Link Hover color*/
    if( !empty($biography_link_hover_color) ){
    $biography_inline_css .='
    a:hover,
    a > p:hover,
    .posted-on a:hover,
    .cat-links a:hover,
    .tags-links a:hover,
    .author a:hover,
    .comments-link a:hover,
    .edit-link a:hover,
    .nav-links .nav-previous a:hover,
    .nav-links .nav-next a:hover,
    .page-links a:hover {
      color: '. esc_attr( $biography_link_hover_color ).' !important; /*#212121*/
        }
    ';
    }
    /*header menu text*/
    if( !empty( $biography_site_identity_color ) ){
    $biography_inline_css .='
    .site-title,
    .site-title a,
    .site-description,
    .site-description a, sachyya{
        color:'. esc_attr( $biography_site_identity_color ).'!important;
    }';
    }

    // header-textcolor
    /*
     * If no custom options for text are set, let's bail.
     * get_header_textcolor() options: Any hex value, 'blank' to hide text. Default: HEADER_TEXTCOLOR.
     */
    $header_text_color = get_header_textcolor();
    
    if ( get_theme_support( 'custom-header', 'default-text-color' ) !== $header_text_color ) {

        // If we get this far, we have custom styles. Let's do this.
            // Has the text been hidden?
        if ( ! display_header_text() ) :
            $biography_inline_css .='    
            .site-title,
            .site-description {
                position: absolute;
                clip: rect(1px, 1px, 1px, 1px);
            }';

        // If the user has set a custom color for the text use that.
        else :
            $biography_inline_css .='    
            .site-title a,
            #site-header .site-title a,
            .site-description {
                color: #'.esc_attr( $header_text_color ).';
            }';
        endif;
    }

    // Declare variable to store custom css
    $biography_custom_css = '';
    // Check if the custom CSS feature of 4.7 exists
    if ( function_exists( 'wp_update_custom_css_post' ) ) {
        // Migrate any existing theme CSS to the core option added in WordPress 4.7.
        if( !empty( $biography_customizer_saved_options['biography-custom-css'] ) )
            $css = $biography_customizer_saved_options['biography-custom-css'];
        
        if ( $css ) {
            $core_css = wp_get_custom_css(); // Preserve any CSS already added to the core option.
            $return = wp_update_custom_css_post( $core_css . $css );
            
            if ( ! is_wp_error( $return ) ) {
                // Remove the old theme_mod, so that the CSS is stored in only one place moving forward.
                $biography_customizer_saved_options['biography-custom-css'] = '';
                set_theme_mod( 'biography-options', $biography_customizer_saved_options );
            }
        }
    } else {
        // Back-compat for WordPress < 4.7.
        if ( isset( $biography_customizer_saved_options['biography-custom-css'] ) ) {
            $biography_custom_css = $biography_customizer_saved_options['biography-custom-css'];
            $biography_inline_css .= $biography_custom_css;
        }
    }   

    $css .= $biography_inline_css;
    wp_add_inline_style( 'biography-style', $css );
}
endif;
add_action( 'wp_enqueue_scripts', 'biography_inline_css', 10 );
