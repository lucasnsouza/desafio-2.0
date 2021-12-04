<?php

namespace Lucas\Procedo\Controller;

use Nyholm\Psr7\Response;
use Psr\Http\Message\ResponseInterface;
use Psr\Http\Message\ServerRequestInterface;
use Psr\Http\Server\RequestHandlerInterface;

class FormularioNovaSenha extends ControllerComHtml implements RequestHandlerInterface
{

    public function handle(ServerRequestInterface $request): ResponseInterface
    {
        $html = $this->renderizaHtml('usuarios/nova-senha.php', [
                'tituloDaPagina' => 'Nova senha',
                'titulo' => 'Criar nova senha'
            ]
        );

        return new Response(200, [], $html);
    }
}