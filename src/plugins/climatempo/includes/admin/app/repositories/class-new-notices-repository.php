<?php

namespace Climatempo\Admin\App\Repositories;

use Climatempo\Admin\App\Shared\Format_Data_Return;
use WP_Error;
use WP_Query;

class New_Notices_Repository
{
  private $formatDataReturn;

  public function __construct()
  {
    $this->formatDataReturn = new Format_Data_Return();
  }

  public function getNotices($topNews, $perPage)
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

        $data[] = $this->formatDataReturn->formatData($post_id);
      }
    }

    return rest_ensure_response($data);
  }

  public function getNoticeSlug($slug)
  {
    $args = array(
      'name' => $slug,
      'post_type' => 'novas_noticias',
      'posts_per_page' => 1,
    );

    $posts = get_posts($args);

    $post = $posts[0];

    if (empty($post) || $post->post_type !== 'novas_noticias') {
      return new WP_Error('not_found', 'By Slug Novas notícia não encontrada.', array('status' => 404));
    }

    $post_id = $post->ID;
    $data = $this->formatDataReturn->formatData($post_id);

    return rest_ensure_response($data);
  }

  public function getNoticeCategory($category, $per_page)
  {
    $terms = array(
      array(
        'taxonomy' => 'categoria_clima',
        'field'    => 'slug',
        'terms'    => $category,
      ),
    );
    $args = array(
      'post_type'      => 'novas_noticias',
      'posts_per_page' => $per_page,
      'tax_query'      => $terms,
    );

    $query = new WP_Query($args);

    $data = array();

    if ($query->have_posts()) {
      while ($query->have_posts()) {
        $query->the_post();
        $post_id = get_the_ID();

        $data[] = $this->formatDataReturn->formatData($post_id);
      }
    }
    return rest_ensure_response($data);
  }

  // public function formattedData($post_id)
  // {
  //   $new_notices = new New_Notices($post_id);

  //   return array(
  //     'id' => $post_id,
  //     'date' => $new_notices->get_date($post_id),
  //     'author_name' => $new_notices->get_author($post_id),
  //     'title' => $new_notices->get_title($post_id),
  //     'slug' => $new_notices->get_slug($post_id),
  //     'content' => $new_notices->get_content($post_id),
  //     'excerpt' => $new_notices->get_excerpt($post_id),
  //     'featuredmedia' => $new_notices->get_thumbnail($post_id),
  //     'top_news' => boolval($new_notices->get_top_news()),
  //     'categories' => $new_notices->get_all_categories_per_taxonomies($post_id),
  //     'tags' => $new_notices->get_all_tags_per_taxonomies($post_id),
  //   );
  // }
}
