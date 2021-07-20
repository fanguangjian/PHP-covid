<div class="di-post-thumb">
	<?php
	if( has_post_thumbnail() ) {
	?>
		<div class="alignc di-post-thumb-inner">
			<a href="<?php the_permalink(); ?>">
				<?php the_post_thumbnail( 'post-thumbnail', array( 'class' => 'aligncenter img-fluid' ) ); ?>
			</a>
		</div>
	<?php
	}
	?>
</div>
