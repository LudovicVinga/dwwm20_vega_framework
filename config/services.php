<?php

use Twig\Environment;
use VegaCore\Routing\Router;
use Twig\Loader\FilesystemLoader;
use VegaCore\HttpKernel\HttpKernel;
use App\Controller\WelcomeController;
use Psr\Container\ContainerInterface;
use VegaCore\Routing\RouterInterface;
use VegaCore\HttpKernel\HttpKernelInterface;

return [
    HttpKernelInterface::class => DI\create(HttpKernel::class)->constructor(DI\get(ContainerInterface::class)),

    RouterInterface::class => DI\create(Router::class)->constructor(DI\get('controllers')),

    'controllers' => [
        WelcomeController::class
    ],

    Environment::class => function () 
    {
        $loader = new FilesystemLoader(dirname(__DIR__) . '/templates');
        $twig = new Environment($loader, [
            'cache' => dirname(__DIR__) . "/var/cache/twig",
            'auto_reload' => true
        ]);
        return $twig;
    },
];