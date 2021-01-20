<?php

declare(strict_types=1);

namespace Localheinz\PHPUnit\Event\Example\Timer;

use PHPUnit\Event;

final class SlowTestRunCollector
{
    private Event\Telemetry\Duration $maxDuration;

    /**
     * @var array<string, Event\Test\Prepared>
     */
    private array $testPreparedEvents = [];

    /**
     * @var array<string, Event\Test\Passed>
     */
    private array $testPassedEvents = [];

    public function __construct(Event\Telemetry\Duration $maxDuration)
    {
        $this->maxDuration = $maxDuration;
    }

    public function recordTestPrepared(Event\Test\Prepared $event): void
    {
        $key = self::keyFrom($event->test());

        $this->testPreparedEvents[$key] = $event;
    }

    public function recordTestPassed(Event\Test\Passed $event): void
    {
        $key = self::keyFrom($event->test());

        $this->testPassedEvents[$key] = $event;
    }

    /**
     * @return array<int, TestRun>
     */
    public function slowTestRuns(): array
    {
        $slowTestRuns = [];

        foreach ($this->testPassedEvents as $key => $testPassedEvent) {
            if (!\array_key_exists($key, $this->testPreparedEvents)) {
                continue;
            }

            $testPreparedEvent = $this->testPreparedEvents[$key];

            $testPreparedTime = $testPreparedEvent->telemetryInfo()->time();
            $testPassedTime = $testPassedEvent->telemetryInfo()->time();

            $duration = $testPassedTime->duration($testPreparedTime);

            if ($this->isLessThanMaxDuration($duration)) {
                continue;
            }

            $slowTestRuns[] = new TestRun(
                $testPreparedEvent->test(),
                $duration
            );
        }

        \usort($slowTestRuns, static function (TestRun $one, TestRun $two): int {
            return self::compare(
                $two->duration(),
                $one->duration()
            );
        });

        return $slowTestRuns;
    }

    private function isLessThanMaxDuration(Event\Telemetry\Duration $duration): bool
    {
        return 0 < self::compare($this->maxDuration, $duration);
    }

    private static function compare(Event\Telemetry\Duration $one, Event\Telemetry\Duration $two): int
    {
        if ($one->seconds() < $two->seconds()) {
            return -1;
        }

        if ($one->seconds() > $two->seconds()) {
            return 1;
        }

        return $one->nanoseconds() - $two->nanoseconds();
    }

    private static function keyFrom(Event\Code\Test $test): string
    {
        return \sprintf(
            '%s::%s',
            $test->className(),
            $test->testName(),
        );
    }
}
