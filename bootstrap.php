<?php

require_once "vendor/autoload.php";

use Doctrine\ORM\Tools\Setup;
use Doctrine\ORM\EntityManager;

$dbParams = [
    'driver'   => 'pdo_sqlite',
    'path'   => __DIR__.'/data.sqlite',
];

$config = Setup::createAnnotationMetadataConfiguration([__DIR__ . '/src/Entity'], true);
$entityManager = EntityManager::create($dbParams, $config);

$metadataFactory = $entityManager->getMetadataFactory();

return $entityManager;
