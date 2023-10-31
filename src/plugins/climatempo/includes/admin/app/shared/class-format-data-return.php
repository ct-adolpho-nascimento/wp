<?php

namespace Climatempo\Admin\App\Shared;

use Climatempo\Admin\App\Model\New_Notices;

class Format_Data_Return
{
  public function formatData($post_id)
  {
    $new_notices = new New_Notices($post_id);

    return array(
      'id' => $post_id,
      'date' => $new_notices->get_date($post_id),
      'author_name' => $new_notices->get_author($post_id),
      'title' => $new_notices->get_title($post_id),
      'slug' => $new_notices->get_slug($post_id),
      'content' => $new_notices->get_content($post_id),
      'excerpt' => $new_notices->get_excerpt($post_id),
      'featuredmedia' => $new_notices->get_thumbnail($post_id),
      'top_news' => boolval($new_notices->get_top_news()),
      'categories' => $new_notices->get_all_categories_per_taxonomies($post_id),
      'tags' => $new_notices->get_all_tags_per_taxonomies($post_id),
    );
  }
}
