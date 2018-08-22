<?php
if( have_rows( 'components' ) ) {
  //We're gonna dump it into a string, so let's define it
  $components = '';

  while( have_rows( 'components' ) ) {
    the_row();

    switch( get_row_layout() ) {
      case 'blog-grid' :
        //
        $posts = array(
          'num_posts'   => get_sub_field('blog-grid_num_posts'),
        );

        $components .= ll_include_component(
          'blog-grid',
          $posts,
          array(
            'classes' => array(
              get_sub_field('color')
            )
          ),
          true
        );
      break;
      case 'call-to-action':

        $cta = array(
          'supertitle'  => get_sub_field('cta_supertitle'),
          'heading'     => get_sub_field('cta_heading'),
          'content'     => get_sub_field('cta_content'),
          'links'       => get_sub_field('cta_links'),
          'image'       => get_sub_field('cta_background'),
          'overlay'     => get_sub_field('cta_overlay_strength')
        );

        $components .= ll_include_component(
          'call-to-action',
          $cta,
          array(
            'classes' => array(
              get_sub_field('color')
            )
          ),
          true
        );
      break;
      case 'counters' :
        //Finanacing
        $counters = array(
          'heading'     => get_sub_field('counters_heading'),
          'subheading'  => get_sub_field('counters_subheading'),
          'content'     => get_sub_field('counters_content'),
          'columns'     => get_sub_field('counters_columns')
        );

        $components .= ll_include_component(
          'counters',
          $counters,
          array(
            'classes' => array(
              get_sub_field('color')
            )
          ),
          true
        );
      break;
      case 'fullwidth-image' :
        //
        $image = array(
          'image' => get_sub_field('fullwidth_image')
        );

        $components .= ll_include_component(
          'fullwidth-image',
          $image,
          array(
            'classes' => array(
              get_sub_field('color')
            )
          ),
          true
        );
      break;
      case 'hero' :
        //Default Template, Form Template, Archives
        $hero = array(
          'supertitle'  => get_sub_field('hero_supertitle'),
          'heading'     => get_sub_field('hero_heading'),
          'image'       => get_sub_field('hero_image'),
          'video'       => get_sub_field('hero_video'),
          'overlay'     => get_sub_field('overlay_strength')
        );

        $components .= ll_include_component(
          'hero',
          $hero,
          array(
            'classes' => array(
              get_sub_field('color')
            )
          ),
          true
        );
      break;
      case 'lr-block' :
        //Home, Services, New Buses, All Locations
        $block = array(
          'style'       => get_sub_field('lr_blocks_style'),
          'image'       => get_sub_field('lr_blocks_image'),
          'content'     => get_sub_field('lr_blocks_content')
        );

        $components .= ll_include_component(
          'lr-blocks',
          $block,
          array(
            'classes' => array(
              get_sub_field('color')
            )
          ),
          true
        );
      break;
      case 'lr-w-background' :
        //Home
        $block = array(
          'style'       => get_sub_field('lr_w_background_style'),
          'image'       => get_sub_field('lr_w_background_image'),
          'overlay'     => get_sub_field('lr_w_background_overlay_strength'),
          'content'     => get_sub_field('lr_w_background_content'),
        );

        $components .= ll_include_component(
          'lr-w-background',
          $block,
          array(
            'classes' => array(
              get_sub_field('color')
            )
          ),
          true
        );
      break;
      case 'icon-grid' :
        //About Us”
        $icons = array(
          'layout'    => get_sub_field('icon_grid_layout'),
          'heading'   => get_sub_field('icon_grid_heading'),
          'content'   => get_sub_field('icon_grid_content'),
          'icons'     => get_sub_field('icon_grid_icons')
        );

        $components .= ll_include_component(
          'icon-grid',
          $icons,
          array(
            'classes' => array(
              get_sub_field('color')
            )
          ),
          true
        );
      break;
      case 'image-grid' :
        //About Us”
        $images = array(
          'heading' => get_sub_field('image_grid_heading'),
          'images'  => get_sub_field('image_grid_images')
        );

        $components .= ll_include_component(
          'image-grid',
          $images,
          array(
            'classes' => array(
              get_sub_field('color')
            )
          ),
          true
        );
      break;
      case 'image-slider' :
        //Financing
        $slides = array(
          'slides'      => get_sub_field('image_slider_slides')
        );

        $components .= ll_include_component(
          'image-slider',
          $slides,
          array(
            'classes' => array(
              get_sub_field('color')
            ),
            'nav_id'  => uniqid('image-slider__nav-')
          ),
          true
        );
      break;
      case 'inline-form' :
        //Event Space
        $form = array(
          'image'   => get_sub_field('inline-form_image'),
          'form_id' => get_sub_field('inline-form_id')
        );

        $components .= ll_include_component(
          'inline-form',
          $form,
          array(
            'classes' => array(
              get_sub_field('color')
            )
          ),
          true
        );
      break;
      case 'location-grid' :
        //Form Template, Services
        $locations = array(
          'heading'       => get_sub_field('location_grid_heading'),
          'content'       => get_sub_field('location_grid_content'),
          'num_locations' => get_sub_field('location_grid_number')
        );

        $components .= ll_include_component(
          'location-grid',
          $locations,
          array(
            'classes' => array(
              get_sub_field('color')
            )
          ),
          true
        );
      break;
      case 'location_map' :
        //Form Template
        $locations = array(
          'heading'       => get_sub_field('map_heading'),
          'content'       => get_sub_field('map_content'),
          'locations'     => get_sub_field('map_locations')
        );

        $components .= ll_include_component(
          'location-map',
          $locations,
          array(
            'classes' => array(
              get_sub_field('color')
            )
          ),
          true
        );
      break;
      case 'logo_grid' :
        //Form Template, Services
        $logos = array(
          'heading'       => get_sub_field('logo_grid_heading'),
          'content'       => get_sub_field('logo_grid_content'),
          'logos'         => get_sub_field('logo_grid_logos')
        );

        $components .= ll_include_component(
          'logo-grid',
          $logos,
          array(
            'classes' => array(
              get_sub_field('color')
            )
          ),
          true
        );
      break;
      case 'doctor_grid' :
        //About Us”
        $members = array(
          'heading'     => get_sub_field('doctors_grid_image'),
          'content'  => get_sub_field('doctors_grid_content'),
          'num_members' => get_sub_field('num_doctors')
        );

        $components .= ll_include_component(
          'doctor-grid',
          $doctors,
          array(
            'classes' => array(
              get_sub_field('color')
            )
          ),
          true
        );
      break;
      case 'photo-stack-w-content' :
        //Home, About
        $stack = array(
          'heading'     => get_sub_field('photo-stack_heading'),
          'subheading'  => get_sub_field('photo-stack_subheading'),
          'content'     => get_sub_field('photo-stack_content'),
          'button'      => get_sub_field('photo-stack_button'),
          'images'      => get_sub_field('photo-stack_images'),
          'caption'     => get_sub_field('photo-stack_caption')
        );

        $components .= ll_include_component(
          'photo-stack-w-content',
          $stack,
          array(
            'classes' => array(
              get_sub_field('color')
            )
          ),
          true
        );
      break;
      case 'procedures-grid' :
        //
        $procedures = array(
          'heading'     => get_sub_field('procedures_heading'),
          'num_cards'  => get_sub_field('num_cards')
        );

        $components .= ll_include_component(
          'procedures-grid',
          $procedures,
          array(
            'classes' => array(
              get_sub_field('color')
            )
          ),
          true
        );
      break;
      case 'three-col-w-heading' :
        //Home, About, all Locations
        $blocks = array(
          'heading'     => get_sub_field('three_col_heading_heading'),
          'content' => get_sub_field('three_col_heading_content'),
          'column_1' => get_sub_field('three_col_heading_content_1'),
          'column_2' => get_sub_field('three_col_heading_content_2'),
          'column_3' => get_sub_field('three_col_heading_content_3')
        );

        $components .= ll_include_component(
          'three-col-w-heading',
          $blocks,
          array(
            'classes' => array(
              get_sub_field('color')
            )
          ),
          true
        );
      break;
      case 'timeline' :
        //Home
        $milestones = array(
          'milestones' => get_sub_field('timeline_milestones')
        );

        $components .= ll_include_component(
          'timeline',
          $milestones,
          array(
            'classes' => array(
              get_sub_field('color')
            )
          ),
          true
        );
      break;
      case 'teaser' :
        //About Us, Meet the Doctors, Financing
        $teaser = array(
          'icon'      => get_sub_field('icon'),
          'heading'     => get_sub_field('teaser_heading'),
          'content'      => get_sub_field('teaser_content')
        );

        $components .= ll_include_component(
          'teaser',
          $teaser,
          array(
            'classes' => array(
              get_sub_field('color')
            )
          ),
          true
        );
      break;
      case 'three-col' :
        //Home, About, all Locations
        $columns = array(
          'column_1' => get_sub_field('three_col_content_1'),
          'column_2' => get_sub_field('three_col_content_2'),
          'column_3' => get_sub_field('three_col_content_3')
        );

        $components .= ll_include_component(
          'three-col',
          $columns,
          array(
            'classes' => array(
              get_sub_field('color')
            )
          ),
          true
        );
      break;
      case 'two-col' :
        //Home, About, all Locations
        $blocks = array(
          'column_1' => get_sub_field('two_col_column_1'),
          'column_2' => get_sub_field('two_col_column_2')
        );

        $components .= ll_include_component(
          'two-col',
          $blocks,
          array(
            'classes' => array(
              get_sub_field('color')
            )
          ),
          true
        );
      break;
      case 'two-col-w-icons' :
        //About Us”
        $images = array(
          'style'      => get_sub_field('two_col_icons_style'),
          'type'       => get_sub_field('two_col_icons_type'),
          'content'    => get_sub_field('two_col_icons_content'),
          'has_bg'     => get_sub_field('two_col_icons_background'),
          'list'       => get_sub_field('two_col_icons_list')
        );

        $components .= ll_include_component(
          'two-col-w-icons',
          $images,
          array(
            'classes' => array(
              get_sub_field('color')
            )
          ),
          true
        );
      break;
      default:
      break;
    }
  }
  echo $components;
}
?>
<?php // wp_link_pages(array('before' => '<nav class='pagination'>', 'after' => '</nav>')); ?>
