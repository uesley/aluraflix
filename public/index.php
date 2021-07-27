<?php

use Aluraflix\Aluraflix;

require __DIR__ . '/../bootstrap/bootstrap.php';
require __DIR__ . '/../vendor/autoload.php';

$app = (new Aluraflix)->app();

$app->run();
