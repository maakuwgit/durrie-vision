<?php
  $pfid = get_field('team_archive_page', 'option');

  $hero = array(
    'supertitle'  => get_field('hero_supertitle', $pfid),
    'heading'     => get_field('hero_heading', $pfid),
    'content'     => get_field('hero_content', $pfid),
    'button'      => get_field('hero_button', $pfid),
    'image'       => get_field('hero_image', $pfid),
    'overlay'     => get_field('overlay_strength', $pfid),
    'video'       => get_field('hero_video', $pfid)
  );

  var_dump(get_the_post_thumbnail( $pfid ));

  ll_include_component(
    'hero',
    $hero
  );
?>