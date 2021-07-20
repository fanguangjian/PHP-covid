<?php
/**
 * Template part for displaying posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package online_business
 */

?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
	<div class="blog-post-item">
		<?php 
		if ( 'post' === get_post_type() ) :
			?>
			<div class="entry-meta">
				<?php
					online_business_posted_by();
					online_business_posted_on();
				?>
			</div><!-- .entry-meta -->			
		<?php endif; ?>

		<header class="entry-header">
			<?php
			if ( is_singular() ) :
				the_title( '<h1 class="entry-title">', '</h1>' );
			else :
				the_title( '<h2 class="entry-title"><a href="' . esc_url( get_permalink() ) . '" rel="bookmark">', '</a></h2>' );
			endif; ?>
		</header><!-- .entry-header -->

		<div class="featured-image">
			<?php online_business_post_thumbnail(); ?>
		</div><!-- .featured-image -->

		<div class="entry-content">
			<?php the_content(); ?>
		</div><!-- .entry-content -->

		<footer class="entry-footer clear">
			<?php online_business_entry_footer(); ?>
		</footer><!-- .entry-footer -->
	</div><!-- .blog-post-item -->
</article><!-- #post-<?php the_ID(); ?> -->
