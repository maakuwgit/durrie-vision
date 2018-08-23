<?php
/**
* downloadable
* -----------------------------------------------------------------------------
*
* downloadable component
*/

$defaults = [
  'heading'      => false,
  'files'        => false,
];

$args = [
  'id'      => uniqid('downloadable-'),
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
$id            = ' id="' . $component_args['id'] . '"';

/**
 * ACF values pulled into the component from the components.php partial.
 */
$heading      = $component_data['heading'];
$files        = $component_data['files'];

?>

<?php if ( ll_empty( $component_data ) ) return; ?>
<section class="ll-downloadable<?php echo $classes; ?>" <?php echo $id; ?> data-component="downloadable">

  <div class="container row text-left">

  <?php if( $heading  ) : ?>
    <<?php echo $heading['tag']; ?> class="downloadable__heading col"><?php echo $heading['text']; ?></<?php echo $heading['tag']; ?>>
    <!-- .downloadable__heading.col -->
  <?php endif; ?>

  </div><!-- .container.row -->

<?php if( $files ) : ?>

  <div class="container">

    <ul class="downloadable__files row stretch start no-bullet">

    <?php foreach( $files as $block ) : ?>
      <?php
        $icon      = $block['icon'];
        $title     = $block['title'];
        $file   = $block['file'];
      ?>
      <li class="downloadable__file col col-sm-6of12 col-md-3of12 col-lg-3of12 col-xl-3of12">

      <?php if( $title || $file ) : ?>
        <div class="downloadable__file__content text-center" data-clickthrough>
          <a class="downloadable__file__link" href="<?php echo $file; ?>"></a>

        <?php if( $icon ) : ?>
          <div class="downloadable__file__icon">
            <svg class="icon <?php echo $icon; ?>">
              <use xlink:href="#<?php echo $icon; ?>"></use>
            </svg><!-- .icon.icon-<?php echo $icon; ?> -->
          </div><!-- .downloadable__file -->
        <?php endif; ?>

        <?php if( $title ) : ?>

          <h4 class="downloadable__file__title"><?php echo $title; ?></h4>
          <!-- .downloadable__file__title -->

        <?php endif; ?>

        <?php if( $file ) : ?>
          <div class="downloadable__file__meta row">
            <svg class="icon icon-download">
              <use xlink:href="#icon-download"></use>
            </svg>
            <span class="col">Download</span>
          </div>
          <!-- .downloadable__file__link -->
        <?php endif; ?>

        </div>
        <!-- .downloadable__file__content -->
      <?php endif; ?>

      </li><!-- .downloadable__file -->

    <?php endforeach; ?>

    </ul><!-- .downloadable__files -->

  </div><!-- .container -->
<?php endif; ?>
</section>