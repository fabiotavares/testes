<?php
/**
 * Created by PhpStorm.
 * User: Fabio
 * Date: 23/09/14
 * Time: 16:55
 */

namespace FT\Formulario\Types;


class InputTextTest extends \PHPUnit_Framework_TestCase
{
    public function testVerificaSeOTipoDaClasseEstaCorreto()
    {
        $this->assertInstanceOf("FT\Formulario\AbstractField",
            new \FT\Formulario\Types\InputText("email", "imail", "mail", "Email"));
    }

    /**
     * @expectedException InvalidArgumentException
     */
    public function testVerificaSeTipoDoTextEstaCorreto()
    {
        $resultado = new \FT\Formulario\Types\InputText("mail", "imail", "mail", "Email");
    }
}

