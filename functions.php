<?php
/**
 * Roots includes
 *
 * The $roots_includes array determines the code library included in your theme.
 * Add or remove files to the array as needed. Supports child theme overrides.
 *
 * Please note that missing files will produce a fatal error.
 *
 */
$roots_includes = array(
  'lib/utils.php',            // Utility functions
  'lib/init.php',             // Initial theme setup and constants
  'lib/wrapper.php',          // Theme wrapper class
  'lib/sidebar.php',          // Sidebar class
  'lib/widgets.php',          // Widgets class
  'lib/config.php',           // Configuration
  'lib/activation.php',       // Theme activation
  'lib/titles.php',           // Page titles
  'lib/nav.php',              // Custom nav modifications
  'lib/gallery.php',          // Custom [gallery] modifications
  'lib/scripts.php',          // Scripts and stylesheets
  'lib/extras.php',           // Custom functions

  'lib/tgm/required-plugins.php',   // Required plugins
  'lib/metabox/main.php',           // ACF Metabox Settings
  'lib/custom/main.php',            // Custom functions
  'lib/cpt/main.php',               // Custom post type module
);

foreach ($roots_includes as $file) {
  if (!$filepath = locate_template($file)) {
    trigger_error(sprintf(__('Error locating %s for inclusion', 'roots'), $file), E_USER_ERROR);
  }
  require_once $filepath;
}
unset($file, $filepath);
