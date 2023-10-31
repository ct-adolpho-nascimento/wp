<?php

namespace Climatempo\Admin\App\Repositories;

use Climatempo\Admin\App\Shared\Format_Data_Return;
use WP_Error;
use WP_Query;

class Notices_Pos_2015_Ct_Repository
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

        $getData = self::getCategoryAndTags($post_id);

        $data[] = $getData;
      }
    }

    wp_reset_postdata();

    return $data;
  }

  public function getNoticePos2015Slug($slug)
  {
    $args = array(
      'name' => $slug,
      'post_type' => 'ct_noticias_pos_2015',
      'posts_per_page' => 1,
    );

    $posts = get_posts($args);

    $post = $posts[0];

    if (empty($post) || $post->post_type !== 'ct_noticias_pos_2015') {
      return new WP_Error('not_found', 'By Slug Notícia pós 07/2015 não encontrada.', array('status' => 404));
    }

    $post_id = $post->ID;
    $getData = self::getCategoryAndTags($post_id);

    $data = $getData;

    return rest_ensure_response($data);
  }

  public function getNoticePos2015Category($category, $per_page)
  {
    $category = get_term_by('slug', $category, 'category');

    $args = array(
      'post_type'      => 'ct_noticias_pos_2015',
      'posts_per_page' => $per_page,
      'category__in' => $category->term_id,
    );

    $query = new WP_Query($args);

    $data = array();

    if ($query->have_posts()) {
      while ($query->have_posts()) {
        $query->the_post();

        $post_id = get_the_ID();

        $getData = self::getCategoryAndTags($post_id);

        $data[] = $getData;
      }
    }

    wp_reset_postdata();

    return $data;
  }

  public function getCategoryAndTags($post_id)
  {
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

    $getData = $this->formatDataReturn->formatData($post_id);
    $getData['categories'] = $category_names;
    $getData['tags'] = $tags;

    return $getData;
  }
}
