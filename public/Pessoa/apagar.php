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


if (isset($_POST['id']) && isset($_POST['confirmacao'])) {
  $Pessoa = $daoPessoa->porId( $_POST['id'] );
  $daoPessoa->remover( $pessoa );
  header('Location: ./index.php');
  exit;  
}

$pessoa = $daoPessoa->porId( $_GET['id'] );

if (! $pessoa )
    header('Location: ./index.php');
else {  
    ob_start();
?>
    <div class="container">
        <div class="py-5 text-center">
            <h2>Apagar Pessoa</h2>
        </div>
        <div class="row">
            <div class="col-md-12" >

              <form action="apagar.php" class="card p-2 my-4" method="POST">
                <input type="hidden" name="id" 
                  value="<?php echo $pessoa->getId(); ?>"
                >
                <div class="form-group">
                  <label for="pessoa">Deseja realmente apagar a pessoa abaixo?</label>
                  <input type="text" class="form-control" id="pessoa" aria-describedby="help" 
                    value="<?php echo $pessoa->getNome();?>" 
                    readonly
                  >
                  <small id="help" class="form-text text-muted">Esta operação não poderá ser desfeita.</small>
                </div>
                <div class="form-row">
                  <input type="submit" class="btn btn-danger ml-1" value="Apagar" name="confirmacao"/>
                  <a href="index.php" class="btn btn-secondary ml-1" role="button" aria-pressed="true">Cancelar</a>
                </div>
              </form>

            </div>
        </div>
    </div>
<?php
    $content = ob_get_clean();
    echo html( $content );
} // else-if
