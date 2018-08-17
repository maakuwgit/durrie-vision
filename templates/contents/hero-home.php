<?php
  $hero = array(
    'use_image'     => get_field('use_heading_image'),
    'heading_image' => get_field('hero_heading_image'),
    'heading'       => get_field('hero_heading'),
    'button'        => get_field('hero_button'),
    'image'         => get_field('hero_image'),
    'overlay'       => get_field('overlay_strength'),
    'video'         => get_field('hero_video')
  );

  ll_include_component(
    'hero-home',
    $hero,
    array(
      'classes' => array('big-headline')
    )
  );
?>
