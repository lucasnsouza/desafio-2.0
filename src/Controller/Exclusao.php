<?php

namespace Lucas\Procedo\Controller;

use Doctrine\ORM\EntityManagerInterface;
use Lucas\Procedo\Entity\Cliente;
use Lucas\Procedo\Helper\FlashMessagesTrait;
use Nyholm\Psr7\Response;
use Psr\Http\Message\ResponseInterface;
use Psr\Http\Message\ServerRequestInterface;
use Psr\Http\Server\RequestHandlerInterface;

class Exclusao implements RequestHandlerInterface
{
    use FlashMessagesTrait;
    /**
     * @var EntityManagerInterface
     */
    private $entityManager;

    public function __construct(EntityManagerInterface $entityManager)
    {
        $this->entityManager = $entityManager;
    }

    public function handle(ServerRequestInterface $request): ResponseInterface
    {
        //pegar id
        $id = filter_var(
            $request->getQueryParams()['id'],
            FILTER_VALIDATE_INT
        );

        $redirecionamento = new Response(302, ['Location' => '/listar-clientes']);

        if(is_null($id) || $id === false) {
            $this->defineMensagem(
                'danger', 'Cliente inexistente',
            );
            return $redirecionamento;
        }

        $cliente = $this->entityManager->getReference(Cliente::class, $id);
        $this->entityManager->remove($cliente);
        $this->entityManager->flush();
        //usando trait para definir mensagem
        $this->defineMensagem(
            'warning',
            'Cliente excluído com sucesso',
        );

        return new Response(302, ['Location' => '/listar-clientes']);
    }
}