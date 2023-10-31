<?php

namespace Climatempo\Admin\App\Controllers;

use Climatempo\Admin\App\Services\Notices_Pos_2015_Ct_Service;
use Climatempo\Admin\App\Shared\Request_Helper;
use WP_REST_Request;

class Notices_Pos_2015_Ct_Controller
{

  private $newNoticePos2015CtService;
  private $requestHelper;

  public function __construct()
  {
    $this->newNoticePos2015CtService = new Notices_Pos_2015_Ct_Service();
    $this->requestHelper = new Request_Helper();
  }

  public function all_notices_pos_2015_ct_climatempo(WP_REST_Request $request)
  {
    $requestParams = $this->requestHelper->processRequestParams($request);
    $top_news = $requestParams['top_news'];
    $per_page = $requestParams['per_page'];

    $data = $this->newNoticePos2015CtService->getAllNotices($top_news, $per_page);

    return rest_ensure_response($data);
  }

  public function notice_pos_2015_ct_climatempo_by_slug(WP_REST_Request $request)
  {
    $requestParams = $this->requestHelper->processRequestSlugParams($request);

    $slug = $requestParams['slug'];

    $data = $this->newNoticePos2015CtService->getNoticePos2015BySlug($slug);

    return rest_ensure_response($data);
  }

  public function notice_pos_2015_ct_climatempo_per_category(WP_REST_Request $request)
  {
    $requestParams = $this->requestHelper->processRequestCategoryParams($request);

    $category = $requestParams['category'];
    $per_page = $requestParams['per_page'];

    $data = $this->newNoticePos2015CtService->getNoticePos2015PerCategory($category, $per_page);

    return rest_ensure_response($data);
  }
}
