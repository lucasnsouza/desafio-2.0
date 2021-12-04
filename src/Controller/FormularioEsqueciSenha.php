<?php

namespace Lucas\Procedo\Controller;

use Nyholm\Psr7\Response;
use Psr\Http\Message\ResponseInterface;
use Psr\Http\Message\ServerRequestInterface;
use Psr\Http\Server\RequestHandlerInterface;

class FormularioEsqueciSenha extends ControllerComHtml implements RequestHandlerInterface
{

    public function handle(ServerRequestInterface $request): ResponseInterface
    {
        $html = $this->renderizaHtml('usuarios/esqueci-senha.php', [
                'tituloDaPagina' => 'Esqueci senha',
                'titulo' => 'Enviar e-mail de recuperação'
            ]
        );

        return new Response(200, [], $html);
    }
}