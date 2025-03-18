<?php
if (!defined('ABSPATH')) {
    exit; // Exit if accessed directly
}
function emerce_welcome_page()
{
    require_once 'emerce-welcome.php';
}

function emerce_admin_menu()
{
    if (current_user_can('edit_theme_options')) {
        add_menu_page('Emerce', 'Emerce', 'administrator', 'emerce-admin-menu', 'emerce_welcome_page', EMERCE_URL .'/assets/images/icon.svg', 4);
        add_submenu_page('emerce-admin-menu', 'emerce', esc_html__('Welcome', 'emerce'), 'administrator', 'emerce-admin-menu', 'emerce_welcome_page', 0);
        
         add_submenu_page( 'emerce-admin-menu', esc_html__( 'Demo Import', 'emerce' ), esc_html__( 'Demo Import', 'emerce' ), 'administrator', 'demo_install', 'emerce_demo_install_function' );


    }
}

add_action('admin_menu', 'emerce_admin_menu');


function emerce_demo_install_function(){
    $url = admin_url().'admin.php?page=emerce-wizard&step=content';
    ?>
    <script>location.href='<?php echo esc_html($url);?>'.replace(/\&amp\;/gi, "&");</script>
    <?php
  }
