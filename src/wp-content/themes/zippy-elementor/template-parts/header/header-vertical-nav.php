<?php


?>


<div class="emerce-vertial-nav-main-bth navbar navbar-expand-lg">

    <?php
    wp_nav_menu(array(
        'theme_location' => 'vertical-menu',
        'menu_id' => 'primary-menu',
        'container' => 'div',
        'container_class' => 'collapse navbar-collapse emerce-m-menu',
        'menu_class' => 'nav navbar-nav nav-style-megamenu',
        'fallback_cb' => '',
        'walker' => new WP_Bootstrap_Navwalker(),
    ));
    ?>


</div>