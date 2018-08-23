<?php
/**
* photo-w-caption
* -----------------------------------------------------------------------------
*
* photo-w-caption component
*/

$defaults = [
  'image'   => false,
  'caption' => false
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
$id       = $component_args['id'];
$image    = $component_data['image'];
$caption  = $component_data['caption'];

?>

<?php if ( ll_empty( $component_data ) ) return; ?>
<section class="ll-photo-w-caption<?php echo implode( " ", $classes ); ?>"<?php echo ' id="'.$id.'"'; ?> data-component="photo-w-caption">

  <figure data-backgrounder class="ll-photo-w-caption__image">

    <div class="feature">
      <?php echo ll_format_image($image); ?>
    </div>

  </figure>

  <div class="container row">

    <div class="ll-photo-w-caption__content col col-offset-lg-4of12 col-lg-8of12">
      <?php echo format_text($caption); ?>
    </div>

  </div>

</section>
