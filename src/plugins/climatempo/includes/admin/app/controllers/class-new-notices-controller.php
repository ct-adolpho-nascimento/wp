<?php

namespace Climatempo\Admin\App\Controllers;

use Climatempo\Admin\App\Services\New_Notices_Service;
use Climatempo\Admin\App\Shared\Request_Helper;
use WP_REST_Request;

class New_Notices_Controller
{
  public static function all_notices_climatempo(WP_REST_Request $request)
  {
    $requestParams = Request_Helper::processRequestParams($request);
    $top_news = $requestParams['top_news'];
    $per_page = $requestParams['per_page'];

    $data = New_Notices_Service::getAllNotices($top_news, $per_page);

    return rest_ensure_response($data);
  }

  public static function notice_climatempo_by_slug(WP_REST_Request $request)
  {
    $requestParams = Request_Helper::processRequestSlugParams($request);

    $slug = $requestParams['slug'];

    $data = New_Notices_Service::getNoticeBySlug($slug);

    return rest_ensure_response($data);
  }

  public static function notice_climatempo_per_category(WP_REST_Request $request)
  {
    $requestParams = Request_Helper::processRequestCategoryParams($request);

    $category = $requestParams['category'];
    $per_page = $requestParams['per_page'];

    $data = New_Notices_Service::getNoticePerCategory($category, $per_page);

    return rest_ensure_response($data);
  }
}
