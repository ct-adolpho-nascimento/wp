<?php

namespace Climatempo\Admin\Routes;

use Climatempo\Admin\App\Controllers\New_Notices_Controller;
use WP_REST_Server;

class Api
{
  public static function register_api()
  {
    register_rest_route('wp/v2', '/novas-noticias-climatempo', array(
      'methods' => WP_REST_Server::READABLE,
      'callback' => [New_Notices_Controller::class, 'all_notices_climatempo'],
    ));
  }
}
