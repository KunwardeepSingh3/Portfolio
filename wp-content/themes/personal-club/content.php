<?php
/**
 * @package Personal Club
 */
?>
 <div class="default_blog_style">
    <article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>        
        
       
        
        <header class="entry-header">           
            
            <?php if ( 'post' == get_post_type() ) : ?>
                <div class="postmeta">
                    <div class="post-date"><?php the_date(); ?></div><!-- post-date -->  
                    <?php edit_post_link( __( 'Edit', 'personal-club' ), '<span class="edit-link">', '</span>' ); ?>                                   
                </div><!-- postmeta -->
            <?php endif; ?>
            <h3><a href="<?php the_permalink(); ?>" rel="bookmark"><?php the_title(); ?></a></h3>
            
        </header><!-- .entry-header -->
        
         <?php if (has_post_thumbnail() ){ ?>
			<div class="thumbnail_box">
            <a href="<?php the_permalink(); ?>"><?php the_post_thumbnail(); ?></a>
			</div>
		<?php }  ?> 
          
        <?php if ( is_search() || !is_single() ) : // Only display Excerpts for Search ?>
        <div class="entry-summary">
           	<?php the_excerpt(); ?>
             <a class="button" href="<?php echo esc_url( get_permalink() ); ?>"><?php esc_html_e('Learn More &rarr;','personal-club'); ?></a>
        </div><!-- .entry-summary -->
        <?php else : ?>
        <div class="entry-content">
            <?php the_content( __( 'Continue reading <span class="meta-nav">&rarr;</span>', 'personal-club' ) ); ?>
            <?php
                wp_link_pages( array(
                    'before' => '<div class="page-links">' . __( 'Pages:', 'personal-club' ),
                    'after'  => '</div>',
                ) );
            ?>
        </div><!-- .entry-content -->
        <?php endif; ?>
        <div class="clear"></div>
    </article><!-- #post-## -->
</div>