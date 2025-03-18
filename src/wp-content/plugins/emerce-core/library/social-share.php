<?php
if ( ! function_exists( 'emerce_single_social' ) ) :
function emerce_single_social() {

    $dmsocialURL = urlencode(get_permalink());

    // Get current page title
    $dmsocialTitle = urlencode(html_entity_decode(get_the_title(), ENT_COMPAT, 'UTF-8'));


    // Construct sharing URL without using any script
    $twitterURL = 'https://twitter.com/share?url=' . $dmsocialURL . '&amp;text=' . $dmsocialTitle;
    $facebookURL = 'https://www.facebook.com/sharer/sharer.php?u='.$dmsocialURL;
    $googleURL = 'https://plus.google.com/share?url='.$dmsocialURL;
    $bufferURL = 'https://bufferapp.com/add?url='.$dmsocialURL.'&amp;text='.$dmsocialTitle;
    $whatsappURL = 'whatsapp://send?text='.$dmsocialTitle . ' ' . $dmsocialURL;
    $linkedInURL = 'https://www.linkedin.com/shareArticle?mini=true&url='.$dmsocialURL.'&amp;title='.$dmsocialTitle;

    // Based on popular demand added Pinterest too
    $pinterestURL = 'https://pinterest.com/pin/create/button/?url='.$dmsocialURL.'&amp;description='.$dmsocialTitle;

    echo '<div class="emerce-social-button style-social-a">';
    echo '<a href="'.$facebookURL.'" target="_blank" class="facebook"><i class="zil zi-facebook"></i> <span>Facebook</span></a>';
    echo '<a href="'.$twitterURL.'" target="_blank" class="twitter"><i class="zil zi-twitter"></i> <span>Twitter</span></a>';
    echo '<a href=" '.$pinterestURL.'" target="_blank" class="pinterest"><i class="zil zi-pinterest"></i> <span>Pinterest</span></a>';
    echo '<a href=" '.$linkedInURL.'" target="_blank" class="linkedin"><i class="zil zi-linked-in"></i> <span>Linkedin</span></a>';
    echo'</div>';


};
endif;