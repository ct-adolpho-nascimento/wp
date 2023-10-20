<?php
/*
Plugin Name: Climatempo | Agroclima
Description: Plugin para customizar novas funcionalidades para os sites Climatempo e Agroclima.
Version: 1.0
Author: Adolpho Cavalcanti
*/


// Verificar se está havendo algum acesso direto ao arquivo do plugin que não esteja autorizado
if (!defined('ABSPATH')) {
  die;
}

require_once(plugin_dir_path(__FILE__) . 'includes/routes/api.php');

require_once plugin_dir_path(__FILE__) . 'includes/admin/metabox/class-seo-metabox-plugin.php';
require_once plugin_dir_path(__FILE__) . 'includes/admin/metabox/fields/class-seo-title-metabox.php';
require_once plugin_dir_path(__FILE__) . 'includes/admin/metabox/fields/class-seo-description-metabox.php';

// Inicializa o plugin.
function run_seo_metabox_plugin()
{
  $plugin = new SEO_Metabox_Plugin();
  $plugin->run();
}
run_seo_metabox_plugin();


//Importando JS externo
// Adicionar a função de enfileiramento de scripts ao gancho 'wp_enqueue_scripts'
// add_action(
//     'wp_enqueue_scripts',
//     wp_enqueue_script(
//         'meu-plugin-clima-script', 
//         plugin_dir_url(__FILE__) . 'js/noticias-ct.js', 
//         array('jquery'), 
//         '1.0.0', 
//         true
//     )
// );

// Registrar e enfileirar o arquivo CSS
// Adicionar a função de enfileiramento de estilos ao gancho 'wp_enqueue_scripts'
add_action(
  'wp_enqueue_scripts',
  wp_enqueue_style('meu-plugin-style', plugin_dir_url(__FILE__) . 'public/css/styles.css')
);
