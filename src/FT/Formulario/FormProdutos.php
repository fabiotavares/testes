<?php
/**
 * Created by PhpStorm.
 * User: Fabio
 * Date: 18/09/14
 * Time: 15:24
 */

namespace FT\Formulario;

use \FT\Formulario\Types\Button;
use \FT\Formulario\Types\InputText;
use \FT\Formulario\Types\Select;
use \FT\Formulario\Types\Option;
use \FT\Formulario\Types\TextArea;
use FT\Formulario\Types\FieldSet;

class FormProdutos extends Form
{
    protected $conn;

    public function __construct(\PDO $conn, Request $request, $id, $name, $action, $method, $class)
    {
        //constrói um formulário com os campos de cadastro de produto
        $this->conn = $conn;
        parent::__construct($id, $name, $action, $method, $class);
        parent::setValidator(new ValidatorProdutos($request));
        $this->createFields();
    }

    protected function createFields()
    {
        //criando campos para o cadastro de produtos
        $fieldsetProdutos = new FieldSet("produtos", "Cadastro de Produtos");

        //Adicionando os campos categoria, nome, valor e descrição ao fieldset
        //CATEGORIAS
        $select = new Select('icategoria', 'categoria', 'Categoria:');
        $sql = "Select * From categorias";
        $stmt = $this->conn->prepare($sql);
        $stmt->execute();
        $categorias = $stmt->fetchAll(\PDO::FETCH_ASSOC);
        foreach($categorias as $categoria) {
            $select->add(new Option($categoria['id'], $categoria['nome']));
        }
        //$select->getFields()[0]->setSelected('selected'); //deixando a 1ª opção pré-selecionada
        $fieldsetProdutos->add($select);

        //NOME, VALOR e DESCRIÇÃO
        $fieldsetProdutos->add(new InputText("text", 'inome', 'nome', 'Nome:'));
        $fieldsetProdutos->add(new InputText("text", 'ivalor', 'valor', 'Valor:'));
        $fieldsetProdutos->add(new TextArea('idescricao', 'descricao', 'Descrição:', 3, 50));

        //Adicionando o fieldset e um botão submit
        parent::createField($fieldsetProdutos);
        parent::createField(new Button("submit", 'isubmit', 'submit', 'Enviar', "btn btn-primary"));
    }

    public function validaFormulario()
    {
        //verifica se há dados do formulário na request para validação
        $dados = $this->validator->getRequest()->getDados();
        if(isset($dados['submit'])) {
            $this->popular($dados); //populando formulário com os dados da request
            return $this->validator->validate($this->fields[0]->getFields()); //valida os campos do fieldset
        }

        return false;
    }

    public function popular($dados)
    {
        //copia valores da request para o formulário
        $fields = $this->fields[0]->getFields();

        if(isset($dados['categoria'])) {
            $fields[0]->setValue($dados['categoria']);
        }

        if(isset($dados['nome'])) {
            $fields[1]->setValue($dados['nome']);
        }

        if(isset($dados['valor'])) {
            $fields[2]->setValue($dados['valor']);
        }

        if(isset($dados['descricao'])) {
            $fields[3]->setValue($dados['descricao']);
        }
    }

}
