<?php

declare(strict_types=1);

/**
 * Copyright (c) 2020-2021 Andreas Möller
 *
 * For the full copyright and license information, please view
 * the LICENSE.md file that was distributed with this source code.
 *
 * @see https://github.com/localheinz/phpunit-event-example
 */

namespace Localheinz\PHPUnit\Event\Example\Test;

use Ergebnis\Test\Util;
use Localheinz\PHPUnit\Event\Example\Example;
use PHPUnit\Framework;

/**
 * @internal
 *
 * @covers \Localheinz\PHPUnit\Event\Example\Example
 */
final class ExampleTest extends Framework\TestCase
{
    use Util\Helper;

    public function testFromNameReturnsExample(): void
    {
        $name = self::faker()->sentence;

        $example = Example::fromName($name);

        self::assertSame($name, $example->name());
    }
}
