<?php
  $phone  = get_field('contact_phone_number', 'options');
?>
<header class="navbar top" role="banner">
  <div class="navbar-header container row between centered">

    <?php $logo = get_field( 'global_logo', 'option' ); ?>

    <?php if ( $logo ) : ?>

      <a class="flex" href="<?php echo esc_url(home_url('/')); ?>">
        <img class="logo logo--header" src="<?php echo $logo['url']; ?>" alt="<?php bloginfo('name'); ?>">
      </a>

    <?php else : ?>

      <a class="logo__brand flex" href="<?php echo esc_url(home_url('/')); ?>" data-backgrounder>
        <span class="feature"><?php echo ll_get_logo(); ?></span>
      </a>

    <?php endif; ?>

    <?php if (has_nav_menu('primary_navigation')) : ?>
    <nav class="primary-nav flex" id="primary-nav" role="navigation">
      <?php
      if ( has_nav_menu('primary_navigation') ) {
        wp_nav_menu( array(
          'theme_location'  => 'primary_navigation',
          'menu_class'      => 'nav navbar-nav'
        ) );
      }
      ?>
    </nav><!-- .primary-nav -->
    <?php endif; ?>
    <?php
      $phone = get_field('contact_phone_number','option');
    ?>

    <?php if($phone) : ?>
    <div class="menu-item flex">
      <a href="tel:+1<?php echo format_phone($phone,false,'');?>"><?php echo format_phone($phone,false,'.'); ?></a>
    </div>
    <?php endif; ?>

    <?php if (has_nav_menu('primary_navigation')) : ?>
    <button type="button" class="navbar-toggle navbar-toggle--stand" data-nav="collapse" data-target="#primary-nav">

      <span class="sr-only">Toggle navigation</span>
      <span class="navbar-toggle__box">
        <span class="navbar-toggle__inner"></span>
      </span><!-- .navbar-toggle__box -->

    </button><!-- .navbar-toggle -->
    <?php endif; ?>

  </div>

</header>