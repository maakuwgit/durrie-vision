<?php
  $overlay = get_field('overlay_strength');
  $id = uniqid('hero-');
  $image           = get_the_post_thumbnail();

  if( $image ) {
    $bg = ' data-backgrounder';
  }else{
    return;
  }

?>
<header class="hdg"<?php echo ' id="' . $id . '"' . $bg; ?>>

  <?php if( $bg ) : ?>
  <style>
    #<?php echo $id; ?>:before {
      position: absolute;
      content: '';
      top: 0;
      right: 0;
      bottom: 0;
      left: 0;
      height: 100%;
      background: linear-gradient(124.5deg, rgba(0,0,0,0) 0%, rgba(0,0,0,<?php echo $overlay; ?>) 100%);
    }
  </style>
<?php endif; ?>

  <div class="hero__feature feature">
    <?php
    if( is_array($image) ) {
      echo ll_format_image($image);
    }else{
      echo $image;
    } ?>
  </div><!-- .hero__feature.feature -->

  </div>

</header><!-- .hdg -->