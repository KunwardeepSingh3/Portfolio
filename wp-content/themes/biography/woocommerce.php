<?php
/**
 * WooCommerce compatible page
 *
 * @package Biography
 */

get_header(); ?>

<div id="primary" class="content-area">
	<main id="main" class="site-main" role="main">

		<?php if ( have_posts() ) :
			?>
			<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>

				<div class="entry-content">
					<?php
					woocommerce_content();
					?>
				</div><!-- .entry-content -->

			</article><!-- #post-## -->
		<?php
		endif;
		?>

	</main><!-- #main -->
</div><!-- #primary -->

<?php get_sidebar(); ?>
<?php get_footer(); ?>
