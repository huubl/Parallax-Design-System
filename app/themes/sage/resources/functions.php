<?php

/**
* Do not edit anything in this file unless you know what you're doing
*/

use Roots\Sage\Config;
use Roots\Sage\Container;

/**
* Helper function for prettying up errors
* @param string $message
* @param string $subtitle
* @param string $title
*/
$sage_error = function ($message, $subtitle = '', $title = '') {
  $title = $title ?: __('Sage &rsaquo; Error', 'sage');
  $footer = '<a href="https://roots.io/sage/docs/">roots.io/sage/docs/</a>';
  $message = "<h1>{$title}<br><small>{$subtitle}</small></h1><p>{$message}</p><p>{$footer}</p>";
  wp_die($message, $title);
};

/**
* Ensure compatible version of PHP is used
*/
if (version_compare('7.1', phpversion(), '>=')) {
  $sage_error(__('You must be using PHP 7.1 or greater.', 'sage'), __('Invalid PHP version', 'sage'));
}

/**
* Ensure compatible version of WordPress is used
*/
if (version_compare('4.7.0', get_bloginfo('version'), '>=')) {
  $sage_error(__('You must be using WordPress 4.7.0 or greater.', 'sage'), __('Invalid WordPress version', 'sage'));
}

/**
* Ensure dependencies are loaded
*/
if (!class_exists('Roots\\Sage\\Container')) {
  if (!file_exists($composer = __DIR__.'/../vendor/autoload.php')) {
    $sage_error(
      __('You must run <code>composer install</code> from the Sage directory.', 'sage'),
      __('Autoloader not found.', 'sage')
    );
  }
  require_once $composer;
}

/**
* Sage required plugins
*/
if ( file_exists(dirname( __DIR__ ) . '/app/activation.php') ) {
  require_once dirname( __DIR__ ) . '/app/activation.php';
}

/**
* Sage required files
*
* The mapped array determines the code library included in your theme.
* Add or remove files to the array as needed. Supports child theme overrides.
*/
array_map(function ($file) use ($sage_error) {
  $file = "../app/{$file}.php";
  if (!locate_template($file, true, true)) {
    $sage_error(sprintf(__('Error locating <code>%s</code> for inclusion.', 'sage'), $file), 'File not found');
  }
}, ['helpers', 'setup', 'filters', 'admin', 'plugins', 'media', 'acf', 'gf', 'shortcodes', 'post-types']);

/**
* Here's what's happening with these hooks:
* 1. WordPress initially detects theme in themes/sage/resources
* 2. Upon activation, we tell WordPress that the theme is actually in themes/sage/resources/views
* 3. When we call get_template_directory() or get_template_directory_uri(), we point it back to themes/sage/resources
*
* We do this so that the Template Hierarchy will look in themes/sage/resources/views for core WordPress themes
* But functions.php, style.css, and index.php are all still located in themes/sage/resources
*
* This is not compatible with the WordPress Customizer theme preview prior to theme activation
*
* get_template_directory()   -> /srv/www/example.com/current/web/app/themes/sage/resources
* get_stylesheet_directory() -> /srv/www/example.com/current/web/app/themes/sage/resources
* locate_template()
* ├── STYLESHEETPATH         -> /srv/www/example.com/current/web/app/themes/sage/resources/views
* └── TEMPLATEPATH           -> /srv/www/example.com/current/web/app/themes/sage/resources
*/
array_map(
  'add_filter',
  ['theme_file_path', 'theme_file_uri', 'parent_theme_file_path', 'parent_theme_file_uri'],
  array_fill(0, 4, 'dirname')
);
Container::getInstance()
->bindIf('config', function () {
  return new Config([
    'assets' => require dirname(__DIR__).'/config/assets.php',
    'theme' => require dirname(__DIR__).'/config/theme.php',
    'view' => require dirname(__DIR__).'/config/view.php',
  ]);
}, true);

function mytheme_setup() {
  add_theme_support( 'align-wide' );
}
add_action( 'after_setup_theme', 'mytheme_setup' );


/// Registers Block Category for Gutenberg

function my_blocks_plugin_block_categories( $categories ) {
  return array_merge(
    $categories,
    array(
      array(
        'slug' => 'general_blocks',
        'title' => __( 'General Blocks', 'brm' ),
        'icon'  => 'wordpress',
      ),
      array(
        'slug' => 'columns_blocks',
        'title' => __( 'Column Blocks', 'brm' ),
        'icon'  => 'wordpress',
      ),
      array(
        'slug' => 'rv_blocks',
        'title' => __( 'RV Park Blocks', 'brm' ),
        'icon'  => 'wordpress',
      ),
    )
  );
}

add_filter( 'block_categories', 'my_blocks_plugin_block_categories', 10, 2 );



//// Gutenberg Backend Styling Overide
add_action('admin_head', 'gutenberg_styling_overide');

function gutenberg_styling_overide() {
  echo '<style>
  @media (min-width: 782px) {
    .is-sidebar-opened .block-editor-editor-skeleton__sidebar {
      width: 20%;
      min-width: 20% !important;
      transition: all ease .2s;
      position: fixed !important;
      right: 0px !important;
      left: auto !important;
      margin-top: 88px;
      z-index: 50;
    }

    .expand-me {
      width: 40% !important;
      z-index: 100 !important;
    }
  }

  .edit-post-sidebar {
    width: 100%;
  }

  .components-notice-list,
  .edit-post-layout__metaboxes {
    max-width: 75% !important;
  }

  .components-notice-list,
  .edit-post-layout__metaboxes {
    max-width: 80%;
  }

  .block-editor-block-list__layout {
    overflow: hidden !important;
    position: relative;
  }

  .block-editor-block-list__layout .block-editor-block-list__layout {
    width: 100% !important;
  }

  .wp-core-ui .button,
  .wp-core-ui .button-secondary {
    background: transparent !important;
    background-color: inherit !important;
    color: black;
  }

  .editor-styles-wrapper .button {
    color: inherit !important;
  }

  .wp-editor-area {
    height: 150px !important;
  }

  .block-list-appender {
    z-index: 10;
    position: relative;
  }

  .editor-styles-wrapper .block-editor-block-list__block {
    margin-top: 0px;
    margin-bottom: 0px;
  }

  .open-sidebar {
    display: none !important;
  }

  .block-editor-page .open-sidebar {
    display: block !important;
  }

  .open-sidebar {
    right: -155px;
    transition: all ease  .2s;
  }

  .open-sidebar::before {
    content: "\2190";
    padding-right: 15px;
  }

  .open-sidebar:hover {
    right: 0px;
  }


  </style>

  <a class="open-sidebar text-h1 button--primary"
  style="
  position: absolute;
  z-index: 1000;
  bottom: 0;
  font-size: 20px;
  padding: 15px;
  border: 1px solid black;
  background-color: white;
  cursor: pointer;
  "
  >Toggle Toolbar</a>';
}
// Add class to next and previous links
function add_class_next_post_link($html){
  $html = str_replace('<a','<a class="next-post"',$html);
  return $html;
}

add_filter('next_post_link','add_class_next_post_link',10,1);
function add_class_previous_post_link($html){
  $html = str_replace('<a','<a class="prev-post"',$html);
  return $html;
}
add_filter('previous_post_link','add_class_previous_post_link',10,1);


//Remove stock blocks

add_filter( 'allowed_block_types', 'misha_allowed_block_types' );

function misha_allowed_block_types( $allowed_blocks ) {

  return array(
    'acf/ada-compliance',
    'acf/privacy-policy',
    'acf/investors',
    'acf/need-help',
    'acf/update-info',
    'acf/portfolio',
    'acf/floating-column',
    'acf/hero',
    'acf/split',
    'core/block' // add this for reusable block
  );

}

// Login Redirect
function wpdocs_my_login_redirect( $url, $request, $user ) {
    if ( $user && is_object( $user ) && is_a( $user, 'WP_User' ) ) {
        if ( $user->has_cap( 'administrator' ) ) {
            $url = admin_url();
        } else {
            $url = home_url( '/investor-login/' );
        }
    }
    return $url;
}

add_filter( 'login_redirect', 'wpdocs_my_login_redirect', 10, 3 );
