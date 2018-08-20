<?php
/**
* filters
* -----------------------------------------------------------------------------
*
* filters component
*/

$defaults = [
  'taxonomy' => false
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

$component_id   = uniqid('filters-');
$tax            = $component_data['taxonomy'];
$terms          = get_terms( $tax );

?>

<?php if ( ll_empty( $component_data ) ) return; ?>
<nav class="entry__meta ll-filters<?php echo implode( " ", $classes ); ?>"<?php echo ( $component_id ? ' id="'.$component_id.'"' : '' ) ?> data-component="filters">

  <div class="container row start centered">

    <div class="entry__header col col-md-3of12 col-lg-2of12">

      <h5 class="entry__headline">Filter</h5>
      <!-- .entry__headline -->

    </div>
    <!-- .entry__header -->

    <?php if ($terms) : ?>

    <form class="card-grid__form col col-md-9of12 col-lg-10of12" action="./">

      <ul class="filters__list inline-list">

        <li class="filters__item">
          <label for="all_posts">All Posts</label>
          <input type="radio" id="all_posts" name="filterables" class="entry__meta_category" value="">
        </li>

      <?php foreach($terms as $filter) : ?>
        <li class="filters__item">
          <label for="<?php echo $filter->slug; ?>"><?php echo $filter->name; ?></label>
          <input type="radio" id="<?php echo $filter->slug; ?>" name="filterables" class="entry__meta_category" value="<?php echo $filter->slug; ?>">
        </li>
      <?php endforeach; ?>

      </ul>
    </form>
    <!-- .card-grid__form -->

    <?php endif;?>

  </div>

</nav>