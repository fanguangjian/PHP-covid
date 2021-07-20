<?php
get_header();
$archive_layout = get_theme_mod( 'blog_archive_layout', 'rights' );
?>
<div class="<?php if( $archive_layout == 'rights' ) { echo 'col-md-8'; } elseif( $archive_layout == 'lefts' ) { echo 'col-md-8 layoutleftsidebar'; } else { echo 'col-md-12'; } ?>">
	<div class="left-content" >	
		<?php
		if( have_posts() ) {

			// if Masonry 2 Column or Masonry 3 Column selected
			if( get_theme_mod( 'blog_list_grid', 'list' ) == 'msry2c' || get_theme_mod( 'blog_list_grid', 'list' ) == 'msry3c' ) {
				echo '<div class="dimasonry">';
			}
				// if Grid 2 Column or Grid 3 Column selected
				if( get_theme_mod( 'blog_list_grid', 'list' ) == 'grid2c' || get_theme_mod( 'blog_list_grid', 'list' ) == 'grid3c' ) {
					echo '<div class="row">';
				}

					while( have_posts() ) : the_post();

						get_template_part( 'template-parts/content', 'loop' );

					endwhile;

				// if Grid 2 Column or Grid 3 Column selected
				if( get_theme_mod( 'blog_list_grid', 'list' ) == 'grid2c' || get_theme_mod( 'blog_list_grid', 'list' ) == 'grid3c' ) {
					echo '</div>';
				}

			// if Masonry 2 Column or Masonry 3 Column selected
			if ( get_theme_mod( 'blog_list_grid', 'list' ) == 'msry2c' || get_theme_mod( 'blog_list_grid', 'list' ) == 'msry3c' ) {
				echo '</div>';
			}

			di_multipurpose_posts_pagination();

		} else {
			get_template_part( 'template-parts/content', 'none' );
		}
		?>
	</div>
</div>
<?php if( $archive_layout == 'rights' || $archive_layout == 'lefts' ) { get_sidebar(); } ?>
<?php get_footer(); ?>
