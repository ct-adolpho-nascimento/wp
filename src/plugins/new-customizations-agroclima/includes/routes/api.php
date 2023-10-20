<?php

function noticias_agricolas_endpoint($request)
{
  $get_per_page = $request->get_param('per_page');
  $per_page = (isset($get_per_page) || !(empty($get_per_page))) ? $get_per_page : -1;
  $args = array(
    'post_type'      => 'cpt-news-agricolas',
    'posts_per_page' => $per_page,
  );

  $query = new WP_Query($args);

  $data = array();

  if ($query->have_posts()) {
    while ($query->have_posts()) {
      $query->the_post();

      $post_id = get_the_ID();
      $post_date = get_post_field('post_date', get_post());
      $post_title = get_the_title();
      $post_slug = get_post_field('post_name', get_post());
      $post_content = get_the_content();
      $post_excerpt = get_the_excerpt();
      $post_thumbnail = get_the_post_thumbnail_url();
      $categories = wp_get_post_categories($post_id);
      $post_tags = wp_get_post_tags($post_id);
      $ac_title_seo = get_post_meta($post_id, 'ac_title_seo', true);
      $ac_description_seo = get_post_meta($post_id, 'ac_description_seo', true);
      $top_news = get_post_meta($post_id, 'top_news', true);

      $category_names = array();
      $tag_names = array();

      foreach ($categories as $category_id) {
        $category = get_category($category_id);
        $category_names[] = $category->name;
      }

      foreach ($post_tags as $tag_id) {
        $tag = get_category($tag_id);
        $tag_names[] = $tag->name;
      }

      $data[] = array(
        'id'                    => $post_id,
        'date'                  => $post_date,
        'title'                 => $post_title,
        'slug'                  => $post_slug,
        'content'               => $post_content,
        'excerpt'               => $post_excerpt,
        'thumbnail'             => $post_thumbnail,
        'categories'            => $category_names,
        'tags'                  => $tag_names,
        'title_seo'             => $ac_title_seo,
        'description_seo'       => $ac_description_seo,
        'top_news'      => intval($top_news),
      );
    }
  }

  wp_reset_postdata();

  return rest_ensure_response($data);
}

// //GET ID
function noticias_agricolas_single_endpoint($request)
{
  $id = $request->get_param('id');
  $post = get_post($id);

  if (empty($post) || $post->post_type !== 'cpt-news-agricolas') {
    return new WP_Error('not_found', 'Get ID Notícia agricolas não encontrada.', array('status' => 404));
  }

  $post_id = $post->ID;
  $post_thumbnail = get_the_post_thumbnail_url($post_id);
  $categories = wp_get_post_categories($post_id);
  $tags = wp_get_post_tags($post_id);
  $ac_title_seo = get_post_meta($post_id, 'ac_title_seo', true);
  $ac_description_seo = get_post_meta($post_id, 'ac_description_seo', true);
  $top_news = get_post_meta($post_id, 'top_news', true);

  $category_names = array();
  $tag_names = array();

  foreach ($categories as $category_id) {
    $category = get_category($category_id);
    $category_names[] = $category->name;
  }

  foreach ($tags as $tag_id) {
    $tag = get_category($tag_id);
    $tag_names[] = $tag->name;
  }

  $data = array(
    'id'                => $post_id,
    'date'              => $post->post_date,
    'title'             => $post->post_title,
    'slug'              => $post->post_name,
    'content'           => $post->post_content,
    'excerpt'           => $post->post_excerpt,
    'thumbnail'         => $post_thumbnail,
    'categories'        => $category_names,
    'tags'              => $tag_names,
    'title_seo'         => $ac_title_seo,
    'description_seo'   => $ac_description_seo,
    'top_news'  => intval($top_news)
  );

  return rest_ensure_response($data);
}

function noticias_agricolas_by_slug($request)
{
  $slug = $request->get_param('slug');
  $args = array(
    'name' => $slug,
    'post_type' => 'cpt-news-agricolas',
    'posts_per_page' => 1,
  );

  $posts = get_posts($args);

  $post = $posts[0];

  if (empty($post) || $post->post_type !== 'cpt-news-agricolas') {
    return new WP_Error('not_found', 'By Slug Notícia agricolas não encontrada.', array('status' => 404));
  }

  $post_id = $post->ID;
  $post_thumbnail = get_the_post_thumbnail_url($post_id);
  $categories = wp_get_post_categories($post_id);
  $tags = wp_get_post_tags($post_id);
  $ac_title_seo = get_post_meta($post_id, 'ac_title_seo', true);
  $ac_description_seo = get_post_meta($post_id, 'ac_description_seo', true);
  $top_news = get_post_meta($post_id, 'top_news', true);

  $category_names = array();
  $tag_names = array();

  foreach ($categories as $category_id) {
    $category = get_category($category_id);
    $category_names[] = $category->name;
  }

  foreach ($tags as $tag_id) {
    $tag = get_category($tag_id);
    $tag_names[] = $tag->name;
  }

  $data = array(
    'id'                => $post_id,
    'date'              => $post->post_date,
    'title'             => $post->post_title,
    'slug'              => $post->post_name,
    'content'           => $post->post_content,
    'excerpt'           => $post->post_excerpt,
    'thumbnail'         => $post_thumbnail,
    'categories'        => $category_names,
    'tags'              => $tag_names,
    'title_seo'         => $ac_title_seo,
    'description_seo'   => $ac_description_seo,
    'top_news'  => intval($top_news),
  );

  return rest_ensure_response($data);
}

function get_all_posts_agroclima_per_category($request)
{
  $category_slug = $request->get_param('category');
  $category = get_term_by('slug', $category_slug, 'category');

  if (!$category) {
    return new WP_Error('category_not_found', 'Categoria não encontrada', array('status' => 404));
  }

  $get_per_page = $request->get_param('per_page');
  $per_page = (isset($get_per_page) || !(empty($get_per_page))) ? $get_per_page : -1;
  $args = array(
    'post_type'      => 'cpt-news-agricolas',
    'posts_per_page' => $per_page,
    'category__in' => $category->term_id,
  );

  $query = new WP_Query($args);

  $data = array();

  if ($query->have_posts()) {
    while ($query->have_posts()) {
      $query->the_post();

      $post_id = get_the_ID();
      $post_date = get_post_field('post_date', get_post());
      $post_title = get_the_title();
      $post_slug = get_post_field('post_name', get_post());
      $post_content = get_the_content();
      $post_excerpt = get_the_excerpt();
      $post_thumbnail = get_the_post_thumbnail_url();
      $categories = wp_get_post_categories($post_id);
      $post_tags = wp_get_post_tags($post_id);
      $ac_title_seo = get_post_meta($post_id, 'ac_title_seo', true);
      $ac_description_seo = get_post_meta($post_id, 'ac_description_seo', true);
      $top_news = get_post_meta($post_id, 'top_news', true);

      $category_names = array();
      $tag_names = array();

      foreach ($categories as $category_id) {
        $category = get_category($category_id);
        $category_names[] = $category->name;
      }

      foreach ($post_tags as $tag_id) {
        $tag = get_category($tag_id);
        $tag_names[] = $tag->name;
      }

      $data[] = array(
        'id'                    => $post_id,
        'date'                  => $post_date,
        'title'                 => $post_title,
        'slug'                  => $post_slug,
        'content'               => $post_content,
        'excerpt'               => $post_excerpt,
        'thumbnail'             => $post_thumbnail,
        'categories'            => $category_names,
        'tags'                  => $tag_names,
        'title_seo'             => $ac_title_seo,
        'description_seo'       => $ac_description_seo,
        'top_news'      => intval($top_news),
      );
    }
  }

  wp_reset_postdata();

  return rest_ensure_response($data);
}

function register_noticias_agricolas_endpoint()
{
  register_rest_route('wp/v2', '/ct-noticias-agricolas', array(
    'methods' => WP_REST_Server::READABLE,
    'callback' => 'noticias_agricolas_endpoint',
  ));

  register_rest_route('wp/v2', '/ct-noticias-agricolas/(?P<id>\d+)', array(
    'methods' => WP_REST_Server::READABLE,
    'callback' => 'noticias_agricolas_single_endpoint',
  ));

  register_rest_route('wp/v2', '/ct-noticias-agricolas/by-slug/(?P<slug>[a-zA-Z0-9-]+)', array(
    'methods' => WP_REST_Server::READABLE,
    'callback' => 'noticias_agricolas_by_slug',
  ));

  register_rest_route('wp/v2', '/ct-noticias-agricolas/categories/(?P<category>[a-zA-Z0-9-]+)', array(
    'methods' => WP_REST_Server::READABLE,
    'callback' => 'get_all_posts_agroclima_per_category',
  ));
}
add_action('rest_api_init', 'register_noticias_agricolas_endpoint');
