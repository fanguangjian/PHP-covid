<?php
/**
 * File for render header layout 9 (widget - logo - widget and no menu below)
 */
?>

<div class="container-fluid headermain clearfix dimlayout9">
	<div class="headermain-overlay-color"></div>
	<div class="container">
		<div class="row">
			
			<div class="col-sm-4 sidebar-header-left-otr">
				<div class="sidebar-header-left">
					<?php
					if ( is_active_sidebar( 'sidebar_header_left' ) ) {
						dynamic_sidebar( 'sidebar_header_left' );
					}
					?>
				</div>
			</div>
			
			<div class="col-sm-4 dimlogoutr" >
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

			<div class="col-sm-4 sidebar-header-right-otr">
				<div class="sidebar-header-right">
					<?php
					if ( is_active_sidebar( 'sidebar_header_right' ) ) {
						dynamic_sidebar( 'sidebar_header_right' );
					}
					?>
				</div>
			</div>

		</div>
	</div>
</div>
