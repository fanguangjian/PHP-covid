<?php

if( ! function_exists( 'di_multipurpose_register_required_plugins' ) ) {
	/**
	 * Display recommended plugins using TGMPA class.
	 * @return [type] [description]
	 */
	function di_multipurpose_register_required_plugins() {
		
		$plugins = array(
			
			array(
				'name'      => __( 'Di Multipurpose Demo Importer', 'di-multipurpose'),
				'slug'      => 'di-multipurpose-demo-importer',
				'required'  => false,
			),
			
			array(
				'name'      => __( 'Regenerate Thumbnails', 'di-multipurpose'),
				'slug'      => 'regenerate-thumbnails',
				'required'  => false,
			),

			array(
				'name'      => __( 'Elementor Page Builder', 'di-multipurpose'),
				'slug'      => 'elementor',
				'required'  => false,
			),

			array(
				'name'      => __( 'Elementor Post Grid Addon', 'di-multipurpose'),
				'slug'      => 'post-grid-elementor-addon',
				'required'  => false,
			),

			array(
				'name'      => __( 'Contact Form 7', 'di-multipurpose'),
				'slug'      => 'contact-form-7',
				'required'  => false,
			),

			array(
				'name'      => __( 'WooCommerce', 'di-multipurpose'),
				'slug'      => 'woocommerce',
				'required'  => false,
			),

		);
		
		
		$config = array(
			'id'           => 'di-multipurpose',                 // Unique ID for hashing notices for multiple instances of TGMPA.
			'default_path' => '',                      // Default absolute path to bundled plugins.
			'menu'         => 'di-multipurpose-install-plugins', // Menu slug.
			'has_notices'  => true,                    // Show admin notices or not.
			'dismissable'  => true,                    // If false, a user cannot dismiss the nag message.
			'dismiss_msg'  => '',                      // If 'dismissable' is false, this message will be output at top of nag.
			'is_automatic' => false,                   // Automatically activate plugins after installation or not.
			'message'      => '',                      // Message to output right before the plugins table.
		);

		tgmpa( $plugins, $config );
	}
}
add_action( 'tgmpa_register', 'di_multipurpose_register_required_plugins' );

