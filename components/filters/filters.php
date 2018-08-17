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

  <div class="container row between centered">

    <div class="col-lg-4of12 entry__header">

      <h5 class="entry__headline">Filter by Category</h5>
      <!-- .entry__headline -->

    </div>
    <!-- .entry__header -->

    <?php if ($terms) : ?>

    <form class="card-grid__form col-lg-4of12" action="./">

      <div class="entry__filters">

      <label class="entry__filters__label">Filter by Category

        <select class="entry__filters__select card-grid__select">
          <option class="entry__meta_category" value="">Unfiltered</option>
        <?php foreach($terms as $filter) : ?>

          <option class="entry__meta_category" value="<?php echo $filter->slug; ?>"><?php echo $filter->name; ?></option>
            <!-- .entry__meta_category -->

        <?php endforeach; ?>
        </select>
        <!-- .entry__filters__select -->

      </label>
      <!-- .entry__filters__label -->

      </div>
      <!-- .col-lg-4of12 entry__filters -->

    </form>
    <!-- .card-grid__form -->

    <?php endif;?>

  </div>

</nav>