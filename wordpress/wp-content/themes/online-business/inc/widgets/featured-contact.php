<?php
/**
 * Featured Contact.
 *
 * @package online_business
 */

function online_business_featured_contact() {
	register_widget( 'Online_Business_Featured_Contact' );
}
add_action( 'widgets_init', 'online_business_featured_contact' );

class Online_Business_Featured_Contact extends WP_Widget{ 

	function __construct() {
		global $control_ops;
		$widget_ops = array(
		  'classname'   => 'featured-contact',
		  'description' => esc_html__( 'Add Widget to Display Featured Contact.', 'online-business' )
		);
		parent::__construct( 'Online_Business_Featured_Contact',esc_html__( 'Business: Featured Contact', 'online-business' ), $widget_ops, $control_ops );
	}

	function form( $instance ) {
		$instance = wp_parse_args( (array) $instance, 
			array( 
			  'category'       	=> '', 
			  'number'          => 1, 
			  'show_category'	=> true,	
			) 
		);
		$category 			= isset( $instance['category'] ) ? absint( $instance['category'] ) : 0;
		$number    			= isset( $instance['number'] ) ? absint( $instance['number'] ) : 1;   
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
	    		<?php echo esc_html__( 'Choose Number (Max: 3)', 'online-business' );?>    		
	    	</label>

	    	<input class="widefat" id="<?php echo esc_attr($this->get_field_id( 'number' )); ?>" name="<?php echo esc_attr($this->get_field_name( 'number' )); ?>" type="number" step="1" min="1" value="<?php echo esc_attr($number); ?>" max="3" />
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
        $number 			= ( ! empty( $instance['number'] ) ) ? absint( $instance['number'] ) : 1; 
        $show_category		= isset( $instance['show_category'] ) ? $instance['show_category'] : true;
        echo $before_widget;
        ?>   		    
	        
        <?php $contact_args = array(
            'posts_per_page' => absint( $number ),
            'post_type' => 'post',
            'post_status' => 'publish',
            'post__not_in' => get_option( 'sticky_posts' ),      
        );

        if ( absint( $category ) > 0 ) {
          $contact_args['cat'] = absint( $category );
        }

        $the_loop = new WP_Query( $contact_args ); 

        if ($the_loop->have_posts()) : $count= 0; ?>		            
            <div class="container">    
        		<?php while ( $the_loop->have_posts() ) : $the_loop->the_post(); ?>
                    <article>
                        <div class="entry-container">
                            <header class="entry-header">
                                <h2 class="entry-title"><?php the_title(); ?></h2>
                            </header>

                            <div class="entry-content">
                            	<?php the_content(); ?>
                            </div><!-- .entry-content -->
                    	</div><!-- .entry-container -->

                    	<?php if ( has_post_thumbnail() ){ ?>
	                        <div class="featured-image">
	                            <?php the_post_thumbnail(); ?>
	                        </div><!-- .featured-image -->
                        <?php } ?>
                    </article>
        		<?php endwhile; ?>
                <?php wp_reset_postdata(); ?>
            </div>		            
        <?php endif;?>
	        		    
        <?php echo $after_widget;

    } 

}