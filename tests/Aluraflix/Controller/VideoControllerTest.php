<?php

use Aluraflix\Entity\Video;
use Aluraflix\Helpers\EntityManagerFactory;
use Slim\Psr7\Factory\ServerRequestFactory;

test('list all videos', function () {
    $app = riseUpApplication();
    $request = (new ServerRequestFactory())->createServerRequest('GET', '/videos');
    $response = $app->handle($request);
    expect($response->getStatusCode())->toBe(200);
});

test('show one video', function () {
    $app = riseUpApplication();

    $video = new Video;
    $video->id = 1;
    $video->title = 'opa';
    $video->description = 'yeahh';
    $video->url = 'myurl.com';

    $entityManager = (new EntityManagerFactory)->getEntityManager();
    $entityManager->persist($video);
    $entityManager->flush();

    $request = (new ServerRequestFactory())->createServerRequest('GET', '/videos/' . $video->id);
    $response = $app->handle($request);

    expect($response->getStatusCode())->toBe(200);
    $response->getBody()->rewind();
    expect($response->getBody()->getContents())
        ->toEqual(json_encode((array) $video));
});
