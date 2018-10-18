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

    $id   = trim($_POST['id']);
    $nome = trim($_POST['txtNome']);
    $end = trim($_POST['txtEnd']);
    $cidade  = trim($_POST['txtCid']);
    $email  = trim($_POST['txtEmail']);

    if (!empty($nome) && !empty($cidade)){
        $sql = mysql_query("UPDATE cliente SET nome='$nome', endereco='$end', cidade='$cidade', email='$email' WHERE id='$id';");
        $edt = mysql_query($sql);
        if (!$edt)
            echo ("Erro na edição");
    }
    else
        echo "Nome ou cidade em branco";

    header ("location: lstCliente.php");
?>