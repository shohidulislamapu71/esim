<?php /* Template Name: Cart Page */ 
get_header();
?>
<?php
$link_page =  site_url('/checkout');
wp_redirect( "$link_page");
echo do_shortcode('[woocommerce_cart]');

?>
<?php
get_footer();?>
