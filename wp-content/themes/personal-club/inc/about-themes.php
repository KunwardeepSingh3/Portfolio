<?php
/**
 *Personal Club About Theme
 *
 * @package Personal Club
 */

//about theme info
add_action( 'admin_menu', 'personal_club_abouttheme' );
function personal_club_abouttheme() {    	
	add_theme_page( __('About Theme Info', 'personal-club'), __('About Theme Info', 'personal-club'), 'edit_theme_options', 'personal_club_guide', 'personal_club_mostrar_guide');   
} 

//Info of the theme
function personal_club_mostrar_guide() { 	
?>
<div class="wrap-GT">
	<div class="gt-left">
   		   <div class="heading-gt">
			  <h3><?php esc_html_e('About Theme Info', 'personal-club'); ?></h3>
		   </div>
          <p><?php esc_html_e('Personal Club is a simple, clean, easy to use and user-friendly free personal blog WordPress theme. This theme is developed for to create personal or blogging websites. It can also be used for fashion blog, portfolio, beauty & spa, lifestyle, news, travel, photography and food blog websites. This theme is compatible with many popular WordPress plugins like Contact Form 7, Gravity forms, WooCommerce, NextGEN gallery, Revolution slider, Cyclone slider, Jetpack, Yoast','personal-club'); ?></p>
<div class="heading-gt"> <?php esc_html_e('Theme Features', 'personal-club'); ?></div>
 

<div class="col-2">
  <h4><?php esc_html_e('Theme Customizer', 'personal-club'); ?></h4>
  <div class="description"><?php esc_html_e('The built-in customizer panel quickly change aspects of the design and display changes live before saving them.', 'personal-club'); ?></div>
</div>

<div class="col-2">
  <h4><?php esc_html_e('Responsive Ready', 'personal-club'); ?></h4>
  <div class="description"><?php esc_html_e('The themes layout will automatically adjust and fit on any screen resolution and looks great on any device. Fully optimized for iPhone and iPad.', 'personal-club'); ?></div>
</div>

<div class="col-2">
<h4><?php esc_html_e('Cross Browser Compatible', 'personal-club'); ?></h4>
<div class="description"><?php esc_html_e('Our themes are tested in all mordern web browsers and compatible with the latest version including Chrome,Firefox, Safari, Opera, IE11 and above.', 'personal-club'); ?></div>
</div>

<div class="col-2">
<h4><?php esc_html_e('E-commerce', 'personal-club'); ?></h4>
<div class="description"><?php esc_html_e('Fully compatible with WooCommerce plugin. Just install the plugin and turn your site into a full featured online shop and start selling products.', 'personal-club'); ?></div>
</div>
<hr />  
</div><!-- .gt-left -->
	
<div class="gt-right">			
        <div>				
            <a href="<?php echo esc_url( PERSONAL_CLUB_LIVE_DEMO ); ?>" target="_blank"><?php esc_html_e('Live Demo', 'personal-club'); ?></a> | 
            <a href="<?php echo esc_url( PERSONAL_CLUB_PROTHEME_URL ); ?>" target="_blank"><?php esc_html_e('Purchase Pro', 'personal-club'); ?></a> | 
            <a href="<?php echo esc_url( PERSONAL_CLUB_THEME_DOC ); ?>" target="_blank"><?php esc_html_e('Documentation', 'personal-club'); ?></a>
        </div>		
</div><!-- .gt-right-->
<div class="clear"></div>
</div><!-- .wrap-GT -->
<?php } ?>