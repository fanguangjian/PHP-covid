<?php
if( get_theme_mod( 'blog_list_grid', 'list' ) == 'grid2c' ) { // if Grid 2 Column selected
	echo '<div class="col-md-6">';
} elseif( get_theme_mod( 'blog_list_grid', 'list' ) == 'grid3c' ) { // if Grid 3 Column selected
	echo '<div class="col-md-4">';
} else {
	echo '';
}
?>
	<div id="post-<?php the_ID(); ?>" <?php post_class('clearfix postsloop dimasonrybox di-post-contents di-archive di-archive-typo'); ?> itemscope itemtype="http://schema.org/CreativeWork">
		<div class="content-first">
			<?php
			$template_parts = get_theme_mod( 'archive_structure', array( 'archive_featured_image', 'categories', 'loop_headline', 'date', 'loop_content' ) );
			if( ! empty( $template_parts ) && is_array( $template_parts ) ) {
				foreach ( $template_parts as $part ) {
					get_template_part( 'template-parts/post-parts/post-' . $part );
				}
			}
			?>
		</div>
	</div>
<?php
if ( get_theme_mod( 'blog_list_grid', 'list' ) == 'grid2c' || get_theme_mod( 'blog_list_grid', 'list' ) == 'grid3c' ) { // if Grid 2 || 3 Column selected
	echo '</div>';
} else {
	echo '';
}
?>