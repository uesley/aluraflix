<?php

namespace Aluraflix\Controllers;

use Aluraflix\Entity\Video;
use Aluraflix\Helpers\EntityManagerFactory;
use Slim\Psr7\Request;
use Slim\Psr7\Response;

class VideoController {
    private $videos_repository;

    public function __construct()
    {
        $entity_manager = (new EntityManagerFactory)->getEntityManager();
        $this->videos_repository = $entity_manager->getRepository(Video::class);
    }

    public function index(Request $request, Response $response)
    {
        $videos = $this->videos_repository->findAll();
        $encoded = json_encode($videos);
        $response->getBody()->write($encoded);
        return $response;
    }
}
