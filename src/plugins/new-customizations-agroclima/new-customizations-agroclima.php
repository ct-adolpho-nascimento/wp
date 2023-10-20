<?php
/*
Plugin Name: Novas customizações para o site AGROCLIMA
Description: Plugin para adicionar novas customizações para o site AGROCLIMA.
Version: 1.0
Author: Adolpho Cavalcanti
*/


// Verificar se está havendo algum acesso direto ao arquivo do plugin que não esteja autorizado
if (!defined('ABSPATH')) {
  die;
}

require_once plugin_dir_path(__FILE__) . 'includes/admin/ac-agroclima-controller.php';

require_once(plugin_dir_path(__FILE__) . 'includes/admin/app/custom-post-type/ac-cpt-news-agroclima.php');

// require_once plugin_dir_path(__FILE__) . 'includes/admin/app/fields/top-news/ac-top-news.php';
// require_once plugin_dir_path(__FILE__) . 'includes/admin/app/fields/top-news/ac-top-news-interface.php';

require_once plugin_dir_path(__FILE__) . 'includes/admin/app/metaboxes/ac-description-seo-metabox.php';
require_once plugin_dir_path(__FILE__) . 'includes/admin/app/metaboxes/ac-metabox-interface.php';
require_once plugin_dir_path(__FILE__) . 'includes/admin/app/metaboxes/ac-title-seo-metabox.php';

require_once plugin_dir_path(__FILE__) . 'includes/routes/api.php';
require_once plugin_dir_path(__FILE__) . 'includes/routes/routes-swagger.php';

// Inicializa o plugin.
function run_new_agroclima_plugin()
{
  $plugin = new AC_Agroclima_Controller();
  $plugin->run();
}
run_new_agroclima_plugin();


//Importando JS externo
// Adicionar a função de enfileiramento de scripts ao gancho 'wp_enqueue_scripts'
// add_action(
//   'wp_enqueue_scripts',
//   wp_enqueue_script(
//     'agroclima-script',
//     plugin_dir_url(__FILE__) . 'includes/admin/assets/js/ac-script.js',
//     array('jquery'),
//     '1.0.0',
//     true
//   )
// );

// Registrar e enfileirar o arquivo CSS
// Adicionar a função de enfileiramento de estilos ao gancho 'wp_enqueue_scripts'
// add_action(
//   'wp_enqueue_scripts',
//   wp_enqueue_style('agroclima-style', plugin_dir_url(__FILE__) . 'includes/admin/assets/css/ac-styles.css')
// );
