<div class="content-third di-posts-content di-archive-contents-typo" itemprop="text">
	<div class="entry-content" >
		<?php
		if( get_theme_mod( 'excerpt_or_content', 'excerpt' ) == 'excerpt' ) {
			the_excerpt();
		} else {
			the_content();
		}
		?>
	</div>	
</div>