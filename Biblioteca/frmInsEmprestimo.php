<?php
session_start();
   if (!isset($_SESSION['user'])) 
      Header("Location: ./login.html");
?>

<html>  
    <head>  
        <meta charset = "utf-8">
        <title>Novo empréstimo</title>
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
        <script src="js/jquery-3.3.1.min.js" type="text/javascript"></script>    
        <script src="js/validator.min.js"></script> 
        <link rel="stylesheet" href="frmInsEmprestimoDiv.css">    
    </head>
    <body>
        <br>
        <div class="container col-md-4" id="divNovoEmp" name="divNovoEmp">
            <h1 align="center">Novo empréstimo</h1>
            <br>
            <form id="frmNovoEmp" name="frmNovoEmp" role="form" data-toggle="validator" method="POST" action="insEmprestimo.php">
                <div class="form-group">
                    <label for="lblLivro">Livro:</label>
                    <!-- Dados de livros -->
                        <?php
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
                                $rsLiv = mysql_query("SELECT * FROM livro WHERE situacao='D';");       
                        ?> 
                    <select class="form-control" style="width:309px" id="slcLivro" name="slcLivro"> 
                                <?php $linha = mysql_fetch_array($rsLiv); ?>
                                <option value="<?php echo $linha ['id'] ?>">
                                <?php echo $linha['titulo'];?>
                                <?php while($linha = mysql_fetch_array($rsLiv)){?>
                                    <option value="<?php echo $linha ['id'] ?>">
                                    <?php echo $linha['titulo'];?>
                                <?php } ?>
                                </option>
                    </select>
                </div>
                <div class="form-group">
                    <label for="lblCliente">Cliente:</label>
                    <!-- Dados de clientes -->
                        <?php
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

                                date_default_timezone_set('America/Sao_Paulo');
                                $hoje = date('Y/m/d', time());

                                $rsCli = mysql_query("SELECT *
                                                      FROM cliente
                                                      WHERE id NOT IN(SELECT cliente FROM (SELECT cliente,count(id)
                                                                                            FROM emprestimo
                                                                                            WHERE data_dev is null
                                                                                            GROUP BY cliente
                                                                                            HAVING count(id)>=3) tab)
                                                      AND id NOT IN(SELECT cliente FROM emprestimo 
                                                                    WHERE data_emp<(SELECT DATE_ADD('2018-10-18', INTERVAL -7 DAY)) AND data_dev IS NULL);");       
                        ?> 
                    <select class="form-control" style="width:309px" id="slcCliente" name="slcCliente"> 
                                <?php $linha = mysql_fetch_array($rsCli); ?>
                                <option value="<?php echo $linha ['id'] ?>">
                                <?php echo $linha['nome'];?>
                                <?php while($linha = mysql_fetch_array($rsCli)){?>
                                    <option value="<?php echo $linha ['id'] ?>">
                                    <?php echo $linha['nome'];?>
                                <?php } ?>
                                </option>
                    </select>
                </div>
                <div class="form-group">
                    <label for="lblData">Data:</label>
                    <input type="date" class="form-control" name="txtData" id="txtData"
                                    value="<?php (new DateTime())->format('Y-m-d') ?>"
                                    placeholder="Informe a data" data-error="Data obrigatória" required>
                    <div class="help-block with-errors"></div>
                </div>
                <input type="submit" id="btEnviar" name="btEnviar" class="btn btn-success" value="Gravar"
                        style="width:100px">
                <input type="reset"  id="btLimpar" name="btLimpar" class="btn btn-warning" value="Limpar"
                        style="width:100px">
                <input type="cancel" id="btCancel" name="btCancel" class="btn btn-primary" value="Cancelar"
                        style="width:100px" 
                        onclick="javascript:location.href='lstEmprestimo.php' ">
            </form>
        </div>
    </body>
</html>