<?php

namespace Lucas\Procedo\Controller;

use Nyholm\Psr7\Response;
use Psr\Http\Message\ResponseInterface;
use Psr\Http\Message\ServerRequestInterface;
use Psr\Http\Server\RequestHandlerInterface;

class FormularioAdicionarCliente extends ControllerComHtml implements RequestHandlerInterface
{

    public function handle(ServerRequestInterface $request): ResponseInterface
    {
        //gerar html
        $html = $this->renderizaHtml(
            'clientes/formulario.php', [
                'tituloDaPagina' => "Novo cliente",
                'titulo' => "Adicionar cliente",
            ]
        );

        return new Response(200, [], $html);
    }
}