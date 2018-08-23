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

  <?php if( $address ) : ?>
  <div class="footer__additional_details__wrap">

    <h6 class="footer__address__title">Address</h6>

    <address class="footer__address"><?php echo $address . ', <br>' . $city . ', ' . $state . $zip; ?></address>
  </div>
  <?php endif; ?>

  <?php if( $phone || $fax ) : ?>
  <div class="footer__additional_details__wrap">

    <h6 class="footer__contact__title">Phone/Fax</h6>

    <?php if( $phone ) : ?>
    <a class="footer__contact__phone block" href="tel:+1<?php echo $phone; ?>">phone:&nbsp;<?php echo format_phone($phone,false, '-'); ?></a>
    <?php endif; ?>

    <?php if( $fax ) : ?>
    <a class="footer__contact__fax block" href="#fax">fax:&nbsp;<?php echo format_phone($fax,false, '-'); ?></a>
    <?php endif; ?>
  </div>

  <?php endif; ?>
  <?php if( $hours ) : ?>
  <div class="footer__additional_details__wrap">

    <h6 class="footer__hours__title">Hours</h6>

    <?php foreach( $hours as $opening ) : ?>
    <div class="row start">

      <?php
      if($opening['from'] && $opening['to']) {
        $time = $opening['from'] . ' - ' . $opening['to'];
      }else{
        $time = 'Closed';
      }
      ?>

      <p class="footer__hours__days">

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
      <p class="footer__hours__time"><?php echo $time; ?></p>

    </div><!-- .row -->
    <?php endforeach; ?>

  </div><!-- .footer__hours__wrap -->
  <?php endif; ?>

</section>