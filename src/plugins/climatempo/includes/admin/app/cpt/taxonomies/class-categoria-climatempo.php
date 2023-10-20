<?php

namespace Climatempo\Admin\App\Cpt\Taxonomies;

/**
 * Displays admin news
 *
 * @link       https://github.com/StormGeo/ct-wordpress
 * @since      1.0.0
 *
 * @package    Climatempo
 * @subpackage Climatempo\Admin\App\Cpt\Taxonomies
 */

class Categoria_Climatempo
{
  public static function register_taxonomy_categoria_clima()
  {
    $labels = array(
      'name' => 'Categorias de Clima',
      'singular_name' => 'Categoria de Clima',
      'search_items' => 'Procurar Categorias de Clima',
      'all_items' => 'Todas as Categorias de Clima',
      'edit_item' => 'Editar Categoria de Clima',
      'update_item' => 'Atualizar Categoria de Clima',
      'add_new_item' => 'Adicionar Nova Categoria de Clima',
      'new_item_name' => 'Nome da Nova Categoria de Clima',
      'menu_name' => 'Categorias de Clima',
    );

    $args = array(
      'hierarchical' => true,
      'labels' => $labels,
      'show_ui' => true,
      'show_admin_column' => true,
      'query_var' => true,
      'rewrite' => array('slug' => 'categoria_clima'),
    );

    register_taxonomy('categoria_clima', 'novas_noticias', $args);
  }
}
