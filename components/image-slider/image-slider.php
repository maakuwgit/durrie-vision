<?php
/**
* image-slider
* -----------------------------------------------------------------------------
*
* image-slider component
*/

$defaults = [
  'heading'     => false,
  'slides'      => false
];


$default_args = [
  'id'      => uniqid('image-slider-'),
  'classes' => false,
  'nav_id'  => uniqid('image-slider__nav-')
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
$id      = $component_args['id'];
$nav_id  = $component_args['nav_id'];

/**
 * ACF values pulled into the component from the components.php partial.
 */
$slides     = $component_data['slides'];

if( $component_data['heading'] ) {
  $heading         = $component_data['heading']['text'];
  $heading_tag     = $component_data['heading']['tag'];
}else{
  $heading = false;
}

?>

<?php if ( ll_empty( $component_data ) ) return; ?>
<section class="ll-image-slider slick-carousel<?php echo $classes; ?>"<?php echo $id; ?> data-component="image-slider">

  <div class="container row center centered text-center">

  <?php if( $heading ) : ?>

    <<?php echo $heading_tag; ?> class="image-slider__heading col">
      <?php echo $heading; ?>
    </<?php echo $heading_tag; ?>>
    <!-- .image-slider__heading -->

  <?php endif; ?>

    <div class="image-slider__slides" data-slider-nav="<?php echo $nav_id; ?>">
    <?php foreach( $slides as $slide ) : ?>

    <div class="image-slider__slide col" id="#<?php echo $slide['image']['name']; ?>" data-modal="<?php echo $slide['image']['url']; ?>">
        <?php echo ll_format_image($slide['image']); ?>

    </div><!-- .image-slider__slide -->

    <?php endforeach; ?>
    </div><!-- .image-slider__slides -->

  </div>

  <?php if( sizeof($slides) > 1 ) : ?>
  <aside class="image-slider__nav">

    <div class="container row">

      <nav id="<?php echo $nav_id; ?>" class="slick-nav col" data-slick-nav>

        <div class="row between">
          <small class="flex" data-slick-details>01/01</small>
          <progress value="1" max="2" data-slick-progress></progress>
        </div>

      </nav>

    </div>

  </aside>
  <!-- .image-slider__nav -->
  <?php endif; ?>

</section>