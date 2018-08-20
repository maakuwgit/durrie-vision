<?php
/**
* hero-procedure
* -----------------------------------------------------------------------------
*
* hero-procedure component
*/

$defaults = [
  'heading'     => false,
  'anchors'     => false,
  'image'       => false,
  'overlay'     => 1
];

$args = [
  'id'      => uniqid('hero-procedure-'),
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
$id      = $component_args['id'];

$aid     = uniqid('anchor-nav-');
$oid     = uniqid('hero-procedure__figure-');
$anchors = $component_data['anchors'];

if( $component_data['heading'] ) {
  $heading         = $component_data['heading']['text'];
  $heading_tag     = $component_data['heading']['tag'];
}

$overlay         = $component_data['overlay'];
$image           = $component_data['image'];

if( $image ) {
  $bg = ' data-backgrounder';
}else{
  $bg = '';
}
?>

<?php if ( ll_empty( $component_data ) ) return; ?>

<header class="ll-hero-procedure<?php echo $classes; ?>"<?php echo ' id="'.$id.'"'; ?> data-component="hero-procedure">

  <?php if( $bg ) : ?>
  <style>
    #<?php echo $oid; ?>:before {
      position: absolute;
      content: '';
      top: 0;
      right: 0;
      bottom: 0;
      left: 0;
      height: 100%;
      background: linear-gradient(124.5deg, rgba(0,0,0,0) 0%, rgba(0,0,0,<?php echo $overlay; ?>) 100%);
    }
  </style>
<?php endif; ?>

  <div class="container row start flex-end">

  <?php if ($image ) : ?>
    <figure class="hero-procedure__feature__photo col col-md-7of12 col-lg-8of12 col-xl-8of12"<?php echo $bg; ?>>

      <div class="hero-procedure__feature feature">
        <?php
        if( is_array($image) ) {
          echo ll_format_image($image);
        }else{
          echo $image;
        } ?>
      </div><!-- .hero-procedure__feature.feature -->

    </figure>

  <?php endif; ?>

  <?php
    if( $video ) {

      $loop_video = array(
        'video' => $video,
        'fallback' => wp_get_attachment_url($bg)
      );

      ll_include_component(
        'loop-video',
        $loop_video
      );
    }
  ?>

  <?php if( $heading ) : ?>

    <<?php echo $heading_tag; ?> class="hero-procedure__heading col">
      <?php echo $heading; ?>
    </<?php echo $heading_tag; ?>>
    <!-- .hero-procedure__heading -->

  <?php endif; ?>

  <?php if( $anchors ) : ?>
    <nav id="<?php echo $aid;?>" class="hero-procedure__anchor_nav col col-md-4of12 col-lg-4of12 col-xl-4of12">
      <ul class="no-bullet">
        <?php foreach( $anchors as $btn ) : ?>
          <li>
            <a href="<?php echo $btn['target']; ?>"><?php echo $btn['label']; ?></a>
          </li>
        <?php endforeach; ?>
      </ul>
    </nav>

  <?php endif; ?>

  </div>

</header>