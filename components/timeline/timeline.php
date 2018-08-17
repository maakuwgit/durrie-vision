<?php
/**
* timeline
* -----------------------------------------------------------------------------
*
* timeline component
*/

$defaults = [
  'milestones' => false
];


$args = [
  'id'      => uniqid('logo-grid-'),
  'classes' => array(),
];

$component_data = ll_parse_args( $component_data, $defaults );
$component_args = ll_parse_args( $component_args, $args );

/**
 * Any additional classes to apply to the main component container.
 *
 * @var array
 * @see args['classes']
 */
$classes  = $component_args['classes'];

/**
 * ID to apply to the main component container.
 *
 * @var array
 * @see args['id']
 */
$id            = ' id="' . $component_args['id'] . '"';

/**
 * ACF values pulled into the component from the components.php partial.
 */
$milestones  = $component_data['milestones'];
?>

<?php if ( ll_empty( $component_data ) ) return; ?>
<section class="ll-timeline <?php echo implode( " ", $classes ); ?>"<?php echo $id; ?> data-component="timeline">

  <div class="container">

    <dl class="timeline__milestones row centered between">

      <?php foreach( $milestones as $milestone ) : ?>

      <div class="timeline__milestone col col-md-6of12 col-lg-3of12 col-xl-3of12 col-xxl-3of12 flex">

        <dt class="timeline__milestone__year">
          <?php echo $milestone['year']; ?>
        </dt>
        <!-- .timeline__milestone__year -->

        <dd class="timeline__milestone__content">
          <strong><?php echo $milestone['title']; ?></strong>
          <?php echo format_text( $milestone['caption'] ); ?>
        </dd>
        <!-- .timeline__milestone__content -->

      </div>
      <!-- .timeline__milestone -->

      <?php endforeach; ?>

    </dl>
    <!-- .timeline__milestones.row.center.centered -->

  </div>
  <!-- .container -->

</section>