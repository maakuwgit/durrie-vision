<?php
/**
* counters
* -----------------------------------------------------------------------------
*
* counters component
*/

$default_data = [
  'heading'       => false,
  'subheading'    => false,
  'content'       => false,
  'columns'       => false
];

$default_args = [
  'id' => uniqid('counters-'),
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
$id   = $component_args['id'];

if( $component_data['subheading'] ) {
  $subheading      = $component_data['subheading']['text'];
  $subheading_tag  = $component_data['subheading']['tag'];
}else{
  $subheading = false;
}

if( $component_data['heading'] ) {
  $heading         = $component_data['heading']['text'];
  $heading_tag     = $component_data['heading']['tag'];
}else{
  $heading = false;
}

$columns = $component_data['columns'];

$colspan = ( $columns > 0 ? 12/sizeof($columns) : 12 );
$col_css = ' class="col col-md-'.$colspan.'of12 col-lg-'.$colspan.'of12 col-xl-'.$colspan.'of12"';
?>
<section class="ll-counters<?php echo $classes; ?>"<?php echo $id; ?> data-component="counters">

  <div class="container">

    <div class="row center centered text-center">

    <?php if( $heading ) : ?>

      <<?php echo $heading_tag; ?> class="counters__heading col">
        <?php echo $heading; ?>
      </<?php echo $heading_tag; ?>>
      <!-- .counters__heading -->

    <?php endif; ?>

    <?php if( $subheading ) : ?>

      <<?php echo $subheading_tag; ?> class="counters__subheading col col-md-4of12 col-lg-4of12 col-xl-4of12">
        <?php echo $subheading; ?>
      </<?php echo $subheading_tag; ?>>
      <!-- .counters_subheading -->

    <?php endif; ?>

    <?php if( $content ) : ?>

      <div class="counters-content">
        <?php echo ll_format_text($content); ?>
      </div>
      <!-- .counters-content -->

    <?php endif; ?>

  </div>
  <!-- .row -->

  <?php if( $columns ) : ?>
    <dl class="counters__column__list row center centered text-center">

    <?php foreach( $columns as $column ) : ?>
      <div<?php echo $col_css; ?>>

        <dt class="counters__column__title"><?php echo $column['title'];?></dt>
        <!-- .counters__column__title -->

        <dd class="counters__column__description"><?php echo $column['caption'];?></dd>
        <!-- .counters__column__description -->

      </div>
    <?php endforeach; ?>

    </dl>
    <!-- .row -->
  <?php endif; ?>
  </div>
  <!-- .container -->

</aside>