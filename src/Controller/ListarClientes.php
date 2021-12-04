<?php

namespace Lucas\Procedo\Controller;

use Doctrine\ORM\EntityManagerInterface;
use Lucas\Procedo\Entity\Cliente;
use Lucas\Procedo\Infra\EntityManagerCreator;
use Nyholm\Psr7\Response;
use Psr\Http\Message\ResponseInterface;
use Psr\Http\Message\ServerRequestInterface;
use Psr\Http\Server\RequestHandlerInterface;

class ListarClientes extends ControllerComHtml implements RequestHandlerInterface
{

    /**
     * @var \Doctrine\Common\Persistence\ObjectRepository|\Doctrine\ORM\EntityRepository|\Doctrine\Persistence\ObjectRepository
     */
    private $repositorioDeClientes;

    public function __construct(EntityManagerInterface $entityManager)
    {
        $this->repositorioDeClientes = $entityManager->getRepository(Cliente::class);
    }

    public function handle(ServerRequestInterface $request): ResponseInterface
    {
        $html = $this->renderizaHtml(
            'clientes/listar-clientes.php', [
                'tituloDaPagina' => "Meus clientes",
                'titulo' => "Clientes cadastrados",
                'clientes' => $this->repositorioDeClientes->findAll(),
            ]
        );

        return new Response(200, [], $html);
    }
}