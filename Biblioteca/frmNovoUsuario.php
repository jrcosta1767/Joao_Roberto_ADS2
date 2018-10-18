<?php
session_start();
   if (!isset($_SESSION['user'])) 
      Header("Location: ./login.html");
?>

<html>  
    <head>  
        <meta charset = "utf-8">
        <title>Novo usuário</title>
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
        <script src="js/jquery-3.3.1.min.js" type="text/javascript"></script>    
        <script src="js/validator.min.js"></script>
        <link rel="stylesheet" href="frmNovoUsuarioDiv.css">  
    </head>
    <body>
        <br>
        <div class="container col-md-4" id="divNovoUsuario" name="divNovoUsuario">
            <h1 align="center">Novo usuário</h1>
            <form id="frmNovoUsuario" name="frmNovoUsuario" role="form" data-toggle="validator" method="POST" action="novoUsuario.php">
                <div class="form-group">
                        <label for="lblUser">Usuário:</label>
                        <input class="form-control col-md-8" type="text" id="txtUser" name="txtUser" 
                        placeholder="Informe o usuario" data-error="Usuário obrigatório" required>
                        <div class="help-block with-errors"></div> 
                </div>
                <div class="form-group">
                        <label for="lblPwd">Senha:</label>
                        <input class="form-control col-md-4" type="password" data-minlength="4" id="txtPwd" name="txtPwd" 
                        placeholder="Informe a senha" data-error="Mínimo de 4 caracteres" required>
                        <div class="help-block with-errors"></div> 
                </div>
                <div class="form-group">
                        <label for="lblConfPwd">Confirmar a senha:</label>
                        <input class="form-control col-md-4" type="password" id="txtConfPwd" name="txtConfPwd" 
                        placeholder="Informe a senha" 
                        data-match="#txtPwd" data-match-error="Senha diferente!" required>
                        <div class="help-block with-errors"></div> 
                </div>
                <input type="submit" id="btEnviar" name="btEnviar" class="btn btn-success" value="Gravar">
                <input type="reset"  id="btLimpar" name="btLimpar" class="btn btn-warning" value="Limpar">
                <input type="cancel" id="btCancel" name="btCancel" class="btn btn-primary" value="Cancelar" 
                       style="width:90px" onclick="javascript:location.href='frmMenu.php' ">
            </form>
        </div>
    </body>
</html>