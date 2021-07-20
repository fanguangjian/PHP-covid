<?php
/**
 * Feature Post Slider.
 *
 * @package online_business
 */

function online_business_featured_slider() {
	register_widget( 'Online_Business_Featured_Slider' );
}
add_action( 'widgets_init', 'online_business_featured_slider' );

class Online_Business_Featured_Slider extends WP_Widget{ 

	function __construct() {
		global $control_ops;
		$widget_ops = array(
		  'classname'   => 'featured-slider',
		  'description' => esc_html__( 'Add Widget to Display Featured Slider.', 'online-business' )
		);
		parent::__construct( 'Online_Business_Featured_Slider',esc_html__( 'Business: Featured Slider', 'online-business' ), $widget_ops, $control_ops );
	}

	function form( $instance ) {
		$instance = wp_parse_args( (array) $instance, 
			array( 
			  'read_more_text'  => esc_html__( 'Read More', 'online-business' ),		
			  'category'       	=> '', 
			  'number'          => 6, 
			  'show_category'	=> true,	
			) 
		);
		$read_more_text     = isset( $instance['read_more_text'] ) ? esc_html( $instance['read_more_text'] ) : esc_html__( 'Read More', 'online-business' );		
		$category 			= isset( $instance['category'] ) ? absint( $instance['category'] ) : 0;
		$number    			= isset( $instance['number'] ) ? absint( $instance['number'] ) : 6;   
		$show_category 		= isset( $instance['show_category'] ) ? (bool) $instance['show_category'] : true; 
	?>
		<p>
			<label for="<?php echo esc_attr( $this->get_field_id( 'category' ) ); ?>">
				<?php esc_html_e( 'Slider Category:', 'online-business' ); ?>			
			</label>

			<?php
				wp_dropdown_categories(array(
					'show_option_none' => '',
					'class' 		  => 'widefat',
					'show_option_all'  => esc_html__('Recent Posts','online-business'),
					'name'             => esc_attr($this->get_field_name( 'category' )),
					'selected'         => absint( $category ),          
				) );
			?>
		</p>

	    <p>
	    	<label for="<?php echo esc_attr($this->get_field_id( 'number' )); ?>">
	    		<?php echo esc_html__( 'Choose Number (Max: 6)', 'online-business' );?>    		
	    	</label>

	    	<input class="widefat" id="<?php echo esc_attr($this->get_field_id( 'number' )); ?>" name="<?php echo esc_attr($this->get_field_name( 'number' )); ?>" type="number" step="1" min="1" value="<?php echo esc_attr($number); ?>" max="6" />
	    </p>

	    <p>
	    	<label for="<?php echo esc_attr($this->get_field_id( 'read_more_text' )); ?>"><?php echo esc_html__( 'Read More:', 'online-business' ); ?></label>
	    	<input class="widefat" id="<?php echo esc_attr($this->get_field_id( 'read_more_text' )); ?>" name="<?php echo esc_attr($this->get_field_name( 'read_more_text' )); ?>" type="text" value="<?php echo esc_attr($read_more_text); ?>" />
		</p>    	    
    <?php
    }

	function update( $new_instance, $old_instance ) {
		$instance = $old_instance;
		$instance['read_more_text'] 	= sanitize_text_field( $new_instance['read_more_text'] );
		$instance['category'] 			= absint( $new_instance['category'] );		
		$instance['number'] 			= (int) $new_instance['number'];
		$instance['show_category'] 		= (bool) $new_instance['show_category'];  	   
		return $instance;
	}

    function widget( $args, $instance ) {

    	extract( $args ); 
    	
		$read_more_text     = isset( $instance['read_more_text'] ) ? esc_html( $instance['read_more_text'] ) : esc_html__( 'Read More', 'online-business' );		
        $category  			= isset( $instance[ 'category' ] ) ? $instance[ 'category' ] : 0;
        $featured_category  = isset( $instance[ 'featured_category' ] ) ? $instance[ 'featured_category' ] : 0;
        $number 			= ( ! empty( $instance['number'] ) ) ? absint( $instance['number'] ) : 6; 
        $show_category		= isset( $instance['show_category'] ) ? $instance['show_category'] : true;
        echo $before_widget;
        ?>       		    
	        
        <?php $slider_args = array(
            'posts_per_page' => absint( $number ),
            'post_type' => 'post',
            'post_status' => 'publish',
            'post__not_in' => get_option( 'sticky_posts' ),      
        );

        if ( absint( $category ) > 0 ) {
          $slider_args['cat'] = absint( $category );
        }

        $the_loop = new WP_Query( $slider_args ); 

        if ($the_loop->have_posts()) : $count= 0; ?>		            
    		<div class="swiper-container">
    			<div class="swiper-wrapper">
        			<?php while ( $the_loop->have_posts() ) : $the_loop->the_post(); ?>
	                    <article class="swiper-slide">
	                    	<div class="section-overlay"></div>
	                    	<?php if ( has_post_thumbnail() ){ ?>
		                        <div class="featured-image">
		                            <?php the_post_thumbnail( 'online-business-slider' ); ?>
		                        </div><!-- .featured-image -->
	                        <?php } ?>

	                        <div class="slider-content">
	                            <header class="entry-header">
	                                <h2 class="entry-title"><a href="<?php the_permalink();?>"><?php the_title();?></a></h2>
	                            </header>

	                            <div class="entry-content">
	                            	<?php the_excerpt(); ?>
	                            </div><!-- .entry-content -->

	                            <?php if ( !empty($read_more_text) ): ?>
	                            	<a href="<?php the_permalink();?>" class="btn"><?php echo esc_html($read_more_text); ?></a>
	                            <?php endif; ?>
	                    	</div><!-- .slider-content -->
	                    </article>
            		<?php endwhile; ?>
                </div><!-- .swiper-wrapper -->
                <div class="swiper-pagination"></div>
                <div class="swiper-button-next"></div>
    			<div class="swiper-button-prev"></div>
            </div><!-- .swiper-container -->
            <?php wp_reset_postdata(); ?>
        <?php endif;?>
        <?php echo $after_widget;
    } 
}