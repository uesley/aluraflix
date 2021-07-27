<?php

use Slim\Factory\AppFactory;

require __DIR__ . '/../bootstrap/bootstrap.php';
require __DIR__ . '/../vendor/autoload.php';

$app = AppFactory::create();

$app->get('/videos', 'Aluraflix\Controllers\VideoController:index');

$app->run();
