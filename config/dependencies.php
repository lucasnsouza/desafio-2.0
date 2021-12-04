<?php

use DI\ContainerBuilder;
use Doctrine\ORM\EntityManagerInterface;
use Lucas\Procedo\Infra\EntityManagerCreator;

$containerBuilder = new ContainerBuilder();

$containerBuilder->addDefinitions([
    EntityManagerInterface::class => function() {
        return (new EntityManagerCreator())->getEntityManager();
    }
]);

return $containerBuilder->build();