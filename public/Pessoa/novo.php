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
$pessoa = $daoPessoa->porId( $_GET['id'] );
    
if (! $pessoa )
    header('Location: ./index.php');

else {  
    ob_start();

?>
    <div class="container">
        <div class="py-5 text-center">
            <h2>Cadastro de Pessoa</h2>
        </div>
        <div class="row">
            <div class="col-md-12" >

            <form action="atualizar.php" method="POST">

                <input type="hidden" name="id" 
                    value="<?php echo $pessoa->getId(); ?>"> 

                <div class="form-group">
                    <label for="nome">Nome da Pessoa</label>
                    <input type="text" class="form-control" id="nome"
                        name="nome" placeholder="Pessoa" required>
                </div>

                <div class="form-row">
                    <div class="form-group col-md-6">
                        <label for="idade">idade</label>
                        <input type="number" class="form-control" min="0.00" max="10000.00" 
                            step="0.01"  id="idade" 
                            name="idade" placeholder="Idade" required>
                    </div>                            
                    <div class="form-group col-md-6">
                        <label for="Telefone">Telefone</label>
                        <input type="text" class="form-control" id="telefone" 
                               name="Telefone" placeholder="Telefone" required>
                    </div>
                </div>
                <div class="form-group">
                    <label for="endereço">Endereço</label>
                    <input type= "text" class="form-control" id="endereco" 
                           name=endereco placeholder = "Endereço" required>
                </div>                    
                <div class="form-group">
                <label for="CPF">CPF</label>
                    <input type= "text" class="form-control" id="cpf" 
                           name="cpf" placeholder = "cpf" required>               
                </div>
                
                <button type="submit" class="btn btn-primary">Atualizar</button>
                <a href="index.php" class="btn btn-secondary ml-1" role="button" aria-pressed="true">Cancelar</a>

                </form> 
              <a href="index.php" class="btn btn-secondary ml-1" role="button" aria-pressed="true">Cancelar</a>

            </div>
        </div>
    </div>
<?php

    $content = ob_get_clean();
    echo html( $content );
} // else-if

?>