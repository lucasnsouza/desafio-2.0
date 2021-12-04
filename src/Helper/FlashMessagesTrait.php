<?php

namespace Lucas\Procedo\Helper;

trait FlashMessagesTrait
{
    //ao invés de espalhar várias $_SESSION['mensagem'] pelo código
    //vamos usar uma Trait e usar esse pedaço de código nos momentos necessários
    public function defineMensagem(string $tipoDaMensagem, string $mensagem): void
    {
        $_SESSION['tipo_mensagem'] = $tipoDaMensagem;
        $_SESSION['mensagem'] = $mensagem;
    }
}