<?php
interface AC_TopNewsInterface
{
  public function saveFeaturedNews($post_id);
  public function addColumnFeaturedNews($columns);
  public function displayColumnContentFeaturedNews($column, $post_id);
  public function buttonUpdateFeaturedNews($columns);
  public function updateFeaturedNews();
  public function addAdminNotice();
  public function addFeaturedNewsFilter();
  public function filterByFeaturedNews($query);
}
