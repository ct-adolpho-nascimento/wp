<?php
class SEO_Metabox_Plugin {
  private $metaboxes;

  public function __construct() {
    $this->metaboxes = array(
      new SEO_Title_Metabox(),
      new SEO_Description_Metabox(),
    );
  }

  public function run() {
    // Registra os metaboxes.
    add_action('add_meta_boxes', array($this, 'add_seo_metaboxes'));

    // Salva os dados dos metaboxes.
    add_action('save_post', array($this, 'save_seo_metabox_data'));
  }

  public function add_seo_metaboxes() {
    foreach ($this->metaboxes as $metabox) {
      $metabox->register();
    }
  }

  public function save_seo_metabox_data($post_id) {
    // Verifica se o usuário atual tem permissão para editar o post.
    if (!current_user_can('edit_post', $post_id)) {
      return;
    }

    foreach ($this->metaboxes as $metabox) {
      $metabox->save($post_id);
    }
  }
}
