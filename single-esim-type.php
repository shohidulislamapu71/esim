<?php
get_header();

?>

<?php
$link_page = get_field('page_url_here');
wp_redirect( "$link_page");

get_footer();
?>