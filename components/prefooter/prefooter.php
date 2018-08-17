<?php
/**
* prefooter
* -----------------------------------------------------------------------------
*
* prefooter component
*/

$defaults = [
  'heading'     => false,
  'links'        => false
];

$args = [
  'id'      => uniqid('prefooter-'),
  'classes' => false,
];

$component_data = ll_parse_args( $component_data, $defaults );
$component_args = ll_parse_args( $component_args, $args );

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
$id = $component_args['id'];

/**
 * ACF values pulled into the component from the components.php partial.
 */
$heading        = $component_data['heading'];
$links          = $component_data['links'];

?>

<?php if ( ll_empty( $component_data ) ) return; ?>
<aside class="ll-prefooter aqua<?php echo $classes; ?>"<?php echo ' id="'.$id.'"'; ?> data-component="prefooter">

  <div class="container row centered center">

  <?php if( $heading ) : ?>
    <h3 class="prefooter__heading text-center col col-md-6of12 col-lg-6of12 col-xl-6of12"><?php echo $heading; ?></h3>
    <!-- .prefooter__heading -->
  <?php endif; ?>

  <?php if( $links ) : ?>
    <nav class="prefooter__nav row centered center">

    <?php foreach( $links as $key => $link ) : ?>
      <a class="prefooter__button btn--outline" href="<?php echo $link['button']['url'];?>"><?php echo $link['button']['title'];?></a>
      <!-- .prefooter__button -->
    <?php endforeach; ?>

    </nav>
  <?php endif; ?>

  </div><!-- .container -->

</aside>