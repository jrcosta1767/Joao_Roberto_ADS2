<?php
session_start();
   if (!isset($_SESSION['user'])) 
      Header("Location: ./login.html");
?>

<html>
    <head>
        <meta charset="UTF-8">
        <title>Sistema de Biblioteca</title>
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
        <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.2.0/css/all.css" integrity="sha384-hWVjflwFxL6sNzntih27bfxkr27PmbbK/iSvJ+a4+0owXq79v+lsFkW54bOGbiDQ" crossorigin="anonymous">
        <link rel="stylesheet" href="frmMenuBtLogout.css">
        <link rel="stylesheet" href="frmMenuBtCliente.css">
        <link rel="stylesheet" href="frmMenuBtEmprestimo.css">
        <link rel="stylesheet" href="frmMenuDivGeral.css">
        <link rel="stylesheet" href="frmMenuDivUp.css">
    </head>
    <body>
        <br><br><br>
        <div class="container" align="center" name="divGeral" id="divGeral">
            <h1 class="text-primary">Sistema de Biblioteca</h1>
            <div class="container" align="center"  name="divUp" id="divUp">
            <br>
                <button id="btLivro" class="btn btn-primary btn-lg" title="Cadastro de livros"
                                    onclick="javascript:location.href='lstLivro.php' ">
                                    <i class="fas fa-book"></i>
                <button id="btCliente" class="btn btn-primary btn-lg" title="Cadastro de clientes"
                                    onclick="javascript:location.href='lstCliente.php' ">
                                    <i class="fas fa-id-card"></i>
                <button id="btEmprestimo" class="btn btn-primary" title="Empréstimos e devolução"
                                    onclick="javascript:location.href='lstEmprestimo.php' ">
                                    <i class="fas fa-book-reader"></i>
            <br>
            </div>
            <br><br>
            <div class="container" align="center">
                <button id="btUser" class="btn btn-info btn-lg" title="Novo Usuário"
                                    onclick="javascript:location.href='frmNovoUsuario.php' ">
                                    <i class="fas fa-user-plus"></i>

                <button id="btLogout" class="btn btn-danger btn-lg" title="Logout"
                                    onclick="javascript:location.href='login.html' ">
                                    <i class="fas fa-sign-out-alt"></i>
            </div>
        </div>
    </body>
</html>