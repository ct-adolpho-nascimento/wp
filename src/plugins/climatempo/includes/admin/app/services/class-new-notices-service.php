<?php

namespace Climatempo\Admin\App\Services;

use Climatempo\Admin\App\Repositories\New_Notices_Repository;

class New_Notices_Service
{
  public static function getAllNotices($topNews, $perPage)
  {
    return New_Notices_Repository::getNotices($topNews, $perPage);
  }
}
