<?php
/**
 * File for render header layout 2 (widget - logo and menu below)
 */
?>

<div class="container-fluid headermain clearfix dimlayout2">
	<div class="headermain-overlay-color"></div>
	<div class="container">
		<div class="row">
			
			<div class="col-sm-6 sidebar-header-left-otr" >
				<div class="sidebar-header-left">
					<?php
					if ( is_active_sidebar( 'sidebar_header_left' ) ) {
						dynamic_sidebar( 'sidebar_header_left' );
					}
					?>
				</div>
			</div>
			
			<div class="col-sm-6 dimlogoutr">
				<div class="dimlogo">
					<?php
					if( has_custom_logo() ) {
					?>
						<div class="logo-as-img">
							<div itemscope itemtype="http://schema.org/Organization" >
								<?php the_custom_logo(); ?>
							</div>
						</div>
					<?php
					} else {
					?>
						<div class="logo-as-txt">
							<a href='<?php echo esc_url( home_url( '/' ) ); ?>' rel='home' >
								<h3 class='site-name-pr'><?php echo esc_html( get_bloginfo( 'name' ) ); ?></h3>
								<p class='site-description-pr'><?php echo esc_html( get_bloginfo( 'description' ) ); ?></p>
							</a>
						</div>
					<?php
					}
					?>
				</div>
			</div>

		</div>
	</div>
</div>

<div id="navbarouter" class="navbarouter">
	<?php
	if( class_exists( 'Mega_Menu' ) && max_mega_menu_is_enabled( 'primary' ) ) {
		wp_nav_menu( array( 'theme_location' => 'primary' ) );
	} else {
	?>
		<nav id="navbarprimary" class="navbar navbar-expand-md navbarprimary">
			<div class="container">
				<div class="navbar-header">
					<span class="small-menu-label"><?php esc_html_e( 'Menu', 'di-multipurpose' ); ?></span>
					<button type="button" class="navbar-toggler" data-toggle="collapse" data-target="#collapse-navbarprimary">
						<span class="navbar-toggler-icon"></span>
					</button>
				</div>
						
				<?php
				wp_nav_menu( array(
					'theme_location'    => 'primary',
					'depth'             =>  3,
					'container'         => 'div',
					'container_id'      => 'collapse-navbarprimary',
					'container_class'   => 'collapse navbar-collapse',
					'menu_id' 			=> 'primary-menu',
					'menu_class'        => 'nav navbar-nav primary-menu',
					'fallback_cb'       => 'di_multipurpose_nav_fallback',
					'walker'            => new Di_Multipurpose_Nav_Menu_Walker()
					));
				?>

			</div>
		</nav>
	<?php
	}
	?>
</div>
