<?php
    $user = trim($_POST['userName']);
    $pwd = trim($_POST['pwd']); 
    $md5 = md5($pwd);

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
 
    $rs = mysql_query("SELECT * FROM  usuario WHERE user LIKE '$user'");
    $linha = mysql_fetch_array($rs); 

    if ($md5==$linha['pwd']){
      session_start(); 
      $_SESSION['user'] = $user; 
      header('location:frmMenu.php');
    }
    else { 
          header('location: login.html'); 
         }

?>