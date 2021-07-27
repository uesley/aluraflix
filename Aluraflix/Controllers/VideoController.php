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

    public function show(Request $request, Response $response, $params)
    {
        if (empty($params['id']) || !is_numeric($params['id'])) {
            $response->withStatus(422)
                ->getBody()
                ->write('o campo id é obrigatório');
            return $response;
        }
        $video = $this->videos_repository->find($params['id']);
        if (!$video) {
            $response->withStatus(404)
                ->getBody()
                ->write('o video solicitado não foi encontrado');
            return $response;
        }
        $video = json_encode($video);
        $response->getBody()->write($video);
        return $response;
    }
}
