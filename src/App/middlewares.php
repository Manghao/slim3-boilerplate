<?php

use App\Middlewares\Twig\AuthMiddleware;
use App\Middlewares\Twig\CsrfMiddleware;
use App\Middlewares\Twig\FlashMiddleware;
use App\Middlewares\Twig\PersistentValuesMiddleware;
use App\Middlewares\Twig\PickerMiddleware;

// Flash Message Middleware Additions
$app->add(new FlashMiddleware($container->views->getEnvironment()));

// Persistent Value Middleware Additions in Forms
$app->add(new PersistentValuesMiddleware($container->views->getEnvironment()));

// Additions to the variable recovery Middleware in configuration files
$app->add(new PickerMiddleware($container->views->getEnvironment()));

// Additions to the Connection Management Middleware
$app->add(new AuthMiddleware($container->views->getEnvironment()));

// Csrf Protection Middleware Additions
$app->add(new CsrfMiddleware($container->views->getEnvironment(), $container->csrf));
$app->add($container->get('csrf'));