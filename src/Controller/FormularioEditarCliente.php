<?php

namespace Lucas\Procedo\Controller;

use Doctrine\Common\Persistence\ObjectRepository;
use Doctrine\ORM\EntityManagerInterface;
use Lucas\Procedo\Entity\Cliente;
use Lucas\Procedo\Infra\EntityManagerCreator;
use Nyholm\Psr7\Response;
use Psr\Http\Message\ResponseInterface;
use Psr\Http\Message\ServerRequestInterface;
use Psr\Http\Server\RequestHandlerInterface;

class FormularioEditarCliente extends ControllerComHtml implements RequestHandlerInterface
{
    /**
     * @var ObjectRepository
     */
    private $repositorioClientes;

    public function __construct(EntityManagerInterface $entityManager)
    {
        $this->repositorioClientes = $entityManager->getRepository(Cliente::class);
    }

    public function handle(ServerRequestInterface $request): ResponseInterface
    {
        //pegar id do cliente
        $id = filter_var(
            $request->getQueryParams()['id'],
            FILTER_VALIDATE_INT
        );

        $redirecionamento = new Response(302, ['Location' => '/listar-clientes']);

        if(is_null($id) || $id === false) {
            return $redirecionamento;
        }

        $cliente = $this->repositorioClientes->find($id);

        $html = $this->renderizaHtml('clientes/formulario.php', [
            'tituloDaPagina' => "Editar cliente",
            'titulo' => "Atualizar cliente",
            'cliente' => $cliente,
        ]);

        return new Response(200, [], $html);
    }
}