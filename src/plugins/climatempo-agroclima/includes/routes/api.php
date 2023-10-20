<?php

// Função para adicionar os campos personalizados como metadados na API REST
function add_custom_seo_fields_to_api() {
  register_rest_field(
      'page', // Tipo de post ao qual os campos personalizados serão adicionados (neste caso, 'page')
      'custom_seo_fields', // Nome do campo personalizado na resposta da API
      array(
          'get_callback'    => 'get_custom_seo_fields', // Função de callback para recuperar os valores dos campos personalizados
          'update_callback' => null, // Função de callback para atualizar os valores dos campos personalizados (opcional)
          'schema'          => null, // Esquema de validação dos campos personalizados (opcional)
      )
  );
}
add_action( 'rest_api_init', 'add_custom_seo_fields_to_api' );

// Função de callback para recuperar os valores dos campos personalizados
function get_custom_seo_fields( $object ) {
  $post_id = $object['id'];
  
  $title_seo = get_post_meta( $post_id, 'title_seo', true );
  $description_seo = get_post_meta( $post_id, 'description_seo', true );
  
  return array(
      'title_seo'       => $title_seo,
      'description_seo' => $description_seo,
  );
}
