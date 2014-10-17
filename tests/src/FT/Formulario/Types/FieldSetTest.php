<?php
/**
 * Created by PhpStorm.
 * User: Fabio
 * Date: 23/09/14
 * Time: 16:55
 */

namespace FT\Formulario\Types;


class FieldSetTest extends \PHPUnit_Framework_TestCase
{
    public function testVerificaInclusaoDeFields()
    {
        $email = $this->getMock('FT\Formulario\Types\InputText', array(), array("email", "imail", "mail", "Email"));
        $button = $this->getMock('FT\Formulario\Types\Button', array(), array("submit", "isub", "sub", "Enviar", ""));

        $fieldSet = new FieldSet("nome", "legenda");
        $fieldSet->add($email);
        $fieldSet->add($button);
        $this->assertEquals(2, count($fieldSet->getFields()));
        $fieldSet->resetFields();
        $this->assertEquals(0, count($fieldSet->getFields()));
    }

}

