<link rel="stylesheet" type="text/css" href="..\_css\confirma.css"/>
<title>Remover Usuario</title>
<?php

    include "..\\PHP\\conexao_banco.php";
    require_once "funcoes_func.php";
    require_once "sessao_func.php";


    @$nome_remov = $_POST['valor'];
    
    if(!isset($nome_remov)){
        header("Location: relatorio_clientes.php");
    }
    else{
        removerUsuario($nome_remov); 
        header("Location: relatorio_clientes.php");
    }
?>