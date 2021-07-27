<?php

namespace Aluraflix;

use Aluraflix\Controllers\VideoController;
use Slim\Factory\AppFactory;

class Aluraflix
{
    private $app;

    public function __construct()
    {
        $this->app = AppFactory::create();
    }

    public function app()
    {
        $this->registerRoutes();
        return $this->app;
    }

    protected function registerRoutes()
    {
        $this->app->get('/videos', [VideoController::class, 'index']);
        $this->app->get('/videos/{id}', [VideoController::class, 'show']);
    }
}
