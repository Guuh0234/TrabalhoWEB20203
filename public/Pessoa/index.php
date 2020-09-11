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
$pessoas = $daoPessoa->todos();

ob_start();

?>
    <div class="container">
        <div class="py-5 text-center">
            <h2>Cadastro de Pessoas</h2>
        </div>
        <div class="row mb-2">
            <div class="col-md-12" >
                <a href="novo.php" class="btn btn-primary active" role="button" aria-pressed="true">Nova Pessoa</a>
            </div>
        </div>

<?php 
    if (count($pessoas) >0) 
    {
?>
        <div class="row">
            <div class="col-md-12" >

                <table class="table table-striped">
                <thead>
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">Nome</th>
                        <th scope="col">Idade</th>
                        <th scope="col">Telefone</th>
                        <th scope="col">Endereço</th>
                        <th scope="col">CPF</th>
                    </tr>
                </thead>
                <tbody>
<?php 
        foreach($pessoas as $p) {
?>                    
                    <tr>
                        <th scope="row"><?php echo  $p->getId(); ?></th>
                        <td><?php echo $p->getNome(); ?></td>
                        <td><?php echo $p->getIdade(); ?></td>
                        <td><?php echo $p->getTelefone(); ?></td>
                        <td><?php echo $p->getEndereco(); ?></td>
                        <td><?php echo $p->getCPF(); ?></td>
                        <td>
                            <a class="btn btn-danger btn-sm active" 
                                href="apagar.php?id=<?php echo $p->getId();?>">
                                Apagar
                            </a>
                            <a class="btn btn-secondary btn-sm active" 
                                href="editar.php?id=<?php echo $p->getId();?>">
                                Editar
                            </a>                        
                        </td>
                    </tr>
<?php
        } // foreach
?>                    
                </tbody>
                </table>

            </div>
        </div>
<?php 
    
    }  // if 
?>        
    </div>
<?php

$content = ob_get_clean();
echo html( $content );
    
?>


