<?php
class AC_Agroclima_Controller
{

  private $metaboxes;
  private $cpts; // Custom Post Types

  public function __construct()
  {
    $this->metaboxes = array(
      new AC_Title_Seo_Metabox(),
      new AC_Description_Seo_Metabox(),
    );

    $this->cpts = array(
      new AC_CptNewsAgroclima(),
    );
  }

  public function run()
  {
    // Registra os metaboxes.
    add_action('add_meta_boxes', array($this, 'add_metaboxes'));

    // Salva os dados dos metaboxes.
    add_action('save_post', array($this, 'save_metabox_data'));

    //Registra o Custom Post Type
    add_action('init', array($this, 'add_custom_post_types'));
  }

  public function add_metaboxes()
  {
    foreach ($this->metaboxes as $metabox) {
      $metabox->register();
    }
  }

  public function save_metabox_data($post_id)
  {
    // Verifica se o usuário atual tem permissão para editar o post.
    if (!current_user_can('edit_post', $post_id)) {
      return;
    }

    foreach ($this->metaboxes as $metabox) {
      $metabox->save($post_id);
    }
  }

  public function add_custom_post_types()
  {
    foreach ($this->cpts as $cpt) {
      $cpt->criar_custom_post_type();
    }
  }
}
