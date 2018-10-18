<?php
session_start();
   if (!isset($_SESSION['user'])) 
      Header("Location: ./login.html");
?>

<html>  
    <head>  
        <meta charset = "utf-8">
        <title>Inserir cliente</title>
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
        <script src="js/jquery-3.3.1.min.js" type="text/javascript"></script>    
        <script src="js/validator.min.js"></script> 
        <link rel="stylesheet" href="frmInsClienteDiv.css"> 
    </head>
    <body>
        <br>
        <div class="container col-md-4" id="divNovoCliente" name="divNovoCliente">
            <h1 align="center">Novo cliente</h1>
            <br>
            <form id="frmNovoCliente" name="frmNovoCliente" role="form" data-toggle="validator"  method="POST" action="insCliente.php">
                <div class="form-group">
                    <label for="lblTitulo">Nome:</label>
                    <input class="form-control" style="width:309px" type="text" id="txtNome" name="txtNome" 
                    placeholder="Informe o nome" data-error="Nome obrigatório" required>
                    <div class="help-block with-errors"></div> 
                </div>
                <div class="form-group">
                        <label for="lblEndereco">Endereco:</label>
                        <input class="form-control" style="width:309px" type="text" id="txtEnd" name="txtEnd" 
                        placeholder="Informe o endereço" data-error="Endereço obrigatório" required>
                    <div class="help-block with-errors"></div> 
                </div>
                <div class="form-group">
                    <label for="lblCidade">Cidade:</label>
                    <input class="form-control" style="width:309px" type="text" id="txtCid" name="txtCid" 
                    placeholder="Informe a cidade" data-error="Cidade obrigatório" required>
                    <div class="help-block with-errors"></div> 
                </div>
                <div class="form-group">
                    <label for="lblEmail">Email:</label>
                    <input class="form-control" style="width:309px" type="email" id="txtEmail" name="txtEmail" 
                    placeholder="Informe o email" data-error="Email inválido">
                    <div class="help-block with-errors"></div> 
                </div>
                <input type="submit" id="btEnviar" name="btEnviar" class="btn btn-success" value="Gravar"
                        style="width:100px">
                <input type="reset"  id="btLimpar" name="btLimpar" class="btn btn-warning" value="Limpar"
                        style="width:100px">
                <input type="cancel" id="btCancel" name="btCancel" class="btn btn-primary" value="Cancelar"
                        style="width:100px" 
                        onclick="javascript:location.href='lstCliente.php' ">
            </form>
        </div>
    </body>
</html>