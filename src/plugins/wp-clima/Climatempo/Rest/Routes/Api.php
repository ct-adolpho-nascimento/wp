<?php

namespace Climatempo\Rest\Routes;

use Climatempo\Rest\Controllers\AlertsCtController;
use WP_REST_Server;

class Api
{
  public static function register_api()
  {
    register_rest_route('wp/v2', '/alertas-climatempo', array(
      'methods' => WP_REST_Server::READABLE,
      'callback' => [new AlertsCtController(), 'all_alerts'],
    ));
  }
}
