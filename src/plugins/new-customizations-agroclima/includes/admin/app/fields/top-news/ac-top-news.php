<?php
require_once 'ac-top-news-interface.php';

class AC_TopNews implements AC_TopNewsInterface
{
  public function saveFeaturedNews($post_id)
  {
    if (isset($_POST['top_news'])) {
      update_post_meta($post_id, 'top_news', 1);
    } else {
      update_post_meta($post_id, 'top_news', 0);
    }
  }

  public function addColumnFeaturedNews($columns)
  {
    $columns['top_news'] = 'Notícias em Destaque';
    return $columns;
  }

  public function displayColumnContentFeaturedNews($column, $post_id)
  {
    if ($column === 'top_news') {
      $top_news = get_post_meta($post_id, 'top_news', true);

      $current_featured_news = get_posts(array(
        'post_type' => 'cpt-news-agricolas',
        'meta_key' => 'top_news',
        'meta_value' => '1',
        'posts_per_page' => -1,
        'fields' => 'ids',
      ));
      $current_featured_news_count = count($current_featured_news);

      $checkboxes_disabled = ($current_featured_news_count === 3 && !$top_news) ? 'disabled' : '';

      echo '<div class="div-check">';
      echo '<span class="materia-destaque-status">' . ($top_news ? 'Sim' : 'Não') . '</span>';
      echo '<input type="checkbox" class="materia-destaque-checkbox" data-post-id="' . $post_id . '" ' . checked($top_news, '1', false) . ' ' . $checkboxes_disabled . '>';
      echo '</div>';

      if ($current_featured_news_count === 3) {
        echo '<script type="text/javascript">jQuery("#mensagem-limite-destaque").text("Você atingiu o limite máximo de matérias em destaque. Não é possível ter mais de 3 matérias em destaque.").show();</script>';
      }
    }
  }

  public function buttonUpdateFeaturedNews($columns)
  {
    if (isset($_GET['post_type']) && $_GET['post_type'] === 'cpt-news-agricolas') {
      $columns['top_news'] .= ' <button id="botao-alterar-materia-destaque" class="btn-materia-destaque btn-secondary" disabled>Alterado</button>';
    }
    return $columns;
  }

  public function updateFeaturedNews()
  {
    if (isset($_POST['post_data'])) {
      $post_data = $_POST['post_data'];

      $current_featured_news = get_posts(array(
        'post_type' => 'cpt-news-agricolas',
        'meta_key' => 'top_news',
        'meta_value' => '1',
        'posts_per_page' => -1,
        'fields' => 'ids',
      ));

      $current_featured_news_count = count($current_featured_news);

      foreach ($post_data as $item) {
        $post_id = $item['post_id'];
        $is_destaque = $item['is_destaque'];

        if ($is_destaque === '1' && $current_featured_news_count < 3) {
          update_post_meta($post_id, 'top_news', $is_destaque);
          $current_featured_news_count++;
        } elseif ($is_destaque === '0') {
          delete_post_meta($post_id, 'top_news');
          $current_featured_news_count--;
        }
      }

      wp_die();
    }
  }

  public function addAdminNotice()
  {
    echo '<div id="mensagem-limite-destaque" class="notice notice-warning" style="display: none;"></div>';
  }

  public function addFeaturedNewsFilter()
  {
    global $typenow;

    if ($typenow == 'cpt-news-agricolas') {
      $materia_destaque_atual = isset($_GET['top_news']) ? $_GET['top_news'] : '';

      $opcoes_filtro = array(
        '' => 'Todas as notícias',
        'sim' => 'Notícias em destaque',
        'nao' => 'Notícias que não são destaque'
      );

      echo '<select name="top_news">';
      foreach ($opcoes_filtro as $valor => $rotulo) {
        printf(
          '<option value="%s" %s>%s</option>',
          $valor,
          selected($materia_destaque_atual, $valor, false),
          $rotulo
        );
      }
      echo '</select>';
    }
  }

  public function filterByFeaturedNews($query)
  {
    global $pagenow, $typenow;

    if ($pagenow == 'edit.php' && $typenow == 'cpt-news-agricolas' && isset($_GET['top_news']) && $_GET['top_news'] !== '') {
      $meta_key = 'top_news';
      $meta_value = $_GET['top_news'] === 'sim' ? '1' : '0';

      $query->query_vars['meta_key'] = $meta_key;
      $query->query_vars['meta_value'] = $meta_value;

      if ($meta_value === '0') {
        echo '<script type="text/javascript">jQuery(".materia-destaque-checkbox").prop("disabled", true);</script>';
      }
    }
  }
}

$news = new AC_TopNews();

add_action('save_post', array($news, 'saveFeaturedNews'));

add_filter('manage_cpt-news-agricolas_posts_columns', array($news, 'addColumnFeaturedNews'));

add_action('manage_cpt-news-agricolas_posts_custom_column', array($news, 'displayColumnContentFeaturedNews'), 10, 2);

add_filter('manage_cpt-news-agricolas_posts_columns', array($news, 'buttonUpdateFeaturedNews'));

add_action('wp_ajax_update_featured_news', array($news, 'updateFeaturedNews'));

add_action('admin_notices', array($news, 'addAdminNotice'));

add_action('restrict_manage_posts', array($news, 'addFeaturedNewsFilter'));

add_filter('pre_get_posts', array($news, 'filterByFeaturedNews'));
