<?php
/**
 * Will contain top bar menu.
 */
?>

<div class="topbar-menu pdb10">
	<?php
	if( has_nav_menu( 'topbar' ) ) {
		wp_nav_menu( array(
			'theme_location'    => 'topbar',
			'depth'             =>  1,
		) );
	}
	?>
</div>
