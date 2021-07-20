<?php
/**
 * Featured Partners.
 *
 * @package online_business
 */

function online_business_featured_partners() {
	register_widget( 'Online_Business_Featured_Partners' );
}
add_action( 'widgets_init', 'online_business_featured_partners' );

class Online_Business_Featured_Partners extends WP_Widget{ 

	function __construct() {
		global $control_ops;
		$widget_ops = array(
		  'classname'   => 'featured-partners',
		  'description' => esc_html__( 'Add Widget to Display Featured Partners.', 'online-business' )
		);
		parent::__construct( 'Online_Business_Featured_Partners',esc_html__( 'Business: Featured Partners', 'online-business' ), $widget_ops, $control_ops );
	}

	function form( $instance ) {
		$instance = wp_parse_args( (array) $instance, 
			array( 
			  'category'       	=> '', 
			  'number'          => 5, 
			  'show_category'	=> true,	
			) 
		);
		$category 			= isset( $instance['category'] ) ? absint( $instance['category'] ) : 0;
		$number    			= isset( $instance['number'] ) ? absint( $instance['number'] ) : 5;   
		$show_category 		= isset( $instance['show_category'] ) ? (bool) $instance['show_category'] : true; 
	?>
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
	    		<?php echo esc_html__( 'Choose Number (Max: 5)', 'online-business' );?>    		
	    	</label>

	    	<input class="widefat" id="<?php echo esc_attr($this->get_field_id( 'number' )); ?>" name="<?php echo esc_attr($this->get_field_name( 'number' )); ?>" type="number" step="1" min="1" value="<?php echo esc_attr($number); ?>" max="5" />
	    </p>	    
    <?php
    }

	function update( $new_instance, $old_instance ) {
		$instance = $old_instance;
		$instance['category'] 			= absint( $new_instance['category'] );		
		$instance['number'] 			= (int) $new_instance['number'];
		$instance['show_category'] 		= (bool) $new_instance['show_category'];  	   
		return $instance;
	}

    function widget( $args, $instance ) {

    	extract( $args ); 
    	
        $category  			= isset( $instance[ 'category' ] ) ? $instance[ 'category' ] : 0;
        $featured_category  = isset( $instance[ 'featured_category' ] ) ? $instance[ 'featured_category' ] : 0;
        $number 			= ( ! empty( $instance['number'] ) ) ? absint( $instance['number'] ) : 5; 
        $show_category		= isset( $instance['show_category'] ) ? $instance['show_category'] : true;
        echo $before_widget;
        ?>   		    
	        
        <?php $Partners_args = array(
            'posts_per_page' => absint( $number ),
            'post_type' => 'post',
            'post_status' => 'publish',
            'post__not_in' => get_option( 'sticky_posts' ),      
        );

        if ( absint( $category ) > 0 ) {
          $Partners_args['cat'] = absint( $category );
        }

        $the_loop = new WP_Query( $Partners_args ); 

        if ($the_loop->have_posts()) : $count= 0; ?>		            
            <div class="container">  
        		<div class="col-5 clear">
            		<?php while ( $the_loop->have_posts() ) : $the_loop->the_post(); ?>
	                    <article>
            				<div class="logo-item">
		                    	<?php if ( has_post_thumbnail() ){ ?>
			                        <div class="featured-image">
			                            <a href="<?php the_permalink(); ?>"><?php the_post_thumbnail(); ?></a>
			                        </div>
		                        <?php } ?>
                    		</div><!-- .logo-item -->
	                    </article>
            		<?php endwhile; ?>
                </div><!-- .col-3 -->
                <?php wp_reset_postdata(); ?>
            </div>		            
        <?php endif;?>
	        		    
        <?php echo $after_widget;

    } 

}