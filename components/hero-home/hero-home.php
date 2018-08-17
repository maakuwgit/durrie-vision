<?php
/**
* hero-home
* -----------------------------------------------------------------------------
*
* hero-home component
*/

$defaults = [
  'use_image'     => false,
  'heading_image' => false,
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

$use_image         = $component_data['use_image'];

if( $component_data['heading'] ) {
  $heading         = $component_data['heading']['text'];
  $heading_tag     = $component_data['heading']['tag'];
}

$button          = $component_data['button'];

if( $button ) {
  $icon            = $component_data['button']['icon'];

}else {
  $icon            = '';
}
$video           = $component_data['video'];
$overlay         = $component_data['overlay'];
$image           = $component_data['image'];
$himage          = $component_data['heading_image'];

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

  <div class="container between row">

  <?php if( $use_image && $himage ) : ?>

    <h1 class="hero-home__heading hero-home__heading col col-sm-7of12 col-md-8of12 col-lg-7of12 col-xl-7of12">
      <img alt="<?php echo $heading; ?>" src="<?php echo $himage; ?>">
    </h1>

  <?php else : ?>

    <?php if( $heading ) : ?>

    <<?php echo $heading_tag; ?> class="hero-home__heading col col-sm-7of12 col-md-8of12 col-lg-7of12 col-xl-7of12">
      <?php echo $heading; ?>
    </<?php echo $heading_tag; ?>>
    <!-- .hero-home__heading -->

    <?php endif; ?>

  <?php endif; ?>

  <?php if( $button ) : ?>

    <?php if( $button['link'] ) : ?>
    <nav class="hero-home__button col col-sm-5of12 col-md-5of12 col-lg-4of12 col-xl-4of12">

      <a class="icon-link" href="<?php echo $button['link']['url'];?>"><?php echo $button['link']['title'];?>

        <?php if( $icon ) : ?>
          <svg class="icon <?php echo $icon; ?>">
            <use xlink:href="#<?php echo $icon; ?>"></use>
          </svg>
        <?php endif; ?>

      </a>

    </nav>
    <!-- .hero-home__button -->
    <?php endif; ?>

  <?php endif; ?>

    <nav class="hero-home__nav col text-center">

      <a class="hero-home__next_btn">Scroll</a>

    <?php if ( $video ) : ?>
      <a class="play-video-button js-play-video">
        <svg class="icon icon-triangle-right iflex">
          <use xlink:href="#icon-triangle-right"></use>
        </svg>
        <span class="iflex">Watch Video</span>
      </a>
    <?php endif; ?>

    </nav>

  </div>
  <!-- .container -->

</header>