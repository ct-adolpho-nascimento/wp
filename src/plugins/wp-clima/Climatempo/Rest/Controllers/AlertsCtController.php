<?php

namespace Climatempo\Rest\Controllers;

use Climatempo\Rest\Services\AlertCtService;
use Climatempo\Rest\Shared\RequestHelper;
use WP_REST_Request;

class AlertsCtController
{
  public function all_alerts(WP_REST_Request $request)
  {
    $requestParams = RequestHelper::processRequestParams($request);
    $per_page = $requestParams['per_page'];

    $alertService = new AlertCtService();

    $data = $alertService->getAllNotices($per_page);

    return rest_ensure_response($data);
  }
}
