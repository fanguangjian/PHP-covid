<?php
/**
 * The template for displaying the footer
 *
 * Contains the closing of the #content div and all content after.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package online_business
 */

?>
	</div><!-- #content -->

	<footer id="colophon" class="site-footer">
		<?php if ( is_active_sidebar( 'sidebar-2' ) || is_active_sidebar( 'sidebar-3' ) || is_active_sidebar( 'sidebar-4' ) ) : ?>
			<div id="footer-widgets" class="container">
				<?php
					get_template_part( 'inc/footer', 'widgets' );
				?>
			</div><!-- .container -->
		<?php endif; ?>

		<div class="site-info">
			<div class="container">
				<?php
				$copyright_text = sprintf( __( 'Theme Online Business by %s', 'online-business' ), '<a target="_blank" rel="designer" href="'.esc_url( 'https://kantipurthemes.com/' ).'">'. esc_html__( 'Kantipur Themes', 'online-business' ). '</a>' ); ?>

				<?php echo $copyright_text; ?>
			</div><!-- .container -->
		</div><!-- .site-info -->
	</footer><!-- #colophon -->
</div><!-- #page -->

<?php wp_footer(); ?>

</body>
</html>
