<?php

namespace Climatempo\Admin\App\Model;

/**
 * Displays admin news
 *
 * @link       https://github.com/StormGeo/ct-wordpress
 * @since      1.0.0
 *
 * @package    Climatempo
 * @subpackage Climatempo\Admin\App\Model
 */

abstract class Post_Type_Default
{
  private array $categories = [];
  private array $category_obj = [];
  private array $tags = [];
  private array $tag_obj = [];

  public function get_title(int $post_id): string
  {
    return get_the_title($post_id);
  }

  public function get_date(int $post_id): string
  {
    return get_post_field('post_date', get_post($post_id));
  }

  public function get_author(int $post_id): string
  {
    $author_id = get_post_field('post_author', $post_id);
    return get_the_author_meta('display_name', $author_id);
  }

  public function get_slug(int $post_id): string
  {
    return get_post_field('post_name', get_post($post_id));
  }

  public function get_content(int $post_id): string
  {
    return get_the_content(null, false, $post_id);
  }

  public function get_excerpt(int $post_id): string
  {
    return get_the_excerpt($post_id);
  }

  public function get_thumbnail(int $post_id): string
  {
    return get_the_post_thumbnail_url($post_id);
  }

  public function get_all_categories(int $post_id)
  {
    $this->categories = wp_get_post_categories($post_id);
    $this->category_obj[] = $this->get_all_taxonomies($this->categories);
    return $this->category_obj;
  }

  public function get_all_tags(int $post_id)
  {
    $this->tags = wp_get_post_tags($post_id);
    $this->tag_obj[] = $this->get_all_taxonomies($this->tags);
    return $this->tag_obj;
  }

  public function get_all_taxonomies(array $taxonomies)
  {
    foreach ($taxonomies as $item) {
      $taxonomy = get_category($item);
      $taxonomy_obj[] =  [
        "id" => $taxonomy->term_id,
        "name" => $taxonomy->name

      ];
    }
    return $taxonomy_obj;
  }
}
