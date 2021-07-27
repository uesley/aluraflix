<?php

use Aluraflix\Controllers\VideoController;
use Slim\Factory\AppFactory;
use Slim\Psr7\Request;
use Slim\Psr7\Response;

require __DIR__ . '/../bootstrap/bootstrap.php';
require __DIR__ . '/../vendor/autoload.php';

$app = AppFactory::create();


$app->get('/videos', [VideoController::class, 'index']);
$app->get('/videos/{id}', [VideoController::class, 'show']);


$app->run();
