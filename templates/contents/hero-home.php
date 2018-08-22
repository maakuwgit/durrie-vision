<?php
  $hero = array(
    'heading'         => get_field('hero_heading'),
    'button'          => get_field('hero_button'),
    'image'           => get_field('hero_image'),
    'overlay'         => get_field('overlay_strength'),
    'video'           => get_field('hero_video'),
    'video_external'  => get_field('hero_video_external')
  );

  ll_include_component(
    'hero-home',
    $hero
  );
?>
