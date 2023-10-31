<?php

namespace Climatempo;

use Climatempo\Admin\Cpt\RegisterAlerts;
use Climatempo\Rest\Routes\Api;

class Run
{
  public function __construct()
  {
    add_action('init', array(new RegisterAlerts(), 'registerCustomPostAlert'));
    add_action('rest_api_init', array(new Api(), 'register_api'));
  }
}
