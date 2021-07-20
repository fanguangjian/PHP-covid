<div id="post-<?php the_ID(); ?>" <?php post_class('clearfix single-posst di-page-contents'); ?> itemscope itemtype="http://schema.org/CreativeWork">
	<div class="content-first">
				
		<div class="content-second di-post-title">
			<h1 class="the-title entry-title" itemprop="headline"><?php the_title(); ?></h1>
		</div>
				
		<div class="content-third" itemprop="text">
					
			<div class="entry-content">

				<?php di_multipurpose_post_thumbnail(); ?>

				<?php the_content(); ?>

			</div>
					
			<?php
			wp_link_pages( array(
				'before'           => '<p class="pagelinks">' . __( 'Pages:', 'di-multipurpose' ),
				'after'            => '</p>',
				'link_before'      => '<span class="pagelinksa">',
				'link_after'       => '</span>',
			) );
			?>
					
		</div>
					
	</div>
</div>
