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
    $rs = mysql_query("SELECT e.id,l.titulo,c.nome,e.data_emp 
                        FROM  emprestimo e,cliente c,livro l
                        WHERE e.livro=l.id AND e.cliente=c.id AND e.id=".$id);
    $linha = mysql_fetch_array($rs); 
?>
<html>
  <head>
    <meta charset="utf-8">
    <title>Devolução</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.2.0/css/all.css" integrity="sha384-hWVjflwFxL6sNzntih27bfxkr27PmbbK/iSvJ+a4+0owXq79v+lsFkW54bOGbiDQ" crossorigin="anonymous">
    <script src="js/jquery-3.3.1.min.js" type="text/javascript"></script>    
    <script src="js/validator.min.js"></script> 
    <link rel="stylesheet" href="frmDevolucaoDiv.css"> 
  </head>
  <body>
    <br>
    <div class="container col-md-4" id="divDev" name="divDev">
      <h1 align="center">Devolução</h1>
      <br><br>
      <form id="frmDev" name="frmDev" method="GET" action="devolucao.php">
        <div class="form-group">
          <span class="text-xl font-weight-bold">ID: </span>
          <span class="text-xl font-weight-normal"><?php echo $linha['id']?> </span>
          <input type="hidden" id="id" name="id" value="<?php echo $linha['id']?>">
        </div>
        <div class="form-group">
          <span class="text-xl font-weight-bold">Livro: </span>
          <span class="text-xl font-weight-normal"><?php echo $linha['titulo']?> </span>
        </div>
        <div class="form-group">
          <span class="text-xl font-weight-bold">Cliente: </span>
          <span class="text-xl font-weight-normal"><?php echo $linha['nome']?> </span>
        </div>
        <div class="form-group">
          <span class="text-xl font-weight-bold">Data empréstimo: </span>
          <span class="text-xl font-weight-normal"><?php echo (new DateTime ($linha ['data_emp']))->format("d-m-Y"); ?> </span>
        </div>
        <div class="form-group">
          <label for="lblData">Data devolução:</label>
          <?php $data_max=(string)$linha ['data_emp']; ?>
          <input type="date" class="form-control" name="txtData" id="txtData"
                          value="<?php (new DateTime())->format('Y-m-d') ?>"
                          placeholder="Informe a data" min="<?php echo $data_max; ?>" 
                          data-error="Data obrigatória" required>
          <div class="help-block with-errors"></div>
        </div>
        <input type="submit" id="btDevolucao" name="btDevolucao" class="btn btn-danger" value="Confirmar"
                       style="width:150px">
        <input type="cancel" id="btCancel" name="btCancel" class="btn btn-primary" value="Cancelar"
                       style="width:150px" 
                       onclick="javascript:location.href='lstEmprestimo.php' ">
     </form>
    </div>  
  </body>
</html>





