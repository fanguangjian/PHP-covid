<?php
// Return if disabled in customize.
if( get_theme_mod( 'sngle_pst_related_psts', '0' ) == '0' ) {
	return;
}

$query_args = array( 
	'category__in'		=> wp_get_post_categories( $post->ID ),
	'post_type'			=> 'post',
	'posts_per_page'	=> '3',
	'post__not_in'		=> array( $post->ID ),
);

$related = new WP_Query( $query_args );

if( $related->have_posts() ) {
	?>
	<div class="di-small-border di-related-posts">
		<div class="di-related-posts-inner">
			<p class="di-related-posts-title"><?php echo esc_html( get_theme_mod( 'sngle_pst_related_psts_txt', __( 'You Might Also Like:', 'di-multipurpose' ) ) ); ?></p>

			<div class="di-related-posts-contents">
				<?php
				while( $related->have_posts() ) : $related->the_post();
					?>
					<div class="di-related-posts-col">
						<a href="<?php the_permalink(); ?>">
							<?php
							if( has_post_thumbnail() ) {
								the_post_thumbnail( 'di-multipurpose-related-posts-thumb' );
							} else {
								?>
								<img class="attachment-di-multipurpose-related-posts-thumb default-related-posts-thumb" src="<?php echo esc_url( get_template_directory_uri() ) . '/assets/images/default-related.jpg'; ?>">
								<?php
							}
							?>
						</a>
						<h3 class="di-related-posts-headline"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h3>
						<p class="di-related-posts-date"><?php echo esc_html( get_the_date() ); ?></p>
					</div>
					<?php
				endwhile;

				// Restore original Post Data
				wp_reset_postdata();
				?>
			</div>
		</div>
	</div>
	<?php
}
