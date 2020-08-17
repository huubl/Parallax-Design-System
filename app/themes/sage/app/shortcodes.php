<?php

namespace App;

// Testimonials

add_shortcode('testimonials', function( $atts ) {
  extract(shortcode_atts([
    'limit' => 4,
  ], $atts));

  $query = new \WP_Query([
    'post_type'      => 'testimonials',
    'posts_per_page' => !is_admin() ? (int) $limit : 1
  ]);

  if ( $query->have_posts() ) {
    return \App\template('partials.shortcodes.testimonials', ['posts' => $query->posts]);
  }

  return;
});

// rows & columns

add_shortcode('row', function( $atts, $content = null ) {
  return '<div class="row flex -mx-buffer">'.do_shortcode($content).'</div>';
});

add_shortcode('column', function( $atts, $content = null ) {
  extract(shortcode_atts([
    'width' => '1/2',
  ], $atts));

  return '<div class="column w-full md:w-'.$width.' px-buffer">'.do_shortcode($content).'</div>';
});


// Card Style

add_shortcode('cards', function( $atts, $content = null ) {
  return '<div class="cards">'.do_shortcode($content).'</div>';
});

add_shortcode('card', function( $atts, $content = null ) {
  extract(shortcode_atts([
    'width' => '1/2',
  ], $atts));

  return '<div class="card bg-primary-5 px-buffer text-white">'.do_shortcode($content).'<a href="/reservations/" class="button button--primary">Book now</a></div>';
});

// Special Card
add_shortcode('special', function( $atts, $content = null ) {
  return '<div class="special text-white">'.do_shortcode($content).'</div>';
});
