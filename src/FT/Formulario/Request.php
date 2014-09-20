<?php
/**
 * Created by PhpStorm.
 * User: Fabio
 * Date: 11/09/14
 * Time: 15:01
 */

namespace FT\Formulario;


class Request
{
    protected $dados = [];

    function __construct($dados)
    {
        $this->dados = $dados;
    }

    public function setDados($dados)
    {
        $this->dados = $dados;
    }

    public function getDados()
    {
        return $this->dados;
    }

} 