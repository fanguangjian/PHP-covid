<?php
if( class_exists( 'WooCommerce' ) ) {
	// mini cart widget does not work on cart and checkout page so hide on these both page.
	if( ! is_cart() && ! is_checkout() ) {

		if( get_theme_mod( 'sb_cart_onoff', '0' ) == 1 ) {
			?>

			<div class="side-menu-menu-wrap">
				<?php
					the_widget( 'WC_Widget_Cart' );
				?>
				<button class="side-menu-close-button" id="side-menu-close-button"></button>
			</div>

			<a id="side-menu-open-button" href="#" class="side-menu-menu-button" title="<?php esc_attr_e( 'Shopping Cart', 'di-multipurpose' );  ?>">
				<span class="fa fa-shopping-basket di-shopping-basket"></span>

				<?php
					$count = WC()->cart->cart_contents_count;
					if( $count >= 1 ) {
						?>
						<span class="di-cart-count-animate"><?php echo esc_html( $count ); ?></span>
						<?php
					}
					else {
						?>
						<span class="di-cart-count-animate"><?php esc_html_e( '0', 'di-multipurpose' ); ?></span>
						<?php
					}
				?>

			</a>
			<?php
		}

	}
}
