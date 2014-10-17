<?php
/**
 * Created by PhpStorm.
 * User: Fabio
 * Date: 23/09/14
 * Time: 16:55
 */

namespace FT\Formulario\Types;


class ButtonTest extends \PHPUnit_Framework_TestCase
{
    public function testVerificaSeOTipoDaClasseEstaCorreto()
    {
        $this->assertInstanceOf("FT\Formulario\AbstractField",
            new \FT\Formulario\Types\Button("submit", "isub", "sub", "Enviar", ""));
    }

    /**
     * @expectedException InvalidArgumentException
     */
    public function testVerificaSeTipoDoBotaoEstaCorreto()
    {
        $resultado = new \FT\Formulario\Types\Button("submite", "isub", "sub", "Enviar", "");
    }

    public function testVerificaFuncionamentoDoGetSetClass()
    {
        $button = new \FT\Formulario\Types\Button("submit", "isub", "sub", "Enviar", "");
        $button->setClass("classe");
        $this->assertEquals("classe", $button->getClass());
    }

}

