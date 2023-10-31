<?php

namespace Climatempo\Rest\Services;

use Climatempo\Rest\Repositories\AlertCtRepository;

class AlertCtService
{
  public function getAllNotices($perPage)
  {
    return AlertCtRepository::getNotices($perPage);
  }
}
