<?php
require_once 'interface-metabox.php';

class SEO_Title_Metabox implements MetaboxInterface
{
  public function register()
  {
    add_meta_box(
      'seo_metabox_title',
      'Meta title para SEO',
      array($this, 'render'),
      'page',
      'normal',
      'high'
    );
  }

  public function render($post)
  {
    $title = get_post_meta($post->ID, 'title_seo', true);
?>
    <p class="inputBox">
      <label for="title_seo">Meta title:</label>
      <input type="text" id="title_seo" name="title_seo" value="<?php echo esc_attr($title); ?>" />
    </p>
<?php
  }

  public function save($post_id)
  {
    if (isset($_POST['title_seo'])) {
      $title = sanitize_text_field($_POST['title_seo']);
      update_post_meta($post_id, 'title_seo', $title);
    }
  }
}
