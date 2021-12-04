<?php

namespace Lucas\Procedo\Controller;

use Doctrine\ORM\EntityManagerInterface;
use Lucas\Procedo\Entity\Usuario;
use Lucas\Procedo\Helper\FlashMessagesTrait;
use Nyholm\Psr7\Response;
use Psr\Http\Message\ResponseInterface;
use Psr\Http\Message\ServerRequestInterface;
use Psr\Http\Server\RequestHandlerInterface;

class RealizaLogin implements RequestHandlerInterface
{
    use FlashMessagesTrait;
    /**
     * @var \Doctrine\Common\Persistence\ObjectRepository|\Doctrine\ORM\EntityRepository|\Doctrine\Persistence\ObjectRepository
     */
    private $repositorioUsuarios;

    public function __construct(EntityManagerInterface $entityManager)
    {
        $this->repositorioUsuarios = $entityManager->getRepository(Usuario::class);
    }

    public function handle(ServerRequestInterface $request): ResponseInterface
    {
        $email = filter_var(
            $request->getParsedBody()['userEmail'],
            FILTER_VALIDATE_EMAIL
        );

        $redirecionamento = new Response(302, ['Location' => '/login']);

        if(is_null($email) || $email === false) {
            //usando trait para flash message
            $this->defineMensagem(
                'danger',
                'E-mail ou senha incorretos! Tente novamente',
            );
            return $redirecionamento;
        }

        $senha = filter_var(
            $request->getParsedBody()['userPassword'],
            FILTER_SANITIZE_STRING
        );

        /**
         * @var Usuario $usuario
         */
        $usuario = $this->repositorioUsuarios->findOneBy(['email' => $email]);

        if(is_null($usuario) || !$usuario->verificaSenha($senha)) {
            //usando trait para flash message
            $this->defineMensagem(
                'danger',
                'E-mail ou senha incorretos! Tente novamente',
            );
            return $redirecionamento;
        }

        $_SESSION['logado'] = true;

        return new Response(302, ['Location' => '/listar-clientes']);
    }
}