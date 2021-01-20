# phpunit-event-example

[![Integrate](https://github.com/localheinz/phpunit-event-example/workflows/Integrate/badge.svg)](https://github.com/localheinz/phpunit-event-example/actions)
[![Prune](https://github.com/localheinz/phpunit-event-example/workflows/Prune/badge.svg)](https://github.com/localheinz/phpunit-event-example/actions)
[![Release](https://github.com/localheinz/phpunit-event-example/workflows/Release/badge.svg)](https://github.com/localheinz/phpunit-event-example/actions)
[![Renew](https://github.com/localheinz/phpunit-event-example/workflows/Renew/badge.svg)](https://github.com/localheinz/phpunit-event-example/actions)

[![Code Coverage](https://codecov.io/gh/localheinz/phpunit-event-example/branch/main/graph/badge.svg)](https://codecov.io/gh/localheinz/phpunit-event-example)
[![Type Coverage](https://shepherd.dev/github/localheinz/phpunit-event-example/coverage.svg)](https://shepherd.dev/github/localheinz/phpunit-event-example)

[![Latest Stable Version](https://poser.pugx.org/localheinz/phpunit-event-example/v/stable)](https://packagist.org/packages/localheinz/phpunit-event-example)
[![Total Downloads](https://poser.pugx.org/localheinz/phpunit-event-example/downloads)](https://packagist.org/packages/localheinz/phpunit-event-example)

## Installation

Run

```sh
$ git clone git@github.com:localheinz/phpunit-event-example.git
$ cd phpunit-event-example
```

## Demonstration

Run

```
$ make
```

to see the [`SlowTestRunCollector`](src/Timer/SlowTestRunCollector.php) in action:

```sh
vendor/bin/phpunit --configuration=test/phpunit.xml
PHPUnit 10.0-gb2a3d2bf3 by Sebastian Bergmann and contributors.

Runtime:       PHP 7.4.14
Configuration: test/phpunit.xml
Random Seed:   1611161955

......                                                                                                                                                                                                                                                                                                            6 / 6 (100%)

🚨 Found a few tests that are too slow:

 - 01.503503788: Localheinz\PHPUnit\Event\Example\Test\ExampleTest::testFromNameReturnsExampleWithOneAndAHalfSecondsWaitTime
 - 01.029119175: Localheinz\PHPUnit\Event\Example\Test\ExampleTest::testFromNameReturnsExampleWith1SecondWaitTime


Time: 00:04.058, Memory: 8.00 MB

OK (6 tests, 6 assertions)
```

## Registration

Refer to [`test/bootstrap.php`](test/bootstrap.php) to find out how to register subscribers.

## Changelog

Please have a look at [`CHANGELOG.md`](CHANGELOG.md).

## Contributing

Please have a look at [`CONTRIBUTING.md`](.github/CONTRIBUTING.md).

## Code of Conduct

Please have a look at [`CODE_OF_CONDUCT.md`](.github/CODE_OF_CONDUCT.md).

## License

This package is licensed using the MIT License.

Please have a look at [`LICENSE.md`](LICENSE.md).

## Curious what I am building?

:mailbox_with_mail: [Subscribe to my list](https://localheinz.com/projects/), and I will occasionally send you an email to let you know what I am working on.
