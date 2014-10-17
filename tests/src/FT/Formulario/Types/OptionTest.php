<?php
/**
 * Created by PhpStorm.
 * User: Fabio
 * Date: 23/09/14
 * Time: 16:55
 */

namespace FT\Formulario\Types;


class OptionTest extends \PHPUnit_Framework_TestCase
{
    public function testVerificaSeOTipoDaClasseEstaCorreto()
    {
        $this->assertInstanceOf("FT\Formulario\iField",
            new \FT\Formulario\Types\Option("value", "legend", "selected"));
    }

}

