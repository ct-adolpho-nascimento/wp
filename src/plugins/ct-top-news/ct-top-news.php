<?php

/**
 * Plugin Name:     CT - Top News
 * Description:     Ferramenta que adiciona novas funcionalidades para os sites CLIMATEMPO | AGROCLIMA
 * Author:          Adolpho Cavalcanti
 * Version:         1.0.0
 *
 * @package         All_CT_Sites_Tools
 */

// Verificar se está havendo algum acesso direto ao arquivo do plugin que não esteja autorizado
defined('ABSPATH') || exit;

/**
 * Definir constantes
 */

//Plugin Version
if (!defined('CT_TOP_NEWS_VERSION')) {
  define('CT_TOP_NEWS_VERSION', '1.0.0');
}

//Plugin Name
if (!defined('CT_TOP_NEWS_PLUGIN_NAME')) {
  define('CT_TOP_NEWS_PLUGIN_NAME', 'All CT Site Tools');
}

//Plugin Basename(Basename onde está definido o plugin)
if (!defined('CT_TOP_NEWS_PLUGIN_DIR')) {
  define('CT_TOP_NEWS_PLUGIN_DIR', plugin_dir_path(__FILE__));
}

// if (is_admin()) {
require_once CT_TOP_NEWS_PLUGIN_DIR . 'includes/class-top-news.php';
// }

// Inicializa o plugin.
function top_news_init_plugin()
{
  // Para o custom post type "cpt-news-agricolas"
  $news_agricolas = new TopNews('cpt-news-agricolas');

  // Para o custom post type "cpt-ct-noticias"
  $editorias = new TopNews('cpt-ct-noticias');

  // Para o custom post type "novas_noticias"
  $novas_noticias = new TopNews('novas_noticias');
}
top_news_init_plugin();


// Enfileirar o arquivo JS
function top_news_script_admin()
{
  wp_enqueue_script(
    'topNewsScript',
    plugin_dir_url(__FILE__) . 'assets/js/ct-top-news.js',
    array('jquery'),
    '1.0.0',
    true
  );
}

// Enfileirar o arquivo CSS
function top_news_stylesheet()
{
  wp_enqueue_style('topNewsCSS', plugins_url('assets/css/ct-top-news.css', __FILE__));
}
