<?php
/**
 * Created by PhpStorm.
 * User: Fabio
 * Date: 16/10/14
 * Time: 16:28
 */

namespace FT\Formulario;

class FormProdutosTest extends \PHPUnit_Framework_TestCase
{
    private $db;

    public function setUp() //é executado imediatamente antes de cada teste
    {
        //cria a tabela categoria com os campos id e nome
        $this->db = new \PDO("sqlite::memory:");

        $query = "Create table categorias (id INT AUTO_INCREMENT, nome VARCHAR(255));";
        $this->db->exec($query);

        //insere algumas categorias de exemplo
        $query = "insert into categoria (nome) values ('Eletrônico'); ".
            "insert into categoria (nome) values ('Informática'); ".
            "insert into categoria (nome) values ('Celular'); ".
            "insert into categoria (nome) values ('Eletrodoméstico'); ".
            "insert into categoria (nome) values ('Papelaria'); ".
            "insert into categoria (nome) values ('Móveis');";
        $this->db->exec($query);
    }

    public function tearDown() //é executado imediatamente após cada teste
    {
        //normalmente desfaz o que o setUp fez
        $this->db->exec("drop table categoria;");
    }

    public function testCriacaoDoFormularioDeProdutos()
    {
        $request = new Request(array("campo1"=>"valor1", "campo2"=>"valor2"));
        $formProdutos = new FormProdutos($this->db, $request,'iForm', 'form', 'index.php', 'post', 'form-horizontal');

        $this->assertInstanceOf('FT\Formulario\Form', $formProdutos);
    }

    public function testFuncionamentoDaValidacaoAprovada()
    {
        //verifica a funcionalidade de validação dos dados (devendo ser aprovada)
        $request = new Request(array("categoria"=>"Celular", "nome"=>"LG G3", "valor"=>1500, "descricao"=>"Ótimo celular", "submit"=>"1"));
        $formProdutos = new FormProdutos($this->db, $request,'iForm', 'form', 'index.php', 'post', 'form-horizontal');
        $dados = array("categoria"=>"Celular", "nome"=>"LG G3", "valor"=>1500, "descricao"=>"Ótimo celular");

        $this->assertTrue($formProdutos->validaFormulario());
    }

    public function testFuncionamentoDaValidacaoRecusada()
    {
        //verifica a funcionalidade de validação dos dados (devendo ser aprovada)
        $request = new Request(array("categoria"=>"Celular", "nome"=>"LG G3", "valor"=>"mil reais", "descricao"=>"Ótimo celular", "submit"=>"1"));
        $formProdutos = new FormProdutos($this->db, $request,'iForm', 'form', 'index.php', 'post', 'form-horizontal');
        $dados = array("categoria"=>"Celular", "nome"=>"LG G3", "valor"=>1500, "descricao"=>"Ótimo celular");

        $this->assertTrue(!$formProdutos->validaFormulario());
    }
} 