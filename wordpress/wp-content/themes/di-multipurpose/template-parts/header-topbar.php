<?php
/**
 * Load top bar parts according settings.
 */
?>


<?php
// find the correct id of page
if( is_home() ) {
	$di_post_id = get_option( 'page_for_posts' );
} else {
	$di_post_id = get_the_ID();
}

// Return from file if disabled using meta box.
if( $di_post_id ) {
	if( get_post_meta( $di_post_id, '_di_multipurpose_hide_top_bar', true ) == '1' ) {
		return;
	}
}
?>


<?php
// Display if enabled in customize
if( get_theme_mod( 'display_top_bar', '1' ) == 1 ) {
?>
<div class="container-fluid bgtoph">
	<div class="container">
		<div class="row pdt10">
		
			<div class="col-md-6">
				<div class="topbar-left-side">
					<?php
					$tpbr_left_view = get_theme_mod( 'tpbr_left_view', '1' );
					if( $tpbr_left_view == '1' ) {
						get_template_part( 'template-parts/topbar-parts/topbar', 'phonemail' );
					} else if ( $tpbr_left_view == '2' ) {
						get_template_part( 'template-parts/topbar-parts/topbar', 'lefttexthtml' );
					} else if ( $tpbr_left_view == '3' ) {
						get_template_part( 'template-parts/topbar-parts/topbar', 'menu' );
					} else if ( $tpbr_left_view == '4' ) {
						get_template_part( 'template-parts/topbar-parts/topbar', 'icons' );
					} else {
						// Disabled selected.
						echo '';
					}
					?>
				</div>
			</div>
			
			<div class="col-md-6">
				<div class="topbar-right-side">
					<?php
					$tpbr_right_view = get_theme_mod( 'tpbr_right_view', '4' );
					if( $tpbr_right_view == '1' ) {
						get_template_part( 'template-parts/topbar-parts/topbar', 'phonemail' );
					} else if ( $tpbr_right_view == '2' ) {
						get_template_part( 'template-parts/topbar-parts/topbar', 'righttexthtml' );
					} else if ( $tpbr_right_view == '3' ) {
						get_template_part( 'template-parts/topbar-parts/topbar', 'menu' );
					} else if ( $tpbr_right_view == '4' ) {
						get_template_part( 'template-parts/topbar-parts/topbar', 'icons' );
					} else {
						// Disabled selected.
						echo '';
					}
					?>
				</div>
			</div>
			
		</div>
	</div>
</div>
<?php
}
?>
