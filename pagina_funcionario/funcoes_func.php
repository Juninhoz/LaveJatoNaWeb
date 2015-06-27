<?php

    include "..\\PHP\\conexao_banco.php";

    function consultaMensagem($var){    
    
        if(!isset($var)){
            echo "<h3>Selecione uma mensagem.</h3>";
            echo "<a href='mensagens.php'>Voltar</a>";
        }
        else{   
    $sql = mysql_query("SELECT * FROM t_mensagens");    
            
            if(!(mysql_data_seek($sql,$var))){
                 die('A consulta falhou: ' . mysql_error());
            }
            if(!($row = mysql_fetch_assoc($sql))){
             continue;   
            }
            
            echo "<fieldset>";
            echo "<legend>Mensagens</legend>";
            echo "<table>";
            echo "<tr><th>Nome:</th>";
            echo "<td>" . $row['nome'] . "</td></tr>";
            echo "<tr><th>Email:</th>";
            echo "<td>" . $row['email'] . "</td></tr>";
            echo "<tr><th>Telefone:</th>";
            echo "<td>" . $row['telefone'] . "</td></tr>";
            echo "<tr><th>Assunto:</th>";
            echo "<td>" . $row['assunto'] . "</td></tr>";
            echo "<tr><th>Duvida:</th>";
            echo "</table>";
            echo "<textarea class='text'>" . $row['duvida'] . "</textarea></tr><br><br>";
            echo "<a href='mensagens.php'>Voltar</a>";
            echo "</fieldset>";
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

    function queryMensagem(){
        $sql = mysql_query("SELECT * FROM t_mensagens");
        $linhas = mysql_num_rows($sql);
        return $linhas;
    }
    
    function queryServico(){
        $consulta = mysql_query("SELECT * FROM t_servico WHERE status_pedido = 'Em analise'");
        $teste = mysql_num_rows($consulta);
        return $teste;
    }


function exibirPedidos(){
        $consulta = mysql_query("SELECT id_usuario,nome_usuario,id_pedido,data,valor,status_pagamento FROM t_servico,t_usuarios where id_usuario = cod_usuario and status_pedido = 'Em analise'");
   
    $pedidos = mysql_num_rows($consulta);
    
        echo "<form action='pedidos.php' method='get'>";                             
        echo "<table name='table_msg' class='exibirPed'>";    
        echo "<tr><th>Id usuario</th><th>Nome Usuario</th><th>Id Pedido</th><th>Data</th><th>Valor</th><th>Status</th><th>Aceitar</th><th>Rejeitar</th></tr>";
        $reg = array();
            for($i=0;$i<$pedidos;$i++){
                $registro = mysql_fetch_row($consulta);
                    echo "<tr><td>" . $registro[0]. "</td>";
                    echo "<td>" . $registro[1]. "</td>";
                    echo "<td>" . $registro[2]. "</td>";
                    $reg[$i] = $registro[2];
                    echo "<td>" . $registro[3]. "</td>";
                    echo "<td>" . $registro[4]. "</td>";
                    echo "<td>" . $registro[5]. "</td>";
                    echo "<td><input type='checkbox' name='aceitar' value='$reg[$i]'></td>";
                    echo "<td><input type='checkbox' name='rejeitar' value='$reg[$i]'></td></tr>";
            }
        echo "</table>";
        echo "<input class='exibir_enviar'type='submit' value='Atualizar dados'>";
        echo "</form>";
}

function aceitarPedido($id){
    
    $sql = mysql_query("UPDATE t_servico SET status_pedido = 'Aceito' WHERE id_pedido = '$id'");
    
    if($sql){
        echo "deu tudo certo";   
    }else{
    echo "deu tudo ERRADO";
    }
    
}

function mostrarUsuarios(){
    
    $sql = mysql_query("SELECT * FROM t_usuarios");
    $linhas = mysql_num_rows($sql);
    
    echo "<table id='op'>";
    echo "<form action='remover_usuario.php' method='post'>";
    echo "<tr><th>Id usuario</th><th>Nome</th><th>Email</th><th>Remover</th></tr>";
    $reg = array();
    for($i=0;$i<$linhas;$i++){
         $registro = mysql_fetch_row($sql);   
         echo "<tr><td>$registro[0]</td>";
         $reg[$i] = $registro[0];
         echo "<td> $registro[1] </td>";
         echo "<td> $registro[4]</td>";
         echo "<td><input class='op' type='checkbox' name='valor' value='$reg[$i]'></td></tr>";      
    }
    echo "</table>";
    echo "<br><input class='remove' type='submit' value='Remover'>";
    echo "</form>";
       
}

function mostrarUsuariosSelecionado($var){
 
     $sql = mysql_query("SELECT * FROM t_usuarios WHERE nome_usuario = '$var'");
     $linhas = mysql_num_rows($sql);
    
    if($linhas){
      echo "<table>";
    echo "<tr><th>Id usuario</th><th>Nome</th><th>Email</th></tr>";
    for($i=0;$i<$linhas;$i++){
         $registro = mysql_fetch_row($sql);   
         echo "<tr><td>$registro[0]</td>";
         echo "<td> $registro[1] </td>";
         echo "<td> $registro[4]</td></tr>";
    }
    echo "</table>"; 
    }else{
        echo "<h3 style='margin-top: 20px;'>Nao foram encontrados registros</h3>";
    }
}

function mostrarUsuariosPorOrdenacao($var){
    
    if($var == 'nome'){
        echo "<h4>Ordenados por Nome</h4>";
        $sql = mysql_query("SELECT * FROM t_usuarios ORDER BY nome_usuario");
    }else{
        echo "<h4>Ordenados por id</h4>";
        $sql = mysql_query("SELECT * FROM t_usuarios ORDER BY cod_usuario");
    }
    $linhas = mysql_num_rows($sql);
    
    if($linhas){
      echo "<table>";
    echo "<tr><th>Id usuario</th><th>Nome</th><th>Email</th></tr>";
    for($i=0;$i<$linhas;$i++){
         $registro = mysql_fetch_row($sql);   
         echo "<tr><td>$registro[0]</td>";
         echo "<td> $registro[1] </td>";
         echo "<td> $registro[4]</td></tr>";
    }
    echo "</table>"; 
}
}
function removerUsuario($id){
        echo $id;
        $sql = mysql_query("DELETE FROM t_usuarios WHERE cod_usuario = '$id'");
    if($sql){
        echo "usuario removido com sucesso";
    }else{
     echo "falha ao remover";   
    }
}
 
function consultaPedidos(){
    $sql = mysql_query("SELECT * FROM t_servico");
    $linhas = mysql_num_rows($sql);
    
    if(!$linhas){
        echo "<h3 style='Margin-top:20px;'>Nenhum resultado para busca.</h3>";
    }else{
    echo "<table>";
    echo "<tr><th>Id usuario</th><th>Nome</th><th>Email</th></tr>";
    for($i=0;$i<$linhas;$i++){
         $registro = mysql_fetch_row($sql);   
         echo "<tr><td>$registro[0]</td>";
         echo "<td> $registro[1] </td>";
         echo "<td> $registro[2]</td>";
         echo "<td> $registro[3] </td></tr>";
    }
    echo "</table>"; 
    }
}

function exibirMensagens(){
                                    
    $sql = mysql_query("SELECT * FROM t_mensagens");
    $linhas = mysql_num_rows($sql);
    echo "<form action='msg.php' method='post'>";                             
    echo "<table name='table_msg' class='tabela_msg'>";    
    echo "<tr><th>Nome</th><th>Email</th><th>Telefone</th><th>Assunto</th><th>Ler Mensagens</th><th>Apagar</th></tr>";
          for($i=0;$i<$linhas;$i++){
                $registro = mysql_fetch_row($sql);
                        echo "<tr><td>" . $registro[0]. "</td>";
                        echo "<td>" . $registro[1]. "</td>";
                        echo "<td>" . $registro[2]. "</td>";
                        echo "<td>" . $registro[3]. "</td>";
                        echo "<td><input type='checkbox' name='mens' value='$i'/><input type='submit' value='Ler Mensagem'></td>"; 
                        echo "<td><input type='checkbox' name='del' value='$i'/><input type='submit' value='Apagar'/></td><tr>";
        }
    echo "</table>";  
    echo "</form>";
}



?>