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

    $rs = mysql_query("SELECT * FROM livro WHERE id=".$id);
    $linha = mysql_fetch_array($rs);
?>

<html>
    <head>  
        <meta charset = "utf-8">
        <title>Editar livro</title>
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
        <script src="js/jquery-3.3.1.min.js" type="text/javascript"></script>    
        <script src="js/validator.min.js"></script>
        <link rel="stylesheet" href="frmEdtLivroDiv.css">   
    </head>
    <body>
        <br>
        <div class="container col-md-4" id="divEdtLivro" name="divEdtLivro">
            <h1 align="center">Editar livros</h1>
            <br>
            <form id="frmEdtLivro" name="frmEdtLivro" role="form" data-toggle="validator"  method="POST" action="edtLivro.php">
                <div class="form-group">
                    <label for="lblId">ID: <?php echo $linha['id']?></label>
                    <input type="hidden" id="id" name="id" value="<?php echo $linha['id']?>">
                </div>
                <div class="form-group">
                    <label for="lblTitulo">Título: </label>
                    <input type="text" id="txtTit" class="form-control" style="width:309px" name="txtTit" 
                    value="<?php echo $linha['titulo']?>" data-error="Título obrigatório" required>
                    <div class="help-block with-errors"></div>
                </div>
                <div class="form-group">
                    <label for="lblEdicao">Edição: </label>
                    <input type="text" id="txtEdi" class="form-control col-md-2" name="txtEdi" value="<?php echo $linha['edicao']?>">
                </div>
                <div class="form-group">
                    <label for="lblAutor">Autor(a): </label>
                    <input type="text" id="txtAut" class="form-control" style="width:309px" name="txtAut" 
                    value="<?php echo $linha['autor']?>" data-error="Autor(a) obrigatório" required>
                    <div class="help-block with-errors"></div>
                </div>
                <input type="submit" id="btEnviar" name="btEnviar" class="btn btn-success" value="Atualizar"
                        style="width:100px" >
                <input type="reset"  id="btLimpar" name="btLimpar" class="btn btn-warning" value="Limpar"
                        style="width:100px" >
                <input type="cancel" id="btCancel" name="btCancel" class="btn btn-primary" value="Cancelar" 
                        style="width:100px" 
                        onclick="javascript:location.href='lstLivro.php' ">
            </form>
        </div>
    </body>
</html>