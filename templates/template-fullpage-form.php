<?php
/*
Template Name: Fullpage Form
*/
?>

<?php while (have_posts()) : the_post(); ?>
  <?php get_template_part('templates/contents/hero', 'page'); ?>>
  <?php get_template_part('templates/contents/content', 'form'); ?>
<?php endwhile; ?>
