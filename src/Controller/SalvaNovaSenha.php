<?php

namespace Lucas\Procedo\Controller;

use Doctrine\ORM\EntityManagerInterface;
use Lucas\Procedo\Entity\Usuario;
use Lucas\Procedo\Helper\FlashMessagesTrait;
use Nyholm\Psr7\Response;
use Psr\Http\Message\ResponseInterface;
use Psr\Http\Message\ServerRequestInterface;
use Psr\Http\Server\RequestHandlerInterface;

class SalvaNovaSenha implements RequestHandlerInterface
{
    use FlashMessagesTrait;
    /**
     * @var \Doctrine\Common\Persistence\ObjectRepository|\Doctrine\ORM\EntityRepository|\Doctrine\Persistence\ObjectRepository
     */
    private $repositorioUsuarios;
    /**
     * @var EntityManagerInterface
     */
    private $entityManager;

    public function __construct(EntityManagerInterface $entityManager)
    {
        $this->entityManager = $entityManager;
        $this->repositorioUsuarios = $entityManager->getRepository(Usuario::class);
    }

    public function handle(ServerRequestInterface $request): ResponseInterface
    {
        $email = filter_var(
            $request->getParsedBody()['email'],
            FILTER_VALIDATE_EMAIL
        );

        $resposta = new Response(302, ['Location' => '/nova-senha']);

        if(is_null($email) || $email === false) {
            $this->defineMensagem('danger', 'Insira um e-mail válido!');
            return $resposta;
        }

        $senha = filter_var(
            $request->getParsedBody()['senha'],
            FILTER_SANITIZE_STRING
        );

        /**
         * @var Usuario $usuario
         */
        $usuario = $this->repositorioUsuarios->findOneBy(['email' => $email]);

        if(is_null($usuario)) {
            $this->defineMensagem('danger', 'Insira um e-mail válido!');
            return $resposta;
        }

        $usuario->setSenha($senha);
        $this->entityManager->flush();
        $this->defineMensagem('success', 'Senha alterada com sucesso!');

        return new Response(302, ['Location' => '/login']);
    }
}