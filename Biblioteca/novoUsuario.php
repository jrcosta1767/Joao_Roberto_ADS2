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

    $user = trim($_POST['txtUser']);
    $pwd  = trim($_POST['txtPwd']);
    $md5  = md5($pwd);

    if (!empty($user) and !empty($pwd)){
        $sql = mysql_query("INSERT INTO usuario (user, pwd) VALUES('$user', '$md5');");
        $ins = mysql_query($sql);
        if (!$ins)
            echo ("Erro na inserção");
    }

    header ("location: frmMenu.php");
?>