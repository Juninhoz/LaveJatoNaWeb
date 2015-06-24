<?php

    include "PHP\conexao_banco.php";
    
    function consultaMensagem($var){    
    
        if(!isset($var)){
            echo "Selecione uma mensagem.";
        }
        else{   
    $sql = mysql_query("SELECT * FROM t_mensagens");    
            
            if(!(mysql_data_seek($sql,$var))){
                 die('A consulta falhou: ' . mysql_error());
            }
            if(!($row = mysql_fetch_assoc($sql))){
             continue;   
            }
            
            echo "<table>";
            echo "<tr><th>Nome:</th><tr>";
            echo "<tr><td style='border:1px solid'>" . $row['nome'] . "</tr></td>";
            echo "<tr><th>Email:</th><tr>";
            echo "<tr><td style='border:1px solid'>" . $row['email'] . "</tr></td>";
            echo "<tr><th>Telefone:</th><tr>";
            echo "<tr><td style='border:1px solid'>" . $row['telefone'] . "</tr></td>";
            echo "<tr><th>Assunto:</th><tr>";
            echo "<tr><td style='border:1px solid'>" . $row['assunto'] . "</tr></td>";
            echo "<tr><th>Duvida:</th><tr>";
            echo "<tr><td style='border:1px solid'>" . $row['duvida'] . "</tr></td>";
            echo "</table>";
        }
    
    }

    function apagarMensagem($var){
        
        if(!isset($var)){
            echo "Selecione uma mensagem para remover.";
        }
        
        $sql = mysql_query("SELECT * FROM t_mensagens");    
            
        if(!(mysql_data_seek($sql,$var))){
                 die('A consulta falhou: ' . mysql_error());
            }
            if(!($row = mysql_fetch_assoc($sql))){
             continue;   
            }
        
        $teste = $row['nome'];
        
        echo $teste;
        
        $delete = mysql_query("DELETE FROM t_mensagens WHERE nome = '$teste'");
        
        if($delete){
            echo "Tudo certo";
        }
    }




?>