<?php

namespace bertptrs\mako;

use mako\application\services\Service;
use mako\cache\CacheManager;
use Psr\SimpleCache\CacheInterface;

class SimpleCacheService extends Service
{

    /**
     * Registers the service.
     */
    public function register(): void
    {
        $this->container->register(CacheInterface::class, function (): CacheInterface {
            $cache = $this->container->get(CacheManager::class)->instance();

            return new SimpleCacheWrapper($cache);
        });
    }
}
