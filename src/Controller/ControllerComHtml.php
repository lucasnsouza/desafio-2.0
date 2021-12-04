<?php

namespace Lucas\Procedo\Controller;

abstract class ControllerComHtml
{
    public function renderizaHtml(string $caminhoDoTemplate, array $dados): string
    {
        extract($dados);
        ob_start();
        require  __DIR__ . '/../../views/' . $caminhoDoTemplate;
        $html = ob_get_clean();

        return $html;
    }
}