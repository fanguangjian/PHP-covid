<?php
/**
 * Will contain custom text and HTML.
 */
?>

<div class="topbar_ctmzr_left">
	<?php
	echo wp_kses_post( get_theme_mod( 'top_bar_left_content', '</p>' . __( 'Left Contents.', 'di-multipurpose' ) . '</p>' ) );
	?>
</div>