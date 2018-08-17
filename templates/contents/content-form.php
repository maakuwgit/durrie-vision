<?php
  $form_id = ( get_field('form_id') ? get_field('form_id') : 1 );
?>
<article <?php post_class(); ?>>

<?php if( is_plugin_active( 'gravityforms/gravityforms.php' ) ) : ?>

  <?php gravity_form( $form_id, true, true ); ?>

<?php endif; ?>
<!-- .form-skin -->

</article>