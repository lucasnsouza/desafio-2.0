<?php

namespace Lucas\Procedo\Controller;

use Nyholm\Psr7\Response;
use Psr\Http\Message\ResponseInterface;
use Psr\Http\Message\ServerRequestInterface;
use Psr\Http\Server\RequestHandlerInterface;

class FormularioLogin extends ControllerComHtml implements RequestHandlerInterface
{

    public function handle(ServerRequestInterface $request): ResponseInterface
    {
        $html = $this->renderizaHtml(
            'usuarios/login.php', [
                'tituloDaPagina' => "Login",
                'titulo' => "Acessar conta",
            ]
        );

        return new Response(200, [], $html);
    }
}