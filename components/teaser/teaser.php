<?php
/**
* teaser
* -----------------------------------------------------------------------------
*
* teaser component
*/

$defaults = [
  'heading'     => false,
  'subheading'  => false,
  'content'     => false,
  'images'      => false
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
$subheading  = $component_data['subheading'];
$content     = $component_data['content'];
$images      = $component_data['images'];
?>

<?php if ( ll_empty( $component_data ) ) return; ?>
<section class="ll-teaser<?php echo implode( " ", $classes ); ?>"<?php echo $id; ?> data-component="teaser">

  <div class="container">

    <div class="teaser__wrapper row between">

      <div class="teaser__heading col col-sm-8of12 col-md-6of12 col-lg-6of12 col-xl-6of12">
      <?php if( $images ) : ?>

        <?php if( $images[0] ) : ?>

          <div class="teaser__image0 col col-xs-8of12 col-sm-10of12 col-md-10of12 col-lg-10of12 col-xl-10of12">
            <div class="feature">
              <?php echo ll_format_image($images[0]['image']); ?>
            </div>

          </div><!-- .teaser__image0 -->

        <?php endif; ?>

      <?php endif; ?>

      <?php if( $heading ) : ?>

        <?php if( $heading['tag'] ) : ?>
        <<?php echo $heading['tag']; ?> class="teaser__headline text-right"><?php echo $heading['text']; ?></<?php echo $heading['tag']; ?>>
        <!-- .teaser__headline -->
        <?php endif; ?>

      <?php endif; ?>
      </div>

      <?php if( $subheading ) : ?>

        <?php if( $subheading['tag'] ) : ?>
        <<?php echo $subheading['tag']; ?> class="teaser__subheadline col col-sm-8of12 col-offset-md-1of12 col-md-5of12 col-offset-lg-1of12 col-lg-5of12 col-offset-xl-1of12 col-xl-5of12"><?php echo $subheading['text']; ?></<?php echo $subheading['tag']; ?>>
        <!-- .teaser__subheadline -->
        <?php endif; ?>

      <?php endif; ?>

      <?php if( $content ) : ?>

        <div class="teaser__description col col-sm-8of12 col-md-6of12 col-lg-6of12 col-xl-6of12">
        <?php echo $content; ?>
        </div><!-- .teaser__description -->

      <?php endif; ?>

        <div class="teaser__image1 text-right col col-sm-8of12 col-offset-md-1of12 col-md-5of12 col-offset-lg-1of12 col-lg-5of12  col-offset-xl-1of12 col-xl-5of12">

      <?php if( $images ) : ?>

        <?php if( $images[1] ) : ?>
          <div class="feature">
            <?php echo ll_format_image($images[1]['image']); ?>
          </div>
        <?php endif; ?>

      <?php endif; ?>

        </div><!-- .teaser__description -->

    </div><!-- .row.teaser__wrapper -->

  </div><!-- .container -->

</section>