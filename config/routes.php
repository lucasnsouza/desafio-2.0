<?php

use Lucas\Procedo\Controller\EmailParaSenha;
use Lucas\Procedo\Controller\Exclusao;
use Lucas\Procedo\Controller\FormularioAdicionarCliente;
use Lucas\Procedo\Controller\FormularioCadastroUsuario;
use Lucas\Procedo\Controller\FormularioEditarCliente;
use Lucas\Procedo\Controller\FormularioEsqueciSenha;
use Lucas\Procedo\Controller\FormularioLogin;
use Lucas\Procedo\Controller\FormularioNovaSenha;
use Lucas\Procedo\Controller\ListarClientes;
use Lucas\Procedo\Controller\Logout;
use Lucas\Procedo\Controller\Persistencia;
use Lucas\Procedo\Controller\RealizaCadastro;
use Lucas\Procedo\Controller\RealizaLogin;
use Lucas\Procedo\Controller\SalvaNovaSenha;

$rotas = [
    '/listar-clientes' => ListarClientes::class,
    '/adicionar-cliente' => FormularioAdicionarCliente::class,
    '/salvar-cliente' => Persistencia::class,
    '/atualizar-cliente' => FormularioEditarCliente::class,
    '/excluir-cliente' => Exclusao::class,
    '/cadastro' => FormularioCadastroUsuario::class,
    '/realiza-cadastro' => RealizaCadastro::class,
    '/login' => FormularioLogin::class,
    '/realiza-login' => RealizaLogin::class,
    '/logout' => Logout::class,
    '/nova-senha' => FormularioNovaSenha::class,
    '/salvar-nova-senha' => SalvaNovaSenha::class,
    '/esqueci-senha' => FormularioEsqueciSenha::class,
    '/enviar-email-senha' => EmailParaSenha::class,
];

return $rotas;