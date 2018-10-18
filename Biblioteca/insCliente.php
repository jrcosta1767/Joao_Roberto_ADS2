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

    $nome = trim($_POST['txtNome']);
    $end = trim($_POST['txtEnd']);
    $cidade  = trim($_POST['txtCid']);
    $email  = trim($_POST['txtEmail']);

    if (!empty($nome) and !empty($cidade)){
        $sql = mysql_query("INSERT INTO cliente (nome, endereco, cidade, email) VALUES('$nome', '$end', '$cidade', '$email');");
        $ins = mysql_query($sql);
        if (!$ins)
            echo ("Erro na inserção");
    }
    else
        echo "Nome ou cidade em branco";

    header ("location: lstCliente.php");
?>