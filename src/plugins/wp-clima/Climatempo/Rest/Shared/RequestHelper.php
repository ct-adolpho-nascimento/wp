<?php

namespace Climatempo\Rest\Shared;

class RequestHelper
{
  public static function processRequestParams($request)
  {
    $get_top_news = $request->get_param('top_news');
    $top_news = (isset($get_top_news) || !(empty($get_top_news))) ? $get_top_news : array();

    $get_per_page = $request->get_param('per_page');
    $per_page = (isset($get_per_page) || !(empty($get_per_page))) ? $get_per_page : -1;

    return [
      'top_news' => $top_news,
      'per_page' => $per_page,
    ];
  }
}
