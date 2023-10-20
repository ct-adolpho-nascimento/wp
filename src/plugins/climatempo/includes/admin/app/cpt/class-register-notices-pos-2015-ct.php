<?php

namespace Climatempo\Admin\App\Cpt;

/**
 * Displays admin news
 *
 * @link       https://github.com/StormGeo/ct-wordpress
 * @since      1.0.0
 *
 * @package    Climatempo
 * @subpackage Climatempo\Admin\App\Cpt
 */

class Register_Notices_Pos_2015_Ct
{
  function registerCustomPost()
  {
    $labels = array(
      'name'               => 'Notícias pós 07/15',
      'singular_name'      => 'Notícia',
      'menu_name'          => 'Notícias pós 07/15',
      'name_admin_bar'     => 'Notícias pós 07/15',
      'add_new'            => 'Adicionar Nova',
      'add_new_item'       => 'Adicionar Nova Notícia',
      'new_item'           => 'Nova Notícia',
      'edit_item'          => 'Editar Notícia',
      'view_item'          => 'Visualizar Notícia',
      'all_items'          => 'Todas as Notícias pós 07/15',
      'search_items'       => 'Pesquisar Notícias pós 07/15',
      'parent_item_colon'  => 'Notícias pós 07/15 Pai:',
      'not_found'          => 'Nenhuma Notícia encontrada.',
      'not_found_in_trash' => 'Nenhuma Notícia encontrada na lixeira.'
    );

    $args = array(
      'labels'              => $labels,
      'public'              => true,
      'publicly_queryable'  => true,
      'menu_icon'           => 'dashicons-controls-forward',
      'show_ui'             => true,
      'show_in_menu'        => true,
      'query_var'           => true,
      'rewrite'             => array('slug' => 'ct_noticias_pos_2015'),
      'capability_type'     => 'post',
      'has_archive'         => true,
      'hierarchical'        => false,
      'menu_position'       => null,
      'supports'            => array('title', 'editor', 'thumbnail', 'excerpt'),
      'taxonomies'          => array('category', 'post_tag'),
    );

    register_post_type('ct_noticias_pos_2015', $args);
  }
}
