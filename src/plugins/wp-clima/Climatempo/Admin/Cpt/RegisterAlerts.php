<?php

namespace Climatempo\Admin\Cpt;

/**
 * Displays admin news
 *
 * @link       https://github.com/StormGeo/ct-wordpress
 * @since      1.0.0
 *
 * @package    Climatempo
 * @subpackage Climatempo\Admin\Cpt
 */

class RegisterAlerts
{
  public static function registerCustomPostAlert()
  {
    $labels = array(
      'name'               => 'Novos Alertas',
      'singular_name'      => 'Novo Alerta',
      'menu_name'          => 'Novos Alertas',
      'name_admin_bar'     => 'Novos Alertas',
      'add_new'            => 'Adicionar Nova',
      'add_new_item'       => 'Adicionar Nova Novo Alerta',
      'new_item'           => 'Nova Novo Alerta',
      'edit_item'          => 'Editar Novo Alerta',
      'view_item'          => 'Visualizar Novo Alerta',
      'all_items'          => 'Todas as Novos Alertas',
      'search_items'       => 'Pesquisar Novos Alertas',
      'parent_item_colon'  => 'Novos Alertas Pai:',
      'not_found'          => 'Nenhuma Novo Alerta encontrada.',
      'not_found_in_trash' => 'Nenhuma Novo Alerta encontrada na lixeira.'
    );

    $args = array(
      'labels'              => $labels,
      'public'              => true,
      'publicly_queryable'  => true,
      'menu_icon'           => 'dashicons-controls-volumeon',
      'show_ui'             => true,
      'show_in_menu'        => true,
      'query_var'           => true,
      'rewrite'             => array('slug' => 'alertas_ct'),
      'capability_type'     => 'post',
      'has_archive'         => true,
      'hierarchical'        => false,
      'menu_position'       => null,
      'supports'            => array('title', 'editor', 'thumbnail', 'excerpt'),
      'taxonomies'          => array('category', 'post_tag'),
    );

    register_post_type('alertas_ct', $args);
  }
}
