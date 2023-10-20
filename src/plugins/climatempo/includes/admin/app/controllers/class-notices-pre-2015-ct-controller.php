<?php

namespace Climatempo\Admin\App\Controllers;

use Climatempo\Admin\App\Services\Notices_Pre_2015_Ct_Service;
use Climatempo\Admin\App\Shared\Request_Helper;
use WP_REST_Request;

class Notices_Pre_2015_Ct_Controller
{
  public static function all_notices_pre_2015_ct_climatempo(WP_REST_Request $request)
  {
    $requestParams = Request_Helper::processRequestParams($request);
    $per_page = $requestParams['per_page'];

    $data = Notices_Pre_2015_Ct_Service::getAllNotices($per_page);

    return rest_ensure_response($data);
  }
}
