<?php

namespace Climatempo\Admin\App\Services;

use Climatempo\Admin\App\Repositories\Notices_Pre_2015_Ct_Repository;

class Notices_Pre_2015_Ct_Service
{
  public static function getAllNotices($perPage)
  {
    return Notices_Pre_2015_Ct_Repository::getNotices($perPage);
  }
}
