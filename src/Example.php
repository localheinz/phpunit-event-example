<?php

declare(strict_types=1);

namespace Localheinz\PHPUnit\Event\Example;

final class Example
{
    private string $name;

    private function __construct(string $name)
    {
        $this->name = $name;
    }

    public static function fromName(string $name): self
    {
        return new self($name);
    }

    public function name(): string
    {
        return $this->name;
    }
}
