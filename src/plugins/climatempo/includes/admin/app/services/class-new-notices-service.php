<?php

namespace Climatempo\Admin\App\Services;

use Climatempo\Admin\App\Repositories\New_Notices_Repository;

class New_Notices_Service
{
  public static function getAllNotices($topNews, $perPage)
  {
    return New_Notices_Repository::getNotices($topNews, $perPage);
  }

  public static function getNoticeBySlug($slug)
  {
    return New_Notices_Repository::getNoticeSlug($slug);
  }

  public static function getNoticePerCategory($category, $per_page)
  {
    return New_Notices_Repository::getNoticeCategory($category, $per_page);
  }
}
