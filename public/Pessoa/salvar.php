<?php

require_once(__DIR__ . '/../../db/Db.php');
require_once(__DIR__ . '/../../model/Pessoa.php');
require_once(__DIR__ . '/../../dao/DaoPessoa.php');
require_once(__DIR__ . '/../../config/config.php');

$conn = Db::getInstance();

if (! $conn->connect()) {
    die();
}

$daoPessoa = new DaoPessoa($conn);
$novaPessoa = new Pessoa($_POST['nome'],  $_POST['idade'], $_POST['endereco'], $_POST['cpf'], $_POST['telefone']);
$daoPessoa->inserir( $novaPessoa );
    
header('Location: ./index.php');

?>


