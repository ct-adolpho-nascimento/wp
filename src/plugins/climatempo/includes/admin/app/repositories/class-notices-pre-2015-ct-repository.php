<?php

namespace Climatempo\Admin\App\Repositories;

use Climatempo\Admin\App\Model\Notices_Pre_2015_Ct;
use WP_Query;

class Notices_Pre_2015_Ct_Repository
{
  public static function getNotices($perPage)
  {
    $args = array(
      'post_type' => 'ct_noticias_pre_2015',
      'posts_per_page' => $perPage,
    );

    $query = new WP_Query($args);

    $data = array();

    if ($query->have_posts()) {
      while ($query->have_posts()) {
        $query->the_post();

        $post_id = get_the_ID();
        $notices = new Notices_Pre_2015_Ct($post_id);

        $post_title = $notices->get_title();
        $post_date = $notices->get_date();
        $post_author = $notices->get_author($post_id);
        $post_slug = $notices->get_slug();
        $post_content = $notices->get_content();
        $post_excerpt = $notices->get_excerpt();
        $post_thumbnail = $notices->get_thumbnail();
        $categories = wp_get_post_categories($post_id);
        $post_tags = wp_get_post_tags($post_id);
        $thumbnail_id = get_post_meta($post_id, '_thumbnail_id', true);
        $path_thumbanail_in_media_post = wp_get_attachment_url($thumbnail_id);

        if (!$post_thumbnail) {
          $thumb = $path_thumbanail_in_media_post;
        } else {
          $thumb = $post_thumbnail;
        }

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
          'author_name' => $post_author,
          'title' => $post_title,
          'slug' => $post_slug,
          'content' => $post_content,
          'excerpt' => $post_excerpt,
          'featuredmedia' => $thumb,
          'categories' => $category_names,
          'tags' => $tags,
          'top_news' => false,
        );
      }
    }

    wp_reset_postdata();

    return $data;
  }
}
