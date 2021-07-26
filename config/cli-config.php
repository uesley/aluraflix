<?php

use Aluraflix\Helpers\EntityManagerFactory;
use Doctrine\ORM\Tools\Console\ConsoleRunner;

require_once __DIR__ . '/../bootstrap/bootstrap.php';

$entityManager = (new EntityManagerFactory)->getEntityManager();

return ConsoleRunner::createHelperSet($entityManager);
