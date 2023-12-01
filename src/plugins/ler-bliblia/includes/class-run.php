<?php

// Registrando o Custom Post Type Livro
function registrar_livro()
{
  $labels = array(
    'name'               => _x('Livros', 'post type general name'),
    'singular_name'      => _x('Livro', 'post type singular name'),
    'add_new'            => _x('Adicionar Novo', 'capitulo'),
    'add_new_item'       => __('Adicionar Novo Livro'),
    'edit_item'          => __('Editar Livro'),
    'new_item'           => __('Novo Livro'),
    'all_items'          => __('Todos os Livros'),
    'view_item'          => __('Ver Livro'),
    'search_items'       => __('Buscar Livros'),
    'not_found'          => __('Nenhum Livro encontrado'),
    'not_found_in_trash' => __('Nenhum Livro encontrado na lixeira'),
    'parent_item_colon'  => '',
    'menu_name'          => 'Livros'
  );

  $args = array(
    'labels'             => $labels,
    'public'             => true,
    'has_archive'        => true,
    'menu_icon'          => 'dashicons-book', // Ícone para o menu
    'hierarchical'       => true, // Isso torna hierárquico, semelhante às páginas
    'supports'           => array('title', 'editor'),
    'rewrite'            => array('slug' => 'livro'),
    'register_meta_box_cb' => 'adicionar_metabox_livro', // Adicionando metabox para Capítulo
  );

  register_post_type('livro', $args);
}


// Adicionando o metabox para o campo 'concluido' no Capítulo
function adicionar_metabox_livro()
{
  add_meta_box(
    'concluido_livro',
    'Concluído',
    'mostrar_metabox_livro',
    'livro',
    'side',
    'default'
  );
}

// Função para mostrar o conteúdo do metabox para o campo 'concluido' no Capítulo
function mostrar_metabox_livro($post)
{
  $concluido = get_post_meta($post->ID, '_concluido_livro', true);
  wp_nonce_field('salvar_metabox_livro', 'nonce_livro');

  echo '<label for="concluido_livro">';
  echo '<input type="checkbox" id="concluido_livro" name="concluido_livro" ' . checked($concluido, true, false) . ' />';
  echo ' Capítulo Concluído';
  echo '</label>';
}

// Salvar o valor do campo 'concluido' no Capítulo
function salvar_metabox_livro($post_id)
{
  if (defined('DOING_AUTOSAVE') && DOING_AUTOSAVE) return;
  if (!isset($_POST['nonce_livro']) || !wp_verify_nonce($_POST['nonce_livro'], 'salvar_metabox_livro')) return;
  if (!current_user_can('edit_post', $post_id)) return;

  $concluido = isset($_POST['concluido_livro']) ? true : false;
  update_post_meta($post_id, '_concluido_livro', $concluido);
}




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
    'parent_item_colon'  => __('Capítulo Pai:'),
    'menu_name'          => 'Capítulos'
  );

  $args = array(
    'labels'             => $labels,
    'public'             => true,
    'has_archive'        => true,
    'menu_icon'          => 'dashicons-media-text', // Ícone para o menu
    'hierarchical'       => true, // Isso torna hierárquico, semelhante às páginas
    'supports'           => array('title', 'editor'),
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
    'supports'           => array('title', 'editor'),
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
add_action('init', 'registrar_livro');
add_action('init', 'registrar_capitulo');
add_action('init', 'registrar_versiculo');

// Adicionando os Hooks para os metaboxes
add_action('add_meta_boxes', 'adicionar_metabox_livro');
add_action('add_meta_boxes', 'adicionar_metabox_capitulo');
add_action('add_meta_boxes', 'adicionar_metabox_versiculo');

// Adicionando os Hooks para salvar os valores dos metaboxes
add_action('save_post', 'salvar_metabox_livro');
add_action('save_post', 'salvar_metabox_capitulo');
add_action('save_post', 'salvar_metabox_versiculo');


// Adicionando o metabox de seleção de Capítulo para Versículo
function adicionar_metabox_selecao_capitulo()
{
  add_meta_box(
    'selecao_capitulo',
    'Selecione o Capítulo',
    'mostrar_metabox_selecao_capitulo',
    'versiculo',
    'side',
    'default'
  );
}

// Função para mostrar o conteúdo do metabox de seleção de Capítulo para Versículo
function mostrar_metabox_selecao_capitulo($post)
{
  $capitulos = get_posts(array(
    'post_type'      => 'capitulo',
    'posts_per_page' => -1,
  ));

  if ($capitulos) {
    echo '<label for="capitulo_relacionado">';
    echo '<select id="capitulo_relacionado" name="capitulo_relacionado">';
    echo '<option value="">Selecione o Capítulo</option>';

    foreach ($capitulos as $capitulo) {
      $selected = get_post_meta($post->ID, '_capitulo_relacionado', true) == $capitulo->ID ? 'selected="selected"' : '';
      echo '<option value="' . esc_attr($capitulo->ID) . '" ' . $selected . '>' . esc_html($capitulo->post_title) . '</option>';
    }

    echo '</select>';
    echo '</label>';
  } else {
    echo 'Crie Capítulos primeiro.';
  }
}

// Salvar o valor do campo 'capitulo_relacionado' no Versículo
function salvar_metabox_selecao_capitulo($post_id)
{
  if (defined('DOING_AUTOSAVE') && DOING_AUTOSAVE) return;
  if (!current_user_can('edit_post', $post_id)) return;

  $capitulo_relacionado = isset($_POST['capitulo_relacionado']) ? intval($_POST['capitulo_relacionado']) : 0;
  update_post_meta($post_id, '_capitulo_relacionado', $capitulo_relacionado);
}

// Adicionando os Hooks para o metabox de seleção de Capítulo
add_action('add_meta_boxes', 'adicionar_metabox_selecao_capitulo');

// Adicionando os Hooks para salvar o valor do campo 'capitulo_relacionado'
add_action('save_post', 'salvar_metabox_selecao_capitulo');


//API REST
// Adicionando rotas personalizadas à API REST
function registrar_rotas_api()
{
  register_rest_route('wp/v2', '/capitulos', array(
    'methods'  => 'GET',
    'callback' => 'listar_capitulos',
  ));

  register_rest_route('wp/v2', '/versiculos', array(
    'methods'  => 'GET',
    'callback' => 'listar_versiculos',
  ));
}

// Callback para listar todos os Capítulos
function listar_capitulos($data)
{
  $args = array(
    'post_type'      => 'capitulo',
    'posts_per_page' => -1,
  );

  $capitulos = get_posts($args);

  $capitulos_formatados = array();

  foreach ($capitulos as $capitulo) {
    $concluido = get_post_meta($capitulo->ID, '_concluido_capitulo', true);

    $capitulo_formatado = array(
      'ID'        => $capitulo->ID,
      'title'     => $capitulo->post_title,
      'concluido' => $concluido,
    );

    $capitulos_formatados[] = $capitulo_formatado;
  }

  return rest_ensure_response($capitulos_formatados);
}

// Callback para listar todos os Versículos
function listar_versiculos($data)
{
  $args = array(
    'post_type'      => 'versiculo',
    'posts_per_page' => -1,
  );

  $versiculos = get_posts($args);

  $versiculos_formatados = array();

  foreach ($versiculos as $versiculo) {
    $concluido            = get_post_meta($versiculo->ID, '_concluido_versiculo', true);
    $capitulo_relacionado = get_post_meta($versiculo->ID, '_capitulo_relacionado', true);

    $versiculo_formatado = array(
      'ID'                  => $versiculo->ID,
      'title'               => $versiculo->post_title,
      'concluido'           => $concluido,
      'capitulo_relacionado' => $capitulo_relacionado,
    );

    $versiculos_formatados[] = $versiculo_formatado;
  }

  return rest_ensure_response($versiculos_formatados);
}

// Adicionando ações para registrar rotas personalizadas
add_action('rest_api_init', 'registrar_rotas_api');


/**
 * Capitulos e versículos
 */
// Adicionando rota personalizada para listar Capítulos com seus Versículos
function registrar_rota_capitulos_versiculos()
{
  register_rest_route('wp/v2', '/capitulos-versiculos', array(
    'methods'  => 'GET',
    'callback' => 'listar_capitulos_versiculos',
  ));
}

// Callback para listar Capítulos com seus Versículos
function listar_capitulos_versiculos($data)
{
  $args = array(
    'post_type'      => 'capitulo',
    'posts_per_page' => -1,
  );

  $capitulos = get_posts($args);

  $capitulos_formatados = array();

  foreach ($capitulos as $capitulo) {
    $concluido = get_post_meta($capitulo->ID, '_concluido_capitulo', true);

    $versiculos_args = array(
      'post_type'      => 'versiculo',
      'posts_per_page' => -1,
      'meta_query'     => array(
        array(
          'key'   => '_capitulo_relacionado',
          'value' => $capitulo->ID,
        ),
      ),
    );

    $versiculos = get_posts($versiculos_args);

    $versiculos_formatados = array();

    foreach ($versiculos as $versiculo) {
      $concluido_versiculo = get_post_meta($versiculo->ID, '_concluido_versiculo', true);

      $versiculo_formatado = array(
        'ID'                  => $versiculo->ID,
        'title'               => $versiculo->post_title,
        'concluido'           => $concluido_versiculo,
        'capitulo_relacionado' => $capitulo->ID,
      );

      $versiculos_formatados[] = $versiculo_formatado;
    }

    $capitulo_formatado = array(
      'ID'        => $capitulo->ID,
      'title'     => $capitulo->post_title,
      'concluido' => $concluido,
      'versiculos' => $versiculos_formatados,
    );

    $capitulos_formatados[] = $capitulo_formatado;
  }

  return rest_ensure_response($capitulos_formatados);
}

// Adicionando ação para registrar a rota personalizada
add_action('rest_api_init', 'registrar_rota_capitulos_versiculos');
