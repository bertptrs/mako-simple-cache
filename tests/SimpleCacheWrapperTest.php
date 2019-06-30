<?php

namespace bertptrs\mako\tests;

use bertptrs\mako\SimpleCacheWrapper;
use mako\cache\stores\Memory;
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

    public function testSetGet()
    {
        $store = new Memory();
        $instance = new SimpleCacheWrapper($store);

        $this->assertFalse($instance->has('Some key'));
        $this->assertTrue($instance->set('Some key', 42, new \DateInterval('P1D')));
        $this->assertTrue($instance->has('Some key'));
        $this->assertEquals(42, $instance->get('Some key'));
    }
}
