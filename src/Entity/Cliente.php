<?php

namespace Lucas\Procedo\Entity;

use Doctrine\ORM\Mapping as ORM;

/** @ORM\Entity  */
class Cliente
{

    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string")
     */
    private $nome;

    /**
     * @ORM\Column(type="string")
     */
    private $email;

    /**
     * @ORM\Column(type="string")
     */
    private $cnpj;

    /**
     * @ORM\Column(type="string")
     */
    private $telefone;

    /**
     * @ORM\Column(type="string")
     */
    private $origem;

    /**
     * @ORM\Column(type="string")
     */
    private $cidade;

    /**
     * @ORM\Column(type="string")
     */
    private $estado;

    /**
     * @ORM\Column(type="string")
     */
    private $situacao;

    public function getId()
    {
        return $this->id;
    }


    public function setId($id): void
    {
        $this->id = $id;
    }


    public function getNome()
    {
        return $this->nome;
    }


    public function setNome($nome): void
    {
        $this->nome = $nome;
    }


    public function getEmail()
    {
        return $this->email;
    }


    public function setEmail($email): void
    {
        $this->email = $email;
    }


    public function getCnpj()
    {
        return $this->cnpj;
    }


    public function setCnpj($cnpj): void
    {
        $cnpj = preg_replace("/[^0-9]/", "", $cnpj);//vai retirar qualquer formatação
        $qtdDeDigitos = strlen($cnpj);//vai fazer a contagem de digitos sem formatação

        if($qtdDeDigitos != 14){
            //retornar erro
            exit;
        }

        $cnpjFormatado = substr($cnpj, 0, 2) . '.' .
            substr($cnpj, 2, 3) . '.' .
            substr($cnpj, 5, 3) . '/' .
            substr($cnpj, 8, 4) . '-' .
            substr($cnpj, 12, 2);

        $this->cnpj = $cnpjFormatado;
    }


    public function getOrigem()
    {
        return $this->origem;
    }


    public function setOrigem($origem): void
    {
        $this->origem = $origem;
    }

    public function getSituacao()
    {
        return $this->situacao;
    }


    public function setSituacao($situacao): void
    {
        $this->situacao = $situacao;
    }


    public function getTelefone()
    {
        return $this->telefone;
    }


    public function setTelefone($telefone): void
    {
        $telefone = preg_replace("/[^0-9]/", "", $telefone);//vai retirar qualquer formatação
        $qtdDeDigitos = strlen($telefone);//vai fazer a contagem de digitos sem formatação

        if ($qtdDeDigitos != 11){
            //retornar erro
            exit;
        }

        $telefoneFormatado = '(' . substr($telefone, 0, 2) . ')' .
            substr($telefone, 2, 5) . '-' .
            substr($telefone, 7, 4);

        $this->telefone = $telefoneFormatado;
    }

    public function getCidade()
    {
        return $this->cidade;
    }

    public function setCidade($cidade): void
    {
        $this->cidade = $cidade;
    }

    public function getEstado()
    {
        return $this->estado;
    }

    public function setEstado($estado): void
    {
        $this->estado = $estado;
    }
}