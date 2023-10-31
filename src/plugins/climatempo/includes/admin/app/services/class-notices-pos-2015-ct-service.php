<?php

namespace Climatempo\Admin\App\Services;

use Climatempo\Admin\App\Repositories\Notices_Pos_2015_Ct_Repository;

class Notices_Pos_2015_Ct_Service
{

  private $newNoticePos2015CtRepository;

  public function __construct()
  {
    $this->newNoticePos2015CtRepository = new Notices_Pos_2015_Ct_Repository();
  }

  public function getAllNotices($topNews, $perPage)
  {
    return $this->newNoticePos2015CtRepository->getNotices($topNews, $perPage);
  }

  public function getNoticePos2015BySlug($slug)
  {
    return $this->newNoticePos2015CtRepository->getNoticePos2015Slug($slug);
  }

  public function getNoticePos2015PerCategory($category, $per_page)
  {
    return $this->newNoticePos2015CtRepository->getNoticePos2015Category($category, $per_page);
  }
}
