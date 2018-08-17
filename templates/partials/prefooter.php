<?php
  $has_prefooter = get_field('has_prefooter');

  if( $has_prefooter !== false ) {

    $prefooter = array(
      'heading'    => get_field('prefooter_heading'),
      'links'       => get_field('prefooter_links'),
    );

    ll_include_component(
      'prefooter',
      $prefooter
    );

  }
?>
