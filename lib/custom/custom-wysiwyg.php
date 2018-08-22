<?php

/**
 * Adds the custom formats button back into tinymce
 *
 * @param  array $buttons The available buttons
 * @return array          The buttons to display
 */
function ll_new_mce_button( $buttons ) {
  array_unshift( $buttons, 'styleselect' );
  return $buttons;
}

add_filter( 'mce_buttons_2', 'll_new_mce_button' );


/**
 * adds custom formats to the formats selection
 * on the tinymce editor
 *
 * @param  array $data Tinymce data
 * @return array       Tinyce data
 */
function ll_format_tinymce( $data ) {
  $style_formats = array(
    array(
      'title'    => 'Font Families',
      'items'  => array(
        array(
          'title'    => 'Roboto',
          'classes'  => 'roboto',
          'selector' => 'h1, h2, h3, h4, h5, h6, p, a, span, li, time, dt, dd',
          'wrapper'  => false
        ),
        array(
          'title'    => 'Raleway',
          'classes'  => 'raleway',
          'selector' => 'h1, h2, h3, h4, h5, h6, p, a, span, li, time, dt, dd',
          'wrapper'  => false
        ),
      ),
    ),
    array(
      'title'    => 'Font Sizes',
      'items'  => array(
        array(
          'title'    => 'Heading 0',
          'classes'  => 'h0',
          'selector' => 'h1, h2, h3, h4, h5, h6, p, a, span, li, time, dt, dd',
          'wrapper'  => false
        ),
        array(
          'title'    => 'Heading 1',
          'classes'  => 'h1',
          'selector' => 'h1, h2, h3, h4, h5, h6, p, a, span, li, time, dt, dd',
          'wrapper'  => false
        ),
        array(
          'title'    => 'Heading 2',
          'classes'  => 'h2',
          'selector' => 'h1, h2, h3, h4, h5, h6, p, a, span, li, time, dt, dd',
          'wrapper'  => false
        ),
        array(
          'title'    => 'Heading 3',
          'classes'  => 'h3',
          'selector' => 'h1, h2, h3, h4, h5, h6, p, a, span, li, time, dt, dd',
          'wrapper'  => false
        ),
        array(
          'title'    => 'Heading 4',
          'classes'  => 'h4',
          'selector' => 'h1, h2, h3, h4, h5, h6, p, a, span, li, time, dt, dd',
          'wrapper'  => false
        ),
        array(
          'title'    => 'Heading 5',
          'classes'  => 'h5',
          'selector' => 'h1, h2, h3, h4, h5, h6, p, a, span, li, time, dt, dd',
          'wrapper'  => false
        ),
        array(
          'title'    => 'Heading 6',
          'classes'  => 'h6',
          'selector' => 'h1, h2, h3, h4, h5, h6, p, a, span, li, time, dt, dd',
          'wrapper'  => false
        ),
        array(
          'title'    => 'Large',
          'classes'  => 'text-large',
          'selector' => 'h1, h2, h3, h4, h5, h6, p, a, span, li, time, dt, dd',
          'wrapper'  => 'span'
        ),
        array(
          'title'    => 'Small',
          'classes'  => 'text-small',
          'selector' => 'h1, h2, h3, h4, h5, h6, p, a, span, li, time, dt, dd',
          'wrapper'  => 'span'
        ),
      ),
    ),
    array(
      'title'    => 'Font Cases',
      'items'  => array(
        array(
          'title'    => 'Default',
          'classes'  => 'text-default',
          'selector' => 'h1, h2, h3, h4, h5, h6, p, a, span, li, time, dt, dd',
          'wrapper'  => false
        ),
        array(
          'title'    => 'Uppercase',
          'classes'  => 'text-uppercase',
          'selector' => 'h1, h2, h3, h4, h5, h6, p, a, span, li, time, dt, dd',
          'wrapper'  => false
        ),
        array(
          'title'    => 'Lowercase',
          'classes'  => 'text-lowercase',
          'selector' => 'h1, h2, h3, h4, h5, h6, p, a, span, li, time, dt, dd',
          'wrapper'  => false
        ),
        array(
          'title'    => 'Capitalize',
          'classes'  => 'text-capitalize',
          'selector' => 'h1, h2, h3, h4, h5, h6, p, a, span, li, time, dt, dd',
          'wrapper'  => false
        ),
      ),
    ),
    array(
      'title'    => 'Font Weights',
      'items'  => array(
        array(
          'title'    => 'Unstyled',
          'classes'  => '',
          'selector' => 'h1, h2, h3, h4, h5, h6, p, a, span, li, time, dt, dd',
          'wrapper'  => false
        ),
        array(
          'title'    => 'Thin',
          'classes'  => 'text-thin',
          'selector' => 'h1, h2, h3, h4, h5, h6, p, a, span, li, time, dt, dd',
          'wrapper'  => false
        ),
        array(
          'title'    => 'Light',
          'classes'  => 'text-light',
          'selector' => 'h1, h2, h3, h4, h5, h6, p, a, span, li, time, dt, dd',
          'wrapper'  => false
        ),
        array(
          'title'    => 'Regular',
          'classes'  => 'text-reg',
          'selector' => 'h1, h2, h3, h4, h5, h6, p, a, span, li, time, dt, dd',
          'wrapper'  => false
        ),
        array(
          'title'    => 'Medium',
          'classes'  => 'text-med',
          'selector' => 'h1, h2, h3, h4, h5, h6, p, a, span, li, time, dt, dd',
          'wrapper'  => false
        ),
        array(
          'title'    => 'Bold',
          'classes'  => 'text-bold',
          'selector' => 'h1, h2, h3, h4, h5, h6, p, a, span, li, time, dt, dd',
          'wrapper'  => false
        ),
        array(
          'title'    => 'Black',
          'classes'  => 'text-black',
          'selector' => 'h1, h2, h3, h4, h5, h6, p, a, span, li, time, dt, dd',
          'wrapper'  => false
        ),
      ),
    ),
    array(
      'title' => 'Images',
      'items' => array(
        array(
          'title'    => 'No Shadow',
          'classes'  => 'no-shadow',
          'selector' => 'img, figure',
          'wrapper'  => false
        ),
      ),
    ),
    array(
      'title' => 'Buttons & Links',
      'items' => array(
        array(
          'title'    => 'Icon Link',
          'classes'  => 'icon-link',
          'selector' => 'a, button',
          'wrapper'  => false
        ),
        array(
          'title'    => 'Add Shadow',
          'classes'  => 'shadowed',
          'selector' => 'a, button',
          'wrapper'  => false
        ),
        array(
          'title'    => 'Button',
          'classes'  => 'btn',
          'selector' => 'a, button',
          'wrapper'  => false
        ),
        array(
          'title'    => 'Outlined Button',
          'classes'  => 'btn--outline',
          'selector' => 'a, button',
          'wrapper'  => false
        )
      ),
    ),
    array(
      'title' => 'Lists',
      'items' => array(
        array(
          'title'    => 'No Bullets',
          'classes'  => 'no-bullet',
          'selector' => 'ul, ol',
          'wrapper'  => false
        ),
        array(
          'title'    => 'Inline List',
          'classes'  => 'inline-list',
          'selector' => 'ul, ol',
          'wrapper'  => false
        ),
      ),
    ),
    array(
        'title' => 'Colors',
        'items' => array(
          array(
            'title'    => 'Black',
            'classes'  => 'black',
            'selector' => 'h1, h2, h3, h4, h5, h6, p, a, span, li, time, dt, dd, address, code',
            'wrapper'  => false
          ),
          array(
            'title'    => 'Ebony',
            'classes'  => 'ebony',
            'selector' => 'h1, h2, h3, h4, h5, h6, p, a, span, li, time, dt, dd, address, code',
            'wrapper'  => false
          ),
          array(
            'title'    => 'Coal',
            'classes'  => 'coal',
            'selector' => 'h1, h2, h3, h4, h5, h6, p, a, span, li, time, dt, dd, address, code',
            'wrapper'  => false
          ),
          array(
            'title'    => 'Battleship',
            'classes'  => 'battleship',
            'selector' => 'h1, h2, h3, h4, h5, h6, p, a, span, li, time, dt, dd, address, code',
            'wrapper'  => false
          ),
          array(
            'title'    => 'Grey',
            'classes'  => 'grey',
            'selector' => 'h1, h2, h3, h4, h5, h6, p, a, span, li, time, dt, dd, address, code',
            'wrapper'  => false
          ),
          array(
            'title'    => 'Aquamarine',
            'classes'  => 'aqua',
            'selector' => 'h1, h2, h3, h4, h5, h6, p, a, span, li, time, dt, dd, address, code',
            'wrapper'  => false
          ),
          array(
            'title'    => 'Aluminum',
            'classes'  => 'aluminum',
            'selector' => 'h1, h2, h3, h4, h5, h6, p, a, span, li, time, dt, dd, address, code',
            'wrapper'  => false
          ),
          array(
            'title'    => 'Silver',
            'classes'  => 'silver',
            'selector' => 'h1, h2, h3, h4, h5, h6, p, a, span, li, time, dt, dd, address, code',
            'wrapper'  => false
          ),
          array(
            'title'    => 'Powder',
            'classes'  => 'powder',
            'selector' => 'h1, h2, h3, h4, h5, h6, p, a, span, li, time, dt, dd, address, code',
            'wrapper'  => false
          ),
          array(
            'title'    => 'Ivory',
            'classes'  => 'ivory',
            'selector' => 'h1, h2, h3, h4, h5, h6, p, a, span, li, time, dt, dd, address, code',
            'wrapper'  => false
          ),
          array(
            'title'    => 'White',
            'classes'  => 'white',
            'selector' => 'h1, h2, h3, h4, h5, h6, p, a, span, li, time, dt, dd, address, code',
            'wrapper'  => false
          ),
        ),
    )
  );

  $data['style_formats'] = json_encode( $style_formats );

  $custom_colours = '
        "000000", "Black",
        "1F2021", "Ebony",
        "2A2B2C", "Coal",
        "403F3F", "Battleship",
        "DEDEDE", "Grey",
        "96C1CB", "Aqua",
        "9A9A9A", "Aluminum",
        "B2B3B7", "Silver",
        "F9F9F9", "Powder",
        "e1e1e1", "Ivory",
        "ffffff", "White"
    ';

    // build colour grid default+custom colors
  $data['textcolor_map'] = '['.$custom_colours.']';

  return $data;
}

add_filter( 'tiny_mce_before_init', 'll_format_tinymce' );

/**
 * add visual button
 * for added tinymce plugins
 */
function add_tiny_mce_plugins_button( $buttons ) {
   array_push( $buttons, 'anchor' );
   return $buttons;
}
add_filter( 'mce_buttons', 'add_tiny_mce_plugins_button' );

/**
 * Add tinymce plugins assuming they live in
 * /lib/tinymce
 */
function add_tinymce_plugins( $plugins ) {
    $plugins['anchor'] = get_template_directory_uri() . '/lib/tinymce/anchor/plugin.min.js';
    return $plugins;
}
add_filter( 'mce_external_plugins', 'add_tinymce_plugins' );