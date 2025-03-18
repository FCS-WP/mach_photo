<?php
/**
 * The template for displaying the footer
 *
 * Contains the closing of the #content div and all content after.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package Emerce
 */
$backtotop = cs_get_option('back-top-top-enable');
?>
<?php emerce_footer_builder(); ?>

<?php if ($backtotop == "enabled") { ?>
    <a id="back-to-top" href="#" class="back-to-top" role="button"><i class="ri-arrow-up-s-line"></i></a>
<?php } ?>
<?php wp_footer(); ?>
</body>
</html>
