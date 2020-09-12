<?php

/**
 * Theme Customizer
 *
 * @param WP_Customize_Manager $wp_customize Theme Customizer object.
 */

function biography_customize_register( $wp_customize ) {
    global $biography_customizer_defaults, $biography_google_fonts;
if ( !function_exists( 'has_custom_logo' ) ) {
    /*adding setting controls in site identity sections*/
    $wp_customize->add_setting( 'biography-options[biography-logo]', array(
        'capability'		=> 'edit_theme_options',
        'default'			=> $biography_customizer_defaults['biography-logo'],
        'sanitize_callback' => 'biography_sanitize_image'
    ));
    $wp_customize->add_control(
        new WP_Customize_Image_Control(
            $wp_customize,
            'biography-options[biography-logo]',
            array(
                'settings' => 'biography-options[biography-logo]',
                'label'                 =>  esc_html__( 'Logo', 'biography' ),
                'section'               => 'title_tagline',
                'type'                  => 'image',
                'priority'              => 70,
                'description'           =>  esc_html__( 'Recommended logo size 260*260', 'biography' ),
                'active_callback'       => ''
            ) )
    );

}

    $wp_customize->add_setting( 'biography-options[biography-header-contact-url]', array(
        'capability'		=> 'edit_theme_options',
        'default'			=> $biography_customizer_defaults['biography-header-contact-url'],
        'sanitize_callback' => 'esc_url_raw'
    ) );

    $wp_customize->add_control( 'biography-options[biography-header-contact-url]', array(
        'settings' => 'biography-options[biography-header-contact-url]',
        'label'                 =>  esc_html__( 'Contact Url', 'biography' ),
        'section'               => 'title_tagline',
        'type'                  => 'url',
        'priority'              => 80
    ) );
    $wp_customize->add_setting( 'biography-options[biography-header-resume-url]', array(
        'capability'		=> 'edit_theme_options',
        'default'			=> $biography_customizer_defaults['biography-header-resume-url'],
        'sanitize_callback' => 'esc_url_raw'
    ) );

    $wp_customize->add_control( 'biography-options[biography-header-resume-url]', array(
        'settings' => 'biography-options[biography-header-resume-url]',
        'label'                 =>  esc_html__( 'Resume Url', 'biography' ),
        'section'               => 'title_tagline',
        'type'                  => 'url',
        'priority'              => 90
    ) );
    $wp_customize->add_setting( 'biography-options[biography-enable-social-icons]', array(
        'capability'		=> 'edit_theme_options',
        'default'			=> $biography_customizer_defaults['biography-enable-social-icons'],
        'sanitize_callback' => 'biography_sanitize_checkbox'
    ) );

    $wp_customize->add_control( 'biography-options[biography-enable-social-icons]', array(
        'settings' => 'biography-options[biography-enable-social-icons]',
        'label'                 =>  esc_html__( 'Enable Social Menu On Header', 'biography' ),
        'description'           =>  esc_html__( 'Please add social menus for enabling social menu. Go to menus for setting up', 'biography' ),
        'section'               => 'title_tagline',
        'type'                  => 'checkbox',
        'priority'              => 100,
    ) );
    /*colors options*/
    /*Color panel*/
    $wp_customize->add_panel( 'biography-colors', array(
        'priority' => 42,
        'capability' => 'edit_theme_options',
        'title' => esc_html__( 'Colors', 'biography' ),
        'description' => esc_html__( 'Description of what this panel does.', 'biography' )
    ) );
    /*customizing default color section*/
    $wp_customize->add_section( 'colors', array(
        'priority' => 40,
        'capability' => 'edit_theme_options',
        'theme_supports' => '',
        'title' => esc_html__( 'Basic Colors Options', 'biography' ),
        'description' => '',
        'panel' => 'biography-colors'
    ) );

    /*background color and image adding message*/
    $wp_customize->get_control( 'background_color' )->description = esc_html__( 'Note: Applies to blog page and inner pages only', 'biography' );
    $wp_customize->get_control( 'background_image' )->description = esc_html__( 'Note: Applies to blog page and inner pages only', 'biography' );

    /*Color reset section*/
    $wp_customize->add_section( 'biography-colors-reset', array(
        'priority' => 60,
        'capability' => 'edit_theme_options',
        'theme_supports' => '',
        'title' =>esc_html__( 'Biography Colors Reset', 'biography' ),
        'description' => '',
        'panel' => 'biography-colors'
    ) );
    /*Color setting-controls*/
    /*link color*/
    $wp_customize->add_setting( 'biography-options[biography-site-identity-color]', array(
        'capability'		=> 'edit_theme_options',
        'default'			=> $biography_customizer_defaults['biography-site-identity-color'],
        'sanitize_callback' => 'biography_sanitize_hex_color'
    ) );
    $wp_customize->add_control(
        new WP_Customize_Color_Control(
            $wp_customize,
            'biography-options[biography-site-identity-color]',
            array(
                'label'                 =>  esc_html__( 'Site Identity Color', 'biography' ),
                'description'           =>  esc_html__( 'Site title and tagline color', 'biography' ),
                'section'               => 'colors',
                'type'                  => 'color',
                'priority'              => 65,
                'settings' => 'biography-options[biography-site-identity-color]'
            ) )
    );
    $wp_customize->add_setting( 'biography-options[biography-link-color]', array(
        'capability'		=> 'edit_theme_options',
        'default'			=> $biography_customizer_defaults['biography-link-color'],
        'sanitize_callback' => 'biography_sanitize_hex_color'
    ) );
    $wp_customize->add_control(
        new WP_Customize_Color_Control(
            $wp_customize,
            'biography-options[biography-link-color]',
            array(
                'label'                 =>  esc_html__( 'Link Color', 'biography' ),
                'section'               => 'colors',
                'type'                  => 'color',
                'priority'              => 40,
                'settings' => 'biography-options[biography-link-color]'
            ) )
    );

    $wp_customize->add_setting( 'biography-options[biography-link-hover-color]', array(
        'capability'		=> 'edit_theme_options',
        'default'			=> $biography_customizer_defaults['biography-link-hover-color'],
        'sanitize_callback' => 'biography_sanitize_hex_color'
    ) );
    $wp_customize->add_control(
        new WP_Customize_Color_Control(
            $wp_customize,
            'biography-options[biography-link-hover-color]',
            array(
                'label'                 =>  esc_html__( 'Link Hover Color', 'biography' ),
                'section'               => 'colors',
                'type'                  => 'color',
                'priority'              => 45,
                'settings' => 'biography-options[biography-link-hover-color]',
            ) )
    );

    $wp_customize->add_setting( 'biography-options[biography-h1-h6-color]', array(
        'capability'		=> 'edit_theme_options',
        'default'			=> $biography_customizer_defaults['biography-h1-h6-color'],
        'sanitize_callback' => 'biography_sanitize_hex_color'
    ) );
    $wp_customize->add_control(
        new WP_Customize_Color_Control(
            $wp_customize,
            'biography-options[biography-h1-h6-color]',
            array(
                'label'                 =>  esc_html__( 'Heading (H1-H6) Color', 'biography' ),
                'section'               => 'colors',
                'type'                  => 'color',
                'priority'              => 50,
                'settings' => 'biography-options[biography-h1-h6-color]',
            ) )
    );
    $wp_customize->add_setting( 'biography-options[biography-color-reset-settings]', array(
        'capability'		=> 'edit_theme_options',
        'default'			=> $biography_customizer_defaults['biography-color-reset-settings'],
        'sanitize_callback' => 'biography_sanitize_checkbox',
    ) );

    $wp_customize->add_control( 'biography-options[biography-color-reset-settings]', array(
        'label'                 =>  esc_html__( 'Reset', 'biography' ),
        'description'           =>  esc_html__( 'Caution: Reset all above color settings to default. Refresh the page after save to view the effects. ', 'biography' ),
        'section'               => 'biography-colors-reset',
        'type'                  => 'checkbox',
        'priority'              => 220,
        'settings' => 'biography-options[biography-color-reset-settings]'
    ) );
    /*Featured text slider setting controls*/
    $wp_customize->add_section( 'biography-fs-pages', array(
        'capability' => 'edit_theme_options',
        'priority'       => 150,
        'title'          => esc_html__( 'Header Text Slider', 'biography' ),
        'description'    => esc_html__( 'Select pages and title will be shown in text slider', 'biography' )
    ) );

    $wp_customize->add_setting( 'biography-options[biography-fs-enable]', array(
        'capability'		=> 'edit_theme_options',
        'default'			=> $biography_customizer_defaults['biography-fs-enable'],
        'sanitize_callback' => 'biography_sanitize_checkbox'
    ) );

    $wp_customize->add_control( 'biography-options[biography-fs-enable]', array(
        'label'                 =>  esc_html__( 'Enable Slider', 'biography' ),
        'section'               => 'biography-fs-pages',
        'type'                  => 'checkbox',
        'priority'              => 10,
        'settings' => 'biography-options[biography-fs-enable]',
    ) );

    $wp_customize->add_setting( 'biography-options[biography-fs-page-1]', array(
        'capability'		=> 'edit_theme_options',
        'default'			=> $biography_customizer_defaults['biography-fs-page-1'],
        'sanitize_callback' => 'biography_sanitize_post'
    ) );

    $wp_customize->add_control( 'biography-options[biography-fs-page-1]', array(
        'label'                 =>  esc_html__( 'Select Page For Slide 1', 'biography' ),
        'section'               => 'biography-fs-pages',
        'type'                  => 'dropdown-pages',
        'priority'              => 20,
        'settings' => 'biography-options[biography-fs-page-1]',
    ) );

    $wp_customize->add_setting( 'biography-options[biography-fs-page-2]', array(
        'capability'		=> 'edit_theme_options',
        'default'			=> $biography_customizer_defaults['biography-fs-page-2'],
        'sanitize_callback' => 'biography_sanitize_post'
    ) );

    $wp_customize->add_control( 'biography-options[biography-fs-page-2]', array(
        'label'                 =>  esc_html__( 'Select Page For Slide 2', 'biography' ),
        'section'               => 'biography-fs-pages',
        'type'                  => 'dropdown-pages',
        'priority'              => 30,
        'settings' => 'biography-options[biography-fs-page-2]',
    ) );

    $wp_customize->add_setting( 'biography-options[biography-fs-page-3]', array(
        'capability'		=> 'edit_theme_options',
        'default'			=> $biography_customizer_defaults['biography-fs-page-3'],
        'sanitize_callback' => 'biography_sanitize_post'
    ) );

    $wp_customize->add_control( 'biography-options[biography-fs-page-3]', array(
        'label'                 =>  esc_html__( 'Select Page For Slide 3', 'biography' ),
        'section'               => 'biography-fs-pages',
        'type'                  => 'dropdown-pages',
        'priority'              => 40,
        'settings' => 'biography-options[biography-fs-page-3]',
    ) );

    /*font setting*/
    $wp_customize->add_panel( 'biography-fonts', array(
        'capability' => 'edit_theme_options',
        'title'          => esc_html__( 'Font Setting', 'biography' ),
        'priority'       => 43
    ) );

    $wp_customize->add_section( 'biography-family', array(
        'capability' => 'edit_theme_options',
        'priority'       => 20,
        'title'          => esc_html__( 'Font Family', 'biography' ),
        'panel'          => 'biography-fonts',
    ) );

    $wp_customize->add_setting( 'biography-options[biography-font-family-site-identity]', array(
        'capability'		=> 'edit_theme_options',
        'default'			=> $biography_customizer_defaults['biography-font-family-site-identity'],
        'sanitize_callback' => 'biography_sanitize_select_fonts'
    ) );

    $wp_customize->add_control( 'biography-options[biography-font-family-site-identity]', array(
        'label'                 => esc_html__( 'Site Identity Font Family', 'biography' ),
        'description'           => esc_html__( 'Site title and tagline font family', 'biography' ),
        'section'               => 'biography-family',
        'type'                  => 'select',
        'choices'               => $biography_google_fonts,
        'priority'              => 2,
        'settings' => 'biography-options[biography-font-family-site-identity]'
    ) );

    $wp_customize->add_setting( 'biography-options[biography-font-family-h1-h6]', array(
        'capability'		=> 'edit_theme_options',
        'default'			=> $biography_customizer_defaults['biography-font-family-h1-h6'],
        'sanitize_callback' => 'biography_sanitize_select_fonts'
    ) );

    $wp_customize->add_control( 'biography-options[biography-font-family-h1-h6]', array(
        'label'                 => esc_html__( 'H1-H6 Font Family', 'biography' ),
        'section'               => 'biography-family',
        'type'                  => 'select',
        'choices'               => $biography_google_fonts,
        'priority'              => 10,
        'settings' => 'biography-options[biography-font-family-h1-h6]'
    ) );
    /*Home page options*/

    /*Theme Options*/
    $wp_customize->add_panel( 'biography-theme-options', array(
        'capability' => 'edit_theme_options',
        'title'          => esc_html__( 'Theme Options', 'biography' ),
        'priority'       => 200
    ) );
    $wp_customize->add_section( 'biography-layout-options', array(
        'capability' => 'edit_theme_options',
        'priority'       => 20,
        'title'          => esc_html__( 'Layout Options', 'biography' ),
        'panel'          => 'biography-theme-options'
    ) );

    $wp_customize->add_setting( 'biography-options[biography-default-layout]', array(
        'capability'		=> 'edit_theme_options',
        'default'			=> $biography_customizer_defaults['biography-default-layout'],
        'sanitize_callback' => 'biography_sanitize_select'
    ) );

    $wp_customize->add_control( 'biography-options[biography-default-layout]', array(
        'settings' => 'biography-options[biography-default-layout]',
        'label'                 =>  esc_html__( 'Default Layout', 'biography' ),
        'section'               => 'biography-layout-options',
        'type'                  => 'select',
        'choices'               => array(
            'right-sidebar' => esc_html__( 'Content - Primary Sidebar', 'biography' ),
            'left-sidebar' => esc_html__( 'Primary Sidebar - Content', 'biography' ),
            'no-sidebar' => esc_html__( 'No Sidebar', 'biography' )
        ),
        'priority'              => 20
    ) );

    $wp_customize->add_setting( 'biography-options[biography-archive-layout]', array(
        'capability'        => 'edit_theme_options',
        'default'           => $biography_customizer_defaults['biography-archive-layout'],
        'sanitize_callback' => 'biography_sanitize_select'
    ) );

    $wp_customize->add_control( 'biography-options[biography-archive-layout]', array(
        'settings' => 'biography-options[biography-archive-layout]',
        'label'                 =>  esc_html__( 'Archive Layout', 'biography' ),
        'section'               => 'biography-layout-options',
        'type'                  => 'select',
        'choices'               => array(
            'full-post' => esc_html__( 'Full Post', 'biography' ),
            'excerpt' => esc_html__( 'Excerpt', 'biography' ),
        ),
        'priority'              => 30
    ) );

    $wp_customize->add_section( 'biography-footer-options', array(
        'capability' => 'edit_theme_options',
        'priority'       => 60,
        'title'          => esc_html__( 'Footer Options', 'biography' ),
        'panel'          => 'biography-theme-options'
    ) );

    $wp_customize->add_setting( 'biography-options[biography-copyright-text]', array(
        'capability'		=> 'edit_theme_options',
        'default'			=> $biography_customizer_defaults['biography-copyright-text'],
        'sanitize_callback' => 'esc_attr'
    ) );

    $wp_customize->add_control( 'biography-options[biography-copyright-text]', array(
        'settings' => 'biography-options[biography-copyright-text]',
        'label'                 =>  esc_html__( 'Copyright Text', 'biography' ),
        'section'               => 'biography-footer-options',
        'type'                  => 'text',
        'priority'              => 20,
    ) );
    $wp_customize->add_section( 'biography-enable-breadcrumb', array(
        'capability' => 'edit_theme_options',
        'priority'       => 120,
        'title'          => esc_html__( 'Breadcrumb Options', 'biography' ),
        'panel'          => 'biography-theme-options'
    ) );

    $wp_customize->add_setting( 'biography-options[biography-enable-breadcrumb]', array(
        'capability'        => 'edit_theme_options',
        'default'           => $biography_customizer_defaults['biography-enable-breadcrumb'],
        'sanitize_callback' => 'biography_sanitize_checkbox'
    ) );

    $wp_customize->add_control( 'biography-options[biography-enable-breadcrumb]', array(
        'settings' => 'biography-options[biography-enable-breadcrumb]',
        'label'                 =>  esc_html__( 'Enable Breadcrumb', 'biography' ),
        'section'               => 'biography-enable-breadcrumb',
        'type'                  => 'checkbox',
    ) );

    $wp_customize->add_section( 'biography-blog-archive-options', array(
        'capability' => 'edit_theme_options',
        'priority'       => 30,
        'title'          => esc_html__( 'Blog/Archive Options', 'biography' ),
        'panel'          => 'biography-theme-options'
    ) );

    $wp_customize->add_setting( 'biography-options[biography-excerpt-length]', array(
        'capability'        => 'edit_theme_options',
        'default'           => $biography_customizer_defaults['biography-excerpt-length'],
        'sanitize_callback' => 'biography_sanitize_number'
    ) );

    $wp_customize->add_control( 'biography-options[biography-excerpt-length]', array(
        'settings'              => 'biography-options[biography-excerpt-length]',
        'label'                 =>  esc_html__( 'Excerpt Length (in words)', 'biography' ),
        'section'               => 'biography-blog-archive-options',
        'type'                  => 'number',
        'priority'              => 20
    ) );

    $wp_customize->add_section( 'biography-enable-back-to-top', array(
        'capability' => 'edit_theme_options',
        'priority'       => 120,
        'title'          => esc_html__( 'Back To Top Options', 'biography' ),
        'panel'          => 'biography-theme-options'
    ) );

    $wp_customize->add_setting( 'biography-options[biography-enable-back-to-top]', array(
        'capability'        => 'edit_theme_options',
        'default'           => $biography_customizer_defaults['biography-enable-back-to-top'],
        'sanitize_callback' => 'biography_sanitize_checkbox'
    ) );

    $wp_customize->add_control( 'biography-options[biography-enable-back-to-top]', array(
        'settings' => 'biography-options[biography-enable-back-to-top]',
        'label'                 =>  esc_html__( 'Enable Back To Top', 'biography' ),
        'section'               => 'biography-enable-back-to-top',
        'type'                  => 'checkbox',
    ) );

    $wp_customize->add_section( 'biography-pagination-options', array(
        'capability' => 'edit_theme_options',
        'priority'       => 120,
        'title'          => esc_html__( 'Pagination Options', 'biography' ),
        'panel'          => 'biography-theme-options'
    ) );

    $wp_customize->add_setting( 'biography-options[biography-pagination-options]', array(
        'capability'        => 'edit_theme_options',
        'default'           => $biography_customizer_defaults['biography-pagination-options'],
        'sanitize_callback' => 'biography_sanitize_select'
    ) );

    $wp_customize->add_control( 'biography-options[biography-pagination-options]', array(
        'settings' => 'biography-options[biography-pagination-options]',
        'label'                 =>  esc_html__( 'Pagination Options', 'biography' ),
        'section'               => 'biography-pagination-options',
        'type'                  => 'select',
        'choices'               => array(
                'default' => esc_html__( 'Default', 'biography' ),
                'numeric' => esc_html__( 'Numeric', 'biography' )
            ),
    ) );

    if ( version_compare( $GLOBALS['wp_version'], '4.7', '<' ) ) {

    $wp_customize->add_section( 'biography-custom-css', array(
        'capability' => 'edit_theme_options',
        'priority'       => 120,
        'title'          => esc_html__( 'Custom CSS', 'biography' ),
        'panel'          => 'biography-theme-options'
    ) );

    $wp_customize->add_setting( 'biography-options[biography-custom-css]', array(
        'capability'		=> 'edit_theme_options',
        'default'			=> $biography_customizer_defaults['biography-custom-css'],
        'sanitize_callback' => 'biography_sanitize_custom_css'
    ) );

    $wp_customize->add_control( 'biography-options[biography-custom-css]', array(
        'settings' => 'biography-options[biography-custom-css]',
        'label'                 =>  esc_html__( 'Custom CSS', 'biography' ),
        'section'               => 'biography-custom-css',
        'type'                  => 'textarea',
        'priority'              => 40,
    ) );
    }
    /*message info section*/
    $wp_customize->add_section( 'biography-imp-links', array(
        'capability' => 'edit_theme_options',
        'priority'       => 200,
        'title'          => esc_html__( 'Important Links ', 'biography' ),
    ) );

    $wp_customize->add_setting( 'biography-options[biography-imp-links]', array(
        'capability'		=> 'edit_theme_options',
        'default'			=> '',
        'sanitize_callback' => 'esc_attr'
    ) );

    $wp_customize->add_control(
        new Biography_Customize_Message_Control(
            $wp_customize,
            'biography-options[biography-imp-links]',
            array(
                'settings' => 'biography-options[biography-imp-links]',
                'section'               => 'biography-imp-links',
                'type'                  => 'message',
                'priority'              => 2,
                'description'           => biography_important_links()
            ) )
    );

    require trailingslashit( get_template_directory() ).'inc/customizer/home-options/home-options.php';

    /*Reset Options*/
    $wp_customize->add_section( 'biography-customizer-reset', array(
        'capability' => 'edit_theme_options',
        'priority'       => 999,
        'title'          => esc_html__( 'Reset All Options', 'biography' )
    ) );

    $wp_customize->add_setting( 'biography-options[biography-customizer-reset-settings]', array(
        'capability'		=> 'edit_theme_options',
        'default'              => $biography_customizer_defaults['biography-customizer-reset-settings'],
        'sanitize_callback'    => 'biography_sanitize_checkbox',
    ) );

    $wp_customize->add_control( 'biography-options[biography-customizer-reset-settings]', array(
        'settings' => 'biography-options[biography-customizer-reset-settings]',
        'label'                 =>  esc_html__( 'Reset All Options', 'biography' ),
        'description'           =>  esc_html__( 'Caution: Reset all options settings to default. Refresh the page after save to view the effects. ', 'biography' ),
        'section'               => 'biography-customizer-reset',
        'type'                  => 'checkbox',
    ) );

    $wp_customize->get_setting( 'blogname' )->transport         = 'postMessage';
    $wp_customize->get_control( 'blogname' )->priority          = 1;
    $wp_customize->get_setting( 'blogdescription' )->transport  = 'postMessage';
    $wp_customize->get_control( 'blogdescription' )->priority          = 1;
    $wp_customize->remove_control( 'header_textcolor' );
}
add_action( 'customize_register', 'biography_customize_register' );
/**
 * Binds JS handlers to make Theme Customizer preview reload changes asynchronously.
 */
function biography_customize_preview_js() {
    wp_enqueue_script( 'biography-customizer', get_template_directory_uri() . '/assets/js/customizer.js', array( 'customize-preview' ), '20130508', true );
}
add_action( 'customize_preview_init', 'biography_customize_preview_js' );

/******************************************
Customizer Base
 *******************************************/
require trailingslashit( get_template_directory() ).'inc/customizer/customizer-base.php';