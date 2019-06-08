<?php

namespace MorrisPhp\YouTubeApi;

use Psr\Http\Message\ResponseInterface;
use Psr\Http\Message\ServerRequestInterface;

/**
 * Middleware interface required by Slim Framework
 *
 * Interface MiddlewareInterface
 *
 * @package MorrisPhp\YouTubeApi
 */
interface MiddlewareInterface
{
    /**
     * @param ServerRequestInterface $request
     * @param ResponseInterface $response
     * @param callable $next
     * @return ResponseInterface
     */
    public function __invoke(
        ServerRequestInterface $request,
        ResponseInterface $response,
        callable $next
    ): ResponseInterface;
}
