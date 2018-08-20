<?php
  $hero = array(
    'heading'     => get_field('hero_heading'),
    'anchors'     => get_field('hero_anchors'),
    'image'       => get_field('hero_image'),
    'overlay'     => get_field('overlay_strength')
  );

  ll_include_component(
    'hero-procedure',
    $hero
  );
?>
