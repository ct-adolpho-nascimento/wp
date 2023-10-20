<?php

/**
 * Plugin Name: Addon suporte GraphQL
 * Description: Adiciona suporte GraphQL ao tipo de post 'web-story'.
 * Version: 1.0
 * Author: Adolpho Cavalcanti
 */
add_filter('register_post_type_args', function ($args, $post_type) {
  if ('web-story' === $post_type) {
    $args['show_in_graphql'] = true;
    $args['graphql_single_name'] = 'webStory';
    $args['graphql_plural_name'] = 'webStories';
  }
  return $args;
}, 10, 2);
