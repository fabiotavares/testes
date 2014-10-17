<?php
/**
 * Created by PhpStorm.
 * User: Fabio
 * Date: 23/09/14
 * Time: 16:55
 */

namespace FT\Formulario\Types;


class SelectTest extends \PHPUnit_Framework_TestCase
{
    public function testVerificaInclusaoDeOpcoes()
    {
        $opcao1 = $this->getMock('FT\Formulario\Types\Option', array(), array("valor1", "legenda1", "selected"));
        $opcao2 = $this->getMock('FT\Formulario\Types\Option', array(), array("valor2", "legenda2", ""));

        $selecao = new Select("id", "nome", "legenda");
        $selecao->add($opcao1);
        $selecao->add($opcao2);
        $this->assertEquals(2, count($selecao->getFields()));
        $selecao->resetFields();
        $this->assertEquals(0, count($selecao->getFields()));
    }

}

