<?php

namespace App;

/**
* Force Gravity Form to scroll to form top position upon submission
*/
add_filter('gform_confirmation_anchor', '__return_true');



/**
 * Modify Allowed Media Mime Types
 */
add_filter('upload_mimes', function( $mimes ) {
    $mimes['svg'] = 'image/svg+xml';

    return $mimes;
});

/**
 * Custom image sizes
 *
 * @link    https://developer.wordpress.org/reference/functions/add_image_size/
 *
 * e.g. add_image_size('w800x400', 800, 400, true)
 */

$custom_sizes = [
    'w1920x562' => [1920, 562, true],
    'w1920x800'  => [1920, 800, true],
    'w960x800'  => [960, 800, true],
    'w960x562'  => [960, 562, true],
    'w768x1024'  => [768, 1024, true],
    'w460x460'  => [460, 460, true],
    'w465x428'  => [465, 328, true],

    'w150x150'  => [150, 150, true],
    'w680x510'  => [680, 510, true],
];

if ( !empty($custom_sizes) ) {
    foreach ( $custom_sizes as $key => $custom_size ) {
        add_image_size($key, $custom_size[0], $custom_size[1], $custom_size[2]);
    }
}

/**
* Add custom image sizes to media library
*
* @link    https://codex.wordpress.org/Plugin_API/Filter_Reference/image_size_names_choose
* @param   array   $sizes
*/
add_filter('image_size_names_choose', function($sizes) {
  $addsizes = [
    'w460x460' => __('Gallery'),
  ];

  $newsizes = array_merge($sizes, $addsizes);

  return $newsizes;
});
