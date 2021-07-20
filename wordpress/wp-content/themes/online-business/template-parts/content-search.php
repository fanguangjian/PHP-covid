<?php
/**
 * Template part for displaying results in search pages
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package online_business
 */

?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
	<div class="blog-post-item">
		<div class="featured-image">
			<?php online_business_post_thumbnail(); ?>
		</div><!-- .featured-image -->

		<header class="entry-header">
			<?php
			if ( is_singular() ) :
				the_title( '<h1 class="entry-title">', '</h1>' );
			else :
				the_title( '<h2 class="entry-title"><a href="' . esc_url( get_permalink() ) . '" rel="bookmark">', '</a></h2>' );
			endif; ?>
		</header><!-- .entry-header -->

		<div class="entry-content">
			<?php the_excerpt(); ?>
		</div><!-- .entry-content -->

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
	</div><!-- .blog-post-item -->
</article><!-- #post-<?php the_ID(); ?> -->
