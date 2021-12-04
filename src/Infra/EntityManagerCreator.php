<?php

namespace Lucas\Procedo\Infra;

use Doctrine\ORM\EntityManager;
use Doctrine\ORM\EntityManagerInterface;
use Doctrine\ORM\Tools\Setup;

class EntityManagerCreator
{
    public function getEntityManager(): EntityManagerInterface
    {
        $paths = [__DIR__ . '/../Entity'];
        $isDevMode = false;

        $connectionParams = array(
            'dbname' => 'db_procedo',
            'user' => 'root',
            'password' => 'MQM1518hFear851cyvx1021?9+thi',
            'host' => 'localhost',
            'driver' => 'pdo_mysql',
        );

        $config = Setup::createAnnotationMetadataConfiguration(
            $paths,
            $isDevMode,
            null,
            null,
            false,
        );

        return EntityManager::create($connectionParams, $config);
    }
}