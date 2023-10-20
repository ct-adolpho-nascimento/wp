<?php
function ct_web_stories_endpoint()
{
  $args = array(
    'post_type'      => 'web-story',
    'posts_per_page' => -1,
  );

  $query = new WP_Query($args);

  $data = array();

  if ($query->have_posts()) {
    while ($query->have_posts()) {
      $query->the_post();

      $post_id = get_the_ID();
      $post_title = get_the_title();
      $post_slug = get_post_field('post_name', $post_id);
      $post_excerpt = get_the_excerpt();
      $post_content = get_the_content();
      $post_thumbnail = get_the_post_thumbnail_url();
      $post_date = get_the_date();

      $data[] = array(
        'id'                    => $post_id,
        'title'                 => $post_title,
        'slug'                  => $post_slug,
        'excerpt'               => $post_excerpt,
        'thumbnail'             => $post_thumbnail,
        'date'                  => $post_date,
        'content'               => $post_content
      );
    }
  }

  wp_reset_postdata();

  return rest_ensure_response($data);
}

//GET SLUG
function web_stories_single_endpoint($request)
{
  $slug = $request['slug'];
  $post = get_page_by_path($slug, OBJECT, 'web-story');

  if (empty($post) || $post->post_type !== 'web-story') {
    return new WP_Error('not_found', 'Nenhum Web Story foi encontrado.', array('status' => 404));
  }

  $post_content = $post->post_content;
  $post_excerpt = $post->post_excerpt;

  $data = array(
    'excerpt'           => $post_excerpt,
    'content'           => $post_content,
  );

  return rest_ensure_response($data);
}

function ct_register_web_stories_endpoint()
{
  register_rest_route('wp/v2', '/web-stories', array(
    'methods' => WP_REST_Server::READABLE,
    'callback' => 'ct_web_stories_endpoint',
  ));
  register_rest_route('wp/v2', '/web-stories/(?P<slug>[a-zA-Z0-9-]+)', array(
    'methods' => WP_REST_Server::READABLE,
    'callback' => 'web_stories_single_endpoint',
  ));
}
add_action('rest_api_init', 'ct_register_web_stories_endpoint');
