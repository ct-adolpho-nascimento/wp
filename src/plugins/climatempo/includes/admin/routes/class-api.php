<?php

namespace Climatempo\Admin\Routes;

use Climatempo\Admin\App\Model\New_Notices;
use WP_Query;
use WP_REST_Server;

class Api
{
  public static function all_notices_climatempo($request)
  {
    $get_top_news = $request->get_param('top_news');
    $top_news = (isset($get_top_news) || !(empty($get_top_news))) ? $get_top_news : array();

    $get_per_page = $request->get_param('per_page');
    $per_page = (isset($get_per_page) || !(empty($get_per_page))) ? $get_per_page : -1;

    $getData = array();
    if (in_array($top_news, ["on", "off"])) {
      $getData[] = array(
        'key'     => 'top_news',
        'value'   => ($top_news === "on") ? '1' : '',
        'compare' => ($top_news === "on") ? '=' : 'NOT EXISTS',
        'type'    => 'NUMERIC',
      );
    } else {
      $getData = $top_news;
    }

    $args = array(
      'post_type'      => 'novas_noticias',
      'posts_per_page' => $per_page,
      'meta_query'     => $getData
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
        // $categories = $new_notices->get_all_categories($post_id);
        // $tags = $new_notices->get_all_tags($post_id);

        $data[] = array(
          'id'                    => $post_id,
          'date'                  => $post_date,
          'title'                 => $post_title,
          'slug'                  => $post_slug,
          'content'               => $post_content,
          'excerpt'               => $post_excerpt,
          'thumbnail'             => $post_thumbnail,
          'top_news'              => intval($top_news),
          'categories'            => $categories_tax,
          'tags'                  => $tags_custom,
          // 'categories'            => $categories,
          // 'tags'                  => $tags,
        );
      }
    }

    wp_reset_postdata();

    return rest_ensure_response($data);
  }

  public static function register_api()
  {
    register_rest_route('wp/v2', '/novas-noticias-climatempo', array(
      'methods' => WP_REST_Server::READABLE,
      'callback' => __CLASS__ . '::all_notices_climatempo',

    ));
  }
}
