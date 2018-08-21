<?php
/**
* fullwidth-image
* -----------------------------------------------------------------------------
*
* fullwidth-image component
*/

$defaults = [
  'image' => false
];

$args = [
  'id'      => uniqid('fullwidth-image-'),
  'classes' => array()
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
$classes        = $component_args['classes'] ?: array();

/**
 * ID to apply to the main component container.
 *
 * @var array
 * @see args['id']
 */
$id     = $component_args['id'];
$image  = $component_data['image'];
?>

<?php if ( ll_empty( $component_data ) ) return; ?>
<figure class="ll-fullwidth-image<?php echo implode( " ", $classes ); ?>"<?php echo ' id="'.$id.'"'; ?> data-component="fullwidth-image" data-backgrounder>

  <div class="feature">
    <?php echo ll_format_image($image); ?>
  </div>

</figure>
