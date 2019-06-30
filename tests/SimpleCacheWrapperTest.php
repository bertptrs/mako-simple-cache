<?php

namespace bertptrs\mako\tests;

use bertptrs\mako\SimpleCacheWrapper;
use mako\cache\stores\NullStore;
use PHPUnit\Framework\TestCase;
use Psr\SimpleCache\InvalidArgumentException;

class SimpleCacheWrapperTest extends TestCase
{
    public function testElementNotAvailable()
    {
        $store = new NullStore();
        $instance = new SimpleCacheWrapper($store);

        $this->assertFalse($instance->has('some key'));
        $this->assertNull($instance->get('some key'));
    }

    public function testKeyMustBeString()
    {
        $store = new NullStore();
        $instance = new SimpleCacheWrapper($store);

        $this->expectException(InvalidArgumentException::class);
        $instance->get(42);
    }
}
