<?php

namespace Lucas\Procedo\Controller;

use Doctrine\ORM\EntityManagerInterface;
use Lucas\Procedo\Entity\Cliente;
use Lucas\Procedo\Helper\FlashMessagesTrait;
use Nyholm\Psr7\Response;
use Psr\Http\Message\ResponseInterface;
use Psr\Http\Message\ServerRequestInterface;
use Psr\Http\Server\RequestHandlerInterface;

class Persistencia implements RequestHandlerInterface
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
        $nome = filter_var(
            $request->getParsedBody()['inputNome'],
            FILTER_SANITIZE_STRING
        );

        $telefone = filter_var(
            $request->getParsedBody()['inputTelefone'],
            FILTER_SANITIZE_STRING
        );

        $email = filter_var(
            $request->getParsedBody()['inputEmail'],
            FILTER_SANITIZE_STRING
        );

        $cnpj = filter_var(
            $request->getParsedBody()['inputCnpj'],
            FILTER_SANITIZE_STRING
        );

        $origem = filter_var(
            $request->getParsedBody()['inputOrigem'],
            FILTER_SANITIZE_STRING
        );

        $cidade = filter_var(
            $request->getParsedBody()['inputCidade'],
            FILTER_SANITIZE_STRING
        );

        $estado = filter_var(
            $request->getParsedBody()['inputEstado'],
            FILTER_SANITIZE_STRING
        );

        $situacao = filter_var(
            $request->getParsedBody()['inputSituacao'],
            FILTER_SANITIZE_STRING
        );

        $id = filter_var(
            $request->getQueryParams()['id'],
            FILTER_VALIDATE_INT
        );

        if(!is_null($id) && $id !== false) {
            $cliente = $this->entityManager->find(Cliente::class, $id);

            $cliente->setNome($nome);
            $cliente->setTelefone($telefone);
            $cliente->setEmail($email);
            $cliente->setCnpj($cnpj);
            $cliente->setOrigem($origem);
            $cliente->setCidade($cidade);
            $cliente->setEstado($estado);
            $cliente->setSituacao($situacao);
            $cliente->setOrigem($origem);

            $this->defineMensagem('info', 'Cliente atualizado com sucesso.');
        } else {
            $cliente = new Cliente();

            $cliente->setNome($nome);
            $cliente->setTelefone($telefone);
            $cliente->setEmail($email);
            $cliente->setCnpj($cnpj);
            $cliente->setOrigem($origem);
            $cliente->setCidade($cidade);
            $cliente->setEstado($estado);
            $cliente->setSituacao($situacao);
            $cliente->setOrigem($origem);

            $this->entityManager->persist($cliente);

            $this->defineMensagem('success', 'Novo cliente adicionado com sucesso.');
        }

        $this->entityManager->flush();

        return new Response(302, ['Location' => '/listar-clientes']);
    }
}