<?php

/**
 * @wordpress-plugin
 * Plugin Name:       WP Clima
 * Description:       Plugin WP Clima.
 * Version:           1.0.0
 * Author:            Adolpho Cavalcanti
 */

// If this file is called directly, abort.
if (!defined('ABSPATH')) {
  exit;
}

require("vendor/autoload.php");

new Climatempo\Run();
