<div class="container-fluid footer-copyright pdt10 pdb10 clearfix">
	<div class="container">	
		<div class="row mrt10">
		
			<div class="col-md-4 ftrcprt-left cprtlft_ctmzr">
				<?php echo do_shortcode( wp_kses_post( get_theme_mod( 'left_footer_setting', '<p>' . __( 'Site Title, Some rights reserved.', 'di-multipurpose' ) . '</p>' ) ) ); ?>
			</div>
				
			<div class="col-md-4 ftrcprt-center cprtcntr_ctmzr">
				<?php echo do_shortcode( wp_kses_post( get_theme_mod( 'center_footer_setting', '<p><a href="#">' . __( 'Terms of Use - Privacy Policy', 'di-multipurpose' ) . '</a></p>' ) ) ); ?>
			</div>
				
			<div class="col-md-4 ftrcprt-right cprtright_ctmzr">
				<?php do_action( 'di_multipurpose_footer_copyright_right_setting_front' ); ?>
			</div>
			
		</div>
	</div>
</div>
