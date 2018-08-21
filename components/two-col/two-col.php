<?php
/**
* two-col
* -----------------------------------------------------------------------------
*
* two-col component
*/

$defaults = [
  'column_1'       => false,
  'column_2'       => false
];


$default_args = [
  'id' => uniqid('two-col-'),
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
?>

<?php if ( ll_empty( $component_data ) ) return; ?>
<section class="ll-two-col<?php echo $classes; ?>"<?php echo $id; ?> data-component="two-col">

  <div class="two-col__row container row between">

  <?php if( $column_1 ) : ?>

    <div class="two-col__column col col-lg-6of12 col-xl-6of12">
      <?php echo format_text($column_1);?>
    </div>
    <!-- .two-col__column -->

  <?php endif; ?>

  <?php if( $column_2 ) : ?>

    <div class="two-col__column col col-lg-6of12 col-xl-6of12">
      <?php echo format_text($column_2);?>
    </div>
    <!-- .two-col__column -->

  <?php endif; ?>

  </div>
  <!-- .container -->

</section>