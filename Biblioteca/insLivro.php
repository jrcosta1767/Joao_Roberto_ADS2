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

    $titulo = trim($_POST['txtTit']);
    $edicao = trim($_POST['txtEdi']);
    $autor  = trim($_POST['txtAut']);

    if (empty($edicao)){
        $edicao=1;
    }

    if (!empty($titulo) and !empty($autor)){
        $sql = mysql_query("INSERT INTO livro (titulo, edicao, autor, situacao) VALUES('$titulo', '$edicao', '$autor', 'D');");
        $ins = mysql_query($sql);
        if (!$ins)
            echo ("Erro na inserção");
    }
    else
        echo "Título ou autor em branco";

    header ("location: lstLivro.php");
?>