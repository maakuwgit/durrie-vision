<?php
/**
* procedures-grid
* -----------------------------------------------------------------------------
*
* procedures-grid component
*/

$defaults = [
  'heading'   => false,
  'num_cards' => -1,
];

$component_data = ll_parse_args( $component_data, $defaults );
?>

<?php
/**
 * Any additional classes to apply to the main component container.
 *
 * @var array
 * @see args['classes']
 */
$classes        = $component_args['classes'] ?: array();

/**
 * ID to apply to the main component container.
 *
 * @var array
 * @see args['id']
 */
$component_id   = $component_args['id'];

/**
 * ACF values pulled into the component from the components.php partial.
 */

if( $component_data['heading'] ) {
  $heading         = $component_data['heading']['text'];
  $heading_tag     = $component_data['heading']['tag'];
}else{
  $heading = false;
}

$showposts      = $component_data['num_cards'];

$args = array(
          'post_type'     => 'procedure',
          'post_status'   => 'publish',
          'order'         => 'ASC',
          'showposts'     => $showposts
        );

$procedures     = new WP_Query( $args );
$num_procedures = wp_count_posts('procedure');
$num_procedures = $num_procedures->publish;

?>

<?php if ( $procedures->have_posts() ) : ?>
<section class="ll-procedures-grid <?php echo implode( " ", $classes ); ?>" <?php echo ( $component_id ? 'id="'.$component_id.'"' : '' ) ?> data-component="procedures-grid">

  <div class="container row centered stretch">

  <?php if( $heading ) : ?>
    <header class="procedure-grid__heading col text-center">
      <h2><?php echo $heading; ?></h2>
    </header><!-- .procedure-grid__heading -->
  <?php endif; ?>

    <?php
    while( $procedures->have_posts() ) :

      $procedures->the_post();
      $conditions  = get_the_terms(get_the_ID(), 'condition');
      $age_ranges  = get_the_terms(get_the_ID(), 'age_range');
      $icon = get_field('teaser_icon');
      $title = get_field('hero_heading');

      if( $title['text']) {
        $title = $title['text'];
      }else{
        $title = get_the_title();
      }

    ?>

      <div class="procedure-grid__procedure_wrapper col col-sm-6of12 col-md-3of12 col-lg-3of12 col-xl-3of12">

        <div class="procedure-grid__procedure text-center" data-clickthrough>
          <a class="hide" href="<?php the_permalink(); ?>"></a>
        <?php if( $icon ) : ?>

          <div class="procedure-grid__procedure__icon">

            <svg class="icon <?php echo $icon['icon']; ?>">
              <use xlink:href="#<?php echo $icon['icon']; ?>">
            </svg>

          </div><!-- .procedure-grid__procedure__icon -->

        <?php endif; ?>

          <h4 class="procedure-grid__procedure__title"><?php echo $title; ?></h4>
          <!-- .procedure-grid__procedure__title -->

        <?php if( $conditions && ! is_wp_error( $conditions ) ) : ?>
          <div class="procedure-grid__procedure__body">
          <?php
            $condition_names = [];

            foreach( $conditions as $condition ) {
              if($condition->parent) {
                $parent  = get_the_category_by_ID($condition->parent, 'condition');
                $condition_names[] = $condition->name . ' ' . $parent;
              }else{
                $parent = false;
                $condition_names[] = $condition->name;
              }
            }

            $condition_list = join(', ', $condition_names);

            echo format_text($condition_list);
          ?>
          </div>
          <!-- .procedure-grid__procedure__body -->
        <?php endif; ?>

        <?php if( $age_ranges && ! is_wp_error( $age_ranges ) ) : ?>
          <div class="procedure-grid__procedure__meta row">
            <svg class="icon icon-user">
              <use xlink:href="#icon-user"></use>
            </svg>
          <?php
            $age_range_list = '';
            $age_range_names = $age_range_slugs = [];

            foreach( $age_ranges as $age_range ) {
              $age_range_names[] = $age_range->name;
              $age_range_slugs[] = $age_range->slug;
            }

            foreach( $age_range_names as $a => $age_range_name ) {
              $age_range_list .= $age_range_name . ': ' . $age_range_slugs[$a];
            }

            echo format_text($age_range_list);
          ?>
          </div>
          <!-- .procedure-grid__procedure__meta -->
        <?php endif; ?>

        </div>

      </div><!-- .procedure-grid__procedure -->

    <?php endwhile; ?>
    <?php wp_reset_postdata(); ?>

    <?php if( $num_procedures > $showposts && $showposts != -1 ) : ?>
    <nav class="procedure-grid__nav">
      <a class="btn" href="<?php echo get_bloginfo('url') . '/procedures'; ?>">View all</a>
    </nav><!-- .procedure-grid__nav -->
    <?php endif; ?>

  </div><!-- .container.row.centered.between -->

</section>
<?php endif; ?>