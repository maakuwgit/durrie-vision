<?php
  $hours    = get_field('schema_openings', 'options');
  $phone    = get_field('contact_phone_number', 'options');
  $fax      = get_field('contact_fax_number', 'options');
  $address  = get_field('contact_street_address', 'options');
  $city     = get_field('contact_city', 'options');
  $state    = get_field('contact_state', 'options');
  $zip      = get_field('contact_zip', 'options');
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

  </div><!-- .footer__top -->

  <div class="footer__middle">

    <div class="row container between">

      <?php if( $hours || $phone || $fax) : ?>
      <div class="footer__additional_details col col-md-3of12 col-lg-3of12 col-xl-3of12">

        <?php if( $address ) : ?>
        <div class="footer__additional_details__wrap">

          <h6 class="footer__address__title">Address</h6>

          <address class="footer__address"><?php echo $address . ', <br>' . $city . ', ' . $state . $zip; ?></address>
        </div>
        <?php endif; ?>

        <?php if( $phone || $fax ) : ?>
        <div class="footer__additional_details__wrap">

          <h6 class="footer__contact__title">Phone/Fax</h6>

          <?php if( $phone ) : ?>
          <a class="footer__contact__phone block" href="tel:+1<?php echo $phone; ?>">phone:&nbsp;<?php echo format_phone($phone,false, '-'); ?></a>
          <?php endif; ?>

          <?php if( $fax ) : ?>
          <a class="footer__contact__fax block" href="#fax">fax:&nbsp;<?php echo format_phone($fax,false, '-'); ?></a>
          <?php endif; ?>
        </div>

        <?php endif; ?>
        <?php if( $hours ) : ?>
        <div class="footer__additional_details__wrap">

          <h6 class="footer__hours__title">Hours</h6>

          <?php foreach( $hours as $opening ) : ?>
          <div class="row start">

            <?php
            if($opening['from'] && $opening['to']) {
              $time = $opening['from'] . ' - ' . $opening['to'];
            }else{
              $time = 'Closed';
            }
            ?>

            <p class="footer__hours__days">

            <?php
            if( in_array('Mon', $opening['days']) &&
                in_array('Tue', $opening['days']) &&
                in_array('Wed', $opening['days']) &&
                in_array('Thu', $opening['days']) &&
                in_array('Fri', $opening['days']) ) :
            ?>Mon - Fri</p>

          <?php else : ?>
            <?php echo implode(', ', $opening['days']); ?>
          <?php endif; ?>
            </p>
            <p class="footer__hours__time"><?php echo $time; ?></p>

          </div><!-- .row -->
          <?php endforeach; ?>

      </div><!-- .footer__hours__wrap -->
      <?php endif; ?>

      </div>
      <!-- .footer__additional_details -->
    <?php endif; ?>

      <div class="footer__navigation_wrap col col-md-9of12 col-lg-9of12 col-xl-9of12">

        <div class="footer__navigation">
        <?php if (has_nav_menu('footer_navigation')) : ?>
          <?php
            wp_nav_menu(
              array(
                'theme_location' => 'footer_navigation',
                'menu_class'     => 'nav navbar__nav'
              )
            );
          ?>
        <?php endif;?>
        </div><!-- .footer__top__nav -->

      </div><!-- .footer__navigation_wrap -->

    </div><!-- .container.row -->

  </div><!-- .footer__middle -->

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
