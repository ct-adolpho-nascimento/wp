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
  }
}
