<?php if (!have_posts()) : ?>
  <article class="container row start alert alert-warning">
    <h1><?php _e('Sorry, no results were found.', 'roots'); ?></h1>
    <?php get_search_form(); ?>
  </article>
<?php endif; ?>

<?php get_template_part('templates/contents/hero', 'blog'); ?>

<?php get_template_part('templates/contents/content', 'blog'); ?>

<?php if ($wp_query->max_num_pages > 1) : ?>
  <nav class="post-nav">
    <ul class="pager">
      <li class="previous"><?php next_posts_link(__('&larr; Older posts', 'roots')); ?></li>
      <li class="next"><?php previous_posts_link(__('Newer posts &rarr;', 'roots')); ?></li>
    </ul>
  </nav>
<?php endif; ?>
