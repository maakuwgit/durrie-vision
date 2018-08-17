<?php
  $positions  = get_the_terms(get_the_ID(), 'team_position');
  $offices    = get_the_terms(get_the_ID(), 'offices');
?>
<li class="member-grid__item col-3of12">

  <figure id="<?php echo basename(get_permalink()); ?>" class="member-grid__thumb__figure relative">
    <a href="<?php the_permalink(); ?>" data-magnific></a>

    <div class="member-grid__thumb__image" data-backgrounder>
      <div class="feature">
        <?php the_post_thumbnail(); ?>
      </div>
    </div><!-- .member-grid__thumb_image -->

    <figcaption class="member-grid__thumb__caption">

      <div class="member-grid__thumb__title h4"><?php the_title(); ?></div>

    <?php if( $positions && ! is_wp_error( $positions ) ) : ?>

      <div class="member-grid__thumb__position">

      <?php
        $position_names = [];

        foreach( $positions as $position ) {
          $position_names[] = $position->name;
        }

        $position_list = join(', ', $position_names);

        echo format_text($position_list);
      ?>

      </div><!-- .member-grid__thumb__position -->

    <?php endif; ?>

    <?php if( $offices && ! is_wp_error( $offices ) ) : ?>

      <div class="member-grid__thumb__office">

      <?php
        $office_names = [];

        foreach( $offices as $office ) {
          $office_names[] = $office->name;
        }

        $office_list = join(', ', $office_names);

        echo format_text($office_list);
      ?>

      </div><!-- .member-grid__thumb__office -->

    <?php endif; ?>

    </figcaption><!-- .member-grid__thumb__caption -->

  </figure>

</li><!-- .member-grid__item -->