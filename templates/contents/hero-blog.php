<?php
  $cat   = get_queried_object();
  $pfid = get_option( 'page_for_posts' );

  if( !is_archive() ){
    $heading   = get_field('hero_heading', $pfid);
  }else{
    $heading      = array(
      'text' => $cat->name,
      'tag'  => 'h2'
    );
  }

  $hero = array(
    'supertitle'  => get_field('hero_supertitle', $pfid ),
    'heading'     => $heading,
    'image'       => get_field('hero_image', $pfid )
  );

  ll_include_component(
    'hero',
    $hero,
    array(
      'classes' => array('big-headline')
    )
  );
?>