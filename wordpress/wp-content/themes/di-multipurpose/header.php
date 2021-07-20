<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
	<?php do_action( 'di_multipurpose_the_head' ); ?>
	<?php wp_head(); ?>
</head>
<body <?php body_class(); ?> itemscope itemtype="http://schema.org/WebPage">
<?php
if( function_exists( 'wp_body_open' ) ) {
	wp_body_open();
}
?>

<a class="skip-link screen-reader-text" href="#content"><?php esc_html_e( 'Skip to content', 'di-multipurpose' ); ?></a>

<!-- Loader icon -->
<?php
if( get_theme_mod( 'loading_icon', '0' ) == 1 ) {
?>
	<div class="load-icon"></div>
<?php
}
?>
<!-- Loader icon Ends -->

<?php
if( get_theme_mod( 'site_layout', '1' ) == '3' ) {
	?>
	<div class="boxed-layout"> <!-- Start boxed layout -->
	<?php
}
?>

<?php get_template_part( 'template-parts/header', 'topbar' ); ?>

<?php get_template_part( 'template-parts/header', 'main' ); ?>

<?php get_template_part( 'template-parts/header', 'sidebar-cart' ); ?>

<?php get_template_part( 'template-parts/header', 'slider' ); ?>

<?php get_template_part( 'template-parts/header', 'headerimg' ); ?>

<?php
if( is_front_page() && get_theme_mod( 'front_slider_endis', '0' ) && get_theme_mod( 'front_slider_tag', '' ) )  {
	get_template_part( 'template-parts/header', 'posts-slider' );
}
?>

<div id="maincontainer" class="container-fluid clearfix maincontainer maincontainer-margin"> <!-- start header div 1, will end in footer -->
	<div id="content" class="container"> <!-- start header div 2, will end in footer -->
		<div class="row"> <!-- start header div 3, will end in footer -->
		