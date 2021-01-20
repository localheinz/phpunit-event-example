<?php

declare(strict_types=1);

namespace Localheinz\PHPUnit\Event\Example\Timer;

use PHPUnit\Event;

final class TestSuiteFinishedSubscriber implements Event\TestSuite\FinishedSubscriber
{
    private SlowTestRunCollector $testRunCollector;

    public function __construct(SlowTestRunCollector $testRunCollector)
    {
        $this->testRunCollector = $testRunCollector;
    }

    public function notify(Event\TestSuite\Finished $event): void
    {
        $testRuns = $this->testRunCollector->slowTestRuns();

        if ([] === $testRuns) {
            return;
        }

        echo "\n\n🚨 Found a few tests that are too slow:\n\n";

        foreach ($testRuns as $testRun) {
            $test = $testRun->test();

            echo \sprintf(
                " - %s: %s::%s\n",
                $testRun->duration()->asString(),
                $test->className(),
                $test->testName()
            );
        }
    }
}
