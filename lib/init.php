<?php
/**
 * Roots initial setup and constants
 */
function roots_setup() {
  // Enable plugins to manage the document title
  // http://codex.wordpress.org/Function_Reference/add_theme_support#Title_Tag
  add_theme_support('title-tag');

  // Register wp_nav_menu() menus
  // http://codex.wordpress.org/Function_Reference/register_nav_menus
  register_nav_menus(array(
    'primary_navigation' => __('Primary Navigation', 'roots'),
    'secondary_navigation' => __('Secondary Navigation', 'roots'),
    'footer_navigation' => __('Footer Navigation', 'roots')
  ));

  // Add post thumbnails
  // http://codex.wordpress.org/Post_Thumbnails
  // http://codex.wordpress.org/Function_Reference/set_post_thumbnail_size
  // http://codex.wordpress.org/Function_Reference/add_image_size
  add_theme_support('post-thumbnails');

  // Add post formats
  // http://codex.wordpress.org/Post_Formats
  // add_theme_support('post-formats', array('aside', 'gallery', 'link', 'image', 'quote', 'video', 'audio'));

  // Add HTML5 markup for captions
  // http://codex.wordpress.org/Function_Reference/add_theme_support#HTML5
  add_theme_support('html5', array('caption','gallery', 'comment-form', 'comment-list'));

  // Tell the TinyMCE editor to use a custom stylesheet
  add_editor_style('/assets/css/editor-style.css');
}
add_action('after_setup_theme', 'roots_setup');


/**
 * Register Widgets
 */
// registers the Social List widget
function register_social_list_widget() {
    register_widget( 'Social_List_Widget' );
}
add_action( 'widgets_init', 'register_social_list_widget' );

/**
 * Register sidebars
 */
function roots_widgets_init() {
  // Primary
  register_sidebar(array(
    'name'          => __('Primary', 'roots'),
    'id'            => 'sidebar-primary',
    'before_widget' => '<aside class="widget %1$s %2$s">',
    'after_widget'  => '</aside>',
    'before_title'  => '<a class="coin" href="',
    'after_title'   => '"><svg class="icon icon-facebook"><use xlink:href="#icon-facebook"></use></svg></a>',
  ));
}
add_action('widgets_init', 'roots_widgets_init');
