<?php
/**
* Plugin Name:     Our Team
* Plugin URI:
* Description:     Various client based functions: custom post types, shortcode, etc
* Version:         1.0.0
* Author:          Andrew Munoz
* Author URI:
* License:         MIT
* License URI:     http://opensource.org/licenses/MIT
*/

///Coyote Ranch

function member_title_post() {

  $labels = array(
    'name'                => __( 'Member Roster'),
    'singular_name'       => __( 'Member Roster' ),
    'menu_name'           => __( 'Member Roster'),
    'parent_item_colon'   => __( 'Parent Member'),
    'all_items'           => __( 'All Members' ),
    'view_item'           => __( 'View Member'),
    'add_new_item'        => __( 'Add New Member'),
    'add_new'             => __( 'Add New Member' ),
    'edit_item'           => __( 'Edit Member' ),
    'update_item'         => __( 'Update Member' ),
    'search_items'        => __( 'Search Roster'),
    'not_found'           => __( 'Not Found' ),
    'not_found_in_trash'  => __( 'Not found in Trash' ),
  );

  $args = array(
    'label'               => __( 'Member Roster'),
    'description'         => __( 'Listing of Our Members'),
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
    'rewrite'             => ['slug' => 'our-member-roster', 'with_front' => false],
  );

  register_post_type( 'member-title', $args );

  add_rewrite_rule( '(.?.+?)/page/?([0-9]{1,})/?$', 'index.php?pagename=$matches[1]&paged=$matches[2]', 'top' );

}

add_action( 'init', 'member_title_post', 0 );
