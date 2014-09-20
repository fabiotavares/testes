<?php
/**
 * Created by PhpStorm.
 * User: Fabio
 * Date: 18/09/14
 * Time: 16:42
 */

namespace FT\Formulario;


class ValidatorProdutos extends Validator {

    function __construct(Request $request)
    {
        parent::__construct($request);
    }

    public function validate($fields)
    {
        $result = true;

        //verifica se escolheu uma categoria
        $categoriaProduto = $fields[0]->getValue();
        if(!isset($categoriaProduto)) {
            $fields[0]->setMsgError("erro: escolha uma categoria");
            $result = false;
        }

        //verifica se digitou um nome diferente de vazio
        $nomeProduto = trim($fields[1]->getValue());
        if(!isset($nomeProduto) || empty($nomeProduto)) {
            $fields[1]->setMsgError("erro: digite um nome");
            $result = false;
        }

        //verifica se digitou um valor válido
        $valorProduto = $fields[2]->getValue();
        if(!isset($valorProduto) || !is_numeric($valorProduto)) {
            $fields[2]->setMsgError("erro: didgite um valor válido");
            $result = false;
        }

        //verifica se digitou uma descrição com no máximo 200 caracteres
        $descricaoProduto = $fields[3]->getValue();
        if(!isset($descricaoProduto) || strlen($descricaoProduto) > 200) {
            $fields[3]->setMsgError("erro: digite uma descrição com no máximo 200 caracteres");
            $result = false;
        }

        return $result;
    }
} 