<?php

namespace Climatempo\Admin\App\Repositories;

use Climatempo\Admin\App\Model\New_Notices;
use WP_Query;

class New_Notices_Repository
{
  public static function getNotices($topNews, $perPage)
  {
    $getData = array();
    if (in_array($topNews, ["on", "off"])) {
      $getData[] = array(
        'key' => 'top_news',
        'value' => ($topNews === "on") ? '1' : '',
        'compare' => ($topNews === "on") ? '=' : 'NOT EXISTS',
        'type' => 'NUMERIC',
      );
    } else {
      $getData = $topNews;
    }

    $args = array(
      'post_type' => 'novas_noticias',
      'posts_per_page' => $perPage,
      'meta_query' => $getData,
    );

    $query = new WP_Query($args);

    $data = array();

    if ($query->have_posts()) {
      while ($query->have_posts()) {
        $query->the_post();

        $post_id = get_the_ID();
        $new_notices = new New_Notices($post_id);

        $post_title = $new_notices->get_title();
        $post_date = $new_notices->get_date();
        $post_slug = $new_notices->get_slug();
        $post_content = $new_notices->get_content();
        $post_excerpt = $new_notices->get_excerpt();
        $post_thumbnail = $new_notices->get_thumbnail();
        $top_news = $new_notices->get_top_news();
        $categories_tax = $new_notices->get_all_categories_per_taxonomies($post_id);
        $tags_custom = $new_notices->get_all_tags_per_taxonomies($post_id);

        $data[] = array(
          'id' => $post_id,
          'date' => $post_date,
          'title' => $post_title,
          'slug' => $post_slug,
          'content' => $post_content,
          'excerpt' => $post_excerpt,
          'thumbnail' => $post_thumbnail,
          'top_news' => intval($top_news),
          'categories' => $categories_tax,
          'tags' => $tags_custom,
        );
      }
    }

    wp_reset_postdata();

    return $data;
  }
}
