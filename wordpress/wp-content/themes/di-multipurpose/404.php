<?php get_header(); ?>
<div class="col-md-8">
	<div class="left-content" >
		<div class="content-first single-posst di-page-contents">

			<div class="content-second di-post-title">
				<h1 class="the-title entry-title" itemprop="headline"><?php esc_html_e( 'Oops! That page can not be found.', 'di-multipurpose' ); ?></h1>
			</div>
			
			<div class="content-third">
				
				<p><?php esc_html_e( 'It looks like nothing was found at this location. Maybe try a search?', 'di-multipurpose' ); ?></p>
				
				<p></p>

				<?php get_search_form(); ?>

				<p class="clearboth"></p>

				<div class="recents-nopostsfound">
					<?php
					the_widget( 'WP_Widget_Recent_Posts' );
					?>
				</div>

			</div>

		</div>
	</div>
</div>
<?php get_sidebar(); ?>
<?php get_footer(); ?>
