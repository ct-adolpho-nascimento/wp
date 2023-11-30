<?php
/*
Plugin Name: Capítulos e Versículos Plugin
Description: Um plugin simples para criar Custom Post Types de Capítulos e Versículos.
Version: 1.0
Author: Seu Nome
*/

// Registrando o Custom Post Type Capítulo
function registrar_capitulo()
{
  $labels = array(
    'name'               => _x('Capítulos', 'post type general name'),
    'singular_name'      => _x('Capítulo', 'post type singular name'),
    'add_new'            => _x('Adicionar Novo', 'capitulo'),
    'add_new_item'       => __('Adicionar Novo Capítulo'),
    'edit_item'          => __('Editar Capítulo'),
    'new_item'           => __('Novo Capítulo'),
    'all_items'          => __('Todos os Capítulos'),
    'view_item'          => __('Ver Capítulo'),
    'search_items'       => __('Buscar Capítulos'),
    'not_found'          => __('Nenhum Capítulo encontrado'),
    'not_found_in_trash' => __('Nenhum Capítulo encontrado na lixeira'),
    'parent_item_colon'  => '',
    'menu_name'          => 'Capítulos'
  );

  $args = array(
    'labels'             => $labels,
    'public'             => true,
    'has_archive'        => true,
    'menu_icon'          => 'dashicons-media-text', // Ícone para o menu
    'hierarchical'       => true, // Isso torna hierárquico, semelhante às páginas
    'supports'           => array('title', 'editor', 'page-attributes'),
    'rewrite'            => array('slug' => 'capitulo'),
    'register_meta_box_cb' => 'adicionar_metabox_capitulo', // Adicionando metabox para Capítulo
  );

  register_post_type('capitulo', $args);
}

// Adicionando o metabox para o campo 'concluido' no Capítulo
function adicionar_metabox_capitulo()
{
  add_meta_box(
    'concluido_capitulo',
    'Concluído',
    'mostrar_metabox_capitulo',
    'capitulo',
    'side',
    'default'
  );
}

// Função para mostrar o conteúdo do metabox para o campo 'concluido' no Capítulo
function mostrar_metabox_capitulo($post)
{
  $concluido = get_post_meta($post->ID, '_concluido_capitulo', true);
  wp_nonce_field('salvar_metabox_capitulo', 'nonce_capitulo');

  echo '<label for="concluido_capitulo">';
  echo '<input type="checkbox" id="concluido_capitulo" name="concluido_capitulo" ' . checked($concluido, true, false) . ' />';
  echo ' Capítulo Concluído';
  echo '</label>';
}

// Salvar o valor do campo 'concluido' no Capítulo
function salvar_metabox_capitulo($post_id)
{
  if (defined('DOING_AUTOSAVE') && DOING_AUTOSAVE) return;
  if (!isset($_POST['nonce_capitulo']) || !wp_verify_nonce($_POST['nonce_capitulo'], 'salvar_metabox_capitulo')) return;
  if (!current_user_can('edit_post', $post_id)) return;

  $concluido = isset($_POST['concluido_capitulo']) ? true : false;
  update_post_meta($post_id, '_concluido_capitulo', $concluido);
}

// Registrando o Custom Post Type Versículo
function registrar_versiculo()
{
  $labels = array(
    'name'               => _x('Versículos', 'post type general name'),
    'singular_name'      => _x('Versículo', 'post type singular name'),
    'add_new'            => _x('Adicionar Novo', 'versiculo'),
    'add_new_item'       => __('Adicionar Novo Versículo'),
    'edit_item'          => __('Editar Versículo'),
    'new_item'           => __('Novo Versículo'),
    'all_items'          => __('Todos os Versículos'),
    'view_item'          => __('Ver Versículo'),
    'search_items'       => __('Buscar Versículos'),
    'not_found'          => __('Nenhum Versículo encontrado'),
    'not_found_in_trash' => __('Nenhum Versículo encontrado na lixeira'),
    'parent_item_colon'  => __('Capítulo Pai:'),
    'menu_name'          => 'Versículos'
  );

  $args = array(
    'labels'             => $labels,
    'public'             => true,
    'has_archive'        => true,
    'menu_icon'          => 'dashicons-media-text', // Ícone para o menu
    'hierarchical'       => true, // Isso torna hierárquico, semelhante às páginas
    'supports'           => array('title', 'editor', 'page-attributes'),
    'rewrite'            => array('slug' => 'versiculo'),
    'register_meta_box_cb' => 'adicionar_metabox_versiculo', // Adicionando metabox para Versículo
  );

  register_post_type('versiculo', $args);
}

// Adicionando o metabox para o campo 'concluido' no Versículo
function adicionar_metabox_versiculo()
{
  add_meta_box(
    'concluido_versiculo',
    'Concluído',
    'mostrar_metabox_versiculo',
    'versiculo',
    'side',
    'default'
  );
}

// Função para mostrar o conteúdo do metabox para o campo 'concluido' no Versículo
function mostrar_metabox_versiculo($post)
{
  $concluido = get_post_meta($post->ID, '_concluido_versiculo', true);
  wp_nonce_field('salvar_metabox_versiculo', 'nonce_versiculo');

  echo '<label for="concluido_versiculo">';
  echo '<input type="checkbox" id="concluido_versiculo" name="concluido_versiculo" ' . checked($concluido, true, false) . ' />';
  echo ' Versículo Concluído';
  echo '</label>';
}

// Salvar o valor do campo 'concluido' no Versículo
function salvar_metabox_versiculo($post_id)
{
  if (defined('DOING_AUTOSAVE') && DOING_AUTOSAVE) return;
  if (!isset($_POST['nonce_versiculo']) || !wp_verify_nonce($_POST['nonce_versiculo'], 'salvar_metabox_versiculo')) return;
  if (!current_user_can('edit_post', $post_id)) return;

  $concluido = isset($_POST['concluido_versiculo']) ? true : false;
  update_post_meta($post_id, '_concluido_versiculo', $concluido);

  // Verificar se todos os versículos pertencentes ao capítulo estão concluídos
  $capitulo_id = wp_get_post_parent_id($post_id);
  if ($capitulo_id) {
    $versiculos_do_capitulo = get_posts(array(
      'post_type'      => 'versiculo',
      'posts_per_page' => -1,
      'post_parent'    => $capitulo_id,
    ));

    $capitulo_concluido = true;

    foreach ($versiculos_do_capitulo as $versiculo) {
      $concluido_versiculo = get_post_meta($versiculo->ID, '_concluido_versiculo', true);
      if (!$concluido_versiculo) {
        $capitulo_concluido = false;
        break;
      }
    }

    update_post_meta($capitulo_id, '_concluido_capitulo', $capitulo_concluido);
  }
}

// Adicionando os Hooks para registrar os tipos de conteúdo personalizados
add_action('init', 'registrar_capitulo');
add_action('init', 'registrar_versiculo');

// Adicionando os Hooks para os metaboxes
add_action('add_meta_boxes', 'adicionar_metabox_capitulo');
add_action('add_meta_boxes', 'adicionar_metabox_versiculo');

// Adicionando os Hooks para salvar os valores dos metaboxes
add_action('save_post', 'salvar_metabox_capitulo');
add_action('save_post', 'salvar_metabox_versiculo');
