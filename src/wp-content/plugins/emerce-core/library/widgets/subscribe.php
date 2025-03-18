<?php if ( ! defined( 'ABSPATH' )  ) { die; }

  CSF::createWidget( 'emerce_subscribe_widget', array(
    'title'       => 'Emerce Subscribe Widget',
    'classname'   => 'emerce-subscribe-widget',
    'description' => 'Emerce subscribe sidebar.',
    'fields'      => array(

   
      array(
      'id'      => 'title',
      'type'    => 'text',
      'title'   => 'Title',
    ),
    
    
    array(
      'id'      => 'sub_title',
      'type'    => 'text',
      'title'   => 'Sub Title',
    ),
    
     array(
      'id'      => 'main_title',
      'type'    => 'text',
      'title'   => 'Main Title',
    ),
array(
  'id'            => 'subscribe_shortcode',
  'type'          => 'wp_editor',
  'title'         => 'Subscription Form Shortcode',
  'tinymce'       => true,
  'quicktags'     => true,
  'media_buttons' => false,
  'height'        => '100px',
),


array(
  'id'    => 'bg_image',
  'type'  => 'media',
  'title' => 'Background Image',
),

    
  
    )
  ) );

  //
  // Front-end display of widget example 1
  // Attention: This function named considering above widget base id.
  //
  if( ! function_exists( 'emerce_subscribe_widget' ) ) {
    function emerce_subscribe_widget( $args, $instance ) {
     
     $bgimg = $instance['bg_image']['url'];
     $sshortcode = $instance ['subscribe_shortcode'];
     $sub_title = $instance ['sub_title'];
     $main_title = $instance ['main_title'];
      echo $args['before_widget'];
      
       if ( ! empty( $instance['title'] ) ) { ?>
      <h2 class="widget-title"><?php echo $instance['title'];?></h2>
    <?php  }
?>

    <div class="emerce-widget-subscription-box pvs-sub-style-1" style="background:url(<?php echo esc_url($bgimg);?>);">
        <div class="position-relative z-index-10">
        <h6><?php echo $sub_title;?></h6>
<h4><?php echo $main_title;?></h4>


<div class="psv-subscription-form">
    <?php echo apply_filters('widget_text', $sshortcode) ?>
  
</div>
</div>
     </div>
     
     
      
<?php  echo $args['after_widget']; ?>
 <?php   }
  }


