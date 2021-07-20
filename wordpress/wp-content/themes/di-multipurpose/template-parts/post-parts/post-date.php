<div class="di-post-date">
	<p class="post-date updated" itemprop="dateModified">
		<?php
		if( get_theme_mod( 'post_date_view', '1' ) == 1 ) {
			the_modified_date();
		} else {
			the_date();
		}
		?></p>
</div>
