<?php
  // Create a sub-tab
  CSF::createSection( $prefix, array(
    'parent' => 'woocommerce', // The slug id of the parent section
    'title'  => 'Login/Register',
    'fields' => array(
         array(
          'id'      => 'login_page_link',
          'type'        => 'select',
           'chosen'      => true,
          'title'   => 'Login Page link For Register Shortcode',
          'desc' =>'use this shortcode for register [emerce_woo_register]. Select Page for Login Link',
          'options'     => 'pages',
                  'query_args'  => array(
                    'posts_per_page' => -1 // for get all pages (also it's same for posts).
                  )
                
        ),
            array(
                  'id'          => 'register_page_link',
                  'type'        => 'select',
                   'chosen'      => true,
                  'title'       => 'Register Page For Login Page/Shortcode',
                  'desc' =>'use this shortcode for login [emerce_woo_login]. Select Page for Register Link',
                  'placeholder' => 'Select a page',
                  'options'     => 'pages',
                  'query_args'  => array(
                    'posts_per_page' => -1 // for get all pages (also it's same for posts).
                  )
                ),
            )
            
            ));