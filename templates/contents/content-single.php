<?php $related = get_field('related_articles'); ?>
<article <?php post_class( ($related ? '' : 'no_related') ); ?>>

  <div class="post container row">

    <div class="post__content col col-md-10of12 col-lg-8of12 col-xl-8of12 col-xxl-8of12">
      <h1><?php the_title(); ?></h1>
      <?php the_content(); ?>
    </div>
    <!-- .post_content -->

  </div>
  <!-- .post -->

<?php if( $related ) : ?>
  <div class="post__related_posts">

    <div class="post__related_posts__header row centered center">
      <h2 class="post__related_posts__title col text-center">Related Posts</h2>
    </div>

    <div class="card-grid__posts row centered center">

  <?php
  foreach( $related as $article ) :
    $post = $article['article'];
    $image = $post->post_thumbnail;
    $cat_list = [];
    $categories = get_the_category();

    foreach($categories as $category) {
      $cat_list[] = $category->slug;
    }
  ?>

      <div class="card-grid col-sm-6of12 col-md-6of12 col-lg-6of12 col-xl-6of12" data-clickthrough>

      <?php if( $image ) : ?>
        <figure class="card-grid__feature__wrapper" data-backgrounder>

          <div class="feature">

          <?php echo $image; ?>

          </div><!-- .card-grid__feature.feature -->

        </figure>
      <?php endif; ?>

        <time class="card-grid__meta published" datetime="<?php echo get_the_time('c'); ?>"><?php echo get_the_date(); ?></time>

        <div class="card-grid__body">
          <!-- .card-grid__meta -->

          <h4 class="card-grid__title">
            <a href="<?php echo $post->guid; ?>"><?php echo $post->post_title; ?></a>
          </h4>
          <!-- .card-grid__title -->

        </div>
        <!-- .card-grid__body -->

        <div class="card-grid__nav row between">
          <span class="learn_more">Learn more</span>
        </div>
        <!-- .card-grid__nav -->

      </div><!-- .card-grid -->

    <?php if( $num_posts > $showposts && $showposts != -1 ) : ?>
      <nav class="blog-grid__nav">
        <a class="btn" href="<?php echo get_bloginfo('url') . '/blog'; ?>">View all</a>
      </nav><!-- .blog-grid__nav -->
    <?php endif; ?>

  <?php endforeach; ?>
    </div>
    <!-- .card-grid__posts.row.centered.start -->

  </div>
  <!-- .post__related_posts -->
<?php endif; ?>

</article>
