<?php

use App\DatabaseFactory;
use App\Utils\Session;
use App\Utils\Picker;

// Importing the autoloader
require 'vendor/autoload.php';

// Start of the session
Session::initSession();

// Timezone definition
date_default_timezone_set('Europe/Paris');
setlocale(LC_TIME, 'fr_FR.utf8', 'fra');

// Global variables
define('DS', DIRECTORY_SEPARATOR);
define('SRC', __DIR__ . DS . 'src');

// Configuring the connection to the database
DatabaseFactory::setConfig();
DatabaseFactory::makeConnection();

// Slim initialization
$app = new \Slim\App([
    'settings' => [
        'displayErrorDetails' => ((Picker::get('app.env') === 'dev') ? true : false) // Error display
    ]
]);

require 'src' . DS . 'App' . DS . 'container.php';
require 'src' . DS . 'App' . DS . 'handlers.php';
require 'src' . DS . 'App' . DS . 'middlewares.php';
require 'src' . DS . 'App' . DS . 'routes.php';

$app->run();
