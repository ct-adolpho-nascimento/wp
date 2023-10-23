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

class New_Notices extends Post_Type_Default
{
  private $top_news;
  private string $title_seo;
  private string $description_seo;

  private array $custom_categories = [];
  private array $custom_categories_obj = [];
  private array $custom_tags = [];
  private array $custom_tags_obj = [];

  public function __construct(int $post_id)
  {
    parent::__construct();
    $this->top_news = get_post_meta($post_id, 'top_news', true);
    $this->title_seo = get_post_meta($post_id, 'title_seo', true);
    $this->description_seo = get_post_meta($post_id, 'description_seo', true);
  }

  public function get_top_news()
  {
    return $this->top_news;
  }

  public function get_title_seo(): string
  {
    return $this->title_seo;
  }

  public function get_description_seo(): string
  {
    return $this->description_seo;
  }

  public function get_all_categories_per_taxonomies(int $post_id)
  {
    $this->custom_categories = wp_get_post_terms($post_id, 'categoria_clima');
    $this->custom_categories_obj[] = parent::get_all_taxonomies($this->custom_categories);
    return $this->custom_categories_obj;
  }

  public function get_all_tags_per_taxonomies(int $post_id)
  {
    $this->custom_tags = wp_get_post_terms($post_id, 'custom_tags');
    $this->custom_tags_obj[] = parent::get_all_taxonomies($this->custom_tags);
    return $this->custom_tags_obj;
  }
}
