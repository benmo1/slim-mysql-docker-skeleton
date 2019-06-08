<?php

namespace MorrisPhp\YouTubeApi;

use Psr\Container\ContainerInterface;

/**
 * Factory interface required by Slim Framework
 *
 * Interface FactoryInterface
 *
 * @package MorrisPhp\YouTubeApi
 */
interface FactoryInterface
{
    /**
     * @param ContainerInterface $container
     * @return mixed
     */
    public function __invoke(ContainerInterface $container);
}
