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

    $livro = $_POST['slcLivro'];
    $cliente = $_POST['slcCliente'];
    $data  = $_POST['txtData'];

    $rs = mysql_query("SELECT count(e.id) 
                        FROM emprestimo e,cliente c 
                        WHERE e.cliente=c.id AND e.id='$cliente';");
    $linha = mysql_fetch_array($rs); 

    if (!empty($data)){
        $sql = mysql_query("INSERT INTO emprestimo (livro, cliente, data_emp, data_dev) VALUES('$livro', '$cliente', '$data', null);");
        $ins = mysql_query($sql);
        $sqlUpd = mysql_query("UPDATE livro SET situacao='E' WHERE id='$livro';");
        $upd = mysql_query($sql);
        if (!$ins)
            echo ("Erro na inserção");
    }
    else
        echo "Data em branco";

    header ("location: lstEmprestimo.php");
?>