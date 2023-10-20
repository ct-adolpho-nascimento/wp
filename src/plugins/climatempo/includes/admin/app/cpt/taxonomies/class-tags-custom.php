<?php

namespace Climatempo\Admin\App\Cpt\Taxonomies;

/**
 * Displays admin news
 *
 * @link       https://github.com/StormGeo/ct-wordpress
 * @since      1.0.0
 *
 * @package    Climatempo
 * @subpackage Climatempo\Admin\App\Cpt\Taxonomies
 */

class Tags_Custom
{
  public static function register_taxonomy_custom_tags()
  {
    $labels = array(
      'name' => 'Custom Tags',
      'singular_name' => 'Custom Tag',
      'search_items' => 'Search Custom Tags',
      'all_items' => 'All Custom Tags',
      'edit_item' => 'Edit Custom Tag',
      'update_item' => 'Update Custom Tag',
      'add_new_item' => 'Add New Custom Tag',
      'new_item_name' => 'New Custom Tag Name',
      'menu_name' => 'Custom Tags',
    );

    $args = array(
      'hierarchical' => false,
      'labels' => $labels,
      'show_ui' => true,
      'show_admin_column' => true,
      'query_var' => true,
      'rewrite' => array('slug' => 'custom_tags'),
    );

    register_taxonomy('custom_tags', 'novas_noticias', $args);
  }
}
