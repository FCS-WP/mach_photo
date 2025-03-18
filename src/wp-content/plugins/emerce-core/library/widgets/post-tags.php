<?php if ( ! defined( 'ABSPATH' )  ) { die; }

  CSF::createWidget( 'emerce_post_tag_widget', array(
    'title'       => 'Emerce Post Tags',
    'classname'   => 'emerce-post-tag',
    'description' => 'Emerce Post details on sidebar.',
    'fields'      => array(

   
      array(
      'id'      => 'title',
      'type'    => 'text',
      'title'   => 'Title',
    ),
    

    
  
    )
  ) );

  //
  // Front-end display of widget example 1
  // Attention: This function named considering above widget base id.
  //
  if( ! function_exists( 'emerce_post_tag_widget' ) ) {
    function emerce_post_tag_widget( $args, $instance ) {
     
      echo $args['before_widget'];
      
       if ( ! empty( $instance['title'] ) ) { ?>
      <h2 class="widget-title"><?php echo $instance['title'];?></h2>
    <?php  }
?>

    <div class="emerce-widget-post-tag">
      <ul class="list-none  emerce-post-tag-grid-sidebar">
    
    <?php
    // Get the taxonomy's terms
$terms = get_terms(
    array(
        'taxonomy'   => 'post_tag',
        'hide_empty' => true,
    )
);

// Check if any term exists
if ( ! empty( $terms ) && is_array( $terms ) ) {
    // Run a loop and print them all
    foreach ( $terms as $term ) { 
    ?>
    <li>
    
        <a href="<?php echo esc_url( get_term_link( $term ) ) ?>">
            
            <?php echo $term->name; ?>
        </a>
        </li>
        <?php
    }
} 
    ?>
        </ul> 
    </div>
   

 <?php    echo $args['after_widget'];
    }
  }


