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
    $titulo = trim($_POST['txtTit']);
    $edicao = trim($_POST['txtEdi']);
    $autor  = trim($_POST['txtAut']);

    if (empty($edicao)){
        $edicao=1;
    }

    if (!empty($titulo) && !empty($autor)){
        $sql = mysql_query("UPDATE livro SET titulo='$titulo', edicao='$edicao', autor='$autor' WHERE id='$id';");
        $edt = mysql_query($sql);
        if (!$edt)
            echo ("Erro na edição");
    }
    else
        echo "Descrição ou autor em branco";

    header ("location: lstLivro.php");
?>