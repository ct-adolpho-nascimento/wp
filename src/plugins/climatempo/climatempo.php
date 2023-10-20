<?php

/**
 * @wordpress-plugin
 * Plugin Name:       Climatempo
 * Description:       Um plugin Climatempo.
 * Version:           1.0.0
 * Author:            Adolpho Cavalcanti
 */

// If this file is called directly, abort.
if (!defined('ABSPATH')) {
  exit;
}

// Load the autoloader from it's own file
require_once plugin_dir_path(__FILE__) . 'autoload.php';

// Load API REST file
// require_once plugin_dir_path(__FILE__) . 'includes/admin/routes/api.php';


// The code that runs during plugin activation.
function activate_speed_up()
{
  \Climatempo\Core\Activator::activate();
}

// The code that runs during plugin deactivation.
function deactivate_speed_up()
{
  \Climatempo\Core\Deactivator::deactivate();
}

register_activation_hook(__FILE__, 'activate_speed_up');
register_deactivation_hook(__FILE__, 'deactivate_speed_up');


// Begins execution of the plugin.
function run_speed_up()
{
  new \Climatempo\Run();
}
run_speed_up();
