<?php

namespace Climatempo\Rest\Tests;

use Climatempo\Rest\Services\AlertCtService;
use PHPUnit\Framework\TestCase;

class AlertsCtServiceTest extends TestCase
{
    public function testAlertCtService(): void
    {
        $stub = $this->createStub(AlertCtService::class);

        $stub->method('getAllNotices')
            ->willReturn(['foo']);

        $this->assertSame(['foo'], $stub->getAllNotices(1));
    }
}
