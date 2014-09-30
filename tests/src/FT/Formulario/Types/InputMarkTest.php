<?php
/**
 * Created by PhpStorm.
 * User: Fabio
 * Date: 23/09/14
 * Time: 16:55
 */

namespace FT\Formulario\Types;


class InputMarkTest extends \PHPUnit_Framework_TestCase
{
    public function testVerificaSeOTipoDaClasseEstaCorreto()
    {
        $this->assertInstanceOf("FT\Formulario\AbstractField",
            new \FT\Formulario\Types\InputMark("radio", "inews", "news", "Assinar news", "checked"));
    }

    /**
     * @expectedException InvalidArgumentException
     */
    public function testVerificaSeTipoDoCheckEstaCorreto()
    {
        $resultado = new \FT\Formulario\Types\InputMark("check", "inews", "news", "Assinar news", "checked");
    }
}

