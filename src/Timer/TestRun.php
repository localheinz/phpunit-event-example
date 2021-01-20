<?php

declare(strict_types=1);

namespace Localheinz\PHPUnit\Event\Example\Timer;

use PHPUnit\Event;

final class TestRun
{
    private Event\Code\Test $test;

    private Event\Telemetry\Duration $duration;

    public function __construct(
        Event\Code\Test $test,
        Event\Telemetry\Duration $duration
    ) {
        $this->test = $test;
        $this->duration = $duration;
    }

    public function test(): Event\Code\Test
    {
        return $this->test;
    }

    public function duration(): Event\Telemetry\Duration
    {
        return $this->duration;
    }
}
