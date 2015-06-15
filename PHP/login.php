<title>Cadastro</title>
<link rel="stylesheet" type="text/css" href="..\_css\estilo.css">

<?php
    
    include "conexao_banco.php";

    $nome_usuario = $_POST['nome'];
    $senha_usuario = $_POST['senha'];

    
    echo $nome_usuario . "<br>";
    echo $senha_usuario;

    
    $resultado = mysql_query("SELECT * FROM T_USUARIOS WHERE nome_usuario = '$nome_usuario'");
    $id = mysql_query("SELECT cod_usuario FROM T_USUARIOS WHERE nome_usuario = '$nome_usuario'");
    
    $identificador = mysql_result($id,0,"cod_usuario");

    $linhas = mysql_num_rows($resultado);
    
    if($linhas==0){
        echo "usuario nao encontrado";
    }
    else{
        if($senha_usuario != mysql_result($resultado,0,"senha")){
            echo "senha incorreta";
        }
        else{
            session_start();
            $_SESSION['nome_usuario']=$nome_usuario;
            $_SESSION['senha_usuario']=$senha_usuario;
            $_SESSION['id']=$identificador;
            header("Location: ..\\pagina_usuario\\pagina_usuario.php");
        }
    }
?>