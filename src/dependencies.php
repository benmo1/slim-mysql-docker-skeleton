<?php

use Monolog\Logger;
use MorrisPhp\YouTubeApi\Controller\Controller;
use MorrisPhp\YouTubeApi\Controller\ControllerFactory;
use MorrisPhp\YouTubeApi\Middleware\JsonContentTypeMiddleware;
use MorrisPhp\YouTubeApi\Middleware\JsonContentTypeMiddlewareFactory;
use MorrisPhp\YouTubeApi\Repository\ChannelRepository;
use MorrisPhp\YouTubeApi\Repository\ChannelRepositoryFactory;
use MorrisPhp\YouTubeApi\Repository\VideoRepository;
use MorrisPhp\YouTubeApi\Repository\VideoRepositoryFactory;
use MorrisPhp\YouTubeApi\YouTube\Service;
use MorrisPhp\YouTubeApi\YouTube\ServiceFactory;
use Slim\App;

return static function (App $app) {
    $container = $app->getContainer();

    // Proprietary php dependency
    $container['notFoundHandler'] = function ($c) {
        return function ($request, $response) use ($c) {
            return $response->withStatus(404);
        };
    };

    $container[Logger::class] = function ($c) {
        $settings = $c->get('settings')['logger'];
        $logger = new \Monolog\Logger($settings['name']);
        $logger->pushProcessor(new \Monolog\Processor\UidProcessor());
        $logger->pushHandler(new \Monolog\Handler\StreamHandler($settings['path'], $settings['level']));

        return $logger;
    };

    $container[PDO::class] = function ($c): PDO {
        $settings = $c->get('settings')['database'];
        $dsn = sprintf('mysql:host=%s;dbname=%s',
            $settings['host'],
            $settings['database']
        );

        return new PDO(
            $dsn,
            $settings['user'],
            $settings['password'],
            [PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION]
        );
    };
};
