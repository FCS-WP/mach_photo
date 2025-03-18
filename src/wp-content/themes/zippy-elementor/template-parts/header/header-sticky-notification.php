<?php
$emerce_options = get_option('emerce_options');
$sticky_header_content = $emerce_options['sticky_header_content'];
$sticky_btn_text = $emerce_options['sticky_button_text'];
$sticky_btn_url = $emerce_options['sticky_button_url'];
$ntbgtype = $emerce_options['sticky_bar_style'];
$notification_btn_target = $emerce_options['button_target'];
$mobile_hide = cs_get_option('sticky_bar_hide_mob');
if ($mobile_hide == 'disabled') {
    $mobile_hide_class = 'mobilehidden md:block';
} else {
    $mobile_hide_class = 'block';
}

$allowed_html = [
    'a' => [
        'href' => [],
        'title' => [],
    ],
    'br' => [],
    'em' => [],
    'strong' => [],
    'img' => [],
    'i' => [],
];
?>


<div id="mayosis-sticky-bar"
     class="<?php echo esc_html($mobile_hide_class); ?> mayosis-<?php echo esc_html($ntbgtype); ?>-bar">
    <div class="container mx-auto">
        <div class="mayosis-sticky-text w-full md:w-auto"> <?php echo wp_kses($sticky_header_content, $allowed_html); ?></div>
        <?php if ($sticky_btn_url) { ?>
            <a href="<?php echo esc_html($sticky_btn_url); ?>"
               target="_<?php echo esc_html($notification_btn_target); ?>"
               class="btn mayosis-sticky-bar-btn"><?php echo esc_html($sticky_btn_text); ?></a>
        <?php } ?>
    </div>
</div>