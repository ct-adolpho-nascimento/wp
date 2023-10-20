<?php
require_once 'ac-metabox-interface.php';

class AC_Title_Seo_Metabox implements AC_MetaboxInterface
{
  public function register()
  {
    add_meta_box(
      'ac_title_seo_metabox',
      'Título da matéria para SEO',
      array($this, 'render'),
      array('cpt-news-agricolas'),
      'normal',
      'default'
    );
  }

  public function render($post)
  {
    $title = get_post_meta($post->ID, 'ac_title_seo', true);
?>
    <label for="ac_title_seo">Título:</label>
    <input type="text" id="ac_title_seo" name="ac_title_seo" value="<?php echo esc_attr($title); ?>" />
<?php
  }

  public function save($post_id)
  {
    if (isset($_POST['ac_title_seo'])) {
      $title = sanitize_text_field($_POST['ac_title_seo']);
      update_post_meta($post_id, 'ac_title_seo', $title);
    }
  }
}
