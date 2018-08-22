<?php
/**
* three-col
* -----------------------------------------------------------------------------
*
* three-col component
*/

$defaults = [
  'column_1'       => false,
  'column_2'       => false,
  'column_3'       => false,
];

$default_args = [
  'id' => uniqid('three-col-'),
  'classes' => false,
];

$component_data = ll_parse_args( $component_data, $defaults );
$component_args = ll_parse_args( $component_args, $args );

?>

<?php
/**
 * Any additional classes to apply to the main component container.
 *
 * @var array
 * @see args['classes']
 */
$classes        = $component_args['classes'];
if( $classes ) $classes = ' ' . implode( " ", $classes );

/**
 * ID to apply to the main component container.
 *
 * @var array
 * @see args['id']
 */
$id   = $component_args['id'];
$column_1 = $component_data['column_1'];
$column_2 = $component_data['column_2'];
$column_3 = $component_data['column_3'];
?>

<?php if ( ll_empty( $component_data ) ) return; ?>
<section class="ll-three-col<?php echo $classes; ?>"<?php echo $id; ?> data-component="three-col">

  <div class="three-col__row container row between">

  <?php if( $column_1 ) : ?>

    <div class="three-col__column col col-md-6of12 col-lg-4of12 col-xl-4of12">
      <?php echo format_text($column_1);?>
    </div>
    <!-- .three-col__column -->

  <?php endif; ?>

  <?php if( $column_2 ) : ?>

    <div class="three-col__column col col-md-6of12 col-lg-4of12 col-xl-4of12">
      <?php echo format_text($column_2);?>
    </div>
    <!-- .three-col__column -->

  <?php endif; ?>

  <?php if( $column_3 ) : ?>

    <div class="three-col__column col col-md-6of12 col-lg-4of12 col-xl-4of12">
      <?php echo format_text($column_3);?>
    </div>
    <!-- .three-col__column -->

  <?php endif; ?>

  </div>
  <!-- .container -->

</section>