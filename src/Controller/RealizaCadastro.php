<?php

namespace Lucas\Procedo\Controller;

use Doctrine\ORM\EntityManagerInterface;
use Lucas\Procedo\Entity\Usuario;
use Lucas\Procedo\Helper\FlashMessagesTrait;
use Nyholm\Psr7\Response;
use Psr\Http\Message\ResponseInterface;
use Psr\Http\Message\ServerRequestInterface;
use Psr\Http\Server\RequestHandlerInterface;

class RealizaCadastro implements RequestHandlerInterface
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
            $request->getParsedBody()['cadastroNome'],
            FILTER_SANITIZE_STRING
        );

        $email = filter_var(
            $request->getParsedBody()['cadastroEmail'],
            FILTER_SANITIZE_STRING
        );

        $senha = filter_var(
            $request->getParsedBody()['cadastroSenha'],
            FILTER_SANITIZE_STRING
        );

        $usuario = new Usuario();
        $usuario->setNome($nome);
        $usuario->setEmail($email);
        $usuario->setSenha($senha);

        $this->defineMensagem('success',
            'Cadastro realizado com sucesso. Clique para <a href="/login" class="alert-link">fazer login</a>.');

        $this->entityManager->persist($usuario);
        $this->entityManager->flush();

        return new Response(302, ['Location' => '/cadastro']);
    }
}