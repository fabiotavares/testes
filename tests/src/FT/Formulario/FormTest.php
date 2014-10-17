<?php
/**
 * Created by PhpStorm.
 * User: Fabio
 * Date: 16/10/14
 * Time: 16:28
 */

namespace FT\Formulario;


class FormTest extends \PHPUnit_Framework_TestCase
{
    public function testFuncionamentoDoGetSetResetFields()
    {
        $email = $this->getMock('FT\Formulario\Types\InputText', array(), array("email", "imail", "mail", "Email"));
        $button = $this->getMock('FT\Formulario\Types\Button', array(), array("submit", "isub", "sub", "Enviar", ""));

        $form = new Form('id', 'name', 'action', 'method', 'class');
        $form->createField($email);
        $form->createField($button);
        $this->assertEquals(2, count($form->getFields()));
        $form->resetFields();
        $this->assertEquals(0, count($form->getFields()));
    }
} 