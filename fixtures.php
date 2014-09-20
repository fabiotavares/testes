<?php

require_once("src/FT/Util/parametros.php");

define('CLASS_DIR', 'src/');
set_include_path(get_include_path().PATH_SEPARATOR.CLASS_DIR);
spl_autoload_register();

try {
    //------------------------ BANCO DE DADOS -------------------------------
    //conecta ao servidor mysql
    $conn = new \PDO($driver.":host=".$host, $dbUser, $dbPass);

    //cria o banco de dados se ainda não existir
    $sql = "CREATE DATABASE IF NOT EXISTS `".$dbName."` DEFAULT CHARACTER SET utf8 COLLATE utf8_unicode_ci;";
    $stmt = $conn->prepare($sql);
    $stmt->execute();
    $stmt->closeCursor();


    //conecta ao banco de dados
    $conn = new \PDO($driver.":host=".$host.";dbname=".$dbName, $dbUser, $dbPass);

    //----------------------- TABELAS --------------------------------
    //criando a tabela CATEGORIAS se ela ainda não existir
    $sql = "CREATE TABLE `{$dbName}`.`categorias` (
            `id` int(5) NOT NULL AUTO_INCREMENT,
            `nome` varchar(45) COLLATE utf8_unicode_ci NOT NULL,
            PRIMARY KEY (`id`)
        ) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;";
    $stmt = $conn->prepare($sql);
    $stmt->execute();
    $stmt->closeCursor();

    //truncando a tabela
    $sql = "TRUNCATE TABLE `{$dbName}`.`categorias`";
    $stmt = $conn->prepare($sql);
    $stmt->execute();
    $stmt->closeCursor();

    //cadastrando algumas categorias
    $sql = "INSERT INTO categorias (nome) VALUES ('Eletrônico');
            INSERT INTO categorias (nome) VALUES ('Informática');
            INSERT INTO categorias (nome) VALUES ('Celular');
            INSERT INTO categorias (nome) VALUES ('Eletrodoméstico');
            INSERT INTO categorias (nome) VALUES ('Papelaria');
            INSERT INTO categorias (nome) VALUES ('Móveis');";
    $stmt = $conn->prepare($sql);
    $stmt->execute();
    $stmt->closeCursor();

    echo "\nFixtures executadas com sucesso.\n";

} catch (\PDOException $ex) {
    die("Erro de conexão<br />Código: ".$ex->getCode()."<br />Mensagem: ".$ex->getMessage());
}
