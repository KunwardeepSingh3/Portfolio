<?php
/**
 * The Header for our theme.
 *
 * Displays all of the <head> section and everything up till <div class="container">
 *
 * @package Personal Club
 */
?><!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
<meta charset="<?php bloginfo( 'charset' ); ?>">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="profile" href="http://gmpg.org/xfn/11">
<?php if ( is_singular() && pings_open( get_queried_object() ) ) : ?>
	<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>">
<?php endif; ?>
<?php wp_head(); ?>
</head>
<body <?php body_class(); ?>>
<?php
$personal_club_front_sliderpgeshowoption 	  	 = get_theme_mod('personal_club_front_sliderpgeshowoption', false);
$personal_club_show_socialsection 	  			 = get_theme_mod('personal_club_show_socialsection', false);
?>
<div id="sitelayout_type" <?php if( get_theme_mod( 'personal_club_boxlayout_option' ) ) { echo 'class="boxlayout"'; } ?>>
<?php
if ( is_front_page() && !is_home() ) {
	if( !empty($personal_club_front_sliderpgeshowoption)) {
	 	$inner_cls = '';
	}
	else {
		$inner_cls = 'siteinner';
	}
}
else {
$inner_cls = 'siteinner';
}
?>

<div class="site-header <?php echo $inner_cls; ?>"> 
<div class="container forhead">  

    <?php if( $personal_club_show_socialsection != ''){ ?> 
        <div class="social-icons">                                                
                   <?php $personal_club_fb_link = get_theme_mod('personal_club_fb_link');
                    if( !empty($personal_club_fb_link) ){ ?>
                    <a title="facebook" class="fab fa-facebook-f" target="_blank" href="<?php echo esc_url($personal_club_fb_link); ?>"></a>
                   <?php } ?>
                
                   <?php $personal_club_twitt_link = get_theme_mod('personal_club_twitt_link');
                    if( !empty($personal_club_twitt_link) ){ ?>
                    <a title="twitter" class="fab fa-twitter" target="_blank" href="<?php echo esc_url($personal_club_twitt_link); ?>"></a>
                   <?php } ?>
            
                  <?php $personal_club_gplus_link = get_theme_mod('personal_club_gplus_link');
                    if( !empty($personal_club_gplus_link) ){ ?>
                    <a title="google-plus" class="fab fa-google-plus" target="_blank" href="<?php echo esc_url($personal_club_gplus_link); ?>"></a>
                  <?php }?>
            
                  <?php $personal_club_linked_link = get_theme_mod('personal_club_linked_link');
                    if( !empty($personal_club_linked_link) ){ ?>
                    <a title="linkedin" class="fab fa-linkedin" target="_blank" href="<?php echo esc_url($personal_club_linked_link); ?>"></a>
                  <?php } ?>                  
         </div><!--end .social-icons--> 
    <?php } ?> 

  
     <div class="logo">
        <?php personal_club_the_custom_logo(); ?>
        <h1><a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"><?php bloginfo('name'); ?></a></h1>
            <?php $description = get_bloginfo( 'description', 'display' );
            if ( $description || is_customize_preview() ) : ?>
                <p><?php echo esc_html($description); ?></p>
            <?php endif; ?>
        </div><!-- logo -->
        
        
     <div class="header_search_column">
     
       <?php if ( ! dynamic_sidebar( 'header-widget' ) ) : ?>                              
       <form role="search" method="get" class="search-form" action="<?php echo esc_url( home_url( '/' ) ); ?>">
	<label>
		<input type="search" class="search-field" placeholder="<?php echo esc_attr_x( 'Search...', 'placeholder', 'personal-club' ); ?>" value="<?php echo get_search_query(); ?>" name="s">
	</label>
	<input type="submit" class="search-submit" value="<?php echo esc_attr_x( 'Search', 'submit button', 'personal-club' ); ?>">
</form>
      <?php endif; // end sidebar widget area ?> 
       
       
       
     </div><!--.header_search_column -->
<div class="clear"></div>  
</div><!-- container --> 

 <div class="mainmenu">
     <div class="container">    
         <div class="toggle">
         <a class="toggleMenu" href="#"><?php esc_html_e('Menu','personal-club'); ?></a>
         </div><!-- toggle --> 
         <div class="site_navigation">                   
          <?php wp_nav_menu( array('theme_location' => 'primary') ); ?>
        </div><!--.site_navigation -->       
    </div><!-- container -->    
 </div><!--.mainmenu -->

</div><!--.site-header --> 




<?php 
if ( is_front_page() && !is_home() ) {
if($personal_club_front_sliderpgeshowoption != '') {
	for($i=1; $i<=3; $i++) {
	  if( get_theme_mod('personal_club_front_sliderpge'.$i,false)) {
		$slider_Arr[] = absint( get_theme_mod('personal_club_front_sliderpge'.$i,true));
	  }
	}
?> 
<div class="headersliderwrap">                
<?php if(!empty($slider_Arr)){ ?>
<div id="slider" class="nivoSlider">
<?php 
$i=1;
$slidequery = new WP_Query( array( 'post_type' => 'page', 'post__in' => $slider_Arr, 'orderby' => 'post__in' ) );
while( $slidequery->have_posts() ) : $slidequery->the_post();
$image = wp_get_attachment_url( get_post_thumbnail_id($post->ID)); 
$thumbnail_id = get_post_thumbnail_id( $post->ID );
$alt = get_post_meta($thumbnail_id, '_wp_attachment_image_alt', true); 
?>
<?php if(!empty($image)){ ?>
<img src="<?php echo esc_url( $image ); ?>" title="#slidecaption<?php echo $i; ?>" alt="<?php echo esc_attr($alt); ?>" />
<?php }else{ ?>
<img src="<?php echo esc_url( get_template_directory_uri() ) ; ?>/images/slides/slider-default.jpg" title="#slidecaption<?php echo $i; ?>" alt="<?php echo esc_attr($alt); ?>" />
<?php } ?>
<?php $i++; endwhile; ?>
</div>   

<?php 
$j=1;
$slidequery->rewind_posts();
while( $slidequery->have_posts() ) : $slidequery->the_post(); ?>                 
    <div id="slidecaption<?php echo $j; ?>" class="nivo-html-caption">        
    	<h2><?php the_title(); ?></h2>
    	<?php the_excerpt(); ?>
    <?php
    $personal_club_front_sliderpgemore = get_theme_mod('personal_club_front_sliderpgemore');
    if( !empty($personal_club_front_sliderpgemore) ){ ?>
    	<a class="slide_more" href="<?php the_permalink(); ?>"><?php echo esc_html($personal_club_front_sliderpgemore); ?></a>
    <?php } ?>       
    </div>   
<?php $j++; 
endwhile;
wp_reset_postdata(); ?>  
<div class="clear"></div>  
</div><!--end .headersliderwrap -->     
<?php } ?>
<?php } } ?>