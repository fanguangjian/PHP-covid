<div class="owl-carousel owl-theme ditop-owl-carousel">
	<?php

	$r = new WP_Query( array(
	'posts_per_page'		=> absint( get_theme_mod( 'front_slider_num', '3' ) ),
	'no_found_rows'			=> true,
	'post_status'			=> 'publish',
	'ignore_sticky_posts'	=> true,
	'tag_id'				=> absint( get_theme_mod( 'front_slider_tag', '' ) )
	) );

	if( $r->have_posts() ) {
		while( $r->have_posts() ) : $r->the_post();
		?>
			<div class="item">
				<a href="<?php the_permalink(); ?>">
				<?php
				if( has_post_thumbnail() ) {
					the_post_thumbnail( 'di-multipurpose-owl-img' );
				} else {
				?>
					<img src="<?php echo esc_url( trailingslashit( get_template_directory_uri() ) . 'assets/images/owl-default.png' ); ?>" width="450" height="300" />
				<?php
				}
				?>
				</a>

			<div class="diowl-overlay">
				<div class="diowl-text">
					<span class="diowl-cat"><?php the_category( ' ' ); ?></span>
					<h3><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h3>
				</div>
			</div>
			</div>
		<?php
		endwhile;
		wp_reset_postdata();
	}
	?>
</div>
