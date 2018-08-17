<?php

  $details    = array(
    'contacts' => get_field('location_contact'),
    'hours'    => get_field('location_hours'),
    'map'      => get_field('location_map'),
    'details'  => get_field('details')
  );

  ll_include_component(
    'location-details',
    $details
  );
?>