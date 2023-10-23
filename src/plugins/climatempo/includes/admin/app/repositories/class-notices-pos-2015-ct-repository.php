<?php

namespace Climatempo\Admin\App\Repositories;

use Climatempo\Admin\App\Model\Notices_Pos_2015_Ct;
use WP_Query;

class Notices_Pos_2015_Ct_Repository
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
      'post_type' => 'ct_noticias_pos_2015',
      'posts_per_page' => $perPage,
      'meta_query' => $getData,
    );

    $query = new WP_Query($args);

    $data = array();

    if ($query->have_posts()) {
      while ($query->have_posts()) {
        $query->the_post();

        $post_id = get_the_ID();
        $new_notices = new Notices_Pos_2015_Ct($post_id);

        $post_title = $new_notices->get_title();
        $post_date = $new_notices->get_date();
        $post_slug = $new_notices->get_slug();
        $post_content = $new_notices->get_content();
        $post_excerpt = $new_notices->get_excerpt();
        $post_thumbnail = $new_notices->get_thumbnail();
        $top_news = $new_notices->get_top_news();
        $categories = wp_get_post_categories($post_id);
        $post_tags = wp_get_post_tags($post_id);

        $category_names = array();
        $tags = array();

        foreach ($categories as $category_id) {
          $category = get_category($category_id);
          $category_names[] = $category->name;
        }

        foreach ($post_tags as $tag_id) {
          $tag = get_category($tag_id);
          $tags[] = array(
            'id'   => $tag->term_id,
            'name' => $tag->name,
          );
        }

        $data[] = array(
          'id' => $post_id,
          'date' => $post_date,
          'title' => $post_title,
          'slug' => $post_slug,
          'content' => $post_content,
          'excerpt' => $post_excerpt,
          'thumbnail' => $post_thumbnail,
          'top_news' => intval($top_news),
          'categories' => $category_names,
          'tags' => $tags,
        );
      }
    }

    wp_reset_postdata();

    return $data;
  }
}
