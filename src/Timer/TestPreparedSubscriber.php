<?php

declare(strict_types=1);

namespace Localheinz\PHPUnit\Event\Example\Timer;

use PHPUnit\Event;

final class TestPreparedSubscriber implements Event\Test\PreparedSubscriber
{
    private SlowTestRunCollector $slowTestRunCollector;

    public function __construct(SlowTestRunCollector $slowTestRunCollector)
    {
        $this->slowTestRunCollector = $slowTestRunCollector;
    }

    public function notify(Event\Test\Prepared $event): void
    {
        $this->slowTestRunCollector->recordTestPrepared($event);
    }
}
