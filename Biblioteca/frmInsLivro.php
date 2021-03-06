<?php
session_start();
   if (!isset($_SESSION['user'])) 
      Header("Location: ./login.html");
?>

<html>  
    <head>  
        <meta charset = "utf-8">
        <title>Inserir livro</title>
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
        <script src="js/jquery-3.3.1.min.js" type="text/javascript"></script>    
        <script src="js/validator.min.js"></script>  
        <link rel="stylesheet" href="frmInsLivroDiv.css">    
    </head>
    <body>
        <br>
        <div class="container col-md-4" id="divInsLivro" name="divInsLivro">
            <h1 align="center">Novo livro</h1>
            <br>
            <form id="frmNovoLivro" name="frmNovoLivro" role="form" data-toggle="validator" method="POST" action="insLivro.php">
                <div class="form-group">
                    <label for="lblTitulo">Título:</label>
                    <input class="form-control" style="width:309px" type="text" id="txtTit" name="txtTit" 
                    placeholder="Informe o título" data-error="Título obrigatório" required>
                    <div class="help-block with-errors"></div>  
                </div>
                <div class="form-group">
                        <label for="lblEdicao">Edição:</label>
                        <input class="form-control col-md-2" type="text" id="txtEdi" name="txtEdi" placeholder="No.">
                </div>
                <div class="form-group">
                    <label for="lblAutor">Autor(a):</label>
                    <input class="form-control" style="width:309px" type="text" id="txtAut" name="txtAut" 
                    placeholder="Informe o(a) autor(a)" data-error="Autor(a) obrigatório" required>
                    <div class="help-block with-errors"></div>
                </div>
                <input type="submit" id="btEnviar" name="btEnviar" class="btn btn-success" value="Gravar"
                        style="width:100px">
                <input type="reset"  id="btLimpar" name="btLimpar" class="btn btn-warning" value="Limpar"
                        style="width:100px">
                <input type="cancel" id="btCancel" name="btCancel" class="btn btn-primary" value="Cancelar"
                        style="width:100px" 
                        onclick="javascript:location.href='lstLivro.php' ">
            </form>
        </div>
    </body>
</html>