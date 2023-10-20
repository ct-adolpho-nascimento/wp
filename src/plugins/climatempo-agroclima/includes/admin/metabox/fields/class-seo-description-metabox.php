<?php
require_once 'interface-metabox.php';

class SEO_Description_Metabox implements MetaboxInterface
{
  public function register()
  {
    add_meta_box(
      'seo_metabox_description',
      'Meta description para SEO',
      array($this, 'render'),
      'page',
      'normal',
      'high'
    );
  }

  public function render($post)
  {
    $description = get_post_meta($post->ID, 'description_seo', true);
?>
    <p class="inputBox">
      <label for="description_seo">Meta description:</label>
      <input type="text" id="description_seo" name="description_seo" value="<?php echo esc_textarea($description); ?>" />
    </p>
<?php
  }

  public function save($post_id)
  {
    if (isset($_POST['description_seo'])) {
      $description = sanitize_textarea_field($_POST['description_seo']);
      update_post_meta($post_id, 'description_seo', $description);
    }
  }
}
