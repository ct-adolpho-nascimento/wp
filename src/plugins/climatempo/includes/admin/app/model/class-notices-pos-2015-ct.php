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

class Notices_Pos_2015_Ct extends Post_Type_Default
{
  private $top_news;
  private string $title_seo;
  private string $description_seo;

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
}
