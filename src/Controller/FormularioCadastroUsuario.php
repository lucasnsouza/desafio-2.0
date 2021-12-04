<?php

namespace Lucas\Procedo\Controller;

use Nyholm\Psr7\Response;
use Psr\Http\Message\ResponseInterface;
use Psr\Http\Message\ServerRequestInterface;
use Psr\Http\Server\RequestHandlerInterface;

class FormularioCadastroUsuario extends ControllerComHtml implements RequestHandlerInterface
{

    public function handle(ServerRequestInterface $request): ResponseInterface
    {
        $html = $this->renderizaHtml('usuarios/cadastro.php', [
            'tituloDaPagina' => "Cadastro",
            'titulo' => "Cadastrar",
        ]);

        return new Response(200, [], $html);
    }
}