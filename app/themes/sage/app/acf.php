<?php

namespace App;

if ( class_exists('ACF') ) {
  if ( current_user_can('administrator') ) {

    if ( function_exists('acf_add_options_page') ) {
      acf_add_options_page([
        'page_title' => __('Theme Options'),
        'menu_title' => __('Theme Options'),
        'menu_slug'  => 'theme-options',
        'capability'	=> 'manage_options',
        'icon_url'   => 'dashicons-admin-site-alt3',
        'redirect'   => false
      ]);

      acf_add_options_sub_page([
        'page_title'  => __('Page Components'),
        'menu_title'  => __('Page Components'),
        'parent_slug' => 'theme-options'
      ]);
    }
  }
}
