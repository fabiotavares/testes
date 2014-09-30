<?php
/**
 * Created by PhpStorm.
 * User: Fabio
 * Date: 23/09/14
 * Time: 16:55
 */

namespace FT\Formulario\Types;


class TextAreaTest extends \PHPUnit_Framework_TestCase
{
    public function testVerificaSeOTipoDaClasseEstaCorreto()
    {
        $this->assertInstanceOf("FT\Formulario\AbstractField",
            new \FT\Formulario\Types\TextArea("iobs", "obs", "Observações", 3, 6));
    }

    /**
     * @expectedException InvalidArgumentException
     */
    public function testVerificaSeTipoDoBotaoEstaCorreto()
    {
        $resultado = new \FT\Formulario\Types\TextArea("iobs", "obs", "Observações", 3.4, 6);
    }
}

