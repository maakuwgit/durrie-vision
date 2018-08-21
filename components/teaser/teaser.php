<?php
/**
* teaser
* -----------------------------------------------------------------------------
*
* teaser component
*/

$defaults = [
  'icon'        => false,
  'heading'     => false,
  'content'     => false
];

$args = [
  'id'      => uniqid('teaser-'),
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
$classes  = $component_args['classes'] ?: array();

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
$heading     = $component_data['heading'];
$content     = $component_data['content'];
$icon        = $component_data['icon'];

if( is_array($icon) ) {
  $icon = $icon['icon'];
}

?>

<?php if ( ll_empty( $component_data ) ) return; ?>
<section class="ll-teaser<?php echo implode( " ", $classes ); ?>"<?php echo $id; ?> data-component="teaser">

  <div class="container row centered center text-center">

  <?php if( $icon ) : ?>

    <div class="teaser__icon col col-sm-8of12 col-md-8of12 col-lg-8of12 col-xl-8of12">

      <svg class="icon <?php echo $icon; ?>">
        <use xlink:href="#<?php echo $icon; ?>">
      </svg>

    </div><!-- .teaser__icon -->

  <?php endif; ?>

  <?php if( $heading ) : ?>

    <?php if( $heading['tag'] ) : ?>
    <<?php echo $heading['tag']; ?> class="teaser__headline col col-sm-8of12 col-md-8of12 col-lg-8of12 col-xl-8of12"><?php echo $heading['text']; ?></<?php echo $heading['tag']; ?>>
    <!-- .teaser__headline -->
    <?php endif; ?>

  <?php endif; ?>

  <?php if( $content ) : ?>

    <div class="teaser__description col col-sm-8of12 col-md-8of12 col-lg-8of12 col-xl-8of12">
    <?php echo $content; ?>
    </div><!-- .teaser__description -->

  <?php endif; ?>

  </div><!-- .container.row.teaser__wrapper -->

</section>