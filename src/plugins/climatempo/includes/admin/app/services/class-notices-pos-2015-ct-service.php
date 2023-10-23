<?php

namespace Climatempo\Admin\App\Services;

use Climatempo\Admin\App\Repositories\Notices_Pos_2015_Ct_Repository;

class Notices_Pos_2015_Ct_Service
{
  public static function getAllNotices($topNews, $perPage)
  {
    return Notices_Pos_2015_Ct_Repository::getNotices($topNews, $perPage);
  }
}
