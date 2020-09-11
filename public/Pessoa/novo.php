<?php

require_once(__DIR__ . '/../../templates/template-html.php');


ob_start();

?>
    <div class="container">
        <div class="py-5 text-center">
            <h2>Cadastro de Pessoa</h2>
        </div>
        <div class="row">
            <div class="col-md-12" >

            <form action="salvar.php" method="POST">

                <div class="form-group">
                    <label for="nome">Nome da Pessoa</label>
                    <input type="text" class="form-control" id="nome"
                        name="nome" placeholder="PESSOA" required>
                </div>

                <div class="form-row">
                    <div class="form-group col-md-6">
                        <label for="idade">idade</label>
                        <input type="number" class="form-control" min="0.00" max="10000.00" 
                            step="0.01"  id="idade" 
                            name="idade" placeholder="IDADE" required>
                    </div>                            
                    <div class="form-group col-md-6">
                        <label for="telefone">Telefone</label>
                        <input type="text" class="form-control" id="telefone" 
                               name="telefone" placeholder="TELEFONE" required>
                    </div>
                </div>


                <div class="form-group">
                <label for="CPF">CPF</label>
                    <input type= "text" class="form-control" id="CPF" 
                           name="cpf" placeholder = "CPF" required>               
                </div>


                <div class="form-group">
                    <label for="endereço">Endereço</label>
                    <input type= "text" class="form-control" id="endereco" 
                           name="endereco" placeholder = "ENDEREÇO" required>
                </div>   


                
                <button type="submit" class="btn btn-primary">Atualizar</button>
                <a href="index.php" class="btn btn-secondary ml-1" role="button" aria-pressed="true">Cancelar</a>

            </form> 
              

            </div>
        </div>
    </div>
<?php

    $content = ob_get_clean();
    echo html( $content );

?>