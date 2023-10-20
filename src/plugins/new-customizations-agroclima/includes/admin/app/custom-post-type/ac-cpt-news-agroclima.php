<?php
class AC_CptNewsAgroclima
{
  function criar_custom_post_type()
  {
    $labels = array(
      'name'               => 'CPT News Agrícolas',
      'singular_name'      => 'CPT News Agrícola',
      'menu_name'          => 'CPT News Agrícolas',
      'name_admin_bar'     => 'CPT News Agrícolas',
      'add_new'            => 'Adicionar Nova',
      'add_new_item'       => 'Adicionar Nova CPT News Agrícola',
      'new_item'           => 'Nova CPT News Agrícola',
      'edit_item'          => 'Editar CPT News Agrícola',
      'view_item'          => 'Visualizar CPT News Agrícola',
      'all_items'          => 'Todas as CPT News Agrícolas',
      'search_items'       => 'Pesquisar CPT News Agrícolas',
      'parent_item_colon'  => 'CPT News Agrícolas Pai:',
      'not_found'          => 'Nenhuma CPT News Agrícola encontrada.',
      'not_found_in_trash' => 'Nenhuma CPT News Agrícola encontrada na lixeira.'
    );

    $args = array(
      'labels'              => $labels,
      'public'              => true,
      'publicly_queryable'  => true,
      'show_ui'             => true,
      'show_in_menu'        => true,
      'query_var'           => true,
      'rewrite'             => array('slug' => 'cpt-news-agricolas'),
      'capability_type'     => 'post',
      'has_archive'         => true,
      'hierarchical'        => false,
      'menu_position'       => null,
      'supports'            => array('title', 'editor', 'thumbnail', 'excerpt'),
      'taxonomies'          => array('category'),
    );

    register_post_type('cpt-news-agricolas', $args);
  }
}
