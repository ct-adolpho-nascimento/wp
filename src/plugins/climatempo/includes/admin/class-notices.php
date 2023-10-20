<?php

namespace Climatempo\Admin;

/**
 * Displays admin notices
 *
 * @link       https://github.com/StormGeo/ct-wordpress
 * @since      1.0.0
 *
 * @package    Climatempo
 * @subpackage Climatempo\Admin
 */

// If this file is called directly, abort.
if (!defined('ABSPATH')) {
  exit;
}

class Notices
{

  public static function registerCustomPost()
  {
    $labels = array(
      'name'               => 'Novas Notícias Climatempo',
      'singular_name'      => 'Nova Notícia Climatempo',
      'menu_name'          => 'Novas Notícias Climatempo',
      'name_admin_bar'     => 'Novas Notícias Climatempo',
      'add_new'            => 'Adicionar Nova',
      'add_new_item'       => 'Adicionar Nova Nova Notícia Climatempo',
      'new_item'           => 'Nova Nova Notícia Climatempo',
      'edit_item'          => 'Editar Nova Notícia Climatempo',
      'view_item'          => 'Visualizar Nova Notícia Climatempo',
      'all_items'          => 'Todas as Novas Notícias Climatempo',
      'search_items'       => 'Pesquisar Novas Notícias Climatempo',
      'parent_item_colon'  => 'Novas Notícias Climatempo Pai:',
      'not_found'          => 'Nenhuma Nova Notícia Climatempo encontrada.',
      'not_found_in_trash' => 'Nenhuma Nova Notícia Climatempo encontrada na lixeira.'
    );

    $args = array(
      'labels'              => $labels,
      'public'              => true,
      'publicly_queryable'  => true,
      'show_ui'             => true,
      'show_in_menu'        => true,
      'query_var'           => true,
      'rewrite'             => array('slug' => 'novas_noticias'),
      'capability_type'     => 'post',
      'has_archive'         => true,
      'hierarchical'        => false,
      'menu_position'       => null,
      'supports'            => array('title', 'editor', 'thumbnail', 'excerpt'),
      'taxonomies'          => array('category', 'tags'),
    );

    register_post_type('novas_noticias', $args);
  }
}
