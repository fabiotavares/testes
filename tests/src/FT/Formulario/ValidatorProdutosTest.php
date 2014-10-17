<?php
/**
 * Created by PhpStorm.
 * User: Fabio
 * Date: 16/10/14
 * Time: 16:28
 */

namespace FT\Formulario;


class ValidatorProdutosTest extends \PHPUnit_Framework_TestCase
{
    public function testFuncionamentoValidateProdutos()
    {
        $categoria = $this->getMock('FT\Formulario\Types\InputText', array("getValue"), array('text', 'id1', 'nome1', 'categoria'));
        $categoria->expects($this->any())
            ->method("getValue")
            ->willReturn("Informática")
        ;

        $nome = $this->getMock('FT\Formulario\Types\InputText', array("getValue"), array('text', 'id2', 'nome2', 'nome'));
        $nome->expects($this->any())
            ->method("getValue")
            ->willReturn("Computador")
        ;

        $valor = $this->getMock('FT\Formulario\Types\InputText', array("getValue"), array('text', 'id3', 'nome3', 'valor'));
        $valor->expects($this->any())
            ->method("getValue")
            ->willReturn(3999.99)
        ;

        $descricao = $this->getMock('FT\Formulario\Types\InputText', array("getValue"), array('text', 'id4', 'nome4', 'descricao'));
        $descricao->expects($this->any())
            ->method("getValue")
            ->willReturn("Computador desktop para hardusers")
        ;

        $request = $this->getMock('FT\Formulario\Request', array("getDados"), array([]));
        $request->expects($this->any())
            ->method("getDados")
            ->willReturn([$categoria, $nome, $valor, $descricao])
        ;

        $validate = new ValidatorProdutos($request);
        $this->assertTrue($validate->validate($validate->getRequest()->getDados()));
    }
} 