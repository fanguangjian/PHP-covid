<?php

if( ! function_exists( 'di_multipurpose_theme_page' ) ) {
	/**
	 * Theme page initialize.
	 * @return [type] [description]
	 */
	function di_multipurpose_theme_page() {
		add_theme_page(
			__( 'Di Multipurpose Theme', 'di-multipurpose' ),
			__( 'Theme Info', 'di-multipurpose' ),
			'manage_options',
			'di-multipurpose-theme',
			'di_multipurpose_theme_page_callback'
		);
	}
}
add_action( 'admin_menu', 'di_multipurpose_theme_page' );

if( ! function_exists( 'di_multipurpose_theme_page_callback' ) ) {
	/**
	 * Render the theme page.
	 * @return [type] [description]
	 */
	function di_multipurpose_theme_page_callback() {
	?>
		<div class="wrap">
			<h1><?php esc_html_e( 'Di Multipurpose Theme Info', 'di-multipurpose' ); ?></h1>
			<br />
			<div class="di-container-fluid">
				<div class="di-row">

					<div class="di-col-md-6" style="padding:0px;">
						<img class="di-img-fluid" src="<?php echo esc_url( get_template_directory_uri() . '/screenshot.png' ); ?>" />
					</div>

					<div class="di-col-md-6">

						<h2 class="di-h2-headline"><?php esc_html_e( 'Di Multipurpose WordPress Theme', 'di-multipurpose' ); ?></h2>

						<p style="font-size:16px;"><?php esc_html_e( 'Di Multipurpose is the ultimate multipurpose theme for WordPress. This WordPress theme comes with multipurpose function, more than 30 ready made demo websites with one click import feature. It is the perfect theme to display business information\'s, blog, portfolio, forum and here you can sell your services and products online, and you can use more upcoming features.', 'di-multipurpose' ); ?></p>

						<?php
						if( ! function_exists( 'di_multipurpose_pro' ) ) {
						?>

							<p style="font-size:16px;"><a href="https://dithemes.com/di-multipurpose-free-wordpress-theme/" target="_blank"><?php esc_html_e( 'Di Multipurpose Free Theme Features', 'di-multipurpose' ); ?></a></p>

							<p style="font-size:16px;"><b><?php esc_html_e( 'Di Multipurpose Pro Features: ', 'di-multipurpose' ); ?></b><?php esc_html_e( 'Widget Area Creation and Selection, Advance Header Image Options, Slider in Header, Options to Update Footer Front Credit Link, Premium Support.', 'di-multipurpose' ); ?><p>
						<?php
						}
						?>

						<div style="text-align: center;" >

							<a target="_blank" class="di-btn di-btn-outline-success di-btn-sm" href="https://dithemes.com/di-multipurpose-theme-demos/" role="button"><?php esc_html_e( 'Theme Demos', 'di-multipurpose' ); ?></a>

							<a target="_blank" class="di-btn di-btn-outline-success di-btn-sm" href="https://dithemes.com/di-multipurpose-free-wordpress-theme-documentation/" role="button"><?php esc_html_e( 'Theme Docs', 'di-multipurpose' ); ?></a>

							<a target="_blank" class="di-btn di-btn-outline-success di-btn-sm" href="<?php echo esc_url( get_dashboard_url() . 'customize.php' ); ?>" role="button"><?php esc_html_e( 'Theme Options', 'di-multipurpose' ); ?></a>

							<?php
							if( function_exists( 'di_multipurpose_pro' ) ) {
							?>
								<a target="_blank" class="di-btn di-btn-outline-success di-btn-sm" href="https://dithemes.com/my-tickets/" role="button"><?php esc_html_e( 'Get Premium Support', 'di-multipurpose' ); ?></a>
							<?php
							} else {
							?>
								<a target="_blank" class="di-btn di-btn-outline-success di-btn-sm" href="https://dithemes.com/product/di-multipurpose-pro-wordpress-theme/" role="button"><?php esc_html_e( 'Get Di Multipurpose Pro', 'di-multipurpose' ); ?></a>
							<?php
							}
							?>

						</div>
						<br />

					</div>
				</div>
			</div>
		</div>
	<?php
	}
}

// Enqueue js css files only if pagenow is themes.php and query string is page=di-multipurpose-them.
global $pagenow;
if ( $pagenow === 'themes.php' && isset( $_SERVER['QUERY_STRING'] ) && $_SERVER['QUERY_STRING'] === 'page=di-multipurpose-theme' ) {
	add_action( 'admin_enqueue_scripts', 'di_multipurpose_admin_css' );
}

if( ! function_exists( 'di_multipurpose_admin_css' ) ) {
	/**
	 * [di_multipurpose_admin_css description]
	 * @return [type] [description]
	 */
	function di_multipurpose_admin_css() {
		wp_enqueue_style( 'di-multipurpose-theme-page', get_template_directory_uri() . '/assets/css/theme-page.css', array(), '4.0.0', 'all' );
	}
}
