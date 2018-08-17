<?php
  $form_id = ( get_field('form_id') ? get_field('form_id') : 1 );
?>
<article <?php post_class(); ?>>

<?php if( is_plugin_active( 'gravityforms/gravityforms.php' ) ) : ?>

  <?php gravity_form( $form_id, true, true ); ?>

<?php endif; ?>

<?php
  $locations = array(
    'heading'       => get_field('location_grid_heading'),
    'content'       => get_field('location_grid_content'),
    'num_locations' => get_field('location_grid_num_locations')
  );

  ll_include_component(
    'location-grid',
    $locations
  );
?>
<!-- .form-skin -->
</article>