<?php

  $teaser    = array(
    'icon'        => get_field('teaser_icon'),
    'heading'     => get_field('teaser_heading'),
    'content'     => get_field('teaser_content')
  );

  ll_include_component(
    'teaser',
    $teaser
  );
?>