<?php

declare(strict_types=1);

namespace Localheinz\PHPUnit\Event\Example\Timer;

use PHPUnit\Event;

final class TestPassedSubscriber implements Event\Test\PassedSubscriber
{
    private SlowTestRunCollector $slowTestRunCollector;

    public function __construct(SlowTestRunCollector $slowTestRunCollector)
    {
        $this->slowTestRunCollector = $slowTestRunCollector;
    }

    public function notify(Event\Test\Passed $event): void
    {
        $this->slowTestRunCollector->recordTestPassed($event);
    }
}
