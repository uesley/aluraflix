<?php

namespace Aluraflix\Helpers;

use Doctrine\ORM\EntityManager;
use Doctrine\ORM\EntityManagerInterface;
use Doctrine\ORM\Tools\Setup;

class EntityManagerFactory
{
    public function getEntityManager(): EntityManagerInterface
    {
        $config = Setup::createAnnotationMetadataConfiguration(
            [__DIR__ . '/../../Aluraflix'],
            true
        );
        $connection = [
            'dbname' => $_ENV['DB_DATABASE'],
            'user' => $_ENV['DB_USER'],
            'password' => $_ENV['DB_PASSWORD'],
            'host' => $_ENV['DB_HOST'],
            'driver' => 'pdo_mysql',
        ];
        return EntityManager::create($connection, $config);
    }
}
