<?php

namespace Lucas\Procedo\Controller;

use Doctrine\ORM\EntityManagerInterface;
use Lucas\Procedo\Entity\Usuario;
use Lucas\Procedo\Helper\FlashMessagesTrait;
use Lucas\Procedo\Suport\Email;
use Nyholm\Psr7\Response;
use Psr\Http\Message\ResponseInterface;
use Psr\Http\Message\ServerRequestInterface;
use Psr\Http\Server\RequestHandlerInterface;

class EmailParaSenha extends Email implements RequestHandlerInterface
{
    use FlashMessagesTrait;

    /**
     * @var \Doctrine\Common\Persistence\ObjectRepository|\Doctrine\ORM\EntityRepository|\Doctrine\Persistence\ObjectRepository
     */
    private $repositorioDeUsuarios;

    public function __construct(EntityManagerInterface $entityManager)
    {
        $this->repositorioDeUsuarios = $entityManager->getRepository(Usuario::class);
    }

    public function handle(ServerRequestInterface $request): ResponseInterface
    {
        $emailDoUsuario = filter_var(
            $request->getParsedBody()['userEmail'],
            FILTER_VALIDATE_EMAIL
        );

        $resposta = new Response(302, ['Location' => '/esqueci-senha']);

        if(is_null($emailDoUsuario) || $emailDoUsuario === false) {
            $this->defineMensagem(
                'danger',
                'Insira um email válido!'
            );
            return $resposta;
        }

        $usuario = $this->repositorioDeUsuarios->findOneBy(['email' => $emailDoUsuario]);

        if(is_null($usuario)) {
            $this->defineMensagem(
                'danger',
                'Insira um email válido!'
            );
            return $resposta;
        }
        
        $msgHtml = '
            <h1>Clique para cadastrar nova senha</h1>
            <p>Clique no link abaixo para cadastrar sua nova senha.</p>
            <p>Clique no link para <a href="http://localhost:8001/nova-senha">recuperar sua senha.</a></p>
            <p>Se você não solicitou esse e-mail, ignore a mensagem.</p>
        ';

        $email = new Email();
        $email->adicionaMensagem(
            'E-mail teste',
            $msgHtml,
            'Lucas Souza',
            $emailDoUsuario
        )->enviaEmail();

        if(!$email->error()) {
            var_dump(true);
        } else {
            echo $email->error()->getMessage();
        }

        $this->defineMensagem(
            'info',
            'Cheque seu e-mail para informações de como cadastrar uma nova senha.'
        );

        return new Response(302, ['Location' => '/login']);
    }
}