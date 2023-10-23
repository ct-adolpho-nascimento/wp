<?php

namespace Climatempo\Admin\App\Controllers;

use Climatempo\Admin\App\Services\Notices_Pos_2015_Ct_Service;
use Climatempo\Admin\App\Shared\Request_Helper;
use WP_REST_Request;

class Notices_Pos_2015_Ct_Controller
{
  public static function all_notices_pos_2015_ct_climatempo(WP_REST_Request $request)
  {
    $requestParams = Request_Helper::processRequestParams($request);
    $top_news = $requestParams['top_news'];
    $per_page = $requestParams['per_page'];

    $data = Notices_Pos_2015_Ct_Service::getAllNotices($top_news, $per_page);

    return rest_ensure_response($data);
  }
}
