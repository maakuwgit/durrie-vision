<?php while (have_posts()) : the_post(); ?>
  <?php get_template_part('templates/contents/hero', 'procedure'); ?>
  <?php get_template_part('templates/contents/content', 'procedure'); ?>
  <?php include( locate_template('templates/partials/prefooter.php') ); ?>
<?php endwhile; ?>
