<?php

require_once(__DIR__ . '/../../templates/template-html.php');

require_once(__DIR__ . '/../../db/Db.php');
require_once(__DIR__ . '/../../model/Pessoa.php');
require_once(__DIR__ . '/../../dao/DaoPessoa.php');
require_once(__DIR__ . '/../../config/config.php');

$conn = Db::getInstance();

if (! $conn->connect()) {
    die();
}

$daoPessoa = new DaoPessoa($conn);
$pessoa = $daoPessoa->porId( $_POST['id'] );
    
if ( $pessoa )
{  
  $pessoa->setNome( $_POST['nome'] );
  $pessoa->setIdade( $_POST['idade']);
  $pessoa->setTelefone( $_POST['telefone']);
  $pessoa->setCpf( $_POST['cpf']);
  $pessoa->setEndereco( $_POST['endereco']);

  $daoPessoa->atualizar( $pessoa );
}

header('Location: ./index.php');