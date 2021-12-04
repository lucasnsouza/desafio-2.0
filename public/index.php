<?php

require __DIR__ . '/../vendor/autoload.php';

use Nyholm\Psr7\Factory\Psr17Factory;
use Nyholm\Psr7Server\ServerRequestCreator;
use Psr\Container\ContainerInterface;
use Psr\Http\Server\RequestHandlerInterface;

$caminho = $_SERVER["PATH_INFO"];
$rotas = require __DIR__ . '/../config/routes.php';

if(!array_key_exists($caminho, $rotas)){
    http_response_code(404);
    exit();
}

session_start();

//ao invés de verificar duas vezes por $caminho !== '/login' && $caminho !== '/realiza-login'
//podemos verificar que não estejamos acessando qualquer url com a palavra login
//usar o método stripos() que procura uma palavra específica dentro de uma string, se não encontra retorna false
$ehUmaRotaDeLogin = stripos($caminho, 'login');
$ehumaRotaDeCadastro = stripos($caminho, 'cadastro');
$ehumaRotaDeSenha = stripos($caminho, 'senha');

if (!isset($_SESSION['logado']) && $ehUmaRotaDeLogin === false && $ehumaRotaDeCadastro === false && $ehumaRotaDeSenha === false) {
    header('Location: /login');
    exit();
}

//fábrica de respostas http
$psr17Factory = new Psr17Factory();

$creator = new ServerRequestCreator(
    $psr17Factory, // ServerRequestFactory
    $psr17Factory, // UriFactory
    $psr17Factory, // UploadedFileFactory
    $psr17Factory  // StreamFactory
);

//request para o servidor
$request = $creator->fromGlobals();

//se o caminnho existir ele vai pegar o valor desse caminho no array rotas
//esses valores são as classes informadas no arquivo config/routes.php
$classeControladora = $rotas[$caminho];

/**
 * @var ContainerInterface $container
 */
$container = require __DIR__ . '/../config/dependencies.php';

/**
 * @var RequestHandlerInterface $controller
 */
$controller = $container->get($classeControladora);

$resposta = $controller->handle($request);

foreach ($resposta->getHeaders() as $name => $values) {
    foreach ($values as $value) {
        header(sprintf('%s: %s', $name, $value), false);
    }
}

echo $resposta->getBody();
