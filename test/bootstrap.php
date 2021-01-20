<?php

declare(strict_types=1);

require_once __DIR__ . '/../vendor/autoload.php';

use Localheinz\PHPUnit\Event\Example;
use PHPUnit\Event;

$maxDuration = new Event\Telemetry\Duration(1, 0);

$slowTestRunCollector = new Example\Timer\SlowTestRunCollector($maxDuration);

Event\Facade::registerSubscriber(new Example\Timer\TestPreparedSubscriber($slowTestRunCollector));
Event\Facade::registerSubscriber(new Example\Timer\TestPassedSubscriber($slowTestRunCollector));
Event\Facade::registerSubscriber(new Example\Timer\TestSuiteFinishedSubscriber($slowTestRunCollector));
