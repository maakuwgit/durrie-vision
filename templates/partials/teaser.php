<?php

  $teaser    = array(
    'heading'     => get_field('teaser_heading'),
    'content'     => get_field('teaser_content'),
    'button'      => get_field('teaser_button'),
    'columns'     => get_field('teaser_columns')
  );

  ll_include_component(
    'teaser',
    $teaser
  );
?>