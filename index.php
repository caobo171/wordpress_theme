<?php get_header(); ?>

<?php
while(have_posts()){
    the_post();
?>
    <h3><?php the_title(); ?></h3>

<?php
} 
?>

<?php get_footer(); ?>