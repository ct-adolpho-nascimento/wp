<?php

namespace Climatempo\Tests;

use Climatempo\Admin\App\Services\New_Notices_Service;
use PHPUnit\Framework\TestCase;

class New_Notices_Service_Test extends TestCase
{
  public function testAlertCtService(): void
  {
    $service = new New_Notices_Service();
    $notices = $service->getAllNotices(10, 20);
    $this->assertSame([], $notices);
  }
}
