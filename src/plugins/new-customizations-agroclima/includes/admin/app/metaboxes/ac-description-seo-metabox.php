<?php
require_once 'ac-metabox-interface.php';

class AC_Description_Seo_Metabox implements AC_MetaboxInterface
{
  public function register()
  {
    add_meta_box(
      'ac_description_seo_metabox',
      'Descrição da matéria para SEO',
      array($this, 'render'),
      array('cpt-news-agricolas'),
      'normal',
      'default'
    );
  }

  public function render($post)
  {
    $description = get_post_meta($post->ID, 'ac_description_seo', true);
?>
    <label for="ac_description_seo">Descrição:</label>
    <textarea id="ac_description_seo" name="ac_description_seo"><?php echo esc_textarea($description); ?></textarea>
<?php
  }

  public function save($post_id)
  {
    if (isset($_POST['ac_description_seo'])) {
      $description = sanitize_textarea_field($_POST['ac_description_seo']);
      update_post_meta($post_id, 'ac_description_seo', $description);
    }
  }
}
