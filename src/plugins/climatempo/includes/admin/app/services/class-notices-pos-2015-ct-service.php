<?php

namespace Climatempo\Admin\App\Services;

use Climatempo\Admin\App\Repositories\Notices_Pos_2015_Ct_Repository;

class Notices_Pos_2015_Ct_Service
{
  public static function getAllNotices($topNews, $perPage)
  {
    return Notices_Pos_2015_Ct_Repository::getNotices($topNews, $perPage);
  }

  public static function getNoticePos2015BySlug($slug)
  {
    return Notices_Pos_2015_Ct_Repository::getNoticePos2015Slug($slug);
  }

  public static function getNoticePos2015PerCategory($category, $per_page)
  {
    return Notices_Pos_2015_Ct_Repository::getNoticePos2015Category($category, $per_page);
  }
}
