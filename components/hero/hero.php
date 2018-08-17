<?php
/**
* hero
* -----------------------------------------------------------------------------
*
* hero component
*/

$defaults = [
  'supertitle'  => false,
  'heading'     => false,
  'content'     => false,
  'button'      => false,
  'image'       => false,
  'video'       => false,
  'overlay'     => 1
];

$args = [
  'id'      => uniqid('hero-'),
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

if( $component_data['supertitle'] ) {
  $supertitle      = $component_data['supertitle']['text'];
  $supertitle_tag  = $component_data['supertitle']['tag'];
  $price           = $component_data['supertitle']['price'];
  $suffix          = $component_data['supertitle']['suffix'];
}else{
  $supertitle = false;
}

if( $component_data['heading'] ) {
  $heading         = $component_data['heading']['text'];
  $heading_tag     = $component_data['heading']['tag'];
}

$content         = $component_data['content'];
$button          = $component_data['button'];

if( $button ) {
  $icon            = $component_data['button']['icon'];

}else {
  $icon            = '';
}
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

<header class="ll-hero<?php echo $classes; ?>"<?php echo ' id="'.$id.'"'; ?> data-component="hero"<?php echo $bg; ?>>

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

    <div class="hero__feature feature">
      <?php
      if( is_array($image) ) {
        echo ll_format_image($image);
      }else{
        echo $image;
      } ?>
    </div><!-- .hero__feature.feature -->

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

  <div class="container centered end row">

  <?php if( $supertitle ) : ?>

    <<?php echo $supertitle_tag; ?> class="hero__supertitle col col-xs-10of12 col-sm-8of12 col-md-6of12 col-lg-6of12 col-xl-6of12">
      <?php echo $supertitle; ?>
    </<?php echo $supertitle_tag; ?>>
    <!-- .hero__supertitle -->

  <?php endif; ?>

  <?php if( $price ) : ?>

    <div class="hero__price col col-xs-10of12 col-sm-8of12 col-md-6of12 col-lg-6of12 col-xl-6of12">
      <span><?php echo $price; ?></span><?php echo $suffix; ?>
    </div>
    <!-- .hero__price -->

  <?php endif; ?>

  <?php if( $heading ) : ?>

    <<?php echo $heading_tag; ?> class="hero__heading col col-xs-10of12 col-sm-8of12 col-md-6of12 col-lg-6of12 col-xl-6of12">
      <?php echo $heading; ?>
    </<?php echo $heading_tag; ?>>
    <!-- .hero__heading -->

  <?php endif; ?>

  <?php if( $content ) : ?>

    <div class="hero__content col col-xs-10of12 col-sm-8of12 col-md-6of12 col-lg-6of12 col-xl-6of12">
      <?php echo format_text($content); ?>
    </div>
    <!-- .hero__content -->

  <?php endif; ?>

  <?php if( $button ) : ?>

    <?php if( $button['link'] ) : ?>
    <div class="hero__button col col-xs-10of12 col-sm-8of12 col-md-6of12 col-lg-6of12 col-xl-6of12">

      <a class="<?php echo $button['button_type'] . ( $icon ? ' has_icon' : '' );?>" href="<?php echo $button['link']['url'];?>"><?php echo $button['link']['title'];?>

        <?php if( $icon ) : ?>
          <svg class="icon <?php echo $icon; ?>">
            <use xlink:href="#<?php echo $icon; ?>"></use>
          </svg>
        <?php endif; ?>

      </a>

    </div>
    <!-- .hero__button -->
    <?php endif; ?>

  <?php endif; ?>

  <?php if ( $video ) : ?>
    <a class="play-video-button js-play-video flex centered start row">
      <svg class="icon icon-triangle-right iflex">
        <use xlink:href="#icon-triangle-right"></use>
      </svg>
      <span class="iflex">Watch Video</span>
    </a>
  <?php endif; ?>

  </div>

</header>