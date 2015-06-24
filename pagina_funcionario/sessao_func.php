<?php
    session_start();
    if(!isset($_SESSION['nome_usuario']) || !isset($_SESSION['senha_usuario'])){
        header("Location: ..\\index.php");
        exit;
    }
?>