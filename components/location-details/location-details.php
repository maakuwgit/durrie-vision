<?php
/**
* location-details
* -----------------------------------------------------------------------------
*
* location-details component
*/

$args = [
];

$component_args = ll_parse_args( $component_args, $args );
?>

<?php
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
$component_id   = $component_args['id'];

$hours    = get_field('schema_openings', 'options');
$phone    = get_field('contact_phone_number', 'options');
$fax      = get_field('contact_fax_number', 'options');
$address  = get_field('contact_street_address', 'options');
$city     = get_field('contact_city', 'options');
$state    = get_field('contact_state', 'options');
$zip      = get_field('contact_zip', 'options');
?>

<?php if ( !$hours && !$phone && !$fax ) return; ?>
<section class="ll-location-details <?php echo implode( " ", $classes ); ?>" <?php echo ( $component_id ? 'id="'.$component_id.'"' : '' ) ?> data-component="location-details">

  <dl class="container row start">

    <?php if( $address ) : ?>
    <div class="col col-sm-6of12 col-md-4of12 col-lg-3of12 col-xl-3of12">

      <dt class="location-details__title">Address</dt>
      <!-- .location-details__title -->

      <dd class="location-details__description">
        <address class="location-details__description__address"><?php echo $address . ', <br>' . $city . ', ' . $state . $zip; ?></address>
      </dd>
      <!-- .location-details__description -->

    </div>
    <?php endif; ?>

    <?php if( $phone || $fax ) : ?>
    <div class="col col-sm-6of12 col-md-4of12 col-lg-3of12 col-xl-3of12">

      <dt class="location-details__title">Phone/Fax</dt>
      <!-- .location-details__title -->

      <dd class="location-details__description">
        <?php if( $phone ) : ?>
        <a class="location-details__description__phone block" href="tel:+1<?php echo $phone; ?>">phone:&nbsp;<?php echo format_phone($phone,false, '-'); ?></a>
        <?php endif; ?>

        <?php if( $fax ) : ?>
        <a class="location-details__description__fax block" href="#fax">fax:&nbsp;<?php echo format_phone($fax,false, '-'); ?></a>
        <?php endif; ?>
      </dd>
      <!-- .location-details__description -->

    </div>
    <?php endif; ?>

    <?php if( $hours ) : ?>
    <div class="col col-sm-6of12 col-md-4of12 col-lg-3of12 col-xl-3of12">
      <dt class="location-details__title">Hours</dt>

      <dd class="location-details__description__hours">
      <?php foreach( $hours as $opening ) : ?>
        <div class="row start">

          <?php
          if($opening['from'] && $opening['to']) {
            $time = $opening['from'] . ' - ' . $opening['to'];
          }else{
            $time = 'Closed';
          }
          ?>

          <p class="location-details__description__hours__days">

          <?php
          if( in_array('Mon', $opening['days']) &&
              in_array('Tue', $opening['days']) &&
              in_array('Wed', $opening['days']) &&
              in_array('Thu', $opening['days']) &&
              in_array('Fri', $opening['days']) ) :
          ?>Mon - Fri</p>

        <?php else : ?>
          <?php echo implode(', ', $opening['days']); ?>
        <?php endif; ?>
          </p>
          <p class="location-details__description__hours__time"><?php echo $time; ?></p>

        </div><!-- .row -->
      <?php endforeach; ?>

      </dd><!-- .location-details__description -->
    </div>
    <?php endif; ?>

  </dl>

</section>