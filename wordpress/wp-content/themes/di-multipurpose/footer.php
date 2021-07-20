	
		</div> <!-- end header div 3 -->
	</div> <!-- end header div 2 -->
</div> <!-- end header div 1 -->

<?php get_template_part( 'template-parts/footer', 'widgets' ); ?>

<?php get_template_part( 'template-parts/footer', 'copyright' ); ?>

<?php get_template_part( 'template-parts/footer', 'backtotop' ); ?>

<?php
if( get_theme_mod( 'site_layout', '1' ) == '3' ) {
	?>
	</div> <!-- End boxed layout -->
	<?php
}
?>

<?php wp_footer(); ?>
</body>
</html>
