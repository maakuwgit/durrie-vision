<?php

  $synopsis    = array(
    'heading'     => get_field('synopsis_heading'),
    'content'     => get_field('synopsis_content'),
    'links'       => get_field('synopsis_links')
  );

  ll_include_component(
    'synopsis',
    $synopsis
  );
?>