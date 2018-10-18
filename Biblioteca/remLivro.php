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

    $id = trim($_REQUEST['id']);

    if (!empty($id)){
        $sql = mysql_query("DELETE FROM livro WHERE id='$id';");
        $rem = mysql_query($sql);
        if (!$rem)
            echo ("Erro na remoção");
    }

    header ("location: lstLivro.php");
?>