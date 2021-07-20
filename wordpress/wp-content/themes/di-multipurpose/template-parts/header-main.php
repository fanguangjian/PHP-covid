<?php

/**
 * Load the header layout files base on header layout option.
 */

$header_layout = absint( get_theme_mod( 'header_layout', '1' ) );

if( $header_layout == 1 ) {
	get_template_part( 'template-parts/header-layouts/header', 'layout1' );
} elseif( $header_layout == 2 ) {
	get_template_part( 'template-parts/header-layouts/header', 'layout2' );
} elseif( $header_layout == 3 ) {
	get_template_part( 'template-parts/header-layouts/header', 'layout3' );
} elseif( $header_layout == 4 ) {
	get_template_part( 'template-parts/header-layouts/header', 'layout4' );
} elseif( $header_layout == 5 ) {
	get_template_part( 'template-parts/header-layouts/header', 'layout5' );
} elseif( $header_layout == 6 ) {
	get_template_part( 'template-parts/header-layouts/header', 'layout6' );
} elseif( $header_layout == 7 ) {
	get_template_part( 'template-parts/header-layouts/header', 'layout7' );
} elseif( $header_layout == 8 ) {
	get_template_part( 'template-parts/header-layouts/header', 'layout8' );
} elseif( $header_layout == 9 ) {
	get_template_part( 'template-parts/header-layouts/header', 'layout9' );
} else { // select - no header -
	echo '';
}
