<?php
/**
* hero-home
* -----------------------------------------------------------------------------
*
* hero-home component
*/

$defaults = [
  'heading'       => false,
  'button'        => false,
  'image'         => false,
  'video'         => false,
  'overlay'       => 1
];

$args = [
  'id'      => uniqid('hero-home-'),
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
$id = $component_args['id'];

if( $component_data['heading'] ) {
  $heading         = $component_data['heading']['text'];
  $heading_tag     = $component_data['heading']['tag'];
}

$button          = $component_data['button'];

$video           = $component_data['video'];
$overlay         = $component_data['overlay'];
$image           = $component_data['image'];

if( $image ) {
  $bg = ' data-backgrounder';
}else{
  $bg = '';
}

?>

<?php if ( ll_empty( $component_data ) ) return; ?>
<header class="ll-hero-home<?php echo $classes; ?>"<?php echo ' id="'.$id.'"'; ?> data-component="hero-home"<?php echo $bg; ?>>

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
      background: linear-gradient(124.5deg, rgba(0,0,0,0) 0%, rgba(0,0,0,<?php echo $overlay; ?>) 100%);
    }
  </style>
<?php endif; ?>

  <?php if ($image ) : ?>

    <div class="hero-home__feature feature">
      <?php
      if( is_array($image) ) {
        echo ll_format_image($image);
      }else{
        echo $image;
      } ?>
    </div><!-- .hero-home__feature.feature -->

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

  <div class="hero-home__container container row centered center text-center">

  <?php if( $heading ) : ?>

  <<?php echo $heading_tag; ?> class="hero-home__heading col">
    <?php echo $heading; ?>
  </<?php echo $heading_tag; ?>>
  <!-- .hero-home__heading -->

  <?php endif; ?>

  <?php if ( $video ) : ?>
    <nav class="hero-home__nav col">

      <a class="play-video-button js-play-video">
        <svg class="icon icon-play">
          <use xlink:href="#icon-play"></use>
        </svg>
        <span class="iflex">Play Video</span>
      </a>

    </nav>
    <!-- .hero-home__nav -->
  <?php endif; ?>


  <?php if( $button ) : ?>
    <nav class="hero-home__cta col">

      <a class="hero-home__button" href="<?php echo $button['url'];?>"><?php echo $button['title'];?></a>

    </nav>
    <!-- .hero-home__button -->
  <?php endif; ?>

  </div>
  <!-- .container -->

</header>