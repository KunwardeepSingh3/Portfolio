<?php
/**
 * @package Personal Club
 */
?>
<div class="default_blog_style">
<article id="post-<?php the_ID(); ?>" <?php post_class('single-post'); ?>>

    
 		   
    <header class="entry-header">
        <div class="postmeta">
            <div class="post-date"><?php the_date(); ?></div><!-- post-date -->                    
       </div><!-- postmeta -->
        <?php the_title( '<h3 class="single-title">', '</h3>' ); ?>
    </header><!-- .entry-header -->    
      
       <?php 
        if (has_post_thumbnail() ){
			echo '<div class="thumbnail_box">';
            the_post_thumbnail();
			echo '</div>';
		}
        ?>  

    <div class="entry-content">		
        <?php the_content(); ?>
        <?php
        wp_link_pages( array(
            'before' => '<div class="page-links">' . __( 'Pages:', 'personal-club' ),
            'after'  => '</div>',
        ) );
        ?>
        <div class="postmeta">          
            <div class="post-tags"><?php the_tags(); ?> </div>
            <div class="clear"></div>
        </div><!-- postmeta -->
    </div><!-- .entry-content -->
   
    <footer class="entry-meta">
      <?php edit_post_link( __( 'Edit', 'personal-club' ), '<span class="edit-link">', '</span>' ); ?>
    </footer><!-- .entry-meta -->

</article>
</div><!-- .default_blog_style-->