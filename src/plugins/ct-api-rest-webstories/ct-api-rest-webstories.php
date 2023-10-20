<?php

/**
 * Plugin Name:     CT - API Rest para Webstories
 * Description:     Ferramenta personalizada que cria endpoint para webstories 
 * Author:          Adolpho Cavalcanti
 * Version:         1.0.0
 *
 * @package         CT_API_REST_WEBSTORIES
 */

// Verificar se está havendo algum acesso direto ao arquivo do plugin que não esteja autorizado
defined('ABSPATH') || exit;

/**
 * Definir constantes
 */

//Plugin Version
if (!defined('CT_API_REST_WEBSTORIES_VERSION')) {
  define('CT_API_REST_WEBSTORIES_VERSION', '1.0.0');
}

//Plugin Name
if (!defined('CT_API_REST_WEBSTORIES_PLUGIN_NAME')) {
  define('CT_API_REST_WEBSTORIES_PLUGIN_NAME', 'CT - API Rest para Webstories');
}

//Plugin Basename(Basename onde está definido o plugin)
if (!defined('CT_API_REST_WEBSTORIES_PLUGIN_DIR')) {
  define('CT_API_REST_WEBSTORIES_PLUGIN_DIR', plugin_dir_path(__FILE__));
}

require_once CT_API_REST_WEBSTORIES_PLUGIN_DIR . 'includes/routes/api.php';
