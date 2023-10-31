<?php

namespace Climatempo\Admin\Routes;

use Climatempo\Admin\App\Controllers\New_Notices_Controller;
use Climatempo\Admin\App\Controllers\Notices_Pos_2015_Ct_Controller;
use Climatempo\Admin\App\Controllers\Notices_Pre_2015_Ct_Controller;
use WP_REST_Server;

class Api
{
  public static function register_api()
  {
    // Novas Notícias
    register_rest_route('wp/v2', '/novas-noticias-climatempo', array(
      'methods' => WP_REST_Server::READABLE,
      'callback' => [New_Notices_Controller::class, 'all_notices_climatempo'],
    ));

    register_rest_route('wp/v2', '/novas-noticias-climatempo/(?P<slug>[a-zA-Z0-9-]+)', array(
      'methods' => WP_REST_Server::READABLE,
      'callback' => [New_Notices_Controller::class, 'notice_climatempo_by_slug'],
    ));

    register_rest_route('wp/v2', '/novas-noticias-climatempo/categories/(?P<category>[a-zA-Z0-9-]+)', array(
      'methods' => WP_REST_Server::READABLE,
      'callback' => [New_Notices_Controller::class, 'notice_climatempo_per_category'],
    ));

    //Pré
    register_rest_route('wp/v2', '/noticias-pre-2015-climatempo', array(
      'methods' => WP_REST_Server::READABLE,
      'callback' => [Notices_Pre_2015_Ct_Controller::class, 'all_notices_pre_2015_ct_climatempo'],
    ));

    //Pós
    register_rest_route('wp/v2', '/noticias-pos-2015-climatempo', array(
      'methods' => WP_REST_Server::READABLE,
      'callback' => [Notices_Pos_2015_Ct_Controller::class, 'all_notices_pos_2015_ct_climatempo'],
    ));

    register_rest_route('wp/v2', '/noticias-pos-2015-climatempo/(?P<slug>[a-zA-Z0-9-]+)', array(
      'methods' => WP_REST_Server::READABLE,
      'callback' => [Notices_Pos_2015_Ct_Controller::class, 'notice_pos_2015_ct_climatempo_by_slug'],
    ));

    register_rest_route('wp/v2', '/noticias-pos-2015-climatempo/categories/(?P<category>[a-zA-Z0-9-]+)', array(
      'methods' => WP_REST_Server::READABLE,
      'callback' => [Notices_Pos_2015_Ct_Controller::class, 'notice_pos_2015_ct_climatempo_per_category'],
    ));
  }
}
