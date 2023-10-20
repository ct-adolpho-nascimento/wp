<?php

/**
 * Plugin Name:     All CT Site Tools
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
if (!defined('ALL_CT_SITES_TOOLS_VERSION')) {
  define('ALL_CT_SITES_TOOLS_VERSION', '1.0.0');
}

//Plugin Name
if (!defined('ALL_CT_SITES_TOOLS_PLUGIN_NAME')) {
  define('ALL_CT_SITES_TOOLS_PLUGIN_NAME', 'All CT Site Tools');
}

//Plugin Basename(Basename onde está definido o plugin)
if (!defined('ALL_CT_SITES_TOOLS_PLUGIN_DIR')) {
  define('ALL_CT_SITES_TOOLS_PLUGIN_DIR', plugin_dir_path(__FILE__));
}

// if (is_admin()) {
require_once ALL_CT_SITES_TOOLS_PLUGIN_DIR . 'includes/class-get-site-name-admin.php';
// }

// Inicializa o plugin.
function run_plugin()
{
  $get_name_site = new Get_Site_name(get_bloginfo('name'));
  $get_name_site->init();
}
run_plugin();


// Enfileirar o arquivo JS
function meu_script_admin()
{
  wp_enqueue_script(
    'ctScript',
    plugin_dir_url(__FILE__) . 'assets/js/ct-all-sites-tools.js',
    array('jquery'),
    '1.0.0',
    true
  );
}

// Enfileirar o arquivo CSS
function add_my_stylesheet()
{
  wp_enqueue_style('ctCSS', plugins_url('assets/css/all-sites-styles.css', __FILE__));
}
