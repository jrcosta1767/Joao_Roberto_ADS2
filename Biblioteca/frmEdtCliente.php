<?php
session_start();
    if (!isset($_SESSION['user'])) 
        Header("Location: ./login.html");

    $conexao = mysql_connect("localhost","root","");
    if (!$conexao){
        echo "Erro ao conectar no MySql <br/>";
        exit;
    }

    $banco = mysql_select_db("biblioteca");
    if (!$banco){
        echo "Erro ao conectar no banco biblioteca..";
        exit;
    }

    $id = $_REQUEST['id'];

    $rs = mysql_query("SELECT * FROM cliente WHERE id=".$id);
    $linha = mysql_fetch_array($rs);
?>

<html>
    <head>  
        <meta charset = "utf-8">
        <title>Editar cliente</title>
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
        <script src="js/jquery-3.3.1.min.js" type="text/javascript"></script>    
        <script src="js/validator.min.js"></script> 
        <link rel="stylesheet" href="frmEdtClienteDiv.css"> 
    </head>
    <body>
        <br>
        <div class="container col-md-4" id="divEdtCliente" name="divEdtCliente">
            <h1 align="center">Editar cliente</h1>
            <br>
            <form id="frmEdtCliente" name="frmEdtCliente" role="form" data-toggle="validator"  method="POST" action="edtCliente.php">
                <div class="form-group">
                    <label for="lblId">ID: <?php echo $linha['id']?></label>
                    <input type="hidden" id="id" name="id" value="<?php echo $linha['id']?>">
                </div>
                <div class="form-group">
                    <label for="lblNome">Nome: </label>
                    <input type="text" id="txtNome" class="form-control" style="width:309px" name="txtNome" 
                    value="<?php echo $linha['nome']?>" data-error="Nome obrigatório" required>
                    <div class="help-block with-errors"></div> 
                </div>
                <div class="form-group">
                    <label for="lblEndereco">Endereço: </label>
                    <input type="text" id="txtEnd" class="form-control" style="width:309px" name="txtEnd" 
                    value="<?php echo $linha['endereco']?>" data-error="Endereço obrigatório" required>
                    <div class="help-block with-errors"></div> 
                </div>
                <div class="form-group">
                    <label for="lblCidade">Cidade: </label>
                    <input type="text" id="txtCid" class="form-control" style="width:309px" name="txtCid" 
                    value="<?php echo $linha['cidade']?>" data-error="Cidade obrigatório" required>
                    <div class="help-block with-errors"></div> 
                </div>
                <div class="form-group">
                    <label for="lblEmail">Email: </label>
                    <input type="email" id="txtEmail" class="form-control" style="width:309px" name="txtEmail" 
                    value="<?php echo $linha['email']?>" data-error="Email inválido">
                    <div class="help-block with-errors"></div> 
                </div>
                <input type="submit" id="btEnviar" name="btEnviar" class="btn btn-success" value="Atualizar"
                        style="width:100px" >
                <input type="reset"  id="btLimpar" name="btLimpar" class="btn btn-warning" value="Limpar"
                        style="width:100px" >
                <input type="cancel" id="btCancel" name="btCancel" class="btn btn-primary" value="Cancelar" 
                        style="width:100px" 
                        onclick="javascript:location.href='lstCliente.php' ">
            </form>
        </div>
    </body>
</html>