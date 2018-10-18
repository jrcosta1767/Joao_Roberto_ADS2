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
    $rs = mysql_query("SELECT * FROM cliente where id=".$id);
    $linha = mysql_fetch_array($rs); 
?>
<html>
  <head>
    <meta charset="utf-8">
    <title>Remover cliente</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.2.0/css/all.css" integrity="sha384-hWVjflwFxL6sNzntih27bfxkr27PmbbK/iSvJ+a4+0owXq79v+lsFkW54bOGbiDQ" crossorigin="anonymous">
    <link rel="stylesheet" href="frmRemClienteDiv.css"> 
  </head>
  <body>
    <br>
    <div class="container col-md-4" id="divRemCliente" name="divRemCliente">
      <h1 align="center">Remover cliente</h1>
      <br><br>
      <form id="frmRemCliente" name="frmRemCliente" method="GET" action="remCliente.php">
        <div class="form-group">
          <span class="text-xl font-weight-bold">ID: </span>
          <span class="text-xl font-weight-normal"><?php echo $linha['id']?> </span>
          <input type="hidden" id="id" name="id" value="<?php echo $linha['id']?>">
        </div>
        <div class="form-group">
          <span class="text-xl font-weight-bold">Nome: </span>
          <span class="text-xl font-weight-normal"><?php echo $linha['nome']?> </span>
        </div>
        <div class="form-group">
          <span class="text-xl font-weight-bold">Endereço: </span>
          <span class="text-xl font-weight-normal"><?php echo $linha['endereco']?> </span>
        </div>
        <div class="form-group">
          <span class="text-xl font-weight-bold">Cidade: </span>
          <span class="text-xl font-weight-normal"><?php echo $linha['cidade']?> </span>
        </div>
        <div class="form-group">
          <span class="text-xl font-weight-bold">Email: </span>
          <span class="text-xl font-weight-normal"><?php echo $linha['email']?> </span>
        </div>
        <input type="submit" id="btRemover" name="btRemover" class="btn btn-danger" value="Remover"
                       style="width:150px">
        <input type="cancel" id="btCancel" name="btCancel" class="btn btn-primary" value="Cancelar"
                       style="width:150px" 
                       onclick="javascript:location.href='lstCliente.php' ">
     </form>
    </div>  
  </body>
</html>





