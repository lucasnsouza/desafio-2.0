<?php

namespace Lucas\Procedo\Controller;

use Nyholm\Psr7\Response;
use Psr\Http\Message\ResponseInterface;
use Psr\Http\Message\ServerRequestInterface;
use Psr\Http\Server\RequestHandlerInterface;

class Logout implements RequestHandlerInterface
{

    public function handle(ServerRequestInterface $request): ResponseInterface
    {
        //destruir sessão ativa
        session_destroy();

        return new Response(302, ['Location' => '/login']);
    }
}