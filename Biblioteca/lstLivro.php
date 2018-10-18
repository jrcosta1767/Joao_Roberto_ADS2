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
    $rs = mysql_query("SELECT * FROM livro;");
?>

<html>
    <head>
        <meta charset="UTF-8">
        <title>Lista de livros</title>
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
        <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.2.0/css/all.css" integrity="sha384-hWVjflwFxL6sNzntih27bfxkr27PmbbK/iSvJ+a4+0owXq79v+lsFkW54bOGbiDQ" crossorigin="anonymous">
        <link rel="stylesheet" href="lstLivro.css">  
    </head>
    <body>
        <br>
        <div class="container" align="center">
        <h1 class="text-primary">Lista de livros</h1>
        <br>
        <input type="button" id="btAd" name="btAd" class="btn btn-primary btn-lg" value="Adicionar" 
                      onclick="javascript:location.href='frmInsLivro.php' ">
        <input type="button" id="btVoltar" name="btVoltar" class="btn btn-info btn-lg" value="Voltar" 
                      onclick="javascript:location.href='frmMenu.php' ">
        <br><br>
        <table class="table table-striped table-dark col-md-8">
            <tr >
                <th>ID</th>
                <th>Título</th>
                <th>Edição</th>
                <th>Autor(a)</th>
                <th>Situação</th>
                <th colspan="2" class="text-center">Operações</th>
            </tr>
            <?php while ($linha = mysql_fetch_array($rs)) {?>
                <tr>
                    <td><?php echo $linha ['id'] ?></td>
                    <td><?php echo $linha ['titulo'] ?></td>
                    <td><?php echo $linha ['edicao'] ?></td>
                    <td><?php echo $linha ['autor'] ?></td>
                    <td><?php echo $linha ['situacao'] ?></td>
                    <td><button id="tbEdt" class="btn btn-outline-warning btn-lg" 
                                onclick="javascript:location.href='frmEdtLivro.php?id='+<?php echo $linha ['id'] ?> ">
                                <i class="far fa-edit"></i></button></td>
                    <td><button id="tbRem" class="btn btn-outline-danger btn-lg" 
                                onclick="javascript:location.href='frmRemLivro.php?id='+<?php echo $linha ['id'] ?> ">
                                <i class="far fa-trash-alt" ></i></button></td>
                </tr>
            <?php }?>
        </table>
        </div>
    </body>
</html>
