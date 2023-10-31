<?php

namespace Climatempo\Rest\Tests;

use Climatempo\Rest\Controllers\AlertsCtController;
use PHPUnit\Framework\TestCase;
use WP_REST_Request;

class AlertsCtControllerTest extends TestCase
{
  public function testAlertCtController(): void
  {

    $request = $this->getMockBuilder(WP_REST_Request::class)
      ->getMock();

    $stub = $this->createStub(AlertsCtController::class);

    $stub->method('all_alerts')
      ->willReturn(['foo']);

    $this->assertSame(['foo'], $stub->all_alerts($request));
  }
}
