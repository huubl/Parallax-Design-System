<?php
/**
* Plugin Name:     Portfolio
* Plugin URI:
* Description:     Various client based functions: custom post types, shortcode, etc
* Version:         9.0.0
* Author:          Andrew Munoz
* Author URI:
* License:         MIT
* License URI:     http://opensource.org/licenses/MIT
*/

///Coyote Ranch

function capital_portfolio() {

  $labels = array(
    'name'                => __( 'Portfolio'),
    'singular_name'       => __( 'Portfolio' ),
    'menu_name'           => __( 'Portfolio'),
    'parent_item_colon'   => __( 'Portfolio'),
    'all_items'           => __( 'All Portfolio Listings' ),
    'view_item'           => __( 'View Portfolio Item'),
    'add_new_item'        => __( 'Add New Portfolio Listing'),
    'add_new'             => __( 'Add New Portfolio Listing' ),
    'edit_item'           => __( 'Edit Portfolio Listing' ),
    'update_item'         => __( 'Update Portfolio' ),
    'search_items'        => __( 'Search Portfolio'),
    'not_found'           => __( 'Not Found' ),
    'not_found_in_trash'  => __( 'Not found in Trash' ),
  );

  $args = array(
    'label'               => __( 'Portfolio'),
    'description'         => __( 'Portfolio Listings'),
    'labels'              => $labels,
    'supports'            => array( 'title', 'editor', 'thumbnail', 'custom-fields', ),
    'taxonomies'          => array( 'genres' ),
    'hierarchical'        => false,
    'public'              => true,
    'has_archive'         => false,
    'show_ui'             => true,
    'show_in_menu'        => true,
    'show_in_nav_menus'   => true,
    'show_in_admin_bar'   => true,
    'menu_position'       => 15,
    'can_export'          => true,
    'exclude_from_search' => false,
    'publicly_queryable'  => true,
    'capability_type'     => 'page',
    'menu_icon' => plugins_url( 'images/property.png', __FILE__ ),
  );

  register_post_type( 'capital-portfolio', $args );

  add_rewrite_rule( '(.?.+?)/page/?([0-9]{1,})/?$', 'index.php?pagename=$matches[1]&paged=$matches[2]', 'top' );

}

add_action( 'init', 'capital_portfolio', 0 );
