<?php
/**
* doctor-grid
* -----------------------------------------------------------------------------
*
* doctor-grid component
*/

$defaults = [
  'num_doctors' => -1
];

$args = [
  'id'      => uniqid('doctor-grid-'),
  'classes' => array(),
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
$showposts     = $component_data['num_doctors'];

$margs = array(
  'posts_per_page' => $showposts,
  'order'          => 'ASC',
  'orderby'        => 'menu_order',
  'post_status'    => 'publish',
  'post_type'      => 'doctor',
);

$doctors = new WP_Query( $margs );

?>

<?php if( !$doctors->have_posts() ) return; ?>
<section class="ll-doctor-grid <?php echo implode( " ", $classes ); ?>" <?php echo ( $component_id ? 'id="'.$component_id.'"' : '' ) ?> data-component="doctor-grid">

  <div class="container row centered">

  <?php if( $heading  ) : ?>
    <<?php echo $heading['tag']; ?> class="col col-md-6of12 col-lg-4of12 col-xl-4of12 col-xxl-4of12 doctor-grid__heading"><?php echo $heading['text']; ?></<?php echo $heading['tag']; ?>><!-- .col-md-6of12.col-lg-4of12.col-xl-4of12.col-xxl-4of12.doctor-grid__heading -->
  <?php endif; ?>

  <?php if( $content  ) : ?>
    <div class="col col-md-10of12 col-lg-7of12 col-xl-7of12 col-xxl-7of12 doctor-grid__content">
      <?php echo format_text($content); ?>
    </div><!-- .col-md-10of12.col-lg-8of12.col-xl-8of12.col-xxl-8of12.doctor-grid__content -->
  <?php endif; ?>

  </div><!-- .container.row.centered -->

  <?php
    $num_doctors = wp_count_posts('doctor');
    $num_doctors = $num_doctors->publish;

    while ( $doctors->have_posts() ) : $doctors->the_post();

    $positions  = get_the_terms(get_the_ID(), 'position');
    $expertises    = get_the_terms(get_the_ID(), 'expertise');

  ?>

  <div class="container row between centered doctor-grid__item" data-clickthrough>
    <a class="doctor-grid__anchor col col-sm-6of12 col-offset-md-1of12 col-md-5of12 col-offset-lg-1of12 col-lg-4of12 col-offset-xl-1of12 col-xl-4of12" href="<?php the_permalink(); ?>">About ></a>

    <figure id="<?php echo basename(get_permalink()); ?>" class="doctor-grid__thumb__figure relative col col-sm-6of12 col-md-6of12 col-lg-7of12 col-xl-7of12">
      <a href="<?php the_permalink(); ?>" data-magnific></a>

      <div class="doctor-grid__image" data-backgrounder>
        <div class="feature">
          <?php the_post_thumbnail(); ?>
        </div>
      </div><!-- .doctor-grid__thumb_image -->

    </figure>

    <div class="doctor-grid__image__caption col col-sm-6of12 col-offset-md-1of12 col-md-5of12 col-offset-lg-1of12 col-lg-4of12 col-offset-xl-1of12 col-xl-4of12">

      <span class="doctor-grid__caption__title block"><?php the_title(); ?></span>

    <?php if( $positions && ! is_wp_error( $positions ) ) : ?>

      <span class="doctor-grid__caption__position block">

      <?php
        $position_names = [];

        foreach( $positions as $position ) {
          $position_names[] = $position->name;
        }

        $position_list = join(', ', $position_names);

        echo $position_list;
      ?>

      </span><!-- .doctor-grid__thumb__position -->

    <?php endif; ?>

    <?php if( $expertises && ! is_wp_error( $expertises ) ) : ?>

      <span class="doctor-grid__caption__expertise block">

      <?php
        $expertise_names = [];

        foreach( $expertises as $expertise ) {
          $expertise_names[] = $expertise->name;
        }

        $expertise_list = join(', ', $expertise_names);

        echo $expertise_list;
      ?>

      </span><!-- .doctor-grid__thumb__expertise -->

    <?php endif; ?>
    </div><!-- .doctor-grid__thumb__caption -->

  </div><!-- .container -->
  <?php endwhile; ?>
  <?php wp_reset_postdata(); ?>

</section>