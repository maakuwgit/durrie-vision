<?php
  $form_id  = get_field('newsletter_form_id', 'options');
  $hours    = get_field('schema_openings', 'options');
?>
<footer class="footer">

  <div class="footer__top">

    <div class="row container centered between">

      <div class="footer__logo_wrap col col-sm-6of12 col-md-4of12 col-lg-3of12 col-xl-3of12">

        <a class="footer__logo__anchor logo__brand" href="<?php echo esc_url(home_url('/')); ?>">
          <?php echo ll_get_logo('graphic');?>
        </a><!-- .footer__logo__anchor -->

      </div>
      <!-- .footer__logo_wrap -->

    <?php if( ll_get_social_list(false) ) : ?>
      <div class="footer__social_wrap col col-sm-6of12 col-md-4of12 col-lg-3of12 col-xl-3of12">

        <nav class="footer__social">
          <?php ll_get_social_list(); ?>
        </nav><!-- .footer__social -->

      </div><!-- .footer__social_wrap -->
    <?php endif; ?>

    </div>
    <!-- .row.container.centered.between -->

    <div class="row container between">
    <?php
      $args    = array(
                  'post_type'     => 'location',
                  'post_status'   => 'publish',
                  'order'         => 'ASC',
                  'showposts'     => -1
                );

      $locations = new WP_Query( $args );
    ?>
    <?php if ( $locations->have_posts() ) : ?>
      <div class="location-grid__locations">
        <h6 class="location-grid__locations__header">Locations</h6>
        <dl class="location-grid__locations__list">

      <?php while( $locations->have_posts() ) : ?>
        <?php
          $locations->the_post();
          $details    = get_field('location_details');
          $contacts   = get_field('location_contact');
        ?>

          <dt class="location-grid__location__title">
            <?php echo the_title(); ?>
          </dt>
          <!-- .location-grid__location__title -->

          <?php if( $details || $contacts ) : ?>
          <dd class="location-grid__location__description">

            <?php if( $details ) : ?>
            <address class="location-grid__location__address"><?php echo $details['location_address']; ?></address>
            <!-- .location-grid__location__address -->
            <?php endif; ?>

            <?php if( $contacts ) : ?>
            <a class="location-grid__location__phone" href="tel:+1<?php echo $contacts[0]['phone']; ?>"><?php echo format_phone($contacts[0]['phone'], false, '-'); ?></a>
            <!-- .location-grid__location__phone -->
            <?php endif; ?>

          </dd>
          <!-- .location-grid__location__description -->
          <?php endif; ?>

      <?php endwhile; ?>

      <?php wp_reset_postdata(); ?>

        </dl><!-- .location-grid__locations__list -->

      </div>
      <!-- .location-grid__locations -->
    <?php endif; ?>

      <div class="footer__navigation_wrap">

        <div class="footer__navigation">
        <?php if (has_nav_menu('footer_navigation')) : ?>
          <?php wp_nav_menu(array('theme_location' => 'footer_navigation', 'menu_class' => 'nav navbar__nav')); ?>
        <?php endif;?>
        </div><!-- .footer__top__nav -->

      </div><!-- .footer__navigation_wrap -->

    <?php if( ll_get_social_list(false) || $hours ) : ?>
      <div class="footer__additional_details">

        <?php if( $hours ) : ?>
        <div class="footer__hours_wrap">

          <h6 class="footer__hours__title">Hours</h6>

          <?php
          foreach( $hours as $opening ) {
            $time = $opening['from'] . ' - ' . $opening['to'];

            if( in_array('Mon', $opening['days']) &&
                in_array('Tue', $opening['days']) &&
                in_array('Wed', $opening['days']) &&
                in_array('Thu', $opening['days']) &&
                in_array('Fri', $opening['days']) ) {

              echo format_text( 'Mon- Fri: ' . $time);

            }elseif( sizeof($opening['days']) === 1 && $opening['days'][0] === 'Sat' ) {

              echo format_text( 'Saturday: ' . $time);

            }elseif( sizeof($opening['days']) === 1 && 'Sun' === $opening['days'][0] ) {

              echo format_text( 'Sunday: ' . $time);

            }else{

              echo format_text( implode(', ', $opening['days']) . ': ' . $time);

            }
          }
          ?>

        </div><!-- .footer__hours -->
      <?php endif; ?>

      </div>
      <!-- .footer__additional_details -->
    <?php endif; ?>

    </div><!-- .container.row -->

  </div><!-- .footer__top -->

  <div class="footer__bottom">

    <div class="row between container">

      <div class="footer__copyright col center col-md-6of12 col-lg-6of12 col-xl-6of12">
       <p>Copyright &copy; <?php echo date('Y'); ?> <?php bloginfo('name'); ?>. Proudly made in the USA.</p>
      </div><!-- .footer__copyright -->

      <div class="footer__credits col center col-md-6of12 col-lg-6of12 col-xl-6of12">
        <p class="relative flex">
          <a href="https://liftedlogic.com/" target="_blank" class="footer__ll_tagline iflex">Web Design in Kansas City by Lifted Logic</a>
        </p>
      </div><!-- .footer__credits.col.center.col-md-6of12.col-lg-6of12.col-xl-6of12 -->

    </div><!-- .container.row -->

  </div><!-- .footer__bottom -->

</footer>
