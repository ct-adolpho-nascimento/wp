<?php

namespace Climatempo\Rest\Models;

/**
 * Displays admin news
 *
 * @link       https://github.com/StormGeo/ct-wordpress
 * @since      1.0.0
 *
 * @package    Climatempo
 * @subpackage Climatempo\Admin\Models
 */

abstract class PostTypeDefault
{
  private string $title;
  private string $date;
  private string $slug;
  private string $content;
  private string $excerpt;
  private string $thumbnail;
  private array $categories = [];
  private array $category_obj = [];
  private array $tags = [];
  private array $tag_obj = [];


  public function __construct()
  {
    $this->title = get_the_title();
    $this->date = get_post_field('post_date', get_post());
    $this->slug = get_post_field('post_name', get_post());
    $this->content = get_the_content();
    $this->excerpt = get_the_excerpt();
    $this->thumbnail = get_the_post_thumbnail_url();
  }

  public function get_title(): string
  {
    return $this->title;
  }

  public function get_date(): string
  {
    return $this->date;
  }

  public function get_slug(): string
  {
    return $this->slug;
  }


  public function get_content(): string
  {
    return $this->content;
  }

  public function get_excerpt(): string
  {
    return $this->excerpt;
  }

  public function get_thumbnail(): string
  {
    return $this->thumbnail;
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
