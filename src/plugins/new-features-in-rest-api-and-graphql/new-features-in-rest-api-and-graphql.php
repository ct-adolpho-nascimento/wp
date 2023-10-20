<?php
/*
Plugin Name: API REST e GraphQL
Description: Plugin para adiconar novos endpoints na API REST e GraphQL | Climatempo e Agroclima.
Version: 1.0
Author: Adolpho Cavalcanti
*/


// Verificar se está havendo algum acesso direto ao arquivo do plugin que não esteja autorizado
if (!defined('ABSPATH')) {
  die;
}

add_filter('register_post_type_args', function ($args, $post_type) {
  if ('web-story' === $post_type) {
    $args['show_in_graphql'] = true;
    $args['graphql_single_name'] = 'webStory';
    $args['graphql_plural_name'] = 'webStories';
  }
  return $args;
}, 10, 2);
