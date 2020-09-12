<?php    
/**
 *Personal Club Theme Customizer
 *
 * @package Personal Club
 */

/**
 * Add postMessage support for site title and description for the Theme Customizer.
 *
 * @param WP_Customize_Manager $wp_customize Theme Customizer object.
 */
function personal_club_customize_register( $wp_customize ) {	
	
	function personal_club_sanitize_dropdown_pages( $page_id, $setting ) {
	  // Ensure $input is an absolute integer.
	  $page_id = absint( $page_id );
	
	  // If $page_id is an ID of a published page, return it; otherwise, return the default.
	  return ( 'publish' == get_post_status( $page_id ) ? $page_id : $setting->default );
	}

	function personal_club_sanitize_checkbox( $checked ) {
		// Boolean check.
		return ( ( isset( $checked ) && true == $checked ) ? true : false );
	}  
		
	$wp_customize->get_setting( 'blogname' )->transport         = 'postMessage';
	$wp_customize->get_setting( 'blogdescription' )->transport  = 'postMessage';
	
	 //Panel for section & control
	$wp_customize->add_panel( 'personal_club_optionpanel_wrap', array(
		'priority' => null,
		'capability' => 'edit_theme_options',
		'theme_supports' => '',
		'title' => __( 'Theme Options Panel', 'personal-club' ),		
	) );
	
	//Site Layout Options
	$wp_customize->add_section('personal_club_sitelayout_option',array(
		'title' => __('Layout Options','personal-club'),			
		'priority' => 1,
		'panel' => 	'personal_club_optionpanel_wrap',          
	));		
	
	$wp_customize->add_setting('personal_club_boxlayout_option',array(
		'sanitize_callback' => 'personal_club_sanitize_checkbox',
	));	 

	$wp_customize->add_control( 'personal_club_boxlayout_option', array(
    	'section'   => 'personal_club_sitelayout_option',    	 
		'label' => __('Check to Box Layout','personal-club'),
		'description' => __('If you want to box layout please check the Box Layout Option.','personal-club'),
    	'type'      => 'checkbox'
     )); // Layout Options
	
	$wp_customize->add_setting('personal_club_color_scheme',array(
		'default' => '#fba681',
		'sanitize_callback' => 'sanitize_hex_color'
	));
	
	$wp_customize->add_control(
		new WP_Customize_Color_Control($wp_customize,'personal_club_color_scheme',array(
			'label' => __('Color Scheme Options','personal-club'),			
			'description' => __('More color options in available PRO Version','personal-club'),
			'section' => 'colors',
			'settings' => 'personal_club_color_scheme'
		))
	);	
	
	  //Header social icons
	$wp_customize->add_section('personal_club_social_section',array(
		'title' => __('Header social icons','personal-club'),
		'description' => __( 'Add social icons link here to display icons in header', 'personal-club' ),			
		'priority' => null,
		'panel' => 	'personal_club_optionpanel_wrap', 
	));
	
	$wp_customize->add_setting('personal_club_fb_link',array(
		'default' => null,
		'sanitize_callback' => 'esc_url_raw'	
	));
	
	$wp_customize->add_control('personal_club_fb_link',array(
		'label' => __('Add facebook link here','personal-club'),
		'section' => 'personal_club_social_section',
		'setting' => 'personal_club_fb_link'
	));	
	
	$wp_customize->add_setting('personal_club_twitt_link',array(
		'default' => null,
		'sanitize_callback' => 'esc_url_raw'
	));
	
	$wp_customize->add_control('personal_club_twitt_link',array(
		'label' => __('Add twitter link here','personal-club'),
		'section' => 'personal_club_social_section',
		'setting' => 'personal_club_twitt_link'
	));
	
	$wp_customize->add_setting('personal_club_gplus_link',array(
		'default' => null,
		'sanitize_callback' => 'esc_url_raw'
	));
	
	$wp_customize->add_control('personal_club_gplus_link',array(
		'label' => __('Add google plus link here','personal-club'),
		'section' => 'personal_club_social_section',
		'setting' => 'personal_club_gplus_link'
	));
	
	$wp_customize->add_setting('personal_club_linked_link',array(
		'default' => null,
		'sanitize_callback' => 'esc_url_raw'
	));
	
	$wp_customize->add_control('personal_club_linked_link',array(
		'label' => __('Add linkedin link here','personal-club'),
		'section' => 'personal_club_social_section',
		'setting' => 'personal_club_linked_link'
	));
	
	$wp_customize->add_setting('personal_club_show_socialsection',array(
		'default' => false,
		'sanitize_callback' => 'personal_club_sanitize_checkbox',
		'capability' => 'edit_theme_options',
	));	 
	
	$wp_customize->add_control( 'personal_club_show_socialsection', array(
	   'settings' => 'personal_club_show_socialsection',
	   'section'   => 'personal_club_social_section',
	   'label'     => __('Check To show This Section','personal-club'),
	   'type'      => 'checkbox'
	 ));//Show Header Social icons Section 	 
	
	// Slider Section		
	$wp_customize->add_section( 'personal_club_frontpage_slider_option', array(
		'title' => __('Slider Settings', 'personal-club'),
		'priority' => null,
		'description' => __('Default image size for frontpage slider is 1400 x 630 pixel.','personal-club'), 
		'panel' => 	'personal_club_optionpanel_wrap',           			
    ));
	
	$wp_customize->add_setting('personal_club_front_sliderpge1',array(
		'default' => '0',			
		'capability' => 'edit_theme_options',
		'sanitize_callback' => 'personal_club_sanitize_dropdown_pages'
	));
	
	$wp_customize->add_control('personal_club_front_sliderpge1',array(
		'type' => 'dropdown-pages',
		'label' => __('Select page for slide one:','personal-club'),
		'section' => 'personal_club_frontpage_slider_option'
	));	
	
	$wp_customize->add_setting('personal_club_front_sliderpge2',array(
		'default' => '0',			
		'capability' => 'edit_theme_options',
		'sanitize_callback' => 'personal_club_sanitize_dropdown_pages'
	));
	
	$wp_customize->add_control('personal_club_front_sliderpge2',array(
		'type' => 'dropdown-pages',
		'label' => __('Select page for slide two:','personal-club'),
		'section' => 'personal_club_frontpage_slider_option'
	));	
	
	$wp_customize->add_setting('personal_club_front_sliderpge3',array(
		'default' => '0',			
		'capability' => 'edit_theme_options',
		'sanitize_callback' => 'personal_club_sanitize_dropdown_pages'
	));
	
	$wp_customize->add_control('personal_club_front_sliderpge3',array(
		'type' => 'dropdown-pages',
		'label' => __('Select page for slide three:','personal-club'),
		'section' => 'personal_club_frontpage_slider_option'
	));	// Slider Section	
	
	$wp_customize->add_setting('personal_club_front_sliderpgemore',array(
		'default' => null,
		'sanitize_callback' => 'sanitize_text_field'	
	));
	
	$wp_customize->add_control('personal_club_front_sliderpgemore',array(	
		'type' => 'text',
		'label' => __('Add slider Read more button name here','personal-club'),
		'section' => 'personal_club_frontpage_slider_option',
		'setting' => 'personal_club_front_sliderpgemore'
	)); // Slider Read More Button Text
	
	$wp_customize->add_setting('personal_club_front_sliderpgeshowoption',array(
		'default' => false,
		'sanitize_callback' => 'personal_club_sanitize_checkbox',
		'capability' => 'edit_theme_options',
	));	 
	
	$wp_customize->add_control( 'personal_club_front_sliderpgeshowoption', array(
	    'settings' => 'personal_club_front_sliderpgeshowoption',
	    'section'   => 'personal_club_frontpage_slider_option',
	    'label'     => __('Check To Show This Section','personal-club'),
	    'type'      => 'checkbox'
	 ));//Show Slider Section	
	 
	
	
		 
}
add_action( 'customize_register', 'personal_club_customize_register' );

function personal_club_custom_css(){ 
?>
	<style type="text/css"> 					
        a, .default_blog_style h2 a:hover,
        #sidebar aside.widget ul li a:hover,								
        .default_blog_style h3 a:hover,				
        .postmeta a:hover,
        .button:hover,	
		.social-icons a:hover,	
        .sitefooter ul li a:hover, 
        .sitefooter ul li.current_page_item a,		
		.sitefooter ul li a:hover, 
		.sitefooter ul li.current_page_item a,
        .site_navigation ul li a:hover, 
        .site_navigation ul li.current-menu-item a,
        .site_navigation ul li.current-menu-parent a.parent,
        .site_navigation ul li.current-menu-item ul.sub-menu li a:hover				
            { color:<?php echo esc_html( get_theme_mod('personal_club_color_scheme','#fba681')); ?>;}					 
            
        .pagination ul li .current, .pagination ul li a:hover, 
        #commentform input#submit:hover,					
        .nivo-controlNav a.active,        
		.sitefour_pagecolumn:hover,	
		.nivo-caption .slide_more:hover,								
        #sidebar .search-form input.search-submit,				
        .wpcf7 input[type='submit'],				
        nav.pagination .page-numbers.current,       		
        .toggle a	
            { background-color:<?php echo esc_html( get_theme_mod('personal_club_color_scheme','#fba681')); ?>;}	
		
		.button:hover
            { border-color:<?php echo esc_html( get_theme_mod('personal_club_color_scheme','#fba681')); ?>;}						
         	
    </style> 
<?php                                                     
}
         
add_action('wp_head','personal_club_custom_css');	 

/**
 * Binds JS handlers to make Theme Customizer preview reload changes asynchronously.
 */
function personal_club_customize_preview_js() {
	wp_enqueue_script( 'personal_club_customizer', get_template_directory_uri() . '/js/customize-preview.js', array( 'customize-preview' ), '20171016', true );
}
add_action( 'customize_preview_init', 'personal_club_customize_preview_js' );