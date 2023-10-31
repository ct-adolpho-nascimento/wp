<?php

namespace Climatempo\Admin\App\Controllers;

use Climatempo\Admin\App\Services\New_Notices_Service;
use Climatempo\Admin\App\Shared\Request_Helper;
use WP_REST_Request;

class New_Notices_Controller
{
  private $newNoticeService;
  private $requestHelper;

  public function __construct()
  {
    $this->newNoticeService = new New_Notices_Service();
    $this->requestHelper = new Request_Helper();
  }

  public function all_notices_climatempo(WP_REST_Request $request)
  {
    $requestParams = $this->requestHelper->processRequestParams($request);
    $top_news = $requestParams['top_news'];
    $per_page = $requestParams['per_page'];

    $data = $this->newNoticeService->getAllNotices($top_news, $per_page);

    return rest_ensure_response($data);
  }

  public function notice_climatempo_by_slug(WP_REST_Request $request)
  {
    $requestParams = $this->requestHelper->processRequestSlugParams($request);

    $slug = $requestParams['slug'];

    $data = $this->newNoticeService->getNoticeBySlug($slug);

    return rest_ensure_response($data);
  }

  public function notice_climatempo_per_category(WP_REST_Request $request)
  {
    $requestParams = $this->requestHelper->processRequestCategoryParams($request);

    $category = $requestParams['category'];
    $per_page = $requestParams['per_page'];

    $data = $this->newNoticeService->getNoticePerCategory($category, $per_page);

    return rest_ensure_response($data);
  }
}
