<?php
/**
 * Featured Gallery.
 *
 * @package online_business
 */

function online_business_featured_gallery() {
	register_widget( 'Online_Business_Featured_Gallery' );
}
add_action( 'widgets_init', 'online_business_featured_gallery' );

class Online_Business_Featured_Gallery extends WP_Widget{ 

	function __construct() {
		global $control_ops;
		$widget_ops = array(
		  'classname'   => 'featured-gallery',
		  'description' => esc_html__( 'Add Widget to Display Our Featured Gallery.', 'online-business' )
		);
		parent::__construct( 'Online_Business_Featured_Gallery',esc_html__( 'Business: Featured Gallery', 'online-business' ), $widget_ops, $control_ops );
	}

	function form( $instance ) {
		$instance = wp_parse_args( (array) $instance, 
			array( 
			  'title'			=> esc_html__( 'Featured Gallery', 'online-business' ),		
			  'category'       	=> '', 
			  'number'          => 6, 
			  'show_category'	=> true,	
			) 
		);
		$title     			= isset( $instance['title'] ) ? esc_html( $instance['title'] ) : esc_html__( 'Featured Gallery', 'online-business' );	
		$category 			= isset( $instance['category'] ) ? absint( $instance['category'] ) : 0;
		$number    			= isset( $instance['number'] ) ? absint( $instance['number'] ) : 6;   
		$show_category 		= isset( $instance['show_category'] ) ? (bool) $instance['show_category'] : true; 
	?>
	    <p>
	    	<label for="<?php echo esc_attr($this->get_field_id( 'title' )); ?>"><?php echo esc_html__( 'Title:', 'online-business' ); ?></label>
	    	<input class="widefat" id="<?php echo esc_attr($this->get_field_id( 'title' )); ?>" name="<?php echo esc_attr($this->get_field_name( 'title' )); ?>" type="text" value="<?php echo esc_attr($title); ?>" />
		</p>	
		<p>
			<label for="<?php echo esc_attr( $this->get_field_id( 'category' ) ); ?>">
				<?php esc_html_e( 'Select Category:', 'online-business' ); ?>			
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
    <?php
    }

	function update( $new_instance, $old_instance ) {
		$instance = $old_instance;
		$instance['title'] 				= sanitize_text_field( $new_instance['title'] );
		$instance['category'] 			= absint( $new_instance['category'] );		
		$instance['number'] 			= (int) $new_instance['number'];
		$instance['show_category'] 		= (bool) $new_instance['show_category'];  	   
		return $instance;
	}

    function widget( $args, $instance ) {

    	extract( $args ); 
		$title     			= isset( $instance['title'] ) ? esc_html( $instance['title'] ) : esc_html__( 'Featured Gallery', 'online-business' );	
    	$title 				= apply_filters( 'widget_title', $title, $instance, $this->id_base );
    	
        $category  			= isset( $instance[ 'category' ] ) ? $instance[ 'category' ] : 0;
        $featured_category  = isset( $instance[ 'featured_category' ] ) ? $instance[ 'featured_category' ] : 0;
        $number 			= ( ! empty( $instance['number'] ) ) ? absint( $instance['number'] ) : 6; 
        $show_category		= isset( $instance['show_category'] ) ? $instance['show_category'] : true;
        echo $before_widget;
        ?>   		    
	        
        <?php $gallery_args = array(
            'posts_per_page' => absint( $number ),
            'post_type' => 'post',
            'post_status' => 'publish',
            'post__not_in' => get_option( 'sticky_posts' ),      
        );

        if ( absint( $category ) > 0 ) {
          $gallery_args['cat'] = absint( $category );
        }

        $the_loop = new WP_Query( $gallery_args ); 

        if ($the_loop->have_posts()) : $count= 0; ?>		            
            <div class="container">
            	<?php if ( !empty( $title ) ): ?>
		            <div class="widget-header">
		                <?php echo $args['before_title'] . esc_html($title) . $args['after_title']; ?>
		            </div><!-- .widget-header -->
		        <?php endif; ?>	     

        		<div class="grid col-3 clear">
            		<?php while ( $the_loop->have_posts() ) : $the_loop->the_post(); ?>
	                    <article class="grid-item">
            				<div class="featured-gallery-item">
		                    	<?php if ( has_post_thumbnail() ){ ?>
			                        <div class="featured-image">
			                            <?php the_post_thumbnail(); ?>
			                        </div>
		                        <?php } ?>

		                        <div class="entry-container">
		                            <header class="entry-header">
		                                <h2 class="entry-title"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h2>
		                            </header>

		                            <div class="entry-meta">
		                            	<?php online_business_entry_footer(); ?>
		                            </div><!-- .entry-meta -->
		                    	</div><!-- .entry-container -->
                    		</div><!-- .featured-gallery-item -->
	                    </article>
            		<?php endwhile; ?>
                </div><!-- .col-3 -->
                <?php wp_reset_postdata(); ?>
            </div>		            
        <?php endif;?>
	        		    
        <?php echo $after_widget;

    } 

}