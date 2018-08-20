<?php
  $id = uniqid('hero-');
  $image           = get_the_post_thumbnail();
?>
<header class="hdg"<?php echo ' id="' . $id . '"';?>>

  <div class="row">

  <?php if ($image) : ?>
    <picture class="hdg__picture col col-md-10of12 col-lg-8of12 col-xl-8of12 col-xxl-8of12">

    <?php
    if( is_array($image) ) {
      echo ll_format_image($image);
    }else{
      echo $image;
    } ?>

    </picture>
    <!-- .hdg__picture -->
  <?php endif; ?>

  </div><!-- .container.row -->

</header><!-- .hdg -->