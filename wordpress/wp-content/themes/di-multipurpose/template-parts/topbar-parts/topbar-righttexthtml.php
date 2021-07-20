<?php
/**
 * Will contain custom text and HTML.
 */
?>

<div class="topbar_ctmzr_right">
	<?php
	echo wp_kses_post( get_theme_mod( 'top_bar_right_content', '</p>' . __( 'Right Contents.', 'di-multipurpose' ) . '</p>' ) );
	?>
</div>
