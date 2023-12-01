<?php

/**
 * @wordpress-plugin
 * Plugin Name:       Leitura Bíblica
 * Description:       Plugin com foco em ajudar as pessoas a lerem a Bíblia Sagrada.
 * Version:           1.0.0
 * Author:            Adolpho Cavalcanti
 */


// If this file is called directly, abort.
if (!defined('ABSPATH')) {
  exit;
}

// Load the autoloader from it's own file
require_once plugin_dir_path(__FILE__) . 'autoload.php';
require_once plugin_dir_path(__FILE__) . 'includes/class-run.php';

// function run_speed_up()
// {
//   new \Acn\Run();
// }
// run_speed_up();
