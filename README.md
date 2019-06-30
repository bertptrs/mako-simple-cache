# mako-simple-cache

A cache wrapper implementing PSR 16 for the [Mako Framework](https://makoframework.com/).

## Installation

Add `bertptrs/mako-simple-cache` to your composer dependencies and
you're good.

## Usage

You can  use this library to create instances of a PSR 16
`CacheInterface` from your existing Mako caches.

```php
$store = $this->cache->instance();

$cache = new bertptrs\mako\SimpleCacheWrapper($store);
```

Then you can use that cache to your hearts content. Optionally, you can
use the optional second parameter of the constructor to add a prefix to
the keys, in order to prevent key collisions.

Secondly, you can optionally add the `bertptrs\mako\SimpleCacheService`
to your Mako services in `app/config/application.php`. This registers
the `SimpleCacheWrapper` with the dependency injection to automatically
provide the `CacheInterface` in dependency injections.

## Limitations

Due to the way the Mako cache works, you cannot store the value `false`
directly, instead requiring you to wrap it in something. Secondly, since
Mako cache keys need to be strings, they need to be here as well.

## License

This library is released under the GPL. If that bothers you, feel free to
create an issue.
