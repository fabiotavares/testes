<?php
/**
 * Created by PhpStorm.
 * User: Fabio
 * Date: 16/10/14
 * Time: 16:28
 */

namespace FT\Formulario;


class RequestTest extends \PHPUnit_Framework_TestCase
{
    public function testFuncionamentoDoGetSet()
    {
        $request = new Request(array());
        $request->setDados(array("campo1"=>"valor1", "campo2"=>"valor2"));
        $this->assertEquals(2, count($request->getDados()));
    }
} 