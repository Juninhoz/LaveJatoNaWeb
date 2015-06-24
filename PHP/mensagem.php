<?php
    
    include "conexao_banco.php";

    $nome = $_POST['Nome'];
    $email = $_POST['Email'];
    $telefone = $_POST['Fone'];
    $assunto = $_POST['Assunto'];
    $duvida = $_POST['Duvida'];

    if(isset($nome)||isset($email)||isset($telefone)||isset($assunto)||isset($duvida)){ 
        
        $sql = mysql_query("INSERT INTO t_mensagens(nome,email,telefone,assunto,duvida)VALUES('$nome','$email','$telefone','$assunto','$duvida')");
        
        if($sql){
            echo "Mensagem Enviada com sucesso.";
        }else{
            echo "Erro ao enviar a mensagem";
        }
        
    }
?>