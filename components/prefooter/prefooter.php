<?php
/**
* prefooter
* -----------------------------------------------------------------------------
*
* prefooter component
*/

$defaults = [
  'supertitle'  => false,
  'heading'     => false,
  'content'     => false,
  'link'        => false,
  'image'       => false,
  'overlay'     => 1
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
$supertitle     = $component_data['supertitle'];
$heading        = $component_data['heading'];
$content        = $component_data['content'];
$link           = $component_data['link'];
$image          = $component_data['image'];
$overlay        = $component_data['overlay'];

if( $image ) {
  $bg = ' data-backgrounder';
}else{
  $bg = '';
}

?>

<?php if ( ll_empty( $component_data ) ) return; ?>
<aside class="ll-prefooter<?php echo $classes; ?>"<?php echo ' id="'.$id.'"'; ?> data-component="prefooter"<?php echo $bg; ?>>

  <?php if( $bg ) : ?>
  <style>
    #<?php echo $id; ?>:before {
      position: absolute;
      content: '';
      top: 0;
      right: 0;
      bottom: 0;
      left: 0;
      height: 100%;
      transform: initial;
      background: linear-gradient(124.5deg, rgba(0,0,0,0) 0%, rgba(0,0,0,<?php echo $overlay; ?>) 100%);
    }
  </style>
<?php endif; ?>

  <?php if ($image ) : ?>

    <div class="prefooter__feature feature">
      <?php
      if( is_array($image) ) {
        echo ll_format_image($image);
      }else{
        echo $image;
      } ?>
    </div><!-- .hero__feature.feature -->

  <?php endif; ?>

  <div class="container row centered center">

  <?php if( $supertitle ) : ?>
    <h3 class="prefooter__supertitle text-center col col-md-6of12 col-lg-6of12 col-xl-6of12"><?php echo $supertitle; ?></h3>
    <!-- .prefooter__supertitle -->
  <?php endif; ?>

  <?php if( $heading ) : ?>
    <h3 class="prefooter__heading text-center col col-md-6of12 col-lg-6of12 col-xl-6of12"><?php echo $heading; ?></h3>
    <!-- .prefooter__heading -->
  <?php endif; ?>

  <?php if( $content ) : ?>

    <div class="prefooter__content text-center col col-md-6of12 col-lg-6of12 col-xl-6of12">
      <?php echo format_text($content); ?>
    </div><!-- .prefooter__content -->

  <?php endif; ?>

  <?php if( $link ) : ?>

    <div class="prefooter__button text-center col col-md-7of12 col-lg-7of12 col-xl-7of12">
      <a class="btn--gold" href="<?php echo $link['url'];?>"><?php echo $link['title'];?></a>
    </div>
    <!-- .prefooter__button.col.col-md-10of12.col-lg-8of12.col-xl-8of12.col-xxl-8of12 -->

  <?php endif; ?>

  </div><!-- .container -->

</aside>