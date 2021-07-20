<?php
// Nothing to do if post_password_required
if( post_password_required() ) {
	return;
}

// If comments are not open or we have not any comment, do not load up the comment template.
if( ! have_comments() && ! comments_open() ) {
	return;
}
?>

<div class="content-first single-posst" id="commentcount">
	
	<div class="content-third">
		<div id="comments" class="comments-area">

			<?php
			if ( have_comments() ) {
			?>
			
				<h4 class="comments-title">
					<?php
					printf(
						/* translators: 1: comment number, 2: post title, 3: comment text 'One' if single comment */
						_nx(
							'%3$s comment on &ldquo;<span>%2$s</span>&rdquo;',
							'%1$s comments on &ldquo;<span>%2$s</span>&rdquo;',
							get_comments_number(),
							'comments title',
							'di-multipurpose'
						),
						esc_html( number_format_i18n( get_comments_number() ) ),
						esc_html( get_the_title() ),
						esc_html__( 'One', 'di-multipurpose' ) );
					?>
				</h4>

				<?php
				wp_list_comments( array(
				'style'		=> 'div',
				'type'		=> 'comment',
				'callback'	=> 'di_multipurpose_comments',
				) );
				?>

				<?php
				wp_list_comments( array(
				'style'		=> 'div',
				'type'		=> 'pings',
				) );
				?>


				<?php
				// Are there comments to navigate through?
				if( get_comment_pages_count() > 1 && get_option( 'page_comments' ) ) {
				?>
					<div class="clearfix"></div>
					<nav class="navigation post-navigation dicomntnav" role="navigation">
						<div class="nav-previous"><?php previous_comments_link( __( '&larr; Older Comments', 'di-multipurpose' ) ); ?></div>
						<div class="nav-next"><?php next_comments_link( __( 'Newer Comments &rarr;', 'di-multipurpose' ) ); ?></div>
					</nav>
					<div class="clearfix"></div>
				<?php
				}
				?>

			<?php
			}
			?>

			<?php
			if( comments_open() ) {
				comment_form();
			} else {
			?>
				<div class="alert alert-info mrt20">
				<?php esc_html_e( 'Comments are closed for this post !!', 'di-multipurpose' ); ?>
				</div>
			<?php
			}
			?>

		</div>
	</div>
</div>
