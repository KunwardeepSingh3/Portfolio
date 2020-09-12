<?php
/**
 * The template for displaying the footer.
 *
 * Contains the closing of the #content div and all content after
 *
 * @package Personal Club
 */
?>

<div class="sitefooter">        
            <div class="container">
                 <?php if ( is_active_sidebar( 'footer-widget-1' ) ) : ?>
                <div class="widget-column-1">  
                    <?php dynamic_sidebar( 'footer-widget-1' ); ?>
                </div>
           <?php endif; ?>
          
          <?php if ( is_active_sidebar( 'footer-widget-2' ) ) : ?>
                <div class="widget-column-2">  
                    <?php dynamic_sidebar( 'footer-widget-2' ); ?>
                </div>
           <?php endif; ?>
           
           <?php if ( is_active_sidebar( 'footer-widget-3' ) ) : ?>
                <div class="widget-column-3">  
                    <?php dynamic_sidebar( 'footer-widget-3' ); ?>
                </div>
           <?php endif; ?>
           
           <?php if ( is_active_sidebar( 'footer-widget-4' ) ) : ?>
                <div class="widget-column-4">  
                    <?php dynamic_sidebar( 'footer-widget-4' ); ?>
                </div>
           <?php endif; ?>
           
           <div class="clear"></div>
           </div><!--end .container--> 
           
           <div class="copyrightwrap">
              <div class="container">               
				    <div class="left"><?php esc_html_e('Powered by WordPress', 'personal-club');?></div>
                    <div class="center"><?php bloginfo('name'); ?></div>
                    <div class="right"><a href="<?php echo esc_url( __( 'https://gracethemes.com/themes/personal-club/', 'personal-club' ) ); ?>" target="_blank">
				       <?php printf( __( 'Theme by %s', 'personal-club' ), 'Grace Themes' ); ?>
                    </a>     </div>
                    <div class="clear"></div>
					
            </div><!--end .container-->  
         </div><!--end .copyrightwrap-->     
                                 
     </div><!--end #sitefooter-->
</div><!--#end sitelayout_type-->

<?php wp_footer(); ?>
</body>
</html>