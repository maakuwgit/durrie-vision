<?php
/**
* location-map
* -----------------------------------------------------------------------------
*
* location-map component
*/

$defaults = [
  'heading' => false,
  'subheading' => false,
  'map' => false
];

$component_data = ll_parse_args( $component_data, $defaults );

if ( ll_empty( $component_data ) ) return;

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
$heading          = $component_data['heading'];

if( $heading ) {
  $heading_txt = $heading['text'];
  $heading_tag = $heading['tag'];
}else{
  $heading_txt = false;
  $heading_tag = false;
}

$content          = $component_data['content'];
$locations        = $component_data['locations'];
$mid              = uniqid('location-hero-map-');
$map              = '';

foreach ( $locations as $location ) {
  $map[] = get_field('location_map', $location->ID);
}
?>

<section class="ll-location-map relative<?php echo implode( " ", $classes ); ?>" <?php echo ( $id ? 'id="'.$id.'"' : '' ) ?> data-component="location-map">

  <div class="container row centered">

    <div class="location-map__body col col-md-6of12 col-lg-6of12 col-xl-6of12 col-xxl-5of12">
    <?php if( $heading_txt ) : ?>
      <<?php echo $heading_tag; ?> class="location-map__heading">
      <?php echo $heading_txt; ?>
      </<?php echo $heading_tag; ?>>
      <!-- .location-map__heading -->
    <?php endif; ?>

    <?php if ( $content || $locations ) : ?>
      <div class="location-map__content">
        <?php echo format_text($content); ?>

        <?php if( $locations) : ?>

          <ul class="location-map__locations no-bullet">

          <?php foreach ( $locations as $location ) : ?>
            <li>
              <a href="<?php echo $location->guid; ?>"><?php echo $location->post_title; ?></a>
            </li>
          <?php endforeach; ?>

          </ul>

        <?php endif; ?>
      </div>
    <?php endif; ?>
    </div><!-- .col.col-md-6of12.col-lg-6of12.col-xl-6of12.col-xxl-6of12 -->

    <div class="location-map__spacer col col-md-6of12 col-lg-6of12 col-xl-6of12 col-xxl-6of12">
    </div>
    <!-- .location-map__spacer.col.col-md-6of12>col-lg-6of12.col-xl-6of12.col-xxl-6of12 -->

  </div><!-- .container.row -->

  <div class="location-map__googlemap col col-md-6of12 col-lg-6of12 col-xl-6of12 col-xxl-6of12" id="<?php echo $mid; ?>" data-locations='<?php echo json_encode( $map ); ?>'>
  </div>
</section>