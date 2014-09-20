<?php
/**
 * Created by PhpStorm.
 * User: Fabio
 * Date: 27/08/14
 * Time: 19:12
 */

require_once('../src/FT/Util/conexao.php');

use \FT\Formulario\Request;
use \FT\Formulario\FormProdutos;

define('CLASS_DIR', '../src/');
set_include_path(get_include_path().PATH_SEPARATOR.CLASS_DIR);
spl_autoload_register();

//criando um formulário de cadastro de produtos (passando a requisição)
$formProdutos = new FormProdutos($conn, new Request($_REQUEST),'iForm', 'form', 'index.php', 'post', 'form-horizontal');

?>


<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8"/>
    <title>Code.Education</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="css/bootstrap-responsive.css" rel="stylesheet">
    <link href="css/bootstrap.css" rel="stylesheet" media="screen">
    <script src="//ajax.googleapis.com/ajax/libs/jquery/1.7.1/jquery.min.js"></script>
    <script>window.jQuery || document.write('<script src="js/jquery-1.7.1.min.js"><\/script>')</script>
    <script type="text/javascript" src="js/bootstrap.js"></script>
</head>

<div class="container">
    <body>
        <div class="hero-unit">
            <h2>PHP: Design Patterns</h2>
            <h2><small>Projeto Fase 4 - Fábio Tavares</small></h2>
        </div>

<?php
//exibir o formulário se o mesmo não for validado (mostrando as mensagens de erro se existirem)
if(!$formProdutos->validaFormulario()):
    $formProdutos->render();
else:
//exibir mensagem de sucesso no cadastro do produto
?>

    <div class="alert alert-success">
        <h4>Parabéns!</h4>
        Produto cadastrado com sucesso.
    </div>
    <p>
        <a href="index.php"><button class="btn btn-success" type="button">Voltar</button></a>
    </p>

<?php
endif;
?>

        <script type="text/javascript" src="js/bootstrap.js"></script>
    </body>
</div>

</html>
