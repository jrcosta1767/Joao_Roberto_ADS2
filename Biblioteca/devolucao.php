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
    $data_dev  = $_GET['txtData'];

    if (!empty($id)){
        $sql = mysql_query("UPDATE livro SET situacao='D' WHERE id=(SELECT livro FROM emprestimo WHERE id='$id');");
        $upd = mysql_query($sql);
        if (!$upd)
            echo ("Erro na devolução");
        $sql = mysql_query("UPDATE emprestimo SET data_dev='$data_dev' WHERE id='$id';");
        $upd = mysql_query($sql);
        if (!$upd)
            echo ("Erro na devolução");
    }

    header ("location: lstEmprestimo.php");
?>