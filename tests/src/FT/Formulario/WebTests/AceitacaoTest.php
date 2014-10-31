<?php
/**
 * Created by PhpStorm.
 * User: Fabio
 * Date: 31/10/14
 * Time: 16:43
 */

namespace FT\Formulario;


class AceitacaoTest extends \PHPUnit_Extensions_Selenium2TestCase
{
    public function setUp()
    {
        $this->setBrowser('firefox');
        $this->setBrowserUrl('http://localhost:8888/web/index.php');
    }

    /*public function testVerificaSeCamposEstaoEmBranco()
    {
        $this->url('/');
        $dados = $this->byId('icategoria')->value() .
                 $this->byId('inome')->value() .
                 $this->byId('ivalor')->value() .
                 $this->byId('idescricao')->value();

        $this->assertEquals('', $dados);
    }*/

    public function testCadastroProdutoCorreto()
    {
        $this->url('/');
        $this->byId('icategoria')->value('Informática');
        $this->byId('inome')->value('Notebook');
        $this->byId('ivalor')->value('2999');
        $this->byId('idescricao')->value('Ultrabook LG Gram');

        $submit = $this->byId('isubmit');
        $submit->click();

        $titulo = $this->byCssSelector('h1');

        $this->assertContains('Parabéns', $titulo->text());
    }
} 