<?php

namespace Climatempo;

use Climatempo\Admin\App\Cpt\Register_New_Notices;
use Climatempo\Admin\App\Cpt\Register_Notices_Pos_2015_Ct;
use Climatempo\Admin\App\Cpt\Register_Notices_Pre_2015_Ct;
use Climatempo\Admin\App\Cpt\Taxonomies\Categoria_Climatempo;
use Climatempo\Admin\App\Cpt\Taxonomies\Tags_Custom;
use Climatempo\Admin\Routes\Api;

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
    $admin_notices = new Register_New_Notices();
    add_action('init', array($admin_notices, 'registerCustomPost'));

    $notices_pre = new Register_Notices_Pre_2015_Ct();
    add_action('init', array($notices_pre, 'registerCustomPost'));

    $notices_pos = new Register_Notices_Pos_2015_Ct();
    add_action('init', array($notices_pos, 'registerCustomPost'));


    $category_tax = new Categoria_Climatempo();
    add_action('init', array($category_tax, 'register_taxonomy_categoria_clima'));

    $custom_tags = new Tags_Custom();
    add_action('init', array($custom_tags, 'register_taxonomy_custom_tags'));

    $api = new Api();
    add_action('rest_api_init', array($api, 'register_api'));
  }
}
