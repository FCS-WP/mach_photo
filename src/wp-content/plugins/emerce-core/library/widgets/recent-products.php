<?php if ( ! defined( 'ABSPATH' )  ) { die; }

  CSF::createWidget( 'emerce_wooproduct_widget', array(
    'title'       => 'Emerce Woocommerce Product',
    'classname'   => 'emerce-wooproduct-widget',
    'description' => 'Emerce woocommerce product.',
    'fields'      => array(

   
      array(
      'id'      => 'title',
      'type'    => 'text',
      'title'   => 'Title',
    ),
    
    array(
      'id'      => 'post_count',
      'type'    => 'number',
      'title'   => 'Post Count',
    ),

   array(
  'id'          => 'order',
  'type'        => 'select',
  'title'       => 'Select',
  'placeholder' => 'Select an option',
  'options'     => array(
    'asc' => 'Ascending',
    'desc' => 'Descending'
  ),
  'default'     => 'desc'
),
  
    )
  ) );

  //
  // Front-end display of widget example 1
  // Attention: This function named considering above widget base id.
  //
  if( ! function_exists( 'emerce_wooproduct_widget' ) ) {
    function emerce_wooproduct_widget( $args, $instance ) {
        
         $post_count = $instance['post_count'] ;
      $order = $instance['order'] ;
      
      echo $args['before_widget'];
      
   if ( ! empty( $instance['title'] ) ) { ?>
      <h2 class="widget-title"><?php echo $instance['title'];?></h2>
    <?php  }
?>
   
    
    <div class="emerce-widget piv-product-widget">
        <?php
         $pargs = array(
        'post_type' => 'product',
      'posts_per_page' => $post_count,
      'order' => (string) trim($order),
      );
      
       $the_query = new \WP_Query($pargs);
       echo '<div class="emerce-product-psv psv-product-style-a">';
        while ($the_query -> have_posts()) : $the_query -> the_post();
        
            emerce_woo_sidebar_prone();
        
       endwhile; wp_reset_postdata();
      echo "</div>";
        ?>
    </div>
<?php  echo $args['after_widget']; ?>
 <?php   }
  }


