<?php

namespace Climatempo;

/**
 * The main class used to run the plugin
 *
 * @link       https://github.com/StormGeo/ct-wordpress
 * @since      1.0.0
 *
 * @package    Climatempo
 */

// If this file is called directly, abort.
if (!defined('ABSPATH')) {
  exit;
}

class Run
{
  public function __construct()
  {
    $admin_notices = new \Climatempo\Admin\App\Cpt\Register_New_Notices();
    add_action('init', array($admin_notices, 'registerCustomPost'));

    $api = new \Climatempo\Admin\Routes\Api();
    add_action('rest_api_init', array($api, 'register_api'));

    $category_tax = new \Climatempo\Admin\App\Cpt\Taxonomies\Categoria_Climatempo();
    add_action('init', array($category_tax, 'register_taxonomy_categoria_clima'));

    $custom_tags = new \Climatempo\Admin\App\Cpt\Taxonomies\Tags_Custom();
    add_action('init', array($custom_tags, 'register_taxonomy_custom_tags'));
  }
}
