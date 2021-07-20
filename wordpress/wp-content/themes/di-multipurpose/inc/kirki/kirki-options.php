<?php
// Disable kirki telemetry
add_filter( 'kirki_telemetry', '__return_false' );

//set Kirki config
Kirki::add_config( 'di_multipurpose_config', array(
	'capability'    => 'edit_theme_options',
	'option_type'   => 'theme_mod',
) );

//the main panel
Kirki::add_panel( 'di_multipurpose_options', array(
	'title'       => esc_attr__( 'Di Multipurpose Options', 'di-multipurpose' ),
	'description' => esc_attr__( 'All options of Di Multipurpose theme', 'di-multipurpose' ),
) );

do_action( 'di_multipurpose_kirki_settings_start' );

//typography
Kirki::add_section( 'typography_options', array(
	'title'          => esc_attr__( 'Typography Options', 'di-multipurpose' ),
	'panel'          => 'di_multipurpose_options',
	'capability'     => 'edit_theme_options',
) );

Kirki::add_field( 'di_multipurpose_config', array(
	'type'        => 'typography',
	'settings'    => 'body_typog',
	'label'       => esc_attr__( 'Body Typography', 'di-multipurpose' ),
	'section'     => 'typography_options',
	'default'     => array(
		'font-family'    => 'Lora',
		'variant'        => 'regular',
		'font-size'      => '14px',
	),
	'output'      => array(
		array(
			'element' => 'body',
		),
	),
	'transport' => 'auto',
) );

Kirki::add_field( 'di_multipurpose_config', array(
	'type'        => 'typography',
	'settings'    => 'site_title_typog',
	'label'       => esc_attr__( 'Site Title Typography', 'di-multipurpose' ),
	'section'     => 'typography_options',
	'default'     => array(
		'font-family'    => 'Arvo',
		'variant'        => 'regular',
		'font-size'      => '22px',
		'line-height'    => '1.1',
		'letter-spacing' => '0',
		'text-transform' => 'inherit'
	),
	'output'      => array(
		array(
			'element' => '.headermain h3.site-name-pr',
		),
	),
	'transport' => 'auto',
	'active_callback'  => ( function() {
		if( has_custom_logo() ) {
			return false;
		}
		return true;
	} ),
) );

Kirki::add_field( 'di_multipurpose_config', array(
	'type'        => 'typography',
	'settings'    => 'h1_typog',
	'label'       => esc_attr__( 'H1 / Headline 1 Typography', 'di-multipurpose' ),
	'section'     => 'typography_options',
	'default'     => array(
		'font-family'    => 'Arvo',
		'variant'        => 'regular',
		'font-size'      => '24px',
		'line-height'    => '1.1',
		'letter-spacing' => '0',
		'text-transform' => 'inherit'
	),
	'output'      => array(
		array(
			'element' => 'body h1, .h1',
		),
	),
	'transport' => 'auto',
) );

Kirki::add_field( 'di_multipurpose_config', array(
	'type'        => 'typography',
	'settings'    => 'h2_typog',
	'label'       => esc_attr__( 'H2 / Headline 2 Typography', 'di-multipurpose' ),
	'section'     => 'typography_options',
	'default'     => array(
		'font-family'    => 'Arvo',
		'variant'        => 'regular',
		'font-size'      => '22px',
		'line-height'    => '1.1',
		'letter-spacing' => '0',
		'text-transform' => 'inherit'
	),
	'output'      => array(
		array(
			'element' => 'body h2, .h2',
		),
	),
	'transport' => 'auto',
) );

Kirki::add_field( 'di_multipurpose_config', array(
	'type'        => 'typography',
	'settings'    => 'h3_typog',
	'label'       => esc_attr__( 'H3 / Headline 3 Typography', 'di-multipurpose' ),
	'section'     => 'typography_options',
	'default'     => array(
		'font-family'    => 'Arvo',
		'variant'        => 'regular',
		'font-size'      => '20px',
		'line-height'    => '1.3',
		'letter-spacing' => '0.5px',
		'text-transform' => 'inherit'
	),
	'output'      => array(
		array(
			'element' => 'body h3, .h3',
		),
	),
	'transport' => 'auto',
) );

Kirki::add_field( 'di_multipurpose_config', array(
	'type'        => 'typography',
	'settings'    => 'h4_typog',
	'label'       => esc_attr__( 'H4 / Headline 4 Typography', 'di-multipurpose' ),
	'section'     => 'typography_options',
	'default'     => array(
		'font-family'    => 'Arvo',
		'variant'        => 'regular',
		'font-size'      => '19px',
		'line-height'    => '1.1',
		'letter-spacing' => '0',
		'text-transform' => 'inherit'
	),
	'output'      => array(
		array(
			'element' => 'body h4, .h4',
		),
	),
	'transport' => 'auto',
) );

Kirki::add_field( 'di_multipurpose_config', array(
	'type'        => 'typography',
	'settings'    => 'h5_typog',
	'label'       => esc_attr__( 'H5 / Headline 5 Typography', 'di-multipurpose' ),
	'section'     => 'typography_options',
	'default'     => array(
		'font-family'    => 'Arvo',
		'variant'        => 'regular',
		'font-size'      => '18px',
		'line-height'    => '1.1',
		'letter-spacing' => '0',
		'text-transform' => 'inherit'
	),
	'output'      => array(
		array(
			'element' => 'body h5, .h5',
		),
	),
	'transport' => 'auto',
) );

Kirki::add_field( 'di_multipurpose_config', array(
	'type'        => 'typography',
	'settings'    => 'h6_typog',
	'label'       => esc_attr__( 'H6 / Headline 6 Typography', 'di-multipurpose' ),
	'section'     => 'typography_options',
	'default'     => array(
		'font-family'    => 'Arvo',
		'variant'        => 'regular',
		'font-size'      => '17px',
		'line-height'    => '1.1',
		'letter-spacing' => '0',
		'text-transform' => 'inherit'
	),
	'output'      => array(
		array(
			'element' => 'body h6, .h6',
		),
	),
	'transport' => 'auto',
) );

Kirki::add_field( 'di_multipurpose_config', array(
	'type'        => 'typography',
	'settings'    => 'p_typog',
	'label'       => esc_attr__( 'Default Paragraphs Typography', 'di-multipurpose' ),
	'section'     => 'typography_options',
	'default'     => array(
		'font-family'    => 'Fauna One',
		'variant'        => 'regular',
		'font-size'      => '14px',
		'line-height'    => '1.7',
		'letter-spacing' => '0.2px',
		'text-transform' => 'inherit',
	),
	'output'      => array(
		array(
			'element' => '.maincontainer p',
		),
	),
	'transport' => 'auto',
) );

Kirki::add_field( 'di_multipurpose_config', array(
	'type'        => 'typography',
	'settings'    => 'widget_ul_ol_typog',
	'label'       => esc_attr__( 'Widgets UL/OL Typography', 'di-multipurpose' ),
	'description' => esc_attr__( 'Widgets Unordered List / Ordered List Typography', 'di-multipurpose' ),
	'section'     => 'typography_options',
	'default'     => array(
		'font-family'    => 'Roboto',
		'variant'        => 'regular',
		'font-size'      => '14px',
		'line-height'    => '1.5',
		'letter-spacing' => '0.1px',
		'text-transform' => 'inherit'
	),
	'output'      => array(
		array(
			'element' => '.widget_sidebar_main ul li, .widget_sidebar_main ol li',
		),
		array(
			'element' => '.widgets_footer ul li, .widgets_footer ol li',
		),
	),
	'transport' => 'auto',
) );

Kirki::add_field( 'di_multipurpose_config', array(
	'type'        => 'typography',
	'settings'    => 'body_ul_ol_li_typog',
	'label'       => esc_attr__( 'Container UL/OL Typography', 'di-multipurpose' ),
	'description' => esc_attr__( 'Typography for list in main contents.', 'di-multipurpose' ),
	'section'     => 'typography_options',
	'default'     => array(
		'font-family'    => 'Fjord One',
		'variant'        => 'regular',
		'font-size'      => '15px',
		'line-height'    => '1.7',
		'letter-spacing' => '0',
		'text-transform' => 'inherit',
	),
	'output'      => array(
		array(
			'element' => '.entry-content ul li, .entry-content ol li',
		),
	),
	'transport' => 'auto',
) );

do_action( 'di_multipurpose_typography_options' );

//typography END

//top bar
Kirki::add_section( 'top_bar', array(
	'title'          => esc_attr__( 'Top Bar Options', 'di-multipurpose' ),
	'panel'          => 'di_multipurpose_options',
	'capability'     => 'edit_theme_options',
) );

Kirki::add_field( 'di_multipurpose_config', array(
	'type'        => 'toggle',
	'settings'    => 'display_top_bar',
	'label'       => esc_attr__( 'Top Bar', 'di-multipurpose' ),
	'description' => esc_attr__( 'Enable/Disable Top Bar', 'di-multipurpose' ),
	'section'     => 'top_bar',
	'default'     => '1',
) );

Kirki::add_field( 'di_multipurpose_config', array(
	'type'        => 'select',
	'settings'    => 'tpbr_left_view',
	'label'       => esc_attr__( 'Top Bar Left Content View', 'di-multipurpose' ),
	'section'     => 'top_bar',
	'default'     => '1',
	'choices'     => array(
		'1' => esc_attr__( 'Address, Phone and Email', 'di-multipurpose' ),
		'2' => esc_attr__( 'Text / HTML', 'di-multipurpose' ),
		'3' => esc_attr__( 'Top Bar Menu', 'di-multipurpose' ),
		'4' => esc_attr__( 'Icons', 'di-multipurpose' ),
		'5' => esc_attr__( 'Disable', 'di-multipurpose' ),
	),
	'active_callback'  => array(
		array(
			'setting'  => 'display_top_bar',
			'operator' => '==',
			'value'    => 1,
		),
	)
) );

Kirki::add_field( 'di_multipurpose_config', array(
	'type'        => 'editor',
	'settings'    => 'top_bar_left_content',
	'label'       => esc_attr__( 'Top Bar Left Content', 'di-multipurpose' ),
	'description' => esc_attr__( 'Text / HTML of Top Bar Left', 'di-multipurpose' ),
	'section'     => 'top_bar',
	'default'     => '</p>' . __( 'Left Contents.', 'di-multipurpose' ) . '</p>',
	'transport' => 'postMessage',
	'js_vars'   => array(
		array(
			'element'  => '.topbar_ctmzr_left',
			'function' => 'html',
		),
	),
	'partial_refresh' => array(
		'top_bar_left_content' => array(
			'selector'        => '.topbar_ctmzr_left',
			'render_callback' => function() {
				echo wp_kses_post( get_theme_mod( 'top_bar_left_content', '</p>' . __( 'Left Contents.', 'di-multipurpose' ) . '</p>' ) );
			},
		),
	),
	'active_callback'  => array(
		array(
			'setting'  => 'display_top_bar',
			'operator' => '==',
			'value'    => 1,
		),
		array(
			'setting'  => 'tpbr_left_view',
			'operator' => '==',
			'value'    => 2,
		),
	)
) );

Kirki::add_field( 'di_multipurpose_config', array(
	'type'        => 'select',
	'settings'    => 'tpbr_right_view',
	'label'       => esc_attr__( 'Top Bar Right Content View', 'di-multipurpose' ),
	'section'     => 'top_bar',
	'default'     => '4',
	'choices'     => array(
		'1' => esc_attr__( 'Address, Phone and Email', 'di-multipurpose' ),
		'2' => esc_attr__( 'Text / HTML', 'di-multipurpose' ),
		'3' => esc_attr__( 'Top Bar Menu', 'di-multipurpose' ),
		'4' => esc_attr__( 'Icons', 'di-multipurpose' ),
		'5' => esc_attr__( 'Disable', 'di-multipurpose' ),
	),
	'active_callback'  => array(
		array(
			'setting'  => 'display_top_bar',
			'operator' => '==',
			'value'    => 1,
		),
	)
) );

Kirki::add_field( 'di_multipurpose_config', array(
	'type'        => 'editor',
	'settings'    => 'top_bar_right_content',
	'label'       => esc_attr__( 'Top Bar Right Content', 'di-multipurpose' ),
	'description' => esc_attr__( 'Text / HTML of Top Bar Right', 'di-multipurpose' ),
	'section'     => 'top_bar',
	'default'     => '</p>' . __( 'Right Contents.', 'di-multipurpose' ) . '</p>',
	'js_vars'   => array(
		array(
			'element'  => '.topbar_ctmzr_right',
			'function' => 'html',
		),
	),
	'partial_refresh' => array(
		'top_bar_right_content' => array(
			'selector'        => '.topbar_ctmzr_right',
			'render_callback' => function() {
				echo wp_kses_post( get_theme_mod( 'top_bar_right_content', '</p>' . __( 'Right Contents.', 'di-multipurpose' ) . '</p>' ) );
			},
		),
	),
	'active_callback'  => array(
		array(
			'setting'  => 'display_top_bar',
			'operator' => '==',
			'value'    => 1,
		),
		array(
			'setting'  => 'tpbr_right_view',
			'operator' => '==',
			'value'    => 2,
		),
	)
) );

Kirki::add_field( 'di_multipurpose_config', array(
	'type'			=> 'text',
	'settings'		=> 'tpbr_lft_addr',
	'label'			=> esc_attr__( 'Address', 'di-multipurpose' ),
	'description' 	=> esc_attr__( 'Leave empty for disable.', 'di-multipurpose' ),
	'section'		=> 'top_bar',
	'default'		=> esc_attr__( '123 Street, NYC, US', 'di-multipurpose' ),
	'partial_refresh' => array(
		'tpbr_lft_addr' => array(
			'selector'        => '.tpbr_lft_phne_ctmzr',
			'render_callback' => function() {
				get_template_part( 'template-parts/partial/topbar', 'phonemail' );
			},
		),
	),
	'active_callback'  => 'di_multipurpose_phonemail_active_callback',
) );

Kirki::add_field( 'di_multipurpose_config', array(
	'type'			=> 'text',
	'settings'		=> 'tpbr_lft_phne',
	'label'			=> esc_attr__( 'Phone Number', 'di-multipurpose' ),
	'description' 	=> esc_attr__( 'Leave empty for disable.', 'di-multipurpose' ),
	'section'		=> 'top_bar',
	'default'		=> esc_attr__( '0123456789', 'di-multipurpose' ),
	'partial_refresh' => array(
		'tpbr_lft_phne' => array(
			'selector'        => '.tpbr_lft_phne_ctmzr',
			'render_callback' => function() {
				get_template_part( 'template-parts/partial/topbar', 'phonemail' );
			},
		),
	),
	'active_callback'  => 'di_multipurpose_phonemail_active_callback',
) );

Kirki::add_field( 'di_multipurpose_config', array(
	'type'			=> 'text',
	'settings'		=> 'tpbr_lft_email',
	'label'			=> esc_attr__( 'Email Address', 'di-multipurpose' ),
	'description' 	=> esc_attr__( 'Leave empty for disable.', 'di-multipurpose' ),
	'section'		=> 'top_bar',
	'default'		=> esc_attr__( 'info@example.com', 'di-multipurpose' ),
	'partial_refresh' => array(
		'tpbr_lft_email' => array(
			'selector'        => '.tpbr_lft_phne_ctmzr',
			'render_callback' => function() {
				get_template_part( 'template-parts/partial/topbar', 'phonemail' );
			},
		),
	),
	'active_callback'  => 'di_multipurpose_phonemail_active_callback',
) );

function di_multipurpose_phonemail_active_callback() {
	$topbar = get_theme_mod( 'display_top_bar', '1' );
	$left = get_theme_mod( 'tpbr_left_view', '1' );
	$right = get_theme_mod( 'tpbr_right_view', '1' );
	if( $topbar == 1 && ( $left == 1 || $right == 1 ) ) {
		return true;
	} else {
		return false;
	}
}

Kirki::add_field( 'di_multipurpose_config', array(
	'type'        => 'toggle',
	'settings'    => 'display_sicons_top_bar',
	'label'       => esc_attr__( 'Social Icons', 'di-multipurpose' ),
	'description' => esc_attr__( 'Enable/Disable Social Icons', 'di-multipurpose' ),
	'section'     => 'top_bar',
	'default'     => '1',
	'active_callback'  => array(
		array(
			'setting'  => 'display_top_bar',
			'operator' => '==',
			'value'    => 1,
		),
	)
) );

Kirki::add_field( 'di_multipurpose_config', array(
	'type'        => 'toggle',
	'settings'    => 's_link_open',
	'label'       => esc_attr__( 'Social Links in New Tab?', 'di-multipurpose' ),
	'description' => esc_attr__( 'Open social links in new tab or same.', 'di-multipurpose' ),
	'section'     => 'top_bar',
	'default'     => '1',
	'active_callback'  => array(
		array(
			'setting'  => 'display_top_bar',
			'operator' => '==',
			'value'    => 1,
		),
		array(
			'setting'  => 'display_sicons_top_bar',
			'operator' => '==',
			'value'    => 1,
		),
	)
) );

Kirki::add_field( 'di_multipurpose_config', array(
	'type'        => 'color',
	'settings'    => 'top_bar_color',
	'label'       => esc_attr__( 'Top Bar Color', 'di-multipurpose' ),
	'section'     => 'top_bar',
	'default'     => '#ffffff',
	'choices'     => array(
		'alpha' => true,
	),
	'output' => array(
		array(
			'element'  => '.bgtoph',
			'property' => 'color',
		),
		array(
			'element'  => '.bgtoph a',
			'property' => 'color',
		),
	),
	'transport' => 'auto',
	'active_callback'  => array(
		array(
			'setting'  => 'display_top_bar',
			'operator' => '==',
			'value'    => 1,
		),
	)
) );

Kirki::add_field( 'di_multipurpose_config', array(
	'type'        => 'color',
	'settings'    => 'top_bar_bg_color',
	'label'       => esc_attr__( 'Top Bar Background Color', 'di-multipurpose' ),
	'section'     => 'top_bar',
	'default'     => '#020202',
	'choices'     => array(
		'alpha' => true,
	),
	'output' => array(
		array(
			'element'  => '.bgtoph',
			'property' => 'background-color',
		),
	),
	'transport' => 'auto',
	'active_callback'  => array(
		array(
			'setting'  => 'display_top_bar',
			'operator' => '==',
			'value'    => 1,
		),
	)
) );

Kirki::add_field( 'di_multipurpose_config', array(
	'type'        => 'color',
	'settings'    => 'top_bar_links_color',
	'label'       => esc_attr__( 'Links Color', 'di-multipurpose' ),
	'section'     => 'top_bar',
	'default'     => '#ffffff',
	'choices'     => array(
		'alpha' => true,
	),
	'output' => array(
		array(
			'element'  => '.bgtoph a',
			'property' => 'color',
		),
		array(
			'element'  => '.bgtoph-icon-clr',
			'property' => 'color',
		),
		array(
			'element'  => '.bgtoph-icon-clr',
			'property' => 'border-color',
		),
	),
	'transport' => 'auto',
	'active_callback'  => array(
		array(
			'setting'  => 'display_top_bar',
			'operator' => '==',
			'value'    => 1,
		),
	)
) );

Kirki::add_field( 'di_multipurpose_config', array(
	'type'        => 'color',
	'settings'    => 'top_bar_mover_link_color',
	'label'       => esc_attr__( 'Hover Links Color', 'di-multipurpose' ),
	'section'     => 'top_bar',
	'default'     => '#f66f66',
	'choices'     => array(
		'alpha' => true,
	),
	'output' => array(
		array(
			'element'  => '.bgtoph a:hover, .bgtoph a:focus',
			'property' => 'color',
		),
		array(
			'element'  => '.bgtoph-icon-clr:hover',
			'property' => 'color',
		),
		array(
			'element'  => '.bgtoph-icon-clr:hover',
			'property' => 'border-color',
		),
	),
	'transport' => 'auto',
	'active_callback'  => array(
		array(
			'setting'  => 'display_top_bar',
			'operator' => '==',
			'value'    => 1,
		),
	)
) );

do_action( 'di_multipurpose_top_bar' );

Kirki::add_field( 'di_multipurpose_config', array(
	'type'        => 'toggle',
	'settings'    => 'top_bar_seach_icon',
	'label'       => esc_attr__( 'Search Icon', 'di-multipurpose' ),
	'description' => esc_attr__( 'Enable/Disable Search Icon', 'di-multipurpose' ),
	'section'     => 'top_bar',
	'default'     => '1',
	'active_callback'  => array(
		array(
			'setting'  => 'display_top_bar',
			'operator' => '==',
			'value'    => 1,
		),
	)
) );

Kirki::add_field( 'di_multipurpose_config', array(
	'type'        => 'color',
	'settings'    => 'tp_br_sf_clr',
	'label'       => esc_attr__( 'Search Form Color', 'di-multipurpose' ),
	'section'     => 'top_bar',
	'default'     => '#f66f66',
	'choices'     => array(
		'alpha' => true,
	),
	'output' => array(
		array(
			'element'  => '.scp-search .scp-search__input, .scp-btn, .scp-search__info',
			'property' => 'color',
		),
	),
	'transport' => 'auto',
	'active_callback'  => array(
		array(
			'setting'  => 'display_top_bar',
			'operator' => '==',
			'value'    => 1,
		),
		array(
			'setting'  => 'top_bar_seach_icon',
			'operator' => '==',
			'value'    => 1,
		),
	)
) );

Kirki::add_field( 'di_multipurpose_config', array(
	'type'        => 'color',
	'settings'    => 'tp_br_sf_bg_clr',
	'label'       => esc_attr__( 'Search Form Background Color', 'di-multipurpose' ),
	'section'     => 'top_bar',
	'default'     => 'rgba(0,0,0,0.83)',
	'choices'     => array(
		'alpha' => true,
	),
	'output' => array(
		array(
			'element'  => '.scp-search',
			'property' => 'background-color',
		),
	),
	'transport' => 'auto',
	'active_callback'  => array(
		array(
			'setting'  => 'display_top_bar',
			'operator' => '==',
			'value'    => 1,
		),
		array(
			'setting'  => 'top_bar_seach_icon',
			'operator' => '==',
			'value'    => 1,
		),
	)
) );

Kirki::add_field( 'di_multipurpose_config', array(
	'type'        => 'typography',
	'settings'    => 'top_bar_typog',
	'label'       => esc_attr__( 'Top Bar Typography', 'di-multipurpose' ),
	'section'     => 'top_bar',
	'default'     => array(
		'font-family'    => 'Roboto',
		'variant'        => 'regular',
		'font-size'      => '13px',
		'line-height'    => '20px',
		'letter-spacing' => '0px',
		'text-transform' => 'inherit',
	),
	'output'      => array(
		array(
			'element' => '.bgtoph',
		),
	),
	'transport' => 'auto',
	'active_callback'  => array(
		array(
			'setting'  => 'display_top_bar',
			'operator' => '==',
			'value'    => 1,
		),
	),
) );

do_action( 'di_multipurpose_top_bar_search_form' );

do_action( 'di_multipurpose_top_bar_last_action' );

//top bar END

//Header layout
Kirki::add_section( 'header_layout_section', array(
	'title'          => esc_attr__( 'Header Layout Options', 'di-multipurpose' ),
	'panel'          => 'di_multipurpose_options',
	'capability'     => 'edit_theme_options',
) );

Kirki::add_field( 'di_multipurpose_config', array(
	'type'			=> 'radio-image',
	'settings'		=> 'header_layout',
	'label'			=> esc_attr__( 'Select Header Layout', 'di-multipurpose' ),
	'description'	=> esc_attr__( 'Choose the header layout.', 'di-multipurpose' ),
	'section'		=> 'header_layout_section',
	'default'		=> '1',
	'choices'		=> array(
		'1'		=> get_template_directory_uri() . '/assets/images/header-layout1.png',
		'2'		=> get_template_directory_uri() . '/assets/images/header-layout2.png',
		'3'		=> get_template_directory_uri() . '/assets/images/header-layout3.png',
		'4'		=> get_template_directory_uri() . '/assets/images/header-layout4.png',
		'5'		=> get_template_directory_uri() . '/assets/images/header-layout5.png',
		'6'		=> get_template_directory_uri() . '/assets/images/header-layout6.png',
		'7'		=> get_template_directory_uri() . '/assets/images/header-layout7.png',
		'8'		=> get_template_directory_uri() . '/assets/images/header-layout8.png',
		'9'		=> get_template_directory_uri() . '/assets/images/header-layout9.png',
		'20'	=> get_template_directory_uri() . '/assets/images/header-layout20.png',
	),
) );

Kirki::add_field( 'di_multipurpose_config', array(
	'type'        => 'select',
	'settings'    => 'hrdlyt67_algn_lgo',
	'label'       => esc_attr__( 'Logo Align', 'di-multipurpose' ),
	'section'     => 'header_layout_section',
	'default'     => 'left',
	'choices'     => array(
		'left' => esc_attr__( 'Left', 'di-multipurpose' ),
		'center' => esc_attr__( 'Center', 'di-multipurpose' ),
		'right' => esc_attr__( 'Right', 'di-multipurpose' ),
	),
	'active_callback'  => array(
		array(
			array(
				'setting'  => 'header_layout',
				'operator' => '==',
				'value'    => 6,
			),
			array(
				'setting'  => 'header_layout',
				'operator' => '==',
				'value'    => 7,
			),
		),
	),
) );

Kirki::add_field( 'di_multipurpose_config', array(
	'type'        	=> 'toggle',
	'settings'    	=> 'hrdlyt1_mnu_algn',
	'label'       	=> esc_attr__( 'Center Menu?', 'di-multipurpose' ),
	'description'	=> esc_attr__( 'It will display menu items in center.', 'di-multipurpose' ),
	'section'     	=> 'header_layout_section',
	'default'     	=> '0',
	'active_callback'  => array(
		array(
			array(
				'setting'  => 'header_layout',
				'operator' => '==',
				'value'    => 1,
			),
			array(
				'setting'  => 'header_layout',
				'operator' => '==',
				'value'    => 2,
			),
			array(
				'setting'  => 'header_layout',
				'operator' => '==',
				'value'    => 3,
			),
			array(
				'setting'  => 'header_layout',
				'operator' => '==',
				'value'    => 4,
			),
			array(
				'setting'  => 'header_layout',
				'operator' => '==',
				'value'    => 5,
			),
			array(
				'setting'  => 'header_layout',
				'operator' => '==',
				'value'    => 6,
			),
			array(
				'setting'  => 'header_layout',
				'operator' => '==',
				'value'    => 7,
			),
		),
	),
) );

Kirki::add_field( 'di_multipurpose_config', array(
	'type'        	=> 'toggle',
	'settings'    	=> 'hrdlyt1_mnu_stky',
	'label'       	=> esc_attr__( 'Sticky Menu?', 'di-multipurpose' ),
	'description'	=> esc_attr__( 'It will make menu sticky on large devices.', 'di-multipurpose' ),
	'section'     	=> 'header_layout_section',
	'default'     	=> '0',
	'active_callback'  => array(
		array(
			array(
				'setting'  => 'header_layout',
				'operator' => '==',
				'value'    => 1,
			),
			array(
				'setting'  => 'header_layout',
				'operator' => '==',
				'value'    => 2,
			),
			array(
				'setting'  => 'header_layout',
				'operator' => '==',
				'value'    => 3,
			),
			array(
				'setting'  => 'header_layout',
				'operator' => '==',
				'value'    => 4,
			),
			array(
				'setting'  => 'header_layout',
				'operator' => '==',
				'value'    => 5,
			),
			array(
				'setting'  => 'header_layout',
				'operator' => '==',
				'value'    => 6,
			),
			array(
				'setting'  => 'header_layout',
				'operator' => '==',
				'value'    => 7,
			),
		),
	),
) );

Kirki::add_field( 'di_multipurpose_config', array(
	'type'        	=> 'color',
	'settings'    	=> 'hrdlyt1_mnu_stky_bgclr',
	'label'       	=> esc_attr__( 'Sticky Menu Background Color', 'di-multipurpose' ),
	'section'     	=> 'header_layout_section',
	'default'     	=> 'rgba(0,0,0,0.6)',
	'choices'     	=> array(
		'alpha' => true,
	),
	'output' => array(
		array(
			'element'  => '.sticky_menu_top .navbarprimary',
			'property' => 'background-color',
		),
	),
	'transport' => 'auto',
	'active_callback'  => array(
		array(
			'setting'  => 'hrdlyt1_mnu_stky',
			'operator' => '==',
			'value'    => 1,
		),
		array(
			array(
				'setting'  => 'header_layout',
				'operator' => '==',
				'value'    => 1,
			),
			array(
				'setting'  => 'header_layout',
				'operator' => '==',
				'value'    => 2,
			),
			array(
				'setting'  => 'header_layout',
				'operator' => '==',
				'value'    => 3,
			),
			array(
				'setting'  => 'header_layout',
				'operator' => '==',
				'value'    => 4,
			),
			array(
				'setting'  => 'header_layout',
				'operator' => '==',
				'value'    => 5,
			),
			array(
				'setting'  => 'header_layout',
				'operator' => '==',
				'value'    => 6,
			),
			array(
				'setting'  => 'header_layout',
				'operator' => '==',
				'value'    => 7,
			),
		),
	),
) );

Kirki::add_field( 'di_multipurpose_config', array(
	'type'        	=> 'toggle',
	'settings'    	=> 'hrdlyt8_stky_hrd',
	'label'       	=> esc_attr__( 'Sticky Header?', 'di-multipurpose' ),
	'description'	=> esc_attr__( 'It will make header sticky on large devices.', 'di-multipurpose' ),
	'section'     	=> 'header_layout_section',
	'default'     	=> '0',
	'active_callback'  => array(
		array(
			array(
				'setting'  => 'header_layout',
				'operator' => '==',
				'value'    => 8,
			),
		),
	),
) );

Kirki::add_field( 'di_multipurpose_config', array(
	'type'        	=> 'color',
	'settings'    	=> 'hrdlyt8_stky_hrd_bgclr',
	'label'       	=> esc_attr__( 'Sticky Header Background Color', 'di-multipurpose' ),
	'section'     	=> 'header_layout_section',
	'default'     	=> 'rgba(0,0,0,0.6)',
	'choices'     	=> array(
		'alpha' => true,
	),
	'output' => array(
		array(
			'element'  => '.sticky_hedaer_top .navbarprimary',
			'property' => 'background-color',
		),
	),
	'transport' => 'auto',
	'active_callback'  => array(
		array(
			'setting'  => 'hrdlyt8_stky_hrd',
			'operator' => '==',
			'value'    => 1,
		),
		array(
			array(
				'setting'  => 'header_layout',
				'operator' => '==',
				'value'    => 8,
			),
		),
	),
) );

Kirki::add_field( 'di_multipurpose_config', array(
	'type'        	=> 'toggle',
	'settings'    	=> 'hrdlyt9_stky_hrd',
	'label'       	=> esc_attr__( 'Sticky Header?', 'di-multipurpose' ),
	'description'	=> esc_attr__( 'It will make header sticky on large devices.', 'di-multipurpose' ),
	'section'     	=> 'header_layout_section',
	'default'     	=> '0',
	'active_callback'  => array(
		array(
			array(
				'setting'  => 'header_layout',
				'operator' => '==',
				'value'    => 9,
			),
		),
	),
) );

Kirki::add_field( 'di_multipurpose_config', array(
	'type'        	=> 'color',
	'settings'    	=> 'hrdlyt9_stky_hrd_bgclr',
	'label'       	=> esc_attr__( 'Sticky Header Background Color', 'di-multipurpose' ),
	'section'     	=> 'header_layout_section',
	'default'     	=> 'rgba(0,0,0,0.6)',
	'choices'     	=> array(
		'alpha' => true,
	),
	'output' => array(
		array(
			'element'  => '.headermain.dimlayout9.sticky_hedaer_top',
			'property' => 'background-color',
		),
	),
	'transport' => 'auto',
	'active_callback'  => array(
		array(
			'setting'  => 'hrdlyt9_stky_hrd',
			'operator' => '==',
			'value'    => 1,
		),
		array(
			array(
				'setting'  => 'header_layout',
				'operator' => '==',
				'value'    => 9,
			),
		),
	),
) );

Kirki::add_field( 'di_multipurpose_config', array(
	'type'        => 'background',
	'settings'    => 'mm_hrd_clr_new',
	'label'       => esc_html__( 'Header Background Property', 'di-multipurpose' ),
	'section'     => 'header_layout_section',
	'default'     => array(
		'background-color'      => '#ffffff',
		'background-image'      => '',
		'background-repeat'     => 'repeat',
		'background-position'   => 'center center',
		'background-size'       => 'cover',
		'background-attachment' => 'scroll',
	),
	'transport'   => 'auto',
	'output'      => array(
		array(
			'element' => '.headermain',
		),
	),
	'active_callback'  => array(
		array(
			'setting'  => 'header_layout',
			'operator' => '!=',
			'value'    => 20,
		),
	),
) );

Kirki::add_field( 'di_multipurpose_config', array(
	'type'        => 'color',
	'settings'    => 'mm_hrd_ovrly_clr_new',
	'label'       => esc_attr__( 'Header Overlay Background Color', 'di-multipurpose' ),
	'section'     => 'header_layout_section',
	'default'     => 'rgba(0,0,0,0)',
	'choices'     => array(
		'alpha' => true,
	),
	'output' => array(
		array(
			'element'  => '.headermain-overlay-color',
			'property' => 'background-color',
		),
	),
	'transport' => 'auto',
	'active_callback'  => array(
		array(
			'setting'  => 'header_layout',
			'operator' => '!=',
			'value'    => 20,
		),
	),
) );

Kirki::add_field( 'di_multipurpose_config', array(
	'type'        => 'dimensions',
	'settings'    => 'mm_hrd_padngs',
	'label'       => esc_html__( 'Header Padding', 'di-multipurpose' ),
	'description'	=> esc_html__( 'Header top & bottom padding in pixel (px).', 'di-multipurpose' ),
	'section'     => 'header_layout_section',
	'default'     => array(
		'padding-top'		=> '30px',
		'padding-bottom'	=> '30px',
	),
	'choices'     => array(
		'labels' => array(
			'padding-top'		=> esc_html__( 'Padding Top', 'di-multipurpose' ),
			'padding-bottom'	=> esc_html__( 'Padding Bottom', 'di-multipurpose' ),
		),
	),
	'transport' => 'auto',
	'output' => array(
		array(
			'element'	=> '.headermain',
			'choice'	=> 'padding-top',
			'property'	=> 'padding-top',
		),
		array(
			'element'	=> '.headermain',
			'choice'	=> 'padding-bottom',
			'property'	=> 'padding-bottom',
		),
	),
	'active_callback'  => array(
		array(
			'setting'  => 'header_layout',
			'operator' => '!=',
			'value'    => 20,
		),
	),
) );

Kirki::add_field( 'di_multipurpose_config', array(
	'type'        	=> 'color',
	'settings'    	=> 'hdr_txt_color',
	'label'       	=> esc_attr__( 'Header Contents Color', 'di-multipurpose' ),
	'section'     	=> 'header_layout_section',
	'default'     	=> '#000000',
	'choices'     	=> array(
		'alpha' => true,
	),
	'output' => array(
		array(
			'element'  => 'body .headermain',
			'property' => 'color',
		),
	),
	'transport' => 'auto',
	'active_callback'  => array(
		array(
			'setting'  => 'header_layout',
			'operator' => '!=',
			'value'    => 20,
		),
		array(
			'setting'  => 'header_layout',
			'operator' => '!=',
			'value'    => 8,
		),
	),
) );

Kirki::add_field( 'di_multipurpose_config', array(
	'type'        	=> 'color',
	'settings'    	=> 'hdr_a_color',
	'label'       	=> esc_attr__( 'Header Links Color', 'di-multipurpose' ),
	'section'     	=> 'header_layout_section',
	'default'     	=> '#f66f66',
	'choices'     	=> array(
		'alpha' => true,
	),
	'output' => array(
		array(
			'element'  => 'body .headermain a',
			'property' => 'color',
		),
	),
	'transport' => 'auto',
	'active_callback'  => array(
		array(
			'setting'  => 'header_layout',
			'operator' => '!=',
			'value'    => 20,
		),
		array(
			'setting'  => 'header_layout',
			'operator' => '!=',
			'value'    => 8,
		),
	),
) );

Kirki::add_field( 'di_multipurpose_config', array(
	'type'        	=> 'color',
	'settings'    	=> 'hdr_a_mover_color',
	'label'       	=> esc_attr__( 'Header Links Color Hover', 'di-multipurpose' ),
	'section'     	=> 'header_layout_section',
	'default'     	=> '#ff2c1e',
	'choices'     	=> array(
		'alpha' => true,
	),
	'output' => array(
		array(
			'element'  => 'body .headermain a:hover',
			'property' => 'color',
		),
	),
	'transport' => 'auto',
	'active_callback'  => array(
		array(
			'setting'  => 'header_layout',
			'operator' => '!=',
			'value'    => 20,
		),
		array(
			'setting'  => 'header_layout',
			'operator' => '!=',
			'value'    => 8,
		),
	),
) );

Kirki::add_field( 'di_multipurpose_config', array(
	'type'        => 'custom',
	'settings'    => 'info_menu',
	'section'     => 'header_layout_section',
	'default'     => '<div style="padding: 10px;background-color: #333; color: #fff; border-radius: 8px;">' . esc_html__( 'Main Menu color and typography will work, if you are using default / theme menu feature.', 'di-multipurpose' ) . '</div>',
	'active_callback'  => array(
		array(
			array(
				'setting'  => 'header_layout',
				'operator' => '!=',
				'value'    => 9,
			),
		),
		array(
			array(
				'setting'  => 'header_layout',
				'operator' => '!=',
				'value'    => 20,
			),
		),
	),
) );

Kirki::add_field( 'di_multipurpose_config', array(
	'type'        => 'color',
	'settings'    => 'mm_parnt_clr',
	'label'       => esc_attr__( 'Main Menu: Parent Items Color', 'di-multipurpose' ),
	'section'     => 'header_layout_section',
	'default'     => '#ffffff',
	'choices'     => array(
		'alpha' => true,
	),
	'output' => array(
		array(
			'element'  => '.navbarprimary .navbar-nav > li > a',
			'property' => 'color',
		),
	),
	'transport' => 'auto',
	'active_callback'  => array(
		array(
			array(
				'setting'  => 'header_layout',
				'operator' => '!=',
				'value'    => 9,
			),
		),
		array(
			array(
				'setting'  => 'header_layout',
				'operator' => '!=',
				'value'    => 20,
			),
		),
	),
) );

Kirki::add_field( 'di_multipurpose_config', array(
	'type'        => 'color',
	'settings'    => 'mm_parnt_bg_clr',
	'label'       => esc_attr__( 'Main Menu: Parent Menu Background Color', 'di-multipurpose' ),
	'section'     => 'header_layout_section',
	'default'     => '#000000',
	'choices'     => array(
		'alpha' => true,
	),
	'output' => array(
		array(
			'element'  => '.navbarprimary',
			'property' => 'background-color',
		),
		array(
			'element'  => '.navbarprimary .dropdown-menu',
			'property' => 'border-bottom-color',
		),
		array(
			'element'  => '.navbarprimary.navbar',
			'property' => 'border-color',
		),
	),
	'transport' => 'auto',
	'active_callback'  => array(
		array(
			array(
				'setting'  => 'header_layout',
				'operator' => '!=',
				'value'    => 9,
			),
		),
		array(
			array(
				'setting'  => 'header_layout',
				'operator' => '!=',
				'value'    => 20,
			),
		),
	),
) );

Kirki::add_field( 'di_multipurpose_config', array(
	'type'        => 'color',
	'settings'    => 'mm_parnt_actuv_clr',
	'label'       => esc_attr__( 'Main Menu: Parent Active Item Color', 'di-multipurpose' ),
	'section'     => 'header_layout_section',
	'default'     => '#4c4c4c',
	'choices'     => array(
		'alpha' => true,
	),
	'output' => array(
		array(
			'element'  => '.navbarprimary .navbar-nav > .active > a, .navbarprimary .navbar-nav > .active > a:hover, .navbarprimary .navbar-nav > .active > a:focus, .navbarprimary .navbar-nav > li:hover > a',
			'property' => 'color',
		),
		array(
			'element'  => '.navbarprimary .navbar-nav > li > a:hover, .navbarprimary .navbar-nav > li > a:focus',
			'property' => 'color',
		),
	),
	'transport' => 'auto',
	'active_callback'  => array(
		array(
			array(
				'setting'  => 'header_layout',
				'operator' => '!=',
				'value'    => 9,
			),
		),
		array(
			array(
				'setting'  => 'header_layout',
				'operator' => '!=',
				'value'    => 20,
			),
		),
	),
) );

Kirki::add_field( 'di_multipurpose_config', array(
	'type'        => 'color',
	'settings'    => 'mm_parnt_active_bg_clr',
	'label'       => esc_attr__( 'Main Menu: Parent Active Item Background Color', 'di-multipurpose' ),
	'section'     => 'header_layout_section',
	'default'     => '#eeeeee',
	'choices'     => array(
		'alpha' => true,
	),
	'output' => array(
		array(
			'element'  => '.navbarprimary .navbar-nav > .active > a, .navbarprimary .navbar-nav > .active > a:hover, .navbarprimary .navbar-nav > .active > a:focus, .navbarprimary .navbar-nav > li:hover > a',
			'property' => 'background-color',
		),
		array(
			'element'  => '.navbarprimary .navbar-nav > li > a:hover, .navbarprimary .navbar-nav > li > a:focus',
			'property' => 'background-color',
		),
	),
	'transport' => 'auto',
	'active_callback'  => array(
		array(
			array(
				'setting'  => 'header_layout',
				'operator' => '!=',
				'value'    => 9,
			),
		),
		array(
			array(
				'setting'  => 'header_layout',
				'operator' => '!=',
				'value'    => 20,
			),
		),
	),
) );

Kirki::add_field( 'di_multipurpose_config', array(
	'type'        => 'color',
	'settings'    => 'mm_drpdwn_clr',
	'label'       => esc_attr__( 'Main Menu: DropDown Item Color', 'di-multipurpose' ),
	'section'     => 'header_layout_section',
	'default'     => '#333333',
	'choices'     => array(
		'alpha' => true,
	),
	'output' => array(
		array(
			'element'  => '.dropdown-menu > li > a',
			'property' => 'color',
		),
		array(
			'element'  => '.navbarprimary .dropdown-submenu > a:after',
			'property' => 'border-left-color',
		),
	),
	'transport' => 'auto',
	'active_callback'  => array(
		array(
			array(
				'setting'  => 'header_layout',
				'operator' => '!=',
				'value'    => 9,
			),
		),
		array(
			array(
				'setting'  => 'header_layout',
				'operator' => '!=',
				'value'    => 20,
			),
		),
	),
) );

Kirki::add_field( 'di_multipurpose_config', array(
	'type'        => 'color',
	'settings'    => 'mm_drpdwn_bg_clr',
	'label'       => esc_attr__( 'Main Menu: DropDown Item Background Color', 'di-multipurpose' ),
	'description'	=> esc_attr__( 'This will Background Color of all DropDown items', 'di-multipurpose' ),
	'section'     => 'header_layout_section',
	'default'     => '#eeeeee',
	'choices'     => array(
		'alpha' => true,
	),
	'output' => array(
		array(
			'element'  => '.dropdown-menu > li > a',
			'property' => 'background-color',
		),
	),
	'transport' => 'auto',
	'active_callback'  => array(
		array(
			array(
				'setting'  => 'header_layout',
				'operator' => '!=',
				'value'    => 9,
			),
		),
		array(
			array(
				'setting'  => 'header_layout',
				'operator' => '!=',
				'value'    => 20,
			),
		),
	),
) );

Kirki::add_field( 'di_multipurpose_config', array(
	'type'        => 'color',
	'settings'    => 'mm_drpdwn_actve_clr',
	'label'       => esc_attr__( 'Main Menu: DropDown Active Item Color', 'di-multipurpose' ),
	'section'     => 'header_layout_section',
	'default'     => '#333333',
	'choices'     => array(
		'alpha' => true,
	),
	'output' => array(
		array(
			'element'  => '.dropdown-menu > .active > a, .dropdown-menu > .active > a:hover, .dropdown-menu > .active > a:focus',
			'property' => 'color',
		),
		array(
			'element'  => '.dropdown-menu > li > a:hover, .dropdown-menu > li > a:focus',
			'property' => 'color',
		),
		array(
			'element'  => '.navbarprimary .dropdown-submenu:hover > a:after, .navbarprimary .active.dropdown-submenu > a:after',
			'property' => 'border-left-color',
		),
	),
	'transport' => 'auto',
	'active_callback'  => array(
		array(
			array(
				'setting'  => 'header_layout',
				'operator' => '!=',
				'value'    => 9,
			),
		),
		array(
			array(
				'setting'  => 'header_layout',
				'operator' => '!=',
				'value'    => 20,
			),
		),
	),
) );

Kirki::add_field( 'di_multipurpose_config', array(
	'type'        => 'color',
	'settings'    => 'mm_drpdwn_active_bg_clr',
	'label'       => esc_attr__( 'Main Menu: DropDown Active Item Background Color', 'di-multipurpose' ),
	'section'     => 'header_layout_section',
	'default'     => '#f5f5f5',
	'choices'     => array(
		'alpha' => true,
	),
	'output' => array(
		array(
			'element'  => '.dropdown-menu > .active > a, .dropdown-menu > .active > a:hover, .dropdown-menu > .active > a:focus',
			'property' => 'background-color',
		),
		array(
			'element'  => '.dropdown-menu > li > a:hover, .dropdown-menu > li > a:focus',
			'property' => 'background-color',
		),
	),
	'transport' => 'auto',
	'active_callback'  => array(
		array(
			array(
				'setting'  => 'header_layout',
				'operator' => '!=',
				'value'    => 9,
			),
		),
		array(
			array(
				'setting'  => 'header_layout',
				'operator' => '!=',
				'value'    => 20,
			),
		),
	),
) );

Kirki::add_field( 'di_multipurpose_config', array(
	'type'        => 'color',
	'settings'    => 'mm_prnt_tgl_clr',
	'label'       => esc_attr__( 'Main Menu: Parent Toggle Button Color', 'di-multipurpose' ),
	'section'     => 'header_layout_section',
	'default'     => '#f3f3f3',
	'choices'     => array(
		'alpha' => true,
	),
	'output' => array(
		array(
			'element'  => '.navbarprimary .navbar-toggler, .navbarprimary .navbar-toggler:hover',
			'property' => 'background-color',
		),
		array(
			'element'  => '.navbarprimary .small-menu-label',
			'property' => 'color',
		),
	),
	'transport' => 'auto',
	'active_callback'  => array(
		array(
			array(
				'setting'  => 'header_layout',
				'operator' => '!=',
				'value'    => 9,
			),
		),
		array(
			array(
				'setting'  => 'header_layout',
				'operator' => '!=',
				'value'    => 20,
			),
		),
	),
) );

Kirki::add_field( 'di_multipurpose_config', array(
	'type'        => 'color',
	'settings'    => 'mm_drpdwn_tgl_clr',
	'label'       => esc_attr__( 'Main Menu: DropDown Toggle Button Color', 'di-multipurpose' ),
	'section'     => 'header_layout_section',
	'default'     => '#000000',
	'choices'     => array(
		'alpha' => true,
	),
	'output' => array(
		array(
			'element'  => '.navbarprimary .dropdowntoggle a',
			'property' => 'color',
		),
	),
	'transport' => 'auto',
	'active_callback'  => array(
		array(
			array(
				'setting'  => 'header_layout',
				'operator' => '!=',
				'value'    => 9,
			),
		),
		array(
			array(
				'setting'  => 'header_layout',
				'operator' => '!=',
				'value'    => 20,
			),
		),
	),
) );

Kirki::add_field( 'di_multipurpose_config', array(
	'type'        => 'typography',
	'settings'    => 'top_menu_typog',
	'label'       => esc_attr__( 'Main Menu Typography', 'di-multipurpose' ),
	'section'     => 'header_layout_section',
	'default'     => array(
		'font-family'    => 'Rajdhani',
		'variant'        => '500',
		'font-size'      => '18px'
	),
	'output'      => array(
		array(
			'element' => '.navbarprimary ul li a',
		),
	),
	'transport' => 'auto',
	'active_callback'  => array(
		array(
			array(
				'setting'  => 'header_layout',
				'operator' => '!=',
				'value'    => 9,
			),
		),
		array(
			array(
				'setting'  => 'header_layout',
				'operator' => '!=',
				'value'    => 20,
			),
		),
	),
) );

do_action( 'di_multipurpose_header_layout_options' );

//Header layout END


//color options
Kirki::add_section( 'color_options', array(
	'title'          => esc_attr__( 'Color Options', 'di-multipurpose' ),
	'panel'          => 'di_multipurpose_options',
	'capability'     => 'edit_theme_options',
) );

Kirki::add_field( 'di_multipurpose_config', array(
	'type'        	=> 'color',
	'settings'    	=> 'default_a_color',
	'label'       	=> esc_attr__( 'Default Links Color', 'di-multipurpose' ),
	'description'	=> esc_attr__( 'This will be color of all default links.', 'di-multipurpose' ),
	'section'     	=> 'color_options',
	'default'     	=> apply_filters( 'di_multipurpose_default_a_color', '#f66f66' ),
	'choices'     	=> array(
		'alpha' => true,
	),
	'output' => array(
		array(
			'element'  => 'body a, .woocommerce .woocommerce-breadcrumb a, .woocommerce .star-rating span',
			'property' => 'color',
		),
		array(
			'element'  => '.widget_sidebar_main ul li::before',
			'property' => 'color',
		),
		array(
			'element'  => '.navigation.pagination .nav-links .page-numbers, .navigation.pagination .nav-links .page-numbers:last-child',
			'property' => 'border-color',
		),
		array(
			'element'  => '.woocommerce div.product .woocommerce-tabs ul.tabs li.active',
			'property' => 'border-top-color',
		),
		array(
			'element'  => '.woocommerce div.product .woocommerce-tabs ul.tabs li.active',
			'property' => 'border-bottom-color',
		),
		array(
			'element'  => '.woocommerce div.product .woocommerce-tabs ul.tabs li.active',
			'property' => 'color',
		),
		array(
			'element'  => '.woocommerce-message',
			'property' => 'border-top-color',
		),
		array(
			'element'  => '.woocommerce-message::before',
			'property' => 'color',
		),
		array(
			'element'  => 'div.bbp-template-notice a',
			'property' => 'color',
		),
	),
	'transport' => 'auto',
) );

Kirki::add_field( 'di_multipurpose_config', array(
	'type'        	=> 'color',
	'settings'    	=> 'default_a_mover_color',
	'label'       	=> esc_attr__( 'Default Links Hover Color', 'di-multipurpose' ),
	'description'	=> esc_attr__( 'This will be color of all default links on mouse over.', 'di-multipurpose' ),
	'section'     	=> 'color_options',
	'default'     	=> apply_filters( 'di_multipurpose_default_a_mover_color', '#ff2c1e' ),
	'choices'     	=> array(
		'alpha' => true,
	),
	'output' => array(
		array(
			'element'  => 'body a:hover, body a:focus, .woocommerce .woocommerce-breadcrumb a:hover',
			'property' => 'color',
		),
		array(
			'element'  => '.widget_sidebar_main ul li:hover::before',
			'property' => 'color',
		),
		array(
			'element'  => '.woocommerce div.product .woocommerce-tabs ul.tabs li:hover a',
			'property' => 'color',
		),
		array(
			'element'  => 'div.bbp-template-notice a:hover',
			'property' => 'color',
		),
	),
	'transport' => 'auto',
) );

Kirki::add_field( 'di_multipurpose_config', array(
	'type'        => 'custom',
	'settings'    => 'info_default_btn',
	'section'     => 'color_options',
	'default'     => '<hr />',
) );

Kirki::add_field( 'di_multipurpose_config', array(
	'type'        	=> 'color',
	'settings'    	=> 'btn_color',
	'label'       	=> esc_attr__( 'Default Button: Color', 'di-multipurpose' ),
	'section'     	=> 'color_options',
	'default'     	=> '#ffffff',
	'choices'     	=> array(
		'alpha' => true,
	),
	'output' => array(
		array(
			'element'  => '.masterbtn',
			'property' => 'color',
		),
		array(
			'element'  => '.wpcf7-form .wpcf7-form-control.wpcf7-submit',
			'property' => 'color',
		),
		array(
			'element'  => '.woocommerce #respond input#submit, .woocommerce a.button, .woocommerce button.button, .woocommerce input.button',
			'property' => 'color',
		),
		array(
			'element'	=> '.woocommerce #respond input#submit.alt, .woocommerce a.button.alt, .woocommerce button.button.alt, .woocommerce input.button.alt',
			'property'	=> 'color',
			'suffix'	=> '!important',
		),
		array(
			'element'  => '.tagcloud a',
			'property' => 'color',
			'suffix'	=> '!important',
		),
		array(
			'element'  => '.singletags a',
			'property' => 'color',
		),
		array(
			'element'  => '#back-to-top, .social_profile-icon-clr, .bbp-submit-wrapper .button',
			'property' => 'color',
		),
		array(
			'element'  => '.side-menu-menu-button',
			'property' => 'color',
		),
		array(
			'element'  => '.post-navigation .nav-next a, .post-navigation .nav-previous a',
			'property' => 'color',
		),
		array(
			'element'  => '.woocommerce.widget_product_search button[type="submit"]',
			'property' => 'color',
		),
		array(
			'element'  => '.yikes-mailchimp-container .yikes-easy-mc-submit-button.btn-primary',
			'property' => 'color',
		),
		array(
			'element'  => '#bbpress-forums #bbp-search-form #bbp_search_submit, .maincontainer .container .left-content  .content-third .entry-content a.subscription-toggle, #bbpress-forums div.bbp-topic-tags a, .widget_display_search #bbp-search-form #bbp_search_submit',
			'property' => 'color',
		),
	),
	'transport' => 'auto',
) );

Kirki::add_field( 'di_multipurpose_config', array(
	'type'        	=> 'color',
	'settings'    	=> 'btn_hvr_color',
	'label'       	=> esc_attr__( 'Default Button: Hover Color', 'di-multipurpose' ),
	'section'     	=> 'color_options',
	'default'     	=> '#ffffff',
	'choices'     	=> array(
		'alpha' => true,
	),
	'output' => array(
		array(
			'element'  => '.masterbtn:hover',
			'property' => 'color',
		),
		array(
			'element'  => '.wpcf7-form .wpcf7-form-control.wpcf7-submit:hover',
			'property' => 'color',
		),
		array(
			'element'  => '.woocommerce #respond input#submit:hover, .woocommerce a.button:hover, .woocommerce button.button:hover, .woocommerce input.button:hover',
			'property' => 'color',
		),
		array(
			'element'	=> '.woocommerce #respond input#submit.alt:hover, .woocommerce a.button.alt:hover, .woocommerce button.button.alt:hover, .woocommerce input.button.alt:hover',
			'property'	=> 'color',
			'suffix'	=> '!important',
		),
		array(
			'element'  => '.tagcloud a:hover',
			'property' => 'color',
			'suffix'	=> '!important',
		),
		array(
			'element'  => '.singletags a:hover',
			'property' => 'color',
		),
		array(
			'element'  => '#back-to-top:hover, .social_profile-icon-clr:hover, .bbp-submit-wrapper .button:hover',
			'property' => 'color',
		),
		array(
			'element'  => '.side-menu-menu-button:hover',
			'property' => 'color',
		),
		array(
			'element'  => '.post-navigation .nav-next a:hover, .post-navigation .nav-previous a:hover',
			'property' => 'color',
		),
		array(
			'element'  => '.woocommerce.widget_product_search button[type="submit"]:hover',
			'property' => 'color',
		),
		array(
			'element'  => '.yikes-mailchimp-container .yikes-easy-mc-submit-button.btn-primary:hover',
			'property' => 'color',
		),
		array(
			'element'  => '#bbpress-forums #bbp-search-form #bbp_search_submit:hover, .maincontainer .container .left-content  .content-third .entry-content a.subscription-toggle:hover, #bbpress-forums div.bbp-topic-tags a:hover, .widget_display_search #bbp-search-form #bbp_search_submit:hover',
			'property' => 'color',
		),
	),
	'transport' => 'auto',
) );

Kirki::add_field( 'di_multipurpose_config', array(
	'type'        => 'color',
	'settings'    => 'btn_bg_color',
	'label'       => esc_attr__( 'Default Button: Background Color', 'di-multipurpose' ),
	'section'     => 'color_options',
	'default'     => '#000000',
	'choices'     => array(
		'alpha' => true,
	),
	'output' => array(
		array(
			'element'  => '.masterbtn',
			'property' => 'background-color',
		),
		array(
			'element'  => '.wpcf7-form .wpcf7-form-control.wpcf7-submit',
			'property' => 'background-color',
		),
		array(
			'element'  => '.woocommerce #respond input#submit, .woocommerce a.button, .woocommerce button.button, .woocommerce input.button',
			'property' => 'background-color',
		),
		array(
			'element'	=> '.woocommerce #respond input#submit.alt, .woocommerce a.button.alt, .woocommerce button.button.alt, .woocommerce input.button.alt',
			'property'	=> 'background-color',
			'suffix'	=> '!important',
		),
		array(
			'element'  => '.tagcloud a',
			'property' => 'background-color',
		),
		array(
			'element'  => '.tagcloud a::before',
			'property' => 'border-right-color',
		),
		array(
			'element'  => '.singletags a',
			'property' => 'background-color',
		),
		array(
			'element'  => '.singletags a::before',
			'property' => 'border-right-color',
		),
		array(
			'element'  => '.woocommerce .widget_price_filter .ui-slider .ui-slider-handle, .woocommerce .widget_price_filter .ui-slider .ui-slider-range',
			'property' => 'background-color',
		),
		array(
			'element'  => '#back-to-top, .di_multipurpose_social_widget a, .bbp-submit-wrapper .button',
			'property' => 'background-color',
		),
		array(
			'element'  => '.side-menu-menu-button',
			'property' => 'background-color',
		),
		array(
			'element'  => '.post-navigation .nav-next a, .post-navigation .nav-previous a',
			'property' => 'background-color',
		),
		array(
			'element'  => '.woocommerce.widget_product_search button[type="submit"]',
			'property' => 'background-color',
		),
		array(
			'element'  => '.di-cart-count-animate',
			'property' => 'color',
		),
		array(
			'element'  => '.yikes-mailchimp-container .yikes-easy-mc-submit-button.btn-primary',
			'property' => 'background-color',
		),
		array(
			'element'  => '#bbpress-forums #bbp-search-form #bbp_search_submit, .maincontainer .container .left-content  .content-third .entry-content a.subscription-toggle, #bbpress-forums div.bbp-topic-tags a, .widget_display_search #bbp-search-form #bbp_search_submit',
			'property' => 'background-color',
		),
	),
	'transport' => 'auto',
) );

Kirki::add_field( 'di_multipurpose_config', array(
	'type'        => 'color',
	'settings'    => 'btn_mover_bg_color',
	'label'       => esc_attr__( 'Default Button: Hover Background Color', 'di-multipurpose' ),
	'section'     => 'color_options',
	'default'     => '#f66f66',
	'choices'     => array(
		'alpha' => true,
	),
	'output' => array(
		array(
			'element'  => '.masterbtn:hover',
			'property' => 'background-color',
		),
		array(
			'element'  => '.wpcf7-form .wpcf7-form-control.wpcf7-submit:hover',
			'property' => 'background-color',
		),
		array(
			'element'  => '.woocommerce #respond input#submit:hover, .woocommerce a.button:hover, .woocommerce button.button:hover, .woocommerce input.button:hover',
			'property' => 'background-color',
			'suffix'	=> '!important',
		),
		array(
			'element'  => '.woocommerce #respond input#submit.alt:hover, .woocommerce a.button.alt:hover, .woocommerce button.button.alt:hover, .woocommerce input.button.alt:hover',
			'property' => 'background-color',
			'suffix'	=> '!important',
		),
		array(
			'element'  => '.woocommerce .widget_price_filter .price_slider_wrapper .ui-widget-content',
			'property' => 'background-color',
		),
		array(
			'element'  => '.tagcloud a:hover',
			'property' => 'background-color',
		),
		array(
			'element'  => '.tagcloud a:hover::before',
			'property' => 'border-right-color',
		),
		array(
			'element'  => '.singletags a:hover',
			'property' => 'background-color',
		),
		array(
			'element'  => '.singletags a:hover::before',
			'property' => 'border-right-color',
		),
		array(
			'element'  => '#back-to-top:hover, .di_multipurpose_social_widget a:hover, .bbp-submit-wrapper .button:hover',
			'property' => 'background-color',
		),
		array(
			'element'  => '.side-menu-menu-button:hover',
			'property' => 'background-color',
		),
		array(
			'element'  => '.post-navigation .nav-next a:before, .post-navigation .nav-previous a:before',
			'property' => 'background-color',
		),
		array(
			'element'  => '.woocommerce.widget_product_search button[type="submit"]:hover',
			'property' => 'background-color',
		),
		array(
			'element'  => '.side-menu-menu-button:hover .di-cart-count-animate',
			'property' => 'color',
		),
		array(
			'element'  => '.yikes-mailchimp-container .yikes-easy-mc-submit-button.btn-primary:hover',
			'property' => 'background-color',
		),
		array(
			'element'  => '#bbpress-forums #bbp-search-form #bbp_search_submit:hover, .maincontainer .container .left-content  .content-third .entry-content a.subscription-toggle:hover, #bbpress-forums div.bbp-topic-tags a:hover, .widget_display_search #bbp-search-form #bbp_search_submit:hover',
			'property' => 'background-color',
		),
	),
	'transport' => 'auto',
) );


Kirki::add_field( 'di_multipurpose_config', array(
	'type'        => 'custom',
	'settings'    => 'info_breadcrumb',
	'section'     => 'color_options',
	'default'     => '<hr />',
) );

Kirki::add_field( 'di_multipurpose_config', array(
	'type'        => 'color',
	'settings'    => 'breadcrumb_bg_color',
	'label'       => esc_attr__( 'Breadcrumb Background Color', 'di-multipurpose' ),
	'section'     => 'color_options',
	'default'     => '#f5f5f5',
	'choices'     => array(
		'alpha' => true,
	),
	'output' => array(
		array(
			'element'  => '.breadcrumb, .bbp-breadcrumb p',
			'property' => 'background-color',
		),
	),
	'transport' => 'auto',
) );

Kirki::add_field( 'di_multipurpose_config', array(
	'type'        => 'custom',
	'settings'    => 'info_mainhdr_clr',
	'section'     => 'color_options',
	'default'     => '<hr />',
) );

do_action( 'di_multipurpose_color_options' );

//color options END

//social profile
Kirki::add_section( 'social_options', array(
	'title'          => esc_attr__( 'Social Profile', 'di-multipurpose' ),
	'panel'          => 'di_multipurpose_options',
	'capability'     => 'edit_theme_options',
) );

Kirki::add_field( 'di_multipurpose_config', array(
	'type'			=> 'text',
	'settings'		=> 'sprofile_link_facebook',
	'label'			=> esc_attr__( 'Facebook Link', 'di-multipurpose' ),
	'description'	=> esc_attr__( 'Leave empty for disable', 'di-multipurpose' ),
	'section'		=> 'social_options',
	'default'		=> 'http://facebook.com',
) );

Kirki::add_field( 'di_multipurpose_config', array(
	'type'			=> 'text',
	'settings'		=> 'sprofile_link_twitter',
	'label'			=> esc_attr__( 'Twitter Link', 'di-multipurpose' ),
	'description'	=> esc_attr__( 'Leave empty for disable', 'di-multipurpose' ),
	'section'		=> 'social_options',
	'default'		=> 'http://twitter.com',
) );

Kirki::add_field( 'di_multipurpose_config', array(
	'type'			=> 'text',
	'settings'		=> 'sprofile_link_youtube',
	'label'			=> esc_attr__( 'YouTube Link', 'di-multipurpose' ),
	'description'	=> esc_attr__( 'Leave empty for disable', 'di-multipurpose' ),
	'section'		=> 'social_options',
	'default'		=> 'http://youtube.com',
) );

Kirki::add_field( 'di_multipurpose_config', array(
	'type'			=> 'text',
	'settings'		=> 'sprofile_link_vk',
	'label'			=> esc_attr__( 'VK Link', 'di-multipurpose' ),
	'description'	=> esc_attr__( 'Leave empty for disable', 'di-multipurpose' ),
	'section'		=> 'social_options',
	'default'		=> '',
) );

Kirki::add_field( 'di_multipurpose_config', array(
	'type'			=> 'text',
	'settings'		=> 'sprofile_link_okru',
	'label'			=> esc_attr__( 'Ok.ru (odnoklassniki) Link', 'di-multipurpose' ),
	'description'	=> esc_attr__( 'Leave empty for disable', 'di-multipurpose' ),
	'section'		=> 'social_options',
	'default'		=> '',
) );

Kirki::add_field( 'di_multipurpose_config', array(
	'type'			=> 'text',
	'settings'		=> 'sprofile_link_linkedin',
	'label'			=> esc_attr__( 'Linkedin Link', 'di-multipurpose' ),
	'description'	=> esc_attr__( 'Leave empty for disable', 'di-multipurpose' ),
	'section'		=> 'social_options',
	'default'		=> '',
) );

Kirki::add_field( 'di_multipurpose_config', array(
	'type'			=> 'text',
	'settings'		=> 'sprofile_link_pinterest',
	'label'			=> esc_attr__( 'Pinterest Link', 'di-multipurpose' ),
	'description'	=> esc_attr__( 'Leave empty for disable', 'di-multipurpose' ),
	'section'		=> 'social_options',
	'default'		=> '',
) );

Kirki::add_field( 'di_multipurpose_config', array(
	'type'			=> 'text',
	'settings'		=> 'sprofile_link_instagram',
	'label'			=> esc_attr__( 'Instagram Link', 'di-multipurpose' ),
	'description'	=> esc_attr__( 'Leave empty for disable', 'di-multipurpose' ),
	'section'		=> 'social_options',
	'default'		=> '',
) );

Kirki::add_field( 'di_multipurpose_config', array(
	'type'			=> 'text',
	'settings'		=> 'sprofile_link_telegram',
	'label'			=> esc_attr__( 'Telegram Link', 'di-multipurpose' ),
	'description'	=> esc_attr__( 'Leave empty for disable', 'di-multipurpose' ),
	'section'		=> 'social_options',
	'default'		=> '',
) );

Kirki::add_field( 'di_multipurpose_config', array(
	'type'			=> 'text',
	'settings'		=> 'sprofile_link_snapchat',
	'label'			=> esc_attr__( 'Snapchat Link', 'di-multipurpose' ),
	'description'	=> esc_attr__( 'Leave empty for disable', 'di-multipurpose' ),
	'section'		=> 'social_options',
	'default'		=> '',
) );

Kirki::add_field( 'di_multipurpose_config', array(
	'type'			=> 'text',
	'settings'		=> 'sprofile_link_flickr',
	'label'			=> esc_attr__( 'Flickr Link', 'di-multipurpose' ),
	'description'	=> esc_attr__( 'Leave empty for disable', 'di-multipurpose' ),
	'section'		=> 'social_options',
	'default'		=> '',
) );

Kirki::add_field( 'di_multipurpose_config', array(
	'type'			=> 'text',
	'settings'		=> 'sprofile_link_reddit',
	'label'			=> esc_attr__( 'Reddit Link', 'di-multipurpose' ),
	'description'	=> esc_attr__( 'Leave empty for disable', 'di-multipurpose' ),
	'section'		=> 'social_options',
	'default'		=> '',
) );

Kirki::add_field( 'di_multipurpose_config', array(
	'type'			=> 'text',
	'settings'		=> 'sprofile_link_tumblr',
	'label'			=> esc_attr__( 'Tumblr Link', 'di-multipurpose' ),
	'description'	=> esc_attr__( 'Leave empty for disable', 'di-multipurpose' ),
	'section'		=> 'social_options',
	'default'		=> '',
) );

Kirki::add_field( 'di_multipurpose_config', array(
	'type'			=> 'text',
	'settings'		=> 'sprofile_link_yelp',
	'label'			=> esc_attr__( 'Yelp Link', 'di-multipurpose' ),
	'description'	=> esc_attr__( 'Leave empty for disable', 'di-multipurpose' ),
	'section'		=> 'social_options',
	'default'		=> '',
) );

Kirki::add_field( 'di_multipurpose_config', array(
	'type'			=> 'text',
	'settings'		=> 'sprofile_link_whatsappno',
	'label'			=> esc_attr__( 'WhatsApp Number', 'di-multipurpose' ),
	'description'	=> esc_attr__( 'Leave empty for disable', 'di-multipurpose' ),
	'section'		=> 'social_options',
	'default'		=> '',
) );

Kirki::add_field( 'di_multipurpose_config', array(
	'type'			=> 'text',
	'settings'		=> 'sprofile_link_skype',
	'label'			=> esc_attr__( 'Skype Id', 'di-multipurpose' ),
	'description'	=> esc_attr__( 'Leave empty for disable', 'di-multipurpose' ),
	'section'		=> 'social_options',
	'default'		=> '',
) );

do_action( 'di_multipurpose_social_profile_options' );

//social profile END

// Blog Archive options
Kirki::add_section( 'blog_archive_options', array(
	'title'          => esc_attr__( 'Blog Archive Options', 'di-multipurpose' ),
	'panel'          => 'di_multipurpose_options',
	'capability'     => 'edit_theme_options',
) );

Kirki::add_field( 'di_multipurpose_config', array(
	'type'        => 'sortable',
	'settings'    => 'archive_structure',
	'label'       => __( 'Archive Posts Structure', 'di-multipurpose' ),
	'description' => __( 'Show / Hide / Reorder parts of posts page.', 'di-multipurpose' ),
	'section'     => 'blog_archive_options',
	'default'     => array(
		'archive_featured_image',
		'categories',
		'loop_headline',
		'date',
		'loop_content',
	),
	'choices'     => array(
		'archive_featured_image'	=> esc_attr__( 'Post Featured Image', 'di-multipurpose' ),
		'categories'				=> esc_attr__( 'Post Categories', 'di-multipurpose' ),
		'loop_headline'				=> esc_attr__( 'Post Headline', 'di-multipurpose' ),
		'date'						=> esc_attr__( 'Post Date', 'di-multipurpose' ),
		'loop_content'				=> esc_attr__( 'Post Content', 'di-multipurpose' ),
	),
	'priority'    => 10,
) );

Kirki::add_field( 'di_multipurpose_config', array(
	'type'        => 'select',
	'settings'    => 'excerpt_or_content',
	'label'       => esc_attr__( 'Display Excerpt or Content on Archive', 'di-multipurpose' ),
	'section'     => 'blog_archive_options',
	'default'     => 'excerpt',
	'choices'     => array(
		'excerpt' => esc_attr__( 'Display Excerpt', 'di-multipurpose' ),
		'content' => esc_attr__( 'Display Content', 'di-multipurpose' ),
	),
) );

Kirki::add_field( 'di_multipurpose_config', array(
	'type'        => 'number',
	'settings'    => 'excerpt_length',
	'label'       => esc_attr__( 'Excerpt Length', 'di-multipurpose' ),
	'description' => esc_attr__( 'How much words you want to display on Archive page?', 'di-multipurpose' ),
	'section'     => 'blog_archive_options',
	'default'     => 40,
	'choices'     => array(
		'min'  => 1,
		'step' => 1,
	),
	'active_callback'  => array(
		array(
			'setting'  => 'excerpt_or_content',
			'operator' => '==',
			'value'    => 'excerpt',
		),
	),
) );

Kirki::add_field( 'di_multipurpose_config', array(
	'type'        => 'select',
	'settings'    => 'display_archive_pagination',
	'label'       => esc_attr__( 'Display Pagination on Archive', 'di-multipurpose' ),
	'description' => esc_attr__( 'Which type of pagination, you want to display?', 'di-multipurpose' ),
	'section'     => 'blog_archive_options',
	'default'     => 'nextprev',
	'choices'     => array(
		'nextprev'	=> esc_attr__( 'Next Previous Pagination', 'di-multipurpose' ),
		'number' 	=> esc_attr__( 'Number Pagination', 'di-multipurpose' ),
	),
) );

Kirki::add_field( 'di_multipurpose_config', array(
	'type'        => 'select',
	'settings'    => 'blog_list_grid',
	'label'       => esc_attr__( 'Posts View on Archive', 'di-multipurpose' ),
	'description' => esc_attr__( 'Display List or Grid?', 'di-multipurpose' ),
	'section'     => 'blog_archive_options',
	'default'     => 'list',
	'choices'     => array(
		'list'		=> esc_attr__( 'List', 'di-multipurpose' ),
		'grid2c'	=> esc_attr__( 'Grid 2 Column', 'di-multipurpose' ),
		'grid3c'	=> esc_attr__( 'Grid 3 Column', 'di-multipurpose' ),
		'msry2c'	=> esc_attr__( 'Masonry 2 Column', 'di-multipurpose' ),
		'msry3c'	=> esc_attr__( 'Masonry 3 Column', 'di-multipurpose' ),
	),
) );

Kirki::add_field( 'di_multipurpose_config', array(
	'type'        => 'radio-image',
	'settings'    => 'blog_archive_layout',
	'label'       => esc_attr__( 'Archive / Loop Layout', 'di-multipurpose' ),
	'section'     => 'blog_archive_options',
	'default'     => 'rights',
	'choices'     => array(
		'fullw'	  => get_template_directory_uri() . '/assets/images/fullw.png',
		'rights'  => get_template_directory_uri() . '/assets/images/rights.png',
		'lefts'   => get_template_directory_uri() . '/assets/images/lefts.png',
	),
) );

Kirki::add_field( 'di_multipurpose_config', array(
	'type'        => 'typography',
	'settings'    => 'blgarchiv_h3_typog',
	'label'       => esc_attr__( 'Post Headline Typography', 'di-multipurpose' ),
	'section'     => 'blog_archive_options',
	'default'     => array(
		'font-family'    => 'Arvo',
		'variant'        => 'regular',
		'font-size'      => '22px',
		'line-height'    => '1.3',
		'letter-spacing' => '0.5px',
		'text-transform' => 'uppercase'
	),
	'output'      => array(
		array(
			'element' => '.maincontainer .di-archive-typo h3.the-title',
		),
	),
	'transport' => 'auto',
) );

Kirki::add_field( 'di_multipurpose_config', array(
	'type'        => 'typography',
	'settings'    => 'blgarchiv_typog',
	'label'       => esc_attr__( 'Post Paragraphs Typography', 'di-multipurpose' ),
	'section'     => 'blog_archive_options',
	'default'     => array(
		'font-family'    => 'Fauna One',
		'variant'        => 'regular',
		'font-size'      => '14px',
		'line-height'    => '1.7',
		'letter-spacing' => '0.2px',
		'text-transform' => 'inherit',
	),
	'output'      => array(
		array(
			'element' => '.maincontainer .di-archive-contents-typo p',
		),
	),
	'transport' => 'auto',
) );

Kirki::add_field( 'di_multipurpose_config', array(
	'type'        => 'color',
	'settings'    => 'stky_pst_bg_color',
	'label'       => esc_attr__( 'Sticky Post Background Color', 'di-multipurpose' ),
	'section'     => 'blog_archive_options',
	'default'     => '#f7f7f7',
	'choices'     => array(
		'alpha' => true,
	),
	'output' => array(
		array(
			'element'	=> '.sticky',
			'property'	=> 'background-color',
			'suffix'	=> ' !important',
		),
	),
	'transport' => 'auto',
) );

Kirki::add_field( 'di_multipurpose_config', array(
	'type'        => 'color',
	'settings'    => 'pst_bdr_color',
	'label'       => esc_attr__( 'Posts Border Color', 'di-multipurpose' ),
	'section'     => 'blog_archive_options',
	'default'     => '#eeeeee',
	'choices'     => array(
		'alpha' => true,
	),
	'output' => array(
		array(
			'element'	=> '.di-archive',
			'property'	=> 'border-color',
		),
		array(
			'element'	=> '.di-small-border',
			'property'	=> 'border-color',
		),
	),
	'transport' => 'auto',
) );

do_action( 'di_multipurpose_blog_archive_options' );

// Blog Archive options END

// Blog
Kirki::add_section( 'blog_single_post_options', array(
	'title'          => esc_attr__( 'Single Post Options', 'di-multipurpose' ),
	'panel'          => 'di_multipurpose_options',
	'capability'     => 'edit_theme_options',
) );

Kirki::add_field( 'di_multipurpose_config', array(
	'type'        => 'toggle',
	'settings'    => 'breadcrumbx_setting',
	'label'       => esc_attr__( 'Breadcrumb', 'di-multipurpose' ),
	'description' => esc_attr__( 'Enable/Disable Breadcrumb', 'di-multipurpose' ),
	'section'     => 'blog_single_post_options',
	'default'     => '1',
) );

Kirki::add_field( 'di_multipurpose_config', array(
	'type'        => 'sortable',
	'settings'    => 'single_structure',
	'label'       => __( 'Single Post Structure', 'di-multipurpose' ),
	'description' => __( 'Show / Hide / Reorder parts of single post.', 'di-multipurpose' ),
	'section'     => 'blog_single_post_options',
	'default'     => array(
		'featured_image',
		'categories',
		'single_headline',
		'date',
		'single_content',
		'tags',
	),
	'choices'     => array(
		'featured_image'	=> esc_attr__( 'Post Featured Image', 'di-multipurpose' ),
		'categories'		=> esc_attr__( 'Post Categories', 'di-multipurpose' ),
		'single_headline'	=> esc_attr__( 'Post Headline', 'di-multipurpose' ),
		'date'				=> esc_attr__( 'Post Date', 'di-multipurpose' ),
		'single_content'	=> esc_attr__( 'Post Content', 'di-multipurpose' ),
		'tags'				=> esc_attr__( 'Post Tags', 'di-multipurpose' ),
		'author'			=> esc_attr__( 'Post Author', 'di-multipurpose' ),
	),
	'priority'    => 10,
) );


Kirki::add_field( 'di_multipurpose_config', array(
	'type'        => 'select',
	'settings'    => 'post_date_view',
	'label'       => esc_attr__( 'Post Date View', 'di-multipurpose' ),
	'description' => esc_attr__( 'Which date do you want to display?', 'di-multipurpose' ),
	'section'     => 'blog_single_post_options',
	'default'     => '1',
	'choices'     => array(
		'1' => esc_attr__( 'Display Post Updated Date', 'di-multipurpose' ),
		'2' => esc_attr__( 'Display Post Published Date', 'di-multipurpose' ),
	),
) );

Kirki::add_field( 'di_multipurpose_config', array(
	'type'        => 'radio-image',
	'settings'    => 'blog_single_layout',
	'label'       => esc_attr__( 'Single Post Layout', 'di-multipurpose' ),
	'section'     => 'blog_single_post_options',
	'default'     => 'rights',
	'choices'     => array(
		'fullw'	  => get_template_directory_uri() . '/assets/images/fullw.png',
		'rights'  => get_template_directory_uri() . '/assets/images/rights.png',
		'lefts'   => get_template_directory_uri() . '/assets/images/lefts.png',
	),
) );

Kirki::add_field( 'di_multipurpose_config', array(
	'type'        => 'typography',
	'settings'    => 'blog_single_h1_typog',
	'label'       => esc_attr__( 'Post Headline Typography', 'di-multipurpose' ),
	'section'     => 'blog_single_post_options',
	'default'     => array(
		'font-family'    => 'Arvo',
		'variant'        => 'regular',
		'font-size'      => '22px',
		'line-height'    => '1.3',
		'letter-spacing' => '0.5px',
		'text-transform' => 'uppercase'
	),
	'output'      => array(
		array(
			'element' => '.maincontainer .di-single-post-typo h1.the-title',
		),
	),
	'transport' => 'auto',
) );

Kirki::add_field( 'di_multipurpose_config', array(
	'type'        => 'typography',
	'settings'    => 'blog_single_cntnts_typog',
	'label'       => esc_attr__( 'Post Paragraphs Typography', 'di-multipurpose' ),
	'section'     => 'blog_single_post_options',
	'default'     => array(
		'font-family'    => 'Fauna One',
		'variant'        => 'regular',
		'font-size'      => '14px',
		'line-height'    => '1.7',
		'letter-spacing' => '0.2px',
		'text-transform' => 'inherit',
	),
	'output'      => array(
		array(
			'element' => '.maincontainer .di-single-contents-typo p',
		),
	),
	'transport' => 'auto',
) );

Kirki::add_field( 'di_multipurpose_config', array(
	'type'        => 'toggle',
	'settings'    => 'sngle_pst_related_psts',
	'label'       => esc_attr__( 'Related Posts?', 'di-multipurpose' ),
	'description' => esc_attr__( 'Enable/Disable related posts.', 'di-multipurpose' ),
	'section'     => 'blog_single_post_options',
	'default'     => '0',
) );

Kirki::add_field( 'di_multipurpose_config', array(
	'type'			=> 'text',
	'settings'		=> 'sngle_pst_related_psts_txt',
	'label'			=> esc_attr__( 'Related Post Headline', 'di-multipurpose' ),
	'description'	=> esc_attr__( 'Text above related posts.', 'di-multipurpose' ),
	'section'		=> 'blog_single_post_options',
	'default'		=> esc_attr__( 'You Might Also Like:', 'di-multipurpose' ),
	'active_callback'  => array(
		array(
			'setting'  => 'sngle_pst_related_psts',
			'operator' => '==',
			'value'    => '1',
		),
	),
	'partial_refresh' => array(
		'sngle_pst_related_psts_txt' => array(
			'selector'        => '.di-related-posts-title',
			'render_callback' => function() {
				return wp_kses_post( get_theme_mod( 'sngle_pst_related_psts_txt' ) );
			},
		),
	),
) );

Kirki::add_field( 'di_multipurpose_config', array(
	'type'        => 'custom',
	'settings'    => 'info_cmnt',
	'section'     => 'blog_single_post_options',
	'default'     => '<hr /><div style="padding: 10px;background-color: #333; color: #fff; border-radius: 8px;">' . esc_attr__( 'Comments display in Even Odd order like Even, Odd, Even, Odd as so on. here we can set color and background color for both Even and Odd comment.', 'di-multipurpose' ) . '</div>',
) );

Kirki::add_field( 'di_multipurpose_config', array(
	'type'        => 'color',
	'settings'    => 'cmnt_even_color',
	'label'       => esc_attr__( 'Even Comment Color', 'di-multipurpose' ),
	'section'     => 'blog_single_post_options',
	'default'     => '#000000',
	'choices'     => array(
		'alpha' => true,
	),
	'output' => array(
		array(
			'element'  => '#comments .comment.even',
			'property' => 'color',
		),
		array(
			'element'  => '#comments .pingback.even',
			'property' => 'color',
		),
	),
	'transport' => 'auto',
) );

Kirki::add_field( 'di_multipurpose_config', array(
	'type'        => 'color',
	'settings'    => 'cmnt_even_bg_color',
	'label'       => esc_attr__( 'Even Comment Background Color', 'di-multipurpose' ),
	'section'     => 'blog_single_post_options',
	'default'     => 'rgba(255, 255, 255, 0.07)',
	'choices'     => array(
		'alpha' => true,
	),
	'output' => array(
		array(
			'element'  => '#comments .comment.even',
			'property' => 'background-color',
		),
		array(
			'element'  => '#comments .pingback.even',
			'property' => 'background-color',
		),
	),
	'transport' => 'auto',
) );

Kirki::add_field( 'di_multipurpose_config', array(
	'type'        => 'color',
	'settings'    => 'cmnt_odd_color',
	'label'       => esc_attr__( 'Odd Comment Color', 'di-multipurpose' ),
	'section'     => 'blog_single_post_options',
	'default'     => '#000000',
	'choices'     => array(
		'alpha' => true,
	),
	'output' => array(
		array(
			'element'  => '#comments .comment.odd',
			'property' => 'color',
		),
		array(
			'element'  => '#comments .pingback.odd',
			'property' => 'color',
		),
	),
	'transport' => 'auto',
) );

Kirki::add_field( 'di_multipurpose_config', array(
	'type'        => 'color',
	'settings'    => 'cmnt_odd_bg_color',
	'label'       => esc_attr__( 'Odd Comment Background Color', 'di-multipurpose' ),
	'section'     => 'blog_single_post_options',
	'default'     => 'rgba(183, 183, 183, 0.19)',
	'choices'     => array(
		'alpha' => true,
	),
	'output' => array(
		array(
			'element'  => '#comments .comment.odd',
			'property' => 'background-color',
		),
		array(
			'element'  => '#comments .pingback.odd',
			'property' => 'background-color',
		),
	),
	'transport' => 'auto',
) );

do_action( 'di_multipurpose_blog_options' );

// Blog END

// Front page posts owl slider
Kirki::add_section( 'front_slider_options', array(
	'title'          => esc_attr__( 'Front Page Slider Options', 'di-multipurpose' ),
	'panel'          => 'di_multipurpose_options',
	'capability'     => 'edit_theme_options',
) );

Kirki::add_field( 'di_multipurpose_config', array(
	'type'        => 'toggle',
	'settings'    => 'front_slider_endis',
	'label'       => esc_attr__( 'Display Slider?', 'di-multipurpose' ),
	'description' => esc_attr__( 'Enable/Disable posts slider on front page.', 'di-multipurpose' ),
	'section'     => 'front_slider_options',
	'default'     => '0',
) );

Kirki::add_field( 'di_multipurpose_config', array(
	'type'        => 'select',
	'settings'    => 'front_slider_tag',
	'label'       => __( 'Select Posts Tag', 'di-multipurpose' ),
	'description' => __( 'Select a tag for front page posts slider.', 'di-multipurpose' ),
	'section'     => 'front_slider_options',
	'default'     => '',
	'priority'    => 10,
	'choices'     => Kirki_Helper::get_terms( 'post_tag' ),
	'active_callback'  => array(
		array(
			'setting'  => 'front_slider_endis',
			'operator' => '==',
			'value'    => '1',
		),
	),
) );

Kirki::add_field( 'di_multipurpose_config', array(
	'type'        => 'number',
	'settings'    => 'front_slider_num',
	'label'       => esc_attr__( 'Number of Posts', 'di-multipurpose' ),
	'description' => esc_attr__( 'How much posts, you want to include in slider?', 'di-multipurpose' ),
	'section'     => 'front_slider_options',
	'default'     => 3,
	'choices'     => array(
		'min'  => 1,
		'step' => 1,
	),
	'active_callback'  => array(
		array(
			'setting'  => 'front_slider_endis',
			'operator' => '==',
			'value'    => '1',
		),
		array(
			'setting'  => 'front_slider_tag',
			'operator' => '!=',
			'value'    => '',
		),
	),
) );

Kirki::add_field( 'di_multipurpose_config', array(
	'type'        => 'color',
	'settings'    => 'front_slider_overly_bg_clr',
	'label'       => esc_attr__( 'Overlay Background Color', 'di-multipurpose' ),
	'section'     => 'front_slider_options',
	'default'     => 'rgba(0,0,0,.5)',
	'choices'     => array(
		'alpha' => true,
	),
	'output' => array(
		array(
			'element'  => '.owl-carousel .item .diowl-overlay',
			'property' => 'background-color',
		),
	),
	'transport' => 'auto',
	'active_callback'  => array(
		array(
			'setting'  => 'front_slider_endis',
			'operator' => '==',
			'value'    => '1',
		),
		array(
			'setting'  => 'front_slider_tag',
			'operator' => '!=',
			'value'    => '',
		),
	),
) );

Kirki::add_field( 'di_multipurpose_config', array(
	'type'        => 'color',
	'settings'    => 'front_slider_overly_cat_clr',
	'label'       => esc_attr__( 'Overlay Categories Color', 'di-multipurpose' ),
	'section'     => 'front_slider_options',
	'default'     => '#c6c6c6',
	'choices'     => array(
		'alpha' => true,
	),
	'output' => array(
		array(
			'element'  => '.owl-carousel .item .diowl-overlay .diowl-cat a',
			'property' => 'color',
		),
	),
	'transport' => 'auto',
	'active_callback'  => array(
		array(
			'setting'  => 'front_slider_endis',
			'operator' => '==',
			'value'    => '1',
		),
		array(
			'setting'  => 'front_slider_tag',
			'operator' => '!=',
			'value'    => '',
		),
	),
) );

Kirki::add_field( 'di_multipurpose_config', array(
	'type'        => 'color',
	'settings'    => 'front_slider_overly_hdln_clr',
	'label'       => esc_attr__( 'Overlay Headline Color', 'di-multipurpose' ),
	'section'     => 'front_slider_options',
	'default'     => '#f1f1f1',
	'choices'     => array(
		'alpha' => true,
	),
	'output' => array(
		array(
			'element'  => '.owl-carousel .item .diowl-overlay h3 a',
			'property' => 'color',
		),
	),
	'transport' => 'auto',
	'active_callback'  => array(
		array(
			'setting'  => 'front_slider_endis',
			'operator' => '==',
			'value'    => '1',
		),
		array(
			'setting'  => 'front_slider_tag',
			'operator' => '!=',
			'value'    => '',
		),
	),
) );

do_action( 'di_multipurpose_front_page_posts_slider_options' );

// Front page posts owl slider END

// Sidebar widget options
Kirki::add_section( 'sidebar_widgets_options', array(
	'title'          => esc_attr__( 'Sidebar Widgets Options', 'di-multipurpose' ),
	'panel'          => 'di_multipurpose_options',
	'capability'     => 'edit_theme_options',
) );

Kirki::add_field( 'di_multipurpose_config', array(
	'type'        => 'typography',
	'settings'    => 'sidebr_h3_typog',
	'label'       => esc_attr__( 'Headline Typography', 'di-multipurpose' ),
	'description'	=> esc_attr__( 'Typography of widgets headline.', 'di-multipurpose' ),
	'section'     => 'sidebar_widgets_options',
	'default'     => array(
		'font-family'		=> 'Arvo',
		'variant'			=> 'regular',
		'font-size'			=> '16px',
		'line-height'		=> '1.3',
		'letter-spacing'	=> '0.5px',
		'color'				=> '#000000',
		'text-transform'	=> 'uppercase',
		'text-align'		=> 'center'
	),
	'output'      => array(
		array(
			'element' => '.widget_sidebar_main .right-widget-title',
		),
	),
	'transport' => 'auto',
) );

Kirki::add_field( 'di_multipurpose_config', array(
	'type'        => 'color',
	'settings'    => 'sidebar_hdln_bg_clr',
	'label'       => esc_attr__( 'Widgets Headline Background Color', 'di-multipurpose' ),
	'section'     => 'sidebar_widgets_options',
	'default'     => '#f7f7f7',
	'choices'     => array(
		'alpha' => true,
	),
	'output' => array(
		array(
			'element'  => '.widget_sidebar_main .right-widget-title',
			'property' => 'background-color',
		),
	),
	'transport' => 'auto',
) );


do_action( 'di_multipurpose_sidebar_widgets_options' );

// Sidebar widget options END

// bbPress options if plugin is activate
if( class_exists( 'bbPress' ) ) {
	
	Kirki::add_section( 'bbpress_options', array(
		'title'          => __( 'bbPress Options', 'di-multipurpose' ),
		'capability'     => 'edit_theme_options',
		'panel'          => 'di_multipurpose_options',
	) );

	Kirki::add_field( 'responsive_forum_config', array(
		'type'        => 'radio-image',
		'settings'    => 'bbpress_layout',
		'label'       => __( 'bbPress Pages Layout', 'di-multipurpose' ),
		'section'     => 'bbpress_options',
		'default'     => 'fullw',
		'choices'     => array(
			'fullw'	  => get_template_directory_uri() . '/assets/images/fullw.png',
			'rights'  => get_template_directory_uri() . '/assets/images/rights.png',
			'lefts'   => get_template_directory_uri() . '/assets/images/lefts.png',
		),
	) );
}
// bbPress options if plugin is activate END

//woocommerce section
if( class_exists( 'WooCommerce' ) ) {

	// Sidebar cart options.
	Kirki::add_section( 'sidebar_cart_optins', array(
		'title'          => esc_attr__( 'Sidebar Cart Options', 'di-multipurpose' ),
		'panel'          => 'di_multipurpose_options',
		'capability'     => 'edit_theme_options',
	) );

	Kirki::add_field( 'di_multipurpose_config', array(
		'type'        => 'toggle',
		'settings'    => 'sb_cart_onoff',
		'label'       => esc_attr__( 'Sidebar Cart', 'di-multipurpose' ),
		'description' => esc_attr__( 'Enable/Disable Sidebar Cart', 'di-multipurpose' ),
		'section'     => 'sidebar_cart_optins',
		'default'     => '0',
	) );

	Kirki::add_field( 'di_multipurpose_config', array(
		'type'        => 'select',
		'settings'    => 'sb_cart_icon_postn',
		'label'       => esc_attr__( 'Icon Position', 'di-multipurpose' ),
		'description' => esc_attr__( 'Icon position of sidebar cart.', 'di-multipurpose' ),
		'section'     => 'sidebar_cart_optins',
		'default'     => '3',
		'choices'     => array(
			'1' => esc_attr__( 'Top Left', 'di-multipurpose' ),
			'2' => esc_attr__( 'Top Right', 'di-multipurpose' ),
			'3' => esc_attr__( 'Bottom Left', 'di-multipurpose' ),
			'4' => esc_attr__( 'Bottom Right', 'di-multipurpose' ),
		),
		'active_callback'  => array(
			array(
				'setting'  => 'sb_cart_onoff',
				'operator' => '==',
				'value'    => 1,
			),
		)
	) );

	// if sb_cart_icon_postn == 1
	Kirki::add_field( 'di_multipurpose_config', array(
		'type'        => 'text',
		'settings'    => 'sb_cart_icon_postn_a_t',
		'label'       => esc_attr__( 'Top Position', 'di-multipurpose' ),
		'description' => esc_attr__( 'Pixels to move from top. (i.e. 60)', 'di-multipurpose' ),
		'section'     => 'sidebar_cart_optins',
		'default'     => '50',
		'output' => array(
			array(
				'element'	=> '.side-menu-menu-button',
				'property'	=> 'top',
				'suffix'	=> 'px',
			),
		),
		'transport' => 'auto',
		'active_callback'  => array(
			array(
				'setting'  => 'sb_cart_onoff',
				'operator' => '==',
				'value'    => 1,
			),
			array(
				'setting'  => 'sb_cart_icon_postn',
				'operator' => '==',
				'value'    => 1,
			),
		)
	) );

	Kirki::add_field( 'di_multipurpose_config', array(
		'type'        => 'text',
		'settings'    => 'sb_cart_icon_postn_a_l',
		'label'       => esc_attr__( 'Left Position', 'di-multipurpose' ),
		'description' => esc_attr__( 'Pixels to move from left. (i.e. 60)', 'di-multipurpose' ),
		'section'     => 'sidebar_cart_optins',
		'default'     => '20',
		'output' => array(
			array(
				'element'	=> '.side-menu-menu-button',
				'property'	=> 'left',
				'suffix'	=> 'px',
			),
		),
		'transport' => 'auto',
		'active_callback'  => array(
			array(
				'setting'  => 'sb_cart_onoff',
				'operator' => '==',
				'value'    => 1,
			),
			array(
				'setting'  => 'sb_cart_icon_postn',
				'operator' => '==',
				'value'    => 1,
			),
		)
	) );

	// if sb_cart_icon_postn == 2
	Kirki::add_field( 'di_multipurpose_config', array(
		'type'        => 'text',
		'settings'    => 'sb_cart_icon_postn_b_t',
		'label'       => esc_attr__( 'Top Position', 'di-multipurpose' ),
		'description' => esc_attr__( 'Pixels to move from top. (i.e. 60)', 'di-multipurpose' ),
		'section'     => 'sidebar_cart_optins',
		'default'     => '50',
		'output' => array(
			array(
				'element'	=> '.side-menu-menu-button',
				'property'	=> 'top',
				'suffix'	=> 'px',
			),
		),
		'transport' => 'auto',
		'active_callback'  => array(
			array(
				'setting'  => 'sb_cart_onoff',
				'operator' => '==',
				'value'    => 1,
			),
			array(
				'setting'  => 'sb_cart_icon_postn',
				'operator' => '==',
				'value'    => 2,
			),
		)
	) );

	Kirki::add_field( 'di_multipurpose_config', array(
		'type'        => 'text',
		'settings'    => 'sb_cart_icon_postn_b_r',
		'label'       => esc_attr__( 'Right Position', 'di-multipurpose' ),
		'description' => esc_attr__( 'Pixels to move from right. (i.e. 60)', 'di-multipurpose' ),
		'section'     => 'sidebar_cart_optins',
		'default'     => '20',
		'output' => array(
			array(
				'element'	=> '.side-menu-menu-button',
				'property'	=> 'right',
				'suffix'	=> 'px',
			),
		),
		'transport' => 'auto',
		'active_callback'  => array(
			array(
				'setting'  => 'sb_cart_onoff',
				'operator' => '==',
				'value'    => 1,
			),
			array(
				'setting'  => 'sb_cart_icon_postn',
				'operator' => '==',
				'value'    => 2,
			),
		)
	) );

	// if sb_cart_icon_postn == 3
	Kirki::add_field( 'di_multipurpose_config', array(
		'type'        => 'text',
		'settings'    => 'sb_cart_icon_postn_c_b',
		'label'       => esc_attr__( 'Bottom Position', 'di-multipurpose' ),
		'description' => esc_attr__( 'Pixels to move from bottom. (i.e. 60)', 'di-multipurpose' ),
		'section'     => 'sidebar_cart_optins',
		'default'     => '50',
		'output' => array(
			array(
				'element'	=> '.side-menu-menu-button',
				'property'	=> 'bottom',
				'suffix'	=> 'px',
			),
		),
		'transport' => 'auto',
		'active_callback'  => array(
			array(
				'setting'  => 'sb_cart_onoff',
				'operator' => '==',
				'value'    => 1,
			),
			array(
				'setting'  => 'sb_cart_icon_postn',
				'operator' => '==',
				'value'    => 3,
			),
		)
	) );

	Kirki::add_field( 'di_multipurpose_config', array(
		'type'        => 'text',
		'settings'    => 'sb_cart_icon_postn_c_l',
		'label'       => esc_attr__( 'Left Position', 'di-multipurpose' ),
		'description' => esc_attr__( 'Pixels to move from left. (i.e. 60)', 'di-multipurpose' ),
		'section'     => 'sidebar_cart_optins',
		'default'     => '20',
		'output' => array(
			array(
				'element'	=> '.side-menu-menu-button',
				'property'	=> 'left',
				'suffix'	=> 'px',
			),
		),
		'transport' => 'auto',
		'active_callback'  => array(
			array(
				'setting'  => 'sb_cart_onoff',
				'operator' => '==',
				'value'    => 1,
			),
			array(
				'setting'  => 'sb_cart_icon_postn',
				'operator' => '==',
				'value'    => 3,
			),
		)
	) );

	// if sb_cart_icon_postn == 4
	Kirki::add_field( 'di_multipurpose_config', array(
		'type'        => 'text',
		'settings'    => 'sb_cart_icon_postn_d_b',
		'label'       => esc_attr__( 'Bottom Position', 'di-multipurpose' ),
		'description' => esc_attr__( 'Pixels to move from bottom. (i.e. 60)', 'di-multipurpose' ),
		'section'     => 'sidebar_cart_optins',
		'default'     => '70',
		'output' => array(
			array(
				'element'	=> '.side-menu-menu-button',
				'property'	=> 'bottom',
				'suffix'	=> 'px',
			),
		),
		'transport' => 'auto',
		'active_callback'  => array(
			array(
				'setting'  => 'sb_cart_onoff',
				'operator' => '==',
				'value'    => 1,
			),
			array(
				'setting'  => 'sb_cart_icon_postn',
				'operator' => '==',
				'value'    => 4,
			),
		)
	) );

	Kirki::add_field( 'di_multipurpose_config', array(
		'type'        => 'text',
		'settings'    => 'sb_cart_icon_postn_d_r',
		'label'       => esc_attr__( 'Right Position', 'di-multipurpose' ),
		'description' => esc_attr__( 'Pixels to move from right. (i.e. 60)', 'di-multipurpose' ),
		'section'     => 'sidebar_cart_optins',
		'default'     => '20',
		'output' => array(
			array(
				'element'	=> '.side-menu-menu-button',
				'property'	=> 'right',
				'suffix'	=> 'px',
			),
		),
		'transport' => 'auto',
		'active_callback'  => array(
			array(
				'setting'  => 'sb_cart_onoff',
				'operator' => '==',
				'value'    => 1,
			),
			array(
				'setting'  => 'sb_cart_icon_postn',
				'operator' => '==',
				'value'    => 4,
			),
		)
	) );

	Kirki::add_field( 'di_multipurpose_config', array(
		'type'        => 'color',
		'settings'    => 'sb_menu_clr',
		'label'       => esc_attr__( 'Color', 'di-multipurpose' ),
		'description'	=> esc_attr__( 'Sidebar panel contents color.', 'di-multipurpose' ),
		'section'     => 'sidebar_cart_optins',
		'default'     => '#ffffff',
		'choices'     => array(
			'alpha' => true,
		),
		'output' => array(
			array(
				'element'	=> '.side-menu-menu-wrap',
				'property'	=> 'color',
			),
		),
		'transport' => 'auto',
		'active_callback'  => array(
			array(
				'setting'  => 'sb_cart_onoff',
				'operator' => '==',
				'value'    => 1,
			),
		)
	) );

	Kirki::add_field( 'di_multipurpose_config', array(
		'type'        => 'color',
		'settings'    => 'sb_menu_bg_clr',
		'label'       => esc_attr__( 'Background Color', 'di-multipurpose' ),
		'description'	=> esc_attr__( 'Sidebar panel background color.', 'di-multipurpose' ),
		'section'     => 'sidebar_cart_optins',
		'default'     => '#333333',
		'choices'     => array(
			'alpha' => true,
		),
		'output' => array(
			array(
				'element'	=> '.side-menu-menu-wrap',
				'property'	=> 'background-color',
			),
		),
		'transport' => 'auto',
		'active_callback'  => array(
			array(
				'setting'  => 'sb_cart_onoff',
				'operator' => '==',
				'value'    => 1,
			),
		)
	) );

	Kirki::add_field( 'di_multipurpose_config', array(
		'type'        => 'color',
		'settings'    => 'sb_menu_cls_btn_clr',
		'label'       => esc_attr__( 'Sidebar Panel Closing Icon Color', 'di-multipurpose' ),
		'description'	=> esc_attr__( 'Close icon color on sidebar panel.', 'di-multipurpose' ),
		'section'     => 'sidebar_cart_optins',
		'default'     => '#ffffff',
		'choices'     => array(
			'alpha' => true,
		),
		'output' => array(
			array(
				'element'	=> '.side-menu-close-button::before, .side-menu-close-button::after',
				'property'	=> 'background-color',
			),
		),
		'transport' => 'auto',
		'active_callback'  => array(
			array(
				'setting'  => 'sb_cart_onoff',
				'operator' => '==',
				'value'    => 1,
			),
		)
	) );

	Kirki::add_field( 'di_multipurpose_config', array(
		'type'        => 'color',
		'settings'    => 'sb_menu_lnks_clr',
		'label'       => esc_attr__( 'Sidebar Panel Links Color', 'di-multipurpose' ),
		'section'     => 'sidebar_cart_optins',
		'default'     => '#f66f66',
		'choices'     => array(
			'alpha' => true,
		),
		'output' => array(
			array(
				'element'	=> '.side-menu-menu-wrap .woocommerce-mini-cart .woocommerce-mini-cart-item a',
				'property'	=> 'color',
			),
		),
		'transport' => 'auto',
		'active_callback'  => array(
			array(
				'setting'  => 'sb_cart_onoff',
				'operator' => '==',
				'value'    => 1,
			),
		)
	) );

	Kirki::add_field( 'di_multipurpose_config', array(
		'type'        => 'color',
		'settings'    => 'sb_menu_lnks_mo_clr',
		'label'       => esc_attr__( 'Sidebar Panel Hover Links Color', 'di-multipurpose' ),
		'section'     => 'sidebar_cart_optins',
		'default'     => '#ff2c1e',
		'choices'     => array(
			'alpha' => true,
		),
		'output' => array(
			array(
				'element'	=> '.side-menu-menu-wrap .woocommerce-mini-cart .woocommerce-mini-cart-item a:hover',
				'property'	=> 'color',
			),
		),
		'transport' => 'auto',
		'active_callback'  => array(
			array(
				'setting'  => 'sb_cart_onoff',
				'operator' => '==',
				'value'    => 1,
			),
		)
	) );

	Kirki::add_field( 'di_multipurpose_config', array(
		'type'        => 'typography',
		'settings'    => 'sb_cart_typo',
		'label'       => esc_attr__( 'Sidebar Panel Links Typography', 'di-multipurpose' ),
		'section'     => 'sidebar_cart_optins',
		'default'     => array(
			'font-family'    => 'Roboto',
			'variant'        => '400',
			'font-size'      => '14px',
			'line-height'    => '18px',
			'letter-spacing' => '0.5px',
			'text-transform' => 'inherit',
		),
		'output'      => array(
			array(
				'element' => '.side-menu-menu-wrap ul.cart_list li a, .side-menu-menu-wrap .woocommerce ul.product_list_widget li a',
			),
		),
		'transport' => 'auto',
		'active_callback'  => array(
			array(
				'setting'  => 'sb_cart_onoff',
				'operator' => '==',
				'value'    => 1,
			),
		)
	) );

	do_action( 'di_multipurpose_sidebar_cart_options' );
	
	// WooCommerce options.
	Kirki::add_section( 'woocommerce_options', array(
		'title'          => esc_attr__( 'Woocommerce Options', 'di-multipurpose' ),
		'panel'          => 'di_multipurpose_options',
		'capability'     => 'edit_theme_options',
	) );
	
	Kirki::add_field( 'di_multipurpose_config', array(
		'type'        => 'toggle',
		'settings'    => 'display_shop_link_top_bar',
		'label'       => esc_attr__( 'Display shop icon in Top Bar?', 'di-multipurpose' ),
		'description' => esc_attr__( 'Enable/Disable shop icon in Top Bar', 'di-multipurpose' ),
		'section'     => 'woocommerce_options',
		'default'     => '1',
		'partial_refresh' => array(
			'display_shop_link_top_bar' => array(
				'selector'        => '.woo_icons_top_bar_ctmzr',
				'render_callback' => function() {
					get_template_part( 'template-parts/partial/content', 'woo-icons-topbar' );
				},
			),
		),
		'active_callback'  => array(
			array(
				'setting'  => 'display_top_bar',
				'operator' => '==',
				'value'    => 1,
			),
		)
	) );
	
	Kirki::add_field( 'di_multipurpose_config', array(
		'type'        => 'toggle',
		'settings'    => 'display_cart_link_top_bar',
		'label'       => esc_attr__( 'Display cart icon in Top Bar?', 'di-multipurpose' ),
		'description' => esc_attr__( 'Enable/Disable cart icon in Top Bar', 'di-multipurpose' ),
		'section'     => 'woocommerce_options',
		'default'     => '1',
		'partial_refresh' => array(
			'display_cart_link_top_bar' => array(
				'selector'        => '.woo_icons_top_bar_ctmzr',
				'render_callback' => function() {
					get_template_part( 'template-parts/partial/content', 'woo-icons-topbar' );
				},
			),
		),
		'active_callback'  => array(
			array(
				'setting'  => 'display_top_bar',
				'operator' => '==',
				'value'    => 1,
			),
		)
	) );
	
	Kirki::add_field( 'di_multipurpose_config', array(
		'type'        => 'toggle',
		'settings'    => 'display_myaccount_link_top_bar',
		'label'       => esc_attr__( 'Display My Account icon in Top Bar?', 'di-multipurpose' ),
		'description' => esc_attr__( 'Enable/Disable My Account icon in Top Bar', 'di-multipurpose' ),
		'section'     => 'woocommerce_options',
		'default'     => '1',
		'partial_refresh' => array(
			'display_myaccount_link_top_bar' => array(
				'selector'        => '.woo_icons_top_bar_ctmzr',
				'render_callback' => function() {
					get_template_part( 'template-parts/partial/content', 'woo-icons-topbar' );
				},
			),
		),
		'active_callback'  => array(
			array(
				'setting'  => 'display_top_bar',
				'operator' => '==',
				'value'    => 1,
			),
		)
	) );
	
	Kirki::add_field( 'di_multipurpose_config', array(
		'type'        => 'toggle',
		'settings'    => 'display_wc_breadcrumbs',
		'label'       => esc_attr__( 'WC Breadcrumbs', 'di-multipurpose' ),
		'description' => esc_attr__( 'Enable/Disable WooCommerce Breadcrumbs.', 'di-multipurpose' ),
		'section'     => 'woocommerce_options',
		'default'     => '0',
	) );

	Kirki::add_field( 'di_multipurpose_config', array(
		'type'        => 'toggle',
		'settings'    => 'display_related_prdkt',
		'label'       => esc_attr__( 'Related Products', 'di-multipurpose' ),
		'description' => esc_attr__( 'Enable/Disable WooCommerce Related Products,', 'di-multipurpose' ),
		'section'     => 'woocommerce_options',
		'default'     => '1',
	) );

	Kirki::add_field( 'di_multipurpose_config', array(
		'type'        => 'toggle',
		'settings'    => 'support_gallery_zoom',
		'label'       => esc_attr__( 'Gallery Zoom', 'di-multipurpose' ),
		'description' => esc_attr__( 'Enable/Disable gallery zoom support on single product.', 'di-multipurpose' ),
		'section'     => 'woocommerce_options',
		'default'     => '1',
	) );

	Kirki::add_field( 'di_multipurpose_config', array(
		'type'        => 'toggle',
		'settings'    => 'support_gallery_lightbox',
		'label'       => esc_attr__( 'Gallery Light Box', 'di-multipurpose' ),
		'description' => esc_attr__( 'Enable/Disable gallery light box support on single product.', 'di-multipurpose' ),
		'section'     => 'woocommerce_options',
		'default'     => '1',
	) );

	Kirki::add_field( 'di_multipurpose_config', array(
		'type'			=> 'toggle',
		'settings'		=> 'support_gallery_slider',
		'label'			=> esc_attr__( 'Gallery Slider', 'di-multipurpose' ),
		'description'	=> esc_attr__( 'Enable/Disable gallery slider support on single product.', 'di-multipurpose' ),
		'section'		=> 'woocommerce_options',
		'default'		=> '1',
	) );

	Kirki::add_field( 'di_multipurpose_config', array(
		'type'			=> 'toggle',
		'settings'		=> 'order_again_btn',
		'label'			=> esc_attr__( 'Display Order Again Button?', 'di-multipurpose' ),
		'description'	=> esc_attr__( 'It will show / hide order again button on singe order page.', 'di-multipurpose' ),
		'section'		=> 'woocommerce_options',
		'default'		=> '1',
	) );
	
	Kirki::add_field( 'di_multipurpose_config', array(
		'type'        => 'number',
		'settings'    => 'product_per_page',
		'label'       => esc_attr__( 'Products on Shop Page', 'di-multipurpose' ),
		'description' => esc_attr__( 'How much products you want to display on shop / products archive page?', 'di-multipurpose' ),
		'section'     => 'woocommerce_options',
		'default'     => 12,
		'choices'     => array(
			'min'  => 0,
			'max'  => 100,
			'step' => 1,
		),
	) );
	
	Kirki::add_field( 'di_multipurpose_config', array(
		'type'        => 'slider',
		'settings'    => 'product_per_column',
		'label'       => esc_attr__( 'Products Per Column', 'di-multipurpose' ),
		'description' => esc_attr__( 'How much products you want to display in column?', 'di-multipurpose' ),
		'section'     => 'woocommerce_options',
		'default'     => 3,
		'choices'     => array(
			'min'  => '1',
			'max'  => '5',
			'step' => '1',
			),
	) );

	Kirki::add_field( 'di_multipurpose_config', array(
		'type'			 => 'select',
		'settings'		=> 'woo_product_img_effect',
		'label'			=> __( 'Product Image Effect', 'di-multipurpose' ),
		'description'	=> __( 'Product image effect on shop / products archive page', 'di-multipurpose' ),
		'section'		=> 'woocommerce_options',
		'default'		=> 'zoomin',
		'priority'		=> 10,
		'choices'		=> array(
			'none'			=> esc_attr__( 'None', 'di-multipurpose' ),
			'zoomin'		=> esc_attr__( 'Zoom In', 'di-multipurpose' ),
			'zoomout'		=> esc_attr__( 'Zoom Out', 'di-multipurpose' ),
			'rotate'		=> esc_attr__( 'Rotate', 'di-multipurpose' ),
			'blur'			=> esc_attr__( 'Blur', 'di-multipurpose' ),
			'grayscale'		=> esc_attr__( 'Gray Scale', 'di-multipurpose' ),
			'sepia'			=> esc_attr__( 'Sepia', 'di-multipurpose' ),
			'opacity'		=> esc_attr__( 'Opacity', 'di-multipurpose' ),
			'flash'			=> esc_attr__( 'Flash', 'di-multipurpose' ),
		),
	) );

	Kirki::add_field( 'di_multipurpose_config', array(
		'type'        => 'custom',
		'settings'    => 'info_woo_layout',
		'section'     => 'woocommerce_options',
		'default'     => '<hr /><div style="padding: 10px;background-color: #333; color: #fff; border-radius: 8px;">' . esc_attr__( 'Layouts: For Cart, Checkout and My Account pages layout, use: Template option under Page Attributes on page edit screen.', 'di-multipurpose' ) . '</div>',
	) );

	Kirki::add_field( 'di_multipurpose_config', array(
		'type'			=> 'radio-image',
		'settings'		=> 'woo_layout',
		'label'			=> esc_attr__( 'Shop / Archive Page Layout', 'di-multipurpose' ),
		'description'	=> esc_attr__( 'This layout will apply on shop, archive, search (products loop) pages.', 'di-multipurpose' ),
		'section'		=> 'woocommerce_options',
		'default'		=> 'fullw',
		'choices'		=> array(
			'fullw' => get_template_directory_uri() . '/assets/images/fullw.png',
			'rights' => get_template_directory_uri() . '/assets/images/rights.png',
			'lefts' => get_template_directory_uri() . '/assets/images/lefts.png',
		),
	) );

	Kirki::add_field( 'di_multipurpose_config', array(
		'type'			=> 'radio-image',
		'settings'		=> 'woo_singleprod_layout',
		'label'			=> esc_attr__( 'Single Product Page Layout', 'di-multipurpose' ),
		'description'	=> esc_attr__( 'This layout will apply on single product page.', 'di-multipurpose' ),
		'section'		=> 'woocommerce_options',
		'default'		=> 'fullw',
		'choices'		=> array(
			'fullw' => get_template_directory_uri() . '/assets/images/fullw.png',
			'rights' => get_template_directory_uri() . '/assets/images/rights.png',
			'lefts' => get_template_directory_uri() . '/assets/images/lefts.png',
		),
	) );

	Kirki::add_field( 'di_multipurpose_config', array(
		'type'        => 'color',
		'settings'    => 'woo_onsale_lbl_clr',
		'label'       => esc_attr__( 'OnSale Sign Color', 'di-multipurpose' ),
		'description' => esc_attr__( 'This will be color of OnSale Sign of products.', 'di-multipurpose' ),
		'section'     => 'woocommerce_options',
		'default'     => apply_filters( 'di_multipurpose_woo_onsale_lbl_clr', '#ffffff' ),
		'choices'     => array(
			'alpha' => true,
		),
		'output' => array(
			array(
				'element'	=> '.woocommerce span.onsale',
				'property'	=> 'color',
			),
		),
		'transport' => 'auto'
	) );

	Kirki::add_field( 'di_multipurpose_config', array(
		'type'        => 'color',
		'settings'    => 'woo_onsale_lbl_bg_clr',
		'label'       => esc_attr__( 'OnSale Sign Background Color', 'di-multipurpose' ),
		'description' => esc_attr__( 'This will be background color of OnSale Sign of products.', 'di-multipurpose' ),
		'section'     => 'woocommerce_options',
		'default'     => apply_filters( 'di_multipurpose_woo_onsale_lbl_bg_clr', '#f66f66' ),
		'choices'     => array(
			'alpha' => true,
		),
		'output' => array(
			array(
				'element'	=> '.woocommerce span.onsale',
				'property'	=> 'background-color',
			),
		),
		'transport' => 'auto'
	) );

	Kirki::add_field( 'di_multipurpose_config', array(
		'type'        => 'color',
		'settings'    => 'woo_price_clr',
		'label'       => esc_attr__( 'Product Price Color', 'di-multipurpose' ),
		'description' => esc_attr__( 'This will be color of product price.', 'di-multipurpose' ),
		'section'     => 'woocommerce_options',
		'default'     => apply_filters( 'di_multipurpose_woo_price_clr', '#f66f66' ),
		'choices'     => array(
			'alpha' => true,
		),
		'output' => array(
			array(
				'element'	=> '.woocommerce ul.products li.product .price, .woocommerce div.product p.price, .woocommerce div.product span.price',
				'property'	=> 'color',
			),
		),
		'transport' => 'auto'
	) );

	Kirki::add_field( 'di_multipurpose_config', array(
		'type'        => 'color',
		'settings'    => 'woo_prodct_brd_clr',
		'label'       => esc_attr__( 'Products Border Color', 'di-multipurpose' ),
		'description' => esc_attr__( 'This will be products border color on shop page.', 'di-multipurpose' ),
		'section'     => 'woocommerce_options',
		'default'     => '#eeeeee',
		'choices'     => array(
			'alpha' => true,
		),
		'output' => array(
			array(
				'element'	=> '.woocommerce ul.products li.product, .woocommerce-page ul.products li.product',
				'property'	=> 'border-color',
			),
		),
		'transport' => 'auto'
	) );


	do_action( 'di_multipurpose_woo_options' );

}
//woocommerce section END

//footer widgets section - footer means footer widget section (footer copyright not covered)
Kirki::add_section( 'footer_options', array(
	'title'          => esc_attr__( 'Footer Widget Options', 'di-multipurpose' ),
	'panel'          => 'di_multipurpose_options',
	'capability'     => 'edit_theme_options',
) );


Kirki::add_field( 'di_multipurpose_config', array(
	'type'        => 'toggle',
	'settings'    => 'endis_ftr_wdgt',
	'label'       => esc_attr__( 'Footer Widgets', 'di-multipurpose' ),
	'description' => esc_attr__( 'Enable/Disable Footer Widgets.', 'di-multipurpose' ),
	'section'     => 'footer_options',
	'default'     => '0',
) );

Kirki::add_field( 'di_multipurpose_config', array(
	'type'			=> 'radio-image',
	'settings'		=> 'ftr_wdget_lyot',
	'label'			=> esc_attr__( 'Footer Widget Layout', 'di-multipurpose' ),
	'description'	=> esc_attr__( 'Save and go to Widgets page to add.', 'di-multipurpose' ),
	'section'		=> 'footer_options',
	'default'		=> '3',
	'choices'		=> array(
		'1'		=> get_template_directory_uri() . '/assets/images/ftrwidlout1.png',
		'2'		=> get_template_directory_uri() . '/assets/images/ftrwidlout2.png',
		'3'		=> get_template_directory_uri() . '/assets/images/ftrwidlout3.png',
		'4'		=> get_template_directory_uri() . '/assets/images/ftrwidlout4.png',
		'48'	=> get_template_directory_uri() . '/assets/images/ftrwidlout48.png',
		'84'	=> get_template_directory_uri() . '/assets/images/ftrwidlout84.png',
	),
	'active_callback'  => array(
		array(
			'setting'  => 'endis_ftr_wdgt',
			'operator' => '==',
			'value'    => 1,
		),
	)
) );

Kirki::add_field( 'di_multipurpose_config', array(
	'type'        => 'background',
	'settings'    => 'footer_bg_color_new',
	'label'       => esc_html__( 'Background Property', 'di-multipurpose' ),
	'section'     => 'footer_options',
	'default'     => array(
		'background-color'      => '#363839',
		'background-image'      => '',
		'background-repeat'     => 'repeat',
		'background-position'   => 'center center',
		'background-size'       => 'cover',
		'background-attachment' => 'scroll',
	),
	'transport'   => 'auto',
	'output'      => array(
		array(
			'element' => '.footer',
		),
	),
	'active_callback'  => array(
		array(
			'setting'  => 'endis_ftr_wdgt',
			'operator' => '==',
			'value'    => 1,
		),
	)
) );

Kirki::add_field( 'di_multipurpose_config', array(
	'type'        => 'color',
	'settings'    => 'footer_wdget_ovrly_clr',
	'label'       => esc_attr__( 'Overlay Background Color', 'di-multipurpose' ),
	'section'     => 'footer_options',
	'default'     => 'rgba(0,0,0,0)',
	'choices'     => array(
		'alpha' => true,
	),
	'output' => array(
		array(
			'element'  => '.footer-overlay-color',
			'property' => 'background-color',
		),
	),
	'transport' => 'auto',
	'active_callback'  => array(
		array(
			'setting'  => 'endis_ftr_wdgt',
			'operator' => '==',
			'value'    => 1,
		),
	),
) );

Kirki::add_field( 'di_multipurpose_config', array(
	'type'        => 'color',
	'settings'    => 'footer_link_color',
	'label'       => esc_attr__( 'Links Color', 'di-multipurpose' ),
	'section'     => 'footer_options',
	'default'     => '#bfbfbf',
	'choices'     => array(
		'alpha' => true,
	),
	'output' => array(
		array(
			'element'  => '.footer a, .widgets_footer ul li::before',
			'property' => 'color',
		),
	),
	'transport' => 'auto',
	'active_callback'  => array(
		array(
			'setting'  => 'endis_ftr_wdgt',
			'operator' => '==',
			'value'    => 1,
		),
	)
) );

Kirki::add_field( 'di_multipurpose_config', array(
	'type'        => 'color',
	'settings'    => 'footer_link_mover_color',
	'label'       => esc_attr__( 'Mouse Hover Links Color', 'di-multipurpose' ),
	'section'     => 'footer_options',
	'default'     => '#f66f66',
	'choices'     => array(
		'alpha' => true,
	),
	'output' => array(
		array(
			'element'  => '.footer a:hover, .widgets_footer ul li:hover::before',
			'property' => 'color',
		),
	),
	'transport' => 'auto',
	'active_callback'  => array(
		array(
			'setting'  => 'endis_ftr_wdgt',
			'operator' => '==',
			'value'    => 1,
		),
	)
) );

Kirki::add_field( 'di_multipurpose_config', array(
	'type'        => 'typography',
	'settings'    => 'mn_footer_hdln_typog',
	'label'       => esc_attr__( 'Footer Widgets Headline Typography', 'di-multipurpose' ),
	'section'     => 'footer_options',
	'choices'     => array(
		'alpha' => true,
	),
	'default'     => array(
		'font-family'    	=> 'PT Sans',
		'variant'        	=> 'regular',
		'font-size'      	=> '15px',
		'line-height'    	=> '1.5',
		'letter-spacing' 	=> '1px',
		'color'				=> '#ffffff',
		'text-align'		=> 'left',
		'text-transform' 	=> 'uppercase',
	),
	'output'      => array(
		array(
			'element' => '.footer h3.widgets_footer_title',
		),
	),
	'transport' => 'auto',
	'active_callback'  => array(
		array(
			'setting'  => 'endis_ftr_wdgt',
			'operator' => '==',
			'value'    => 1,
		),
	)
) );

Kirki::add_field( 'di_multipurpose_config', array(
	'type'        => 'typography',
	'settings'    => 'mn_footer_typog',
	'label'       => esc_attr__( 'Footer Widgets Typography', 'di-multipurpose' ),
	'section'     => 'footer_options',
	'default'     => array(
		'font-family'    => 'PT Sans',
		'variant'        => 'regular',
		'font-size'      => '16px',
		'line-height'    => '1.5',
		'letter-spacing' => '0',
		'color'				=> '#8c8989',
		'text-align'		=> 'left',
		'text-transform' => 'inherit'
	),
	'output'      => array(
		array(
			'element' => '.footer, .footer caption',
		),
	),
	'transport' => 'auto',
	'active_callback'  => array(
		array(
			'setting'  => 'endis_ftr_wdgt',
			'operator' => '==',
			'value'    => 1,
		),
	)
) );

do_action( 'di_multipurpose_footer_widget_options' );

//footer section END

//footer copyright section
Kirki::add_section( 'footer_copy_options', array(
	'title'          => esc_attr__( 'Footer Copyright Options', 'di-multipurpose' ),
	'panel'          => 'di_multipurpose_options',
	'capability'     => 'edit_theme_options',
) );

Kirki::add_field( 'di_multipurpose_config', array(
	'type'        => 'editor',
	'settings'    => 'left_footer_setting',
	'label'       => esc_attr__( 'Footer Left', 'di-multipurpose' ),
	'description' => esc_attr__( 'Content of Footer Left Side', 'di-multipurpose' ),
	'section'     => 'footer_copy_options',
	'default'     => '<p>' . esc_html__( 'Site Title, Some rights reserved.', 'di-multipurpose' ) . '</p>',
	'transport' => 'postMessage',
	'js_vars'   => array(
		array(
			'element'  => '.cprtlft_ctmzr',
			'function' => 'html',
		),
	),
	'partial_refresh' => array(
		'left_footer_setting' => array(
			'selector'        => '.cprtlft_ctmzr',
			'render_callback' => function() {
				return wp_kses_post( get_theme_mod( 'left_footer_setting' ) );
			},
		),
	),
) );

Kirki::add_field( 'di_multipurpose_config', array(
	'type'        => 'editor',
	'settings'    => 'center_footer_setting',
	'label'       => esc_attr__( 'Footer Center', 'di-multipurpose' ),
	'description' => esc_attr__( 'Content of Footer Center Side', 'di-multipurpose' ),
	'section'     => 'footer_copy_options',
	'default'     => '<p><a href="#">' . esc_html__( 'Terms of Use - Privacy Policy', 'di-multipurpose' ) . '</a></p>',
	'transport' => 'postMessage',
	'js_vars'   => array(
		array(
			'element'  => '.cprtcntr_ctmzr',
			'function' => 'html',
		),
	),
	'partial_refresh' => array(
		'center_footer_setting' => array(
			'selector'        => '.cprtcntr_ctmzr',
			'render_callback' => function() {
				return wp_kses_post( get_theme_mod( 'center_footer_setting' ) );
			},
		),
	),
) );

do_action( 'di_multipurpose_footer_copyright_right_setting' );

Kirki::add_field( 'di_multipurpose_config', array(
	'type'        => 'color',
	'settings'    => 'footer_copy_color',
	'label'       => esc_attr__( 'Color', 'di-multipurpose' ),
	'section'     => 'footer_copy_options',
	'default'     => '#8c8989',
	'choices'     => array(
		'alpha' => true,
	),
	'output' => array(
		array(
			'element'  => '.footer-copyright',
			'property' => 'color',
		),
	),
	'transport' => 'auto',
) );

Kirki::add_field( 'di_multipurpose_config', array(
	'type'        => 'background',
	'settings'    => 'footer_copy_bg_color_new',
	'label'       => esc_html__( 'Background Property', 'di-multipurpose' ),
	'section'     => 'footer_copy_options',
	'default'     => array(
		'background-color'      => '#282a2b',
		'background-image'      => '',
		'background-repeat'     => 'repeat',
		'background-position'   => 'center center',
		'background-size'       => 'cover',
		'background-attachment' => 'scroll',
	),
	'transport'   => 'auto',
	'output'      => array(
		array(
			'element' => '.footer-copyright',
		),
	),
) );

Kirki::add_field( 'di_multipurpose_config', array(
	'type'        => 'color',
	'settings'    => 'footer_copy_links_color',
	'label'       => esc_attr__( 'Links Color', 'di-multipurpose' ),
	'section'     => 'footer_copy_options',
	'default'     => '#bfbfbf',
	'choices'     => array(
		'alpha' => true,
	),
	'output' => array(
		array(
			'element'  => '.footer-copyright a',
			'property' => 'color',
		),
	),
	'transport' => 'auto',
) );

Kirki::add_field( 'di_multipurpose_config', array(
	'type'        => 'color',
	'settings'    => 'footer_copy_links_hover_color',
	'label'       => esc_attr__( 'Mouse Hover Links Color', 'di-multipurpose' ),
	'section'     => 'footer_copy_options',
	'default'     => '#ffffff',
	'choices'     => array(
		'alpha' => true,
	),
	'output' => array(
		array(
			'element'  => '.footer-copyright a:hover',
			'property' => 'color',
		),
	),
	'transport' => 'auto',
) );

Kirki::add_field( 'di_multipurpose_config', array(
	'type'        => 'typography',
	'settings'    => 'cprt_footer_typog',
	'label'       => esc_attr__( 'Footer Copyright Typography', 'di-multipurpose' ),
	'section'     => 'footer_copy_options',
	'default'     => array(
		'font-family'    => 'PT Sans',
		'variant'        => 'regular',
		'font-size'      => '14px',
		'line-height'    => '1',
		'letter-spacing' => '.2',
		'text-transform' => 'inherit'
	),
	'output'      => array(
		array(
			'element' => '.footer-copyright',
		),
	),
	'transport' => 'auto',
) );

do_action( 'di_multipurpose_footer_copyright' );

//footer copyright section END


// Site layout options section
Kirki::add_section( 'site_layout_options', array(
	'title'          => esc_attr__( 'Website Layout Options', 'di-multipurpose' ),
	'panel'          => 'di_multipurpose_options',
	'capability'     => 'edit_theme_options',
) );

Kirki::add_field( 'di_multipurpose_config', array(
	'type'        => 'select',
	'settings'    => 'site_layout',
	'label'       => esc_attr__( 'Theme Layout', 'di-multipurpose' ),
	'section'     => 'site_layout_options',
	'default'     => '1',
	'choices'     => array(
		'1' => esc_attr__( 'Default', 'di-multipurpose' ),
		'2' => esc_attr__( 'Custom Width Container', 'di-multipurpose' ),
		'3' => esc_attr__( 'Boxed', 'di-multipurpose' ),
	),
) );

Kirki::add_field( 'di_multipurpose_config', array(
	'type'        => 'dimension',
	'settings'    => 'site_layout2_ctnr_wdthd',
	'label'       => esc_attr__( 'Container Width', 'di-multipurpose' ),
	'description' => esc_attr__( 'container width in pixel (px)', 'di-multipurpose' ),
	'section'     => 'site_layout_options',
	'default'     => '1140px',
	'transport' => 'auto',
	'output' => array(
		array(
			'element'  => '.container',
			'property' => 'max-width',
			'media_query' => '@media (min-width: 992px)',
		),
	),
	'active_callback'  => array(
		array(
			'setting'  => 'site_layout',
			'operator' => '==',
			'value'    => 2,
		),
	),
) );

Kirki::add_field( 'di_multipurpose_config', array(
	'type'        => 'dimension',
	'settings'    => 'site_layout3_dmnsn',
	'label'       => esc_html__( 'Box Width', 'di-multipurpose' ),
	'description'	=> esc_html__( 'Box width in pixel (px)', 'di-multipurpose' ),
	'section'     => 'site_layout_options',
	'default'     => '1140px',
	'output' => array(
		array(
			'element'	=> '.boxed-layout',
			'property'	=> 'max-width',
		),
		array(
			'element'	=> '.sticky_menu_top',
			'property'	=> 'width',
			'suffix' 	=> ' !important',
			'media_query' => '@media (min-width: '. get_theme_mod( 'site_layout3_dmnsn', '1140px' ) .')',
		),
		array(
			'element'	=> '.sticky_hedaer_top',
			'property'	=> 'width',
			'suffix' 	=> ' !important',
			'media_query' => '@media (min-width: '. get_theme_mod( 'site_layout3_dmnsn', '1140px' ) .')',
		),
		array(
			'element'	=> 'section.elementor-element',
			'property'	=> 'max-width',
			'suffix' 	=> ' !important',
		),
	),
	'transport' => 'auto',
	'active_callback'  => array(
		array(
			'setting'  => 'site_layout',
			'operator' => '==',
			'value'    => 3,
		),
	),

) );

Kirki::add_field( 'di_multipurpose_config', array(
	'type'        => 'color',
	'settings'    => 'site_layout3_brdrclr',
	'label'       => esc_attr__( 'Box Border Color', 'di-multipurpose' ),
	'section'     => 'site_layout_options',
	'default'     => 'rgba(0,0,0,.15)',
	'choices'     => array(
		'alpha' => true,
	),
	'output' => array(
		array(
			'element'  => '.boxed-layout',
			'property' => 'box-shadow',
			'prefix' => '0 1px 4px ',
		),
	),
	'transport' => 'auto',
	'active_callback'  => array(
		array(
			'setting'  => 'site_layout',
			'operator' => '==',
			'value'    => 3,
		),
	),
) );

Kirki::add_field( 'di_multipurpose_config', array(
	'type'        => 'color',
	'settings'    => 'site_layout3_bgclr',
	'label'       => esc_attr__( 'Box Outer Background Color', 'di-multipurpose' ),
	'section'     => 'site_layout_options',
	'default'     => '#f9f9f9',
	'choices'     => array(
		'alpha' => true,
	),
	'output' => array(
		array(
			'element'  => 'html body.custom-background, html body',
			'property' => 'background-color',
		),
	),
	'transport' => 'auto',
	'active_callback'  => array(
		array(
			'setting'  => 'site_layout',
			'operator' => '==',
			'value'    => 3,
		),
	),
) );

Kirki::add_field( 'di_multipurpose_config', array(
	'type'        => 'color',
	'settings'    => 'site_layout3_bginnrclr',
	'label'       => esc_attr__( 'Box Inner Background Color', 'di-multipurpose' ),
	'section'     => 'site_layout_options',
	'default'     => '#ffffff',
	'choices'     => array(
		'alpha' => true,
	),
	'output' => array(
		array(
			'element'  => '.boxed-layout',
			'property' => 'background-color',
		),
	),
	'transport' => 'auto',
	'active_callback'  => array(
		array(
			'setting'  => 'site_layout',
			'operator' => '==',
			'value'    => 3,
		),
	),
) );

do_action( 'di_multipurpose_site_layout_options' );

// Site layout options section END

//misc section
Kirki::add_section( 'misc_options', array(
	'title'          => esc_attr__( 'MISC Options', 'di-multipurpose' ),
	'panel'          => 'di_multipurpose_options',
	'capability'     => 'edit_theme_options',
) );

Kirki::add_field( 'di_multipurpose_config', array(
	'type'        => 'toggle',
	'settings'    => 'back_to_top',
	'label'       => esc_attr__( 'Back To Top Button', 'di-multipurpose' ),
	'description' => esc_attr__( 'Enable/Disable Back To Top Button', 'di-multipurpose' ),
	'section'     => 'misc_options',
	'default'     => '1',
) );

do_action( 'di_multipurpose_misc_options_1' );

Kirki::add_field( 'di_multipurpose_config', array(
	'type'        => 'toggle',
	'settings'    => 'loading_icon',
	'label'       => esc_attr__( 'Page Loading Icon', 'di-multipurpose' ),
	'description' => esc_attr__( 'Enable/Disable Page Loading Icon', 'di-multipurpose' ),
	'section'     => 'misc_options',
	'default'     => '0',
) );

Kirki::add_field( 'di_multipurpose_config', array(
	'type'        => 'image',
	'settings'    => 'loading_icon_img',
	'label'       => esc_attr__( 'Upload Custom Loading Icon', 'di-multipurpose' ),
	'description' => esc_attr__( 'It will replace default loading icon.', 'di-multipurpose' ),
	'section'     => 'misc_options',
	'default'     => '',
	'active_callback'  => array(
		array(
			'setting'  => 'loading_icon',
			'operator' => '==',
			'value'    => 1,
		),
	)
) );

do_action( 'di_multipurpose_misc_options_2' );

//misc section END

//Theme Info section
Kirki::add_section( 'theme_info', array(
	'title'          => esc_attr__( 'Theme Info', 'di-multipurpose' ),
	'panel'          => 'di_multipurpose_options',
	'capability'     => 'edit_theme_options',
) );

Kirki::add_field( 'di_multipurpose_config', array(
	'type'        => 'custom',
	'settings'    => 'custom_dib_demo',
	'label'       => esc_attr__( 'Di Multipurpose Demo', 'di-multipurpose' ),
	'section'     => 'theme_info',
	'default'     => '<div style="background-color: #333;border-radius: 9px;color: #fff;padding: 13px 7px;">' . esc_html__( 'You can check demos of ', 'di-multipurpose' ) . ' <a target="_blank" href="https://dithemes.com/di-multipurpose-theme-demos/">' . esc_html__( 'Di Multipurpose Theme Here', 'di-multipurpose' ) . '</a>.</div>',
) );

Kirki::add_field( 'di_multipurpose_config', array(
	'type'        => 'custom',
	'settings'    => 'custom_dib_docs',
	'label'       => esc_attr__( 'Di Multipurpose Docs', 'di-multipurpose' ),
	'section'     => 'theme_info',
	'default'     => '<div style="background-color: #333;border-radius: 9px;color: #fff;padding: 13px 7px;">' . esc_html__( 'You can check documentation of ', 'di-multipurpose' ) . ' <a target="_blank" href="https://dithemes.com/di-multipurpose-free-wordpress-theme-documentation/">' . esc_html__( 'Di Multipurpose Theme Here', 'di-multipurpose' ) . '</a>.</div>',
) );

do_action( 'di_multipurpose_cutmzr_theme_info' );

//Theme Info section END

do_action( 'di_multipurpose_kirki_settings_end' );

//EOF
