<?php
  session_start();
    if (!isset($_SESSION['user'])) 
      Header("Location: ./login.html");
    $conexao =  mysql_connect("localhost","root",""); 
	if (!$conexao){
		echo "Erro ao se conectar MySql <br/>" ; 
		exit;
    }
    
    $banco  = mysql_select_db("biblioteca");
	if (!$banco){
		echo "Erro ao se conectar ao banco biblioteca...";
		exit;
    }

    $id = $_REQUEST['id']; 
    $rs = mysql_query("SELECT * FROM livro where id=".$id);
    $linha = mysql_fetch_array($rs); 
?>
<html>
  <head>
    <meta charset="utf-8">
    <title>Remover livro</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.2.0/css/all.css" integrity="sha384-hWVjflwFxL6sNzntih27bfxkr27PmbbK/iSvJ+a4+0owXq79v+lsFkW54bOGbiDQ" crossorigin="anonymous">
    <link rel="stylesheet" href="frmRemLivroDiv.css"> 
  </head>
  <body>
    <br>
    <div class="container col-md-4" id="divRemLivro" name="divRemLivro">
      <h1 align="center">Remover livro</h1>
      <br>
      <form id="frmRemLivro" name="frmRemLivro" method="GET" action="remLivro.php">
        <div class="form-group">
          <span class="text-xl font-weight-bold">ID: </span>
          <span class="text-xl font-weight-normal"><?php echo $linha['id']?> </span>
          <input type="hidden" id="id" name="id" value="<?php echo $linha['id']?>">
        </div>
        <div class="form-group">
          <span class="text-xl font-weight-bold">Título: </span>
          <span class="text-xl font-weight-normal"><?php echo $linha['titulo']?> </span>
        </div>
        <div class="form-group">
          <span class="text-xl font-weight-bold">Edição: </span>
          <span class="text-xl font-weight-normal"><?php echo $linha['edicao']?> </span>
        </div>
        <div class="form-group">
          <span class="text-xl font-weight-bold">Autor(a): </span>
          <span class="text-xl font-weight-normal"><?php echo $linha['autor']?> </span>
        </div>
        <input type="submit" id="btRemover" name="btRemover" class="btn btn-danger" value="Remover"
                       style="width:150px">
        <input type="cancel" id="btCancel" name="btCancel" class="btn btn-primary" value="Cancelar"
                       style="width:150px" 
                       onclick="javascript:location.href='lstLivro.php' ">
     </form>
    </div>  
  </body>
</html>





