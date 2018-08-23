<?php
/**
* location-map
* -----------------------------------------------------------------------------
*
* location-map component
*/

$args = [];

$component_args = ll_parse_args( $component_args, $defaults );

/**
 * Any additional classes to apply to the main component container.
 *
 * @var array
 * @see args['classes']
 */
$classes        = $component_args['classes'] ?: array();

/**
 * ID to apply to the main component container.
 *
 * @var array
 * @see args['id']
 */
$id               = ( $component_args['id'] ? $component_args['id'] : uniqid('location-hero-') );

/**
 * ACF values pulled into the component from the components.php partial.
 */

$mid              = uniqid('location-hero-map-');

$lng = -94.6827847;
$lat = 38.9285626;

$address  = get_field('contact_street_address', 'options');
$city     = get_field('contact_city', 'options');
$state    = get_field('contact_state', 'options');
$zip      = get_field('contact_zip', 'options');

$map[] = array(
  "0" => false,
  "address" => $address,
  "lat" => $lat,
  "lng" => $lng
  );
?>

<section class="ll-location-map relative<?php echo implode( " ", $classes ); ?>" <?php echo ( $id ? 'id="'.$id.'"' : '' ) ?> data-component="location-map">

  <div class="location-map__googlemap" id="<?php echo $mid; ?>" data-locations='<?php echo json_encode( $map ); ?>'></div>
</section>