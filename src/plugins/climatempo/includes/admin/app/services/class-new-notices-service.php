<?php

namespace Climatempo\Admin\App\Services;

use Climatempo\Admin\App\Repositories\New_Notices_Repository;

class New_Notices_Service
{
  private $newNoticeRepository;

  public function __construct()
  {
    $this->newNoticeRepository = new New_Notices_Repository();
  }

  public function getAllNotices($topNews, $perPage)
  {
    return $this->newNoticeRepository->getNotices($topNews, $perPage);
  }

  public function getNoticeBySlug($slug)
  {
    return $this->newNoticeRepository->getNoticeSlug($slug);
  }

  public function getNoticePerCategory($category, $per_page)
  {
    return $this->newNoticeRepository->getNoticeCategory($category, $per_page);
  }
}
