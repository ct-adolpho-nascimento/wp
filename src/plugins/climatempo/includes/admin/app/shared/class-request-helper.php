<?php

namespace Climatempo\Admin\App\Shared;

class Request_Helper
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

  public static function processRequestSlugParams($request)
  {
    $slug = $request->get_param('slug');

    return [
      'slug' => $slug
    ];
  }

  public static function processRequestCategoryParams($request)
  {
    $category_slug = $request->get_param('category');

    $get_per_page = $request->get_param('per_page');
    $per_page = (isset($get_per_page) || !(empty($get_per_page))) ? $get_per_page : -1;

    return [
      'category' => $category_slug,
      'per_page' => $per_page,
    ];
  }
}
