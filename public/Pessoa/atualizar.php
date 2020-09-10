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

$DaoPessoa = new DaoPessoa($conn);
$pessoa = $DaoPessoa->porId( $_POST['id'] );
    
if ( $pessoa )
{  
  $pessoa->setNome( $_POST['nome'] );
  $pessoa->setIdade( $_POST['idade']);
  $pessoa->setTelefone( $_POST['telefone']);
  $pessoa->setCpf( $_POST['cpf']);
  $pessoa->setEndereco( $_POST['endereco']);

  $DaoPessoa->atualizar( $pessoa );
}

header('Location: ./index.php');