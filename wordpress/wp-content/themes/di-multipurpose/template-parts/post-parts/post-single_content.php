<div class="content-third di-entry-content di-single-contents-typo">
	<div class="entry-content" itemprop="text">	
		<?php the_content(); ?>	
		<div class="clearfix"></div>	
		<?php
		wp_link_pages( array(
				'before'           => '<p class="pagelinks">' . __( 'Pages:', 'di-multipurpose' ),
				'after'            => '</p>',
				'link_before'      => '<span class="pagelinksa">',
				'link_after'       => '</span>',
				)
		);
		?>	
	</div>
</div>